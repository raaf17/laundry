<?php

namespace App\Modules\Pengeluaran\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
  protected $table            = 'pengeluaran';
  protected $primaryKey       = 'id_pengeluaran';
  protected $returnType       = 'object';
  protected $allowedFields    = ['tgl_pengeluaran', 'catatan', 'pengeluaran', 'created_at', 'updated_at', 'deleted_at'];
  protected $useTimestamps    = true;
  protected $useSoftDeletes   = true;
  protected $deletedField     = 'deleted_at';
}