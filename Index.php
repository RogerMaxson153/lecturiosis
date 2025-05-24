<?php
require_once __DIR__ . '/App/Core/Autoload.php';
session_start();

use App\Controllers\IndexController;

$controller = new IndexController();
$controller->ejecutar();