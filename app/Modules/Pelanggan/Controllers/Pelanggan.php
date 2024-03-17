<?php

namespace App\Modules\Pelanggan\Controllers;

use App\Modules\Pelanggan\Models\PelangganModel;
use CodeIgniter\Controller;

class Pelanggan extends Controller
{
  protected $db;
  protected $pelanggan;

  public function __construct()
  {
    $this->pelanggan = new PelangganModel();
  }

  public function index()
  {
    $data = [
      'title'       => 'Data Pelanggan',
      'data_pelanggan'  => $this->pelanggan->findAll(),
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Pelanggan\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function new()
  {
    $data = [
      'title' => 'Tambah Data Pelanggan'
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Pelanggan\Views\new');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function create()
  {
    $validate = $this->validate([
      'nama' => 'required',
      'jenis_kelamin' => 'required',
      'alamat' => 'required',
      'no_telepon' => 'required',
      'foto' => 'required|max_size[image, 4048]|uploaded[image]|is_image[image]|ext_in[image,png,jpg,jpeg]'
    ]);

    if ($validate) {
      session()->setFlashdata('failed', 'Data Produk Gagal ditambahkan');
      return redirect()->back()->withInput();
    }

    $image = $this->request->getFile('foto');
    $image_name = $image->getRandomName();
    $image->move(WRITEPATH . '../public/img/upload/', $image_name);
    $data = [
      'nama'          => $this->request->getPost('nama'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'alamat'        => $this->request->getPost('alamat'),
      'no_telepon'    => $this->request->getPost('no_telepon'),
      'foto'          => $image_name
    ];

    $this->pelanggan->insert($data);

    session()->setFlashdata('success', 'Data Berhasil ditambahkan');

    return redirect()->to('/pelanggan');
  }

  public function edit($id = null)
  {
    $pelanggan = $this->pelanggan->where('id_pelanggan', $id)->first();

    $data = [
      'title' => 'Edit Data Pelanggan',
      'data_pelanggan' => $pelanggan
    ];

    if (is_object($pelanggan)) {
      echo view('App\Modules\Layouts\Views\header', $data);
      echo view('App\Modules\Layouts\Views\navbar', $data);
      echo view('App\Modules\Layouts\Views\sidebar', $data);
      echo view('App\Modules\Pelanggan\Views\edit', $data);
      echo view('App\Modules\Layouts\Views\footer');
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update($id = null)
  {
    $validate = $this->validate([
      'nama' => 'required',
      'jenis_kelamin' => 'required',
      'alamat' => 'required',
      'no_telepon' => 'required',
      'foto' => 'required|max_size[image, 4048]|is_image[image]|ext_in[image,png,jpg,jpeg]'
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
      'nama' => esc($this->request->getPost('nama')),
      'jenis_kelamin' => esc($this->request->getPost('jenis_kelamin')),
      'alamat' => $this->request->getPost('alamat'),
      'no_telepon' => $this->request->getPost('no_telepon'),
      'foto' => $image_name
    ];
    
    $this->pelanggan->update($id, $data);

    session()->setFlashdata('success', 'Data Berhasil diupdate');

    return redirect()->to('/pelanggan');
  }

  public function delete()
  {
    if ($this->request->isAJAX()) {
      $id_pelanggan = $this->request->getVar('id_pelanggan');
      $pelanggan = $this->pelanggan->find($id_pelanggan);
      $this->pelanggan->where('id_pelanggan', $id_pelanggan)->delete();
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
      'title' => 'Data Trash Pelanggan',
      'data_pelanggan' => $this->pelanggan->onlyDeleted()->findAll()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Pelanggan\Views\trash', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function restore($id = null)
  {
    $this->db = \Config\Database::connect();
    if ($id != null) {
      $this->db->table('pelanggan')
        ->set('deleted_at', null, true)
        ->where(['id_pelanggan' => $id])
        ->update();
    } else {
      $this->db->table('pelanggan')
        ->set('deleted_at', null, true)
        ->where('deleted_at is NOT NULL', NULL, FALSE)
        ->update();
    }
    if ($this->db->affectedRows() > 0) {
      session()->setFlashdata('success', 'Data Berhasil direstore');

      return redirect()->to('/pelanggan');
    }
  }

  public function delete2($id = null)
  {
    if ($id != null) {
      unlink(WRITEPATH . '../public/img/upload/' . $this->pelanggan->where($id));
      $this->pelanggan->delete($id, true);

      return redirect()->to('/pelanggan/trash')->with('success', 'Data Berhasil Dihapus Permanen');
    } else {
      unlink(WRITEPATH . '../public/img/upload/' . $this->pelanggan->where($id));
      $this->pelanggan->purgeDeleted();
      
      return redirect()->to('/pelanggan/trash')->with('success', 'Data Trash Berhasil Dihapus Permanen');
    }
  }
}
