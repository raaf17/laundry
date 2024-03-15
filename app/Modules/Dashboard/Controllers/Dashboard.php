<?php

namespace App\Modules\Dashboard\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
  public function index()
  {
    $data = [
      'title' => 'Dashboard'
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Dashboard\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }
}
