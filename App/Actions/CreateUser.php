<?php
require_once __DIR__ . '/../Core/Autoload.php';
use App\Models\Connection;

$db = Connection::getInstance();

$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

$sql = "INSERT INTO users (nombre, email, password) VALUES (:nombre, :email, :password)";
$stmt = $db->prepare($sql);
$stmt->execute([
    'nombre' => $nombre,
    'email' => $email,
    'password' => $password
]);

header('Location: /index.php');
exit;