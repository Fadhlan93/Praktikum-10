<?php

namespace App\Controllers;
// panggil controller
use App\Core\Controller;

class Index extends Controller
{

    public function index()
    {
        $data['row_index'] = "Ini file app/controllers/Index.php - index()";
        $this->webboard('index/index', $data);
    }

    public function show()
    {
    $data['row_show'] = "Ini file app/controllers/Index.php - show()";
        $this->webboard('index/show', $data);
    }

    public function detail($id)
    {
    $data['row_detail'] = "Ini file app/controllers/Index.php - detail() -" . $id;
        $this->webboard('index/detail', $data);
    }
}