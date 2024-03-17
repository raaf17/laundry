<?php

namespace App\Modules\Pengeluaran\Controllers;

use App\Modules\Pengeluaran\Models\PengeluaranModel;
use CodeIgniter\Controller;

class Pengeluaran extends Controller
{
  protected $db;
  protected $pengeluaran;

  public function __construct()
  {
    $this->pengeluaran = new PengeluaranModel();
  }

  public function index()
  {
    $data = [
      'title'       => 'Pengeluaran',
      'data_pengeluaran'  => $this->pengeluaran->findAll(),
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Pengeluaran\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function new()
  {
    $data = [
      'title' => 'Tambah Data Pengeluaran'
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Pengeluaran\Views\new');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function create()
  {
    $validate = $this->validate([
      'tgl_pengeluaran' => [
        'rules'       => 'required',
        'errors' => [
          'required'  => 'Tanggal Pengeluaran tidak boleh kosong',
        ],
      ],
      'catatan' => [
        'rules'       => 'required',
        'errors' => [
          'required'  => 'Catatan tidak boleh kosong',
        ],
      ],
      'pengeluaran' => [
        'rules'       => 'required',
        'errors' => [
          'required'  => 'Pengeluaran tidak boleh kosong',
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput();
    }

    $data = $this->request->getPost();
    $this->pengeluaran->insert($data);

    session()->setFlashdata('success', 'Data Berhasil ditambahkan');

    return redirect()->to('/pengeluaran');
  }

  public function edit($id = null)
  {
    $pengeluaran = $this->pengeluaran->where('id_pengeluaran', $id)->first();

    $data = [
      'title' => 'Edit Data Pengeluaran',
      'data_pengeluaran' => $pengeluaran
    ];

    if (is_object($pengeluaran)) {
      echo view('App\Modules\Layouts\Views\header', $data);
      echo view('App\Modules\Layouts\Views\navbar', $data);
      echo view('App\Modules\Layouts\Views\sidebar', $data);
      echo view('App\Modules\Pengeluaran\Views\edit', $data);
      echo view('App\Modules\Layouts\Views\footer');
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update($id = null)
  {
    $data = $this->request->getPost();
    $this->pengeluaran->update($id, $data);

    session()->setFlashdata('success', 'Data Berhasil diupdate');

    return redirect()->to('/pengeluaran');
  }

  public function detail($id = null)
  {
    $pengeluaran = $this->pengeluaran->where('id_pengeluaran', $id)->first();

    $data = [
      'title' => 'Detail Data Pengeluaran',
      'data_pengeluaran' => $pengeluaran
    ];

    if (is_object($pengeluaran)) {
      echo view('App\Modules\Layouts\Views\header', $data);
      echo view('App\Modules\Layouts\Views\navbar', $data);
      echo view('App\Modules\Layouts\Views\sidebar', $data);
      echo view('App\Modules\Pengeluaran\Views\detail', $data);
      echo view('App\Modules\Layouts\Views\footer');
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function delete()
  {
    if ($this->request->isAJAX()) {
      $id_pengeluaran = $this->request->getVar('id_pengeluaran');
      $pengeluaran = $this->pengeluaran->find($id_pengeluaran);
      $this->pengeluaran->where('id_pengeluaran', $id_pengeluaran)->delete();
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
      'title' => 'Data Trash Pengeluaran',
      'data_pengeluaran' => $this->pengeluaran->onlyDeleted()->findAll()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Layouts\Views\navbar', $data);
    echo view('App\Modules\Layouts\Views\sidebar', $data);
    echo view('App\Modules\Pengeluaran\Views\trash', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function restore($id = null)
  {
    $this->db = \Config\Database::connect();
    if ($id != null) {
      $this->db->table('pengeluaran')
        ->set('deleted_at', null, true)
        ->where(['id_pengeluaran' => $id])
        ->update();
    } else {
      $this->db->table('pengeluaran')
        ->set('deleted_at', null, true)
        ->where('deleted_at is NOT NULL', NULL, FALSE)
        ->update();
    }
    if ($this->db->affectedRows() > 0) {
      session()->setFlashdata('success', 'Data Berhasil direstore');

      return redirect()->to('/pengeluaran');
    }
  }

  public function delete2($id = null)
  {
    if ($id != null) {
      $this->pengeluaran->delete($id, true);
      return redirect()->to('/pengeluaran/trash')->with('success', 'Data Berhasil Dihapus Permanen');
    } else {
      $this->pengeluaran->purgeDeleted();
      return redirect()->to('/pengeluaran/trash')->with('success', 'Data Trash Berhasil Dihapus Permanen');
    }
  }
}
