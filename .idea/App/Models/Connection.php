<?php

namespace App\Models;

class Connection
{

    public static $instance = null;

    private function __construc()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {

            $db_server = '127.0.0.1';
            $db_user = 'root';
            $db_name = 'lecturiosis';
            $db_password = 'ileana1102';

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
            } catch (\Throwable $th) {
                echo "Error de conexión: " . $th->getMessage();
                exit;
            }
        }
        return self::$instance;
    }

}