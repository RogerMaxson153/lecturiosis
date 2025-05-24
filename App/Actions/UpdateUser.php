<?php
require_once __DIR__ . '/../Core/Autoload.php';
use App\Models\Connection;

$db = Connection::getInstance();

$id = $_POST['id'];
$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

$sql = "UPDATE users SET nombre = :nombre, email = :email, password = :password WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([
    'id' => $id,
    'nombre' => $nombre,
    'email' => $email,
    'password' => $password
]);

header('Location: /index.php');
exit;