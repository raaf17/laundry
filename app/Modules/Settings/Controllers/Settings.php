<?php

namespace App\Modules\Settings\Controllers;

use App\Modules\Users\Models\UserModel;
use CodeIgniter\Controller;

class Settings extends Controller
{
  protected $db;
  protected $users;

  public function __construct()
  {
    $this->users = new UserModel();
  }

  public function index()
  {
    $data = [
      'title'     => 'Settings',
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Settings\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function profile()
  {
    $data = [
      'title'     => 'Profile',
      'data_user' => $this->users->where('id_user', session('id_user'))->get()->getRow()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Settings\Views\profile');
    echo view('App\Modules\Layouts\Views\footer');
  }
}
