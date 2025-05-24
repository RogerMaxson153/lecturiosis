<?php

namespace App\Contracts;

interface ModelInterface
{
    public function save();
    
    public function delete();

    public function findById($id);
}