<?php

namespace App\Modules\Auth\Controllers;

use App\Modules\Users\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
  protected $db;
  protected $users;

  public function __construct()
  {
    $this->users = new UserModel();
  }

  public function login()
  {
    $data = [
      'title' => 'Login',
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Auth\Views\login');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function authLogin()
  {
    $post   = $this->request->getPost();
    $query  = $this->users->getWhere([
      'username' => $post['username'],
      'password' => md5($post['password'])
    ]);

    $user = $query->getRow();

    if ($user) {
      $params = ['id_user' => $user->id_user];

      session()->set($params);

      if ($user->level == 'Admin') {
        session()->setFlashdata('message', 'Anda Berhasil Login');
        return redirect()->to('/dashboard');
      } elseif ($user->level == 'Customer') {
        return redirect()->to('/customer');
      } else {
        echo "Level tidak ada";
      }
    } else {
      return redirect()->back()->with('message', 'Email atau Passoword Anda Salah');
    }
  }

  public function register()
  {
    $data = [
      'title' => 'Register'
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Auth\Views\register');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function logout()
  {
    session()->remove('id_user');
    
    return redirect()->to(site_url('auth/login'));
  }
}
