<?php

use App\Controllers\IndexController;

class Index
{

    public function __construct()
    {
        require_once __DIR__ . ('/App/Core/Autoload.php');
    }

    public function execute()
    {
        return new IndexController;
    }
}

//TRADICIONAL
#$app = new Index();
#$app->execute();

//OBJETOS ANONIMOS
(new Index())->execute();