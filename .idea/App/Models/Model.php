<?php

namespace App\Models;

use App\Models\Connection;

abstract class Model implements ModelInterface
{
    protected $db;
    protected static $table = '';
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->db = Connection::getInstance();
        $this->attributes = $attributes;
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function save(): bool
    {
        if (empty($this->attributes['id'])) {
            return $this->insert();
        }
        return $this->update();
    }

    protected function insert(): bool
    {
        $columns = implode(', ', array_keys($this->attributes));
        $placeholders = ':' . implode(', :', array_keys($this->attributes));

        $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
        $stmt = $this->db->prepare($sql);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $result = $stmt->execute();
        
        if ($result) {
            $this->attributes['id'] = $this->db->lastInsertId();
        }
        
        return $result;
    }

    protected function update(): bool
    {
        $setParts = [];
        foreach ($this->attributes as $key => $value) {
            if ($key !== 'id') {
                $setParts[] = "$key = :$key";
            }
        }
        $setClause = implode(', ', $setParts);

        $sql = "UPDATE " . static::$table . " SET $setClause WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function delete(): bool
    {
        if (empty($this->attributes['id'])) {
            return false;
        }

        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->attributes['id']);
        
        return $stmt->execute();
    }

    public static function findById(int $id): ?ModelInterface
    {
        $db = Connection::getInstance();
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $model = new static();
        $model->attributes = $data;
        return $model;
    }

    public static function all(): array
    {
        $db = Connection::getInstance();
        $sql = "SELECT * FROM " . static::$table;
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $models = [];
        while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $model = new static();
            $model->attributes = $data;
            $models[] = $model;
        }

        return $models;
    }
}