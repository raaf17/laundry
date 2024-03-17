<?php

namespace App\Modules\Pelanggan\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
  protected $table            = 'pelanggan';
  protected $primaryKey       = 'id_pelanggan';
  protected $returnType       = 'object';
  protected $allowedFields    = ['nama', 'jenis_kelamin', 'alamat', 'no_telepon', 'foto', 'created_at', 'updated_at', 'deleted_at'];
  protected $useTimestamps    = true;
  protected $useSoftDeletes   = true;
  protected $deletedField     = 'deleted_at';
}
