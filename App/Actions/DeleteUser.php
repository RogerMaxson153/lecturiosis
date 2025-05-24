<?php
require_once __DIR__ . '/../Core/Autoload.php';
use App\Models\Connection;

$db = Connection::getInstance();
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(['id' => $_POST['id']]);

header('Location: /index.php');
exit;