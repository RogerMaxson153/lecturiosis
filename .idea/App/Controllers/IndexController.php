<?php
namespace App\Controllers;
use App\Models\User;
class IndexController
{

    public function __construct()
    {
        //OPERACIONES
        $users = (new User())->getAll();

        var_dump($users);

        //LLAMADA A UNA VISTA
        require('./App/Views/IndexView.php');
    }
}