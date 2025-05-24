<?php
require_once __DIR__ . '/../Core/Autoload.php';

use App\Models\User;

$user = null;
if (!empty($_GET['id'])) {
    $datos = (new User())->findById($_GET['id']);
    
    if ($datos) {
        $user = new User();
        $user->setId($datos['id']);
        $user->setNombre($datos['nombre']);
        $user->setEmail($datos['email']);
        $user->setPassword($datos['password'] ?? '');
    }
}

require __DIR__ . '/../Views/FormUser.php';