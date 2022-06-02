<?php

namespace App\Core;

class Controller
{
    // Layout webboard
    public function webboard($view, $data = [])
    {
        require_once ROOT . "layouts/index.php";
    }

    // Layout dashboard
    public function dashboard($view, $data = [])
    {
        require_once ROOT . "layouts/dashboard.php";
    }
}