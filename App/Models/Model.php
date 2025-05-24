<?php

namespace App\Models;

use App\Contracts\ModelInterface;
use App\Models\Connection;



class Model implements ModelInterface{

    protected static $table = '';

    private static $dbInstance;

    public function __construct()
    {
        self::$dbInstance = Connection::getInstance();
    }

    protected static function getTable()
    {
        return static::$table;
    }

    public function save()
    {
        echo "Guardando el modelo...<br>";    
    }

    public function delete()
    {
        echo "Borrando el modelo...<br>";
    }

    public function findById($id)
    {
    $table = static::getTable();
    $sql = "SELECT * FROM $table WHERE id = :id";
    $result = self::$dbInstance->prepare($sql);
    $result->execute(['id' => $id]);
    return $result->fetch(\PDO::FETCH_ASSOC);
    }



    public static function get()
    {
        $table = static::getTable();
        $sql = "SELECT * FROM $table";
        if (!isset(self::$dbInstance)){
            self::$dbInstance = Connection::getInstance();
        }
        $result = self::$dbInstance->prepare($sql);
        $result->execute();

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
}