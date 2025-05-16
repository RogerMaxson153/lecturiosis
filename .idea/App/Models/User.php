<?php

namespace App\Models;

use App\Models\Connection;
class User
{
    protected $db;
    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    public function getAll()
    {
        $sql = "SELECT users.name, users.email
        FROM users;";
        $result = $this->db->prepare($sql);
        $result->execute();
        $users = [];
        $users = $result->fetchAll(\PDO::FETCH_ASSOC);

        return $users;
    }
}