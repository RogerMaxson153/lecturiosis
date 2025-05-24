<?php

namespace App\Models;

class Connection
{
    public static $instance = null;

    private function __construct() {} // corregido el nombre

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            $db_server = '127.0.0.1';
            $db_user = 'root';
            $db_name = 'lecturiosis';
            $db_password = 'huevos1';

            try {
                self::$instance = new \PDO(
                    "mysql:host=$db_server;dbname=$db_name",
                    $db_user,
                    $db_password
                );
                self::$instance->setAttribute(
                    \PDO::ATTR_ERRMODE,
                    \PDO::ERRMODE_EXCEPTION
                );
            } catch (\PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
                exit;
            }
        }

        return self::$instance;
    }
}