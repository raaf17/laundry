<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
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
      'title'       => 'Data Users',
      'data_user'  => $this->users->findAll(),
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Users\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function new()
  {
    $data = [
      'title' => 'Tambah Data Users'
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Users\Views\new');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function create()
  {
    $validate = $this->validate([
      'username'      => 'required',
      'password'      => 'required',
      'nama'          => 'required',
      'jenis_kelamin' => 'required',
      'alamat'        => 'required',
      'no_telepon'    => 'required',
      'foto'          => 'required|max_size[image, 4048]|uploaded[image]|is_image[image]|ext_in[image,png,jpg,jpeg]',
      'level'         => 'required',
    ]);

    if ($validate) {
      session()->setFlashdata('failed', 'Data Produk Gagal ditambahkan');
      return redirect()->back()->withInput();
    }

    $image = $this->request->getFile('foto');
    $image_name = $image->getRandomName();
    $image->move(WRITEPATH . '../public/img/upload/', $image_name);
    $data = [
      'username'      => $this->request->getPost('username'),
      'password'      => md5($this->request->getPost('password')),
      'nama'          => $this->request->getPost('nama'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'alamat'        => $this->request->getPost('alamat'),
      'no_telepon'    => $this->request->getPost('no_telepon'),
      'foto'          => $image_name,
      'level'         => $this->request->getPost('level'),
    ];

    $this->users->insert($data);

    session()->setFlashdata('success', 'Data Berhasil ditambahkan');

    return redirect()->to('/users');
  }

  public function edit($id = null)
  {
    $users = $this->users->where('id_user', $id)->first();

    $data = [
      'title' => 'Edit Data Users',
      'data_user' => $users
    ];

    if (is_object($users)) {
      echo view('App\Modules\Layouts\Views\header', $data);
      echo view('App\Modules\Layouts\Views\navbar', $data);
      echo view('App\Modules\Layouts\Views\sidebar', $data);
      echo view('App\Modules\Users\Views\edit', $data);
      echo view('App\Modules\Layouts\Views\footer');
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update($id = null)
  {
    $validate = $this->validate([
      'username'      => 'required',
      'password'      => 'required',
      'nama'          => 'required',
      'jenis_kelamin' => 'required',
      'alamat'        => 'required',
      'no_telepon'    => 'required',
      'foto'          => 'required|max_size[image, 4048]|is_image[image]|ext_in[image,png,jpg,jpeg]',
      'level'         => 'required',
    ]);

    if ($validate) {
      session()->setFlashdata('failed', 'Data Produk Gagal ditambahkan');
      return redirect()->back()->withInput();
    }

    $image = $this->request->getFile('foto');

    if ($image->getError() == 4) {
      $image_name = $this->request->getPost('oldImage');
    } else {
      $image_name = $image->getRandomName();
      $image->move(WRITEPATH . '../public/img/upload', $image_name);

      unlink(WRITEPATH . '../public/img/upload' . $this->request->getPost('oldImage'));
    }

    $data = [
      'username'      => $this->request->getPost('username'),
      'password'      => md5($this->request->getPost('password')),
      'nama'          => esc($this->request->getPost('nama')),
      'jenis_kelamin' => esc($this->request->getPost('jenis_kelamin')),
      'alamat'        => $this->request->getPost('alamat'),
      'no_telepon'    => $this->request->getPost('no_telepon'),
      'foto'          => $image_name,
      'level'         => $this->request->getPost('level'),
    ];

    $this->users->update($id, $data);

    session()->setFlashdata('success', 'Data Berhasil diupdate');

    return redirect()->to('/users');
  }

  public function delete()
  {
    if ($this->request->isAJAX()) {
      $id_user = $this->request->getVar('id_user');
      $users = $this->users->find($id_user);
      $this->users->where('id_user', $id_user)->delete();
      $result = [
        'success' => 'Data Berhasil dihapus'
      ];

      echo json_encode($result);
    } else {
      exit('404 Not Found');
    }
  }

  public function trash()
  {
    $data = [
      'title' => 'Data Trash Users',
      'data_user' => $this->users->onlyDeleted()->findAll()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Users\Views\trash', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function restore($id = null)
  {
    $this->db = \Config\Database::connect();
    if ($id != null) {
      $this->db->table('users')
        ->set('deleted_at', null, true)
        ->where(['id_user' => $id])
        ->update();
    } else {
      $this->db->table('users')
        ->set('deleted_at', null, true)
        ->where('deleted_at is NOT NULL', NULL, FALSE)
        ->update();
    }
    if ($this->db->affectedRows() > 0) {
      session()->setFlashdata('success', 'Data Berhasil direstore');

      return redirect()->to('/users');
    }
  }

  public function delete2($id = null)
  {
    if ($id != null) {
      $this->users->delete($id, true);
      return redirect()->to('/users/trash')->with('success', 'Data Berhasil Dihapus Permanen');
    } else {
      $this->users->purgeDeleted();
      return redirect()->to('/users/trash')->with('success', 'Data Trash Berhasil Dihapus Permanen');
    }
  }
}
