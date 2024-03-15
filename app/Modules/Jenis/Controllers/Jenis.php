<?php

namespace App\Modules\Jenis\Controllers;

use App\Modules\Jenis\Models\JenisModel;
use CodeIgniter\Controller;

class Jenis extends Controller
{
  protected $db;
  protected $jenis;

  public function __construct()
  {
    $this->jenis = new JenisModel();
  }

  public function index()
  {
    $data = [
      'title'       => 'Data Jenis Laundry',
      'data_jenis'  => $this->jenis->findAll(),
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Jenis\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function new()
  {
    $data = [
      'title' => 'Tambah Data Jenis Laundry'
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Jenis\Views\new');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function create()
  {
    $validate = $this->validate([
      'jenis_laundry' => [
        'rules'       => 'required',
        'errors' => [
          'required'  => 'Jenis Laundry tidak boleh kosong',
        ],
      ],
      'lama_proses' => [
        'rules'       => 'required',
        'errors' => [
          'required'  => 'Lama Proses tidak boleh kosong',
        ],
      ],
      'tarif' => [
        'rules'       => 'required',
        'errors' => [
          'required'  => 'Tarif tidak boleh kosong',
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput();
    }

    $data = $this->request->getPost();
    $this->jenis->insert($data);

    session()->setFlashdata('success', 'Data Berhasil ditambahkan');

    return redirect()->to('/jenis');
  }

  public function edit($id = null)
  {
    $jenis = $this->jenis->where('id_jenis', $id)->first();

    $data = [
      'title' => 'Edit Data Jenis Laundry',
      'data_jenis' => $jenis
    ];

    if (is_object($jenis)) {
      echo view('App\Modules\Layouts\Views\header', $data);
      echo view('App\Modules\Layouts\Views\navbar', $data);
      echo view('App\Modules\Layouts\Views\sidebar', $data);
      echo view('App\Modules\Jenis\Views\edit', $data);
      echo view('App\Modules\Layouts\Views\footer');
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update($id = null)
  {
    $data = $this->request->getPost();
    $this->jenis->update($id, $data);

    session()->setFlashdata('success', 'Data Berhasil diupdate');

    return redirect()->to('/jenis');
  }

  public function delete()
  {
    if ($this->request->isAJAX()) {
      $id_jenis = $this->request->getVar('id_jenis');
      $jenis = $this->jenis->find($id_jenis);
      $this->jenis->where('id_jenis', $id_jenis)->delete();
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
      'title' => 'Data Trash Jenis Laundry',
      'data_jenis' => $this->jenis->onlyDeleted()->findAll()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Jenis\Views\trash', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function restore($id = null)
  {
    $this->db = \Config\Database::connect();
    if ($id != null) {
      $this->db->table('jenis')
        ->set('deleted_at', null, true)
        ->where(['id_jenis' => $id])
        ->update();
    } else {
      $this->db->table('jenis')
        ->set('deleted_at', null, true)
        ->where('deleted_at is NOT NULL', NULL, FALSE)
        ->update();
    }
    if ($this->db->affectedRows() > 0) {
      session()->setFlashdata('success', 'Data Berhasil direstore');

      return redirect()->to('/jenis');
    }
  }

  public function delete2($id = null)
  {
    if ($id != null) {
      $this->jenis->delete($id, true);
      return redirect()->to('/jenis/trash')->with('success', 'Data Berhasil Dihapus Permanen');
    } else {
      $this->jenis->purgeDeleted();
      return redirect()->to('/jenis/trash')->with('success', 'Data Trash Berhasil Dihapus Permanen');
    }
  }
}
