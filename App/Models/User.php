<?php

namespace App\Models;

require_once 'Model.php';

use App\Models\Model;

Class User extends Model{

    protected static $table = 'users';
    
    private $id;
    private $nombre;
    private $email;
    private string $password = '';

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

}