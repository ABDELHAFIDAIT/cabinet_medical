<?php

namespace App\Controllers;

class ErrorController
{
    public function notFound()
    {
        require_once '../views/errors/404.php';
    }
}