<?php
namespace App\Controllers;

use App\Models\User;

class IndexController
{
    public function ejecutar()
    {
        $users = $_SESSION['users'] ?? User::get();
        $mensaje = $_SESSION['mensaje'] ?? '';
        $input = $_SESSION['input'] ?? '';

        unset($_SESSION['users'], $_SESSION['mensaje'], $_SESSION['input']);

        include('./App/Views/IndexView.php');
    }
}