<?php

namespace App\Modules\Jenis\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
  protected $table            = 'jenis';
  protected $primaryKey       = 'id_jenis';
  protected $returnType       = 'object';
  protected $allowedFields    = ['jenis_laundry', 'lama_proses', 'tarif', 'created_at', 'updated_at', 'deleted_at'];
  protected $useTimestamps    = true;
  protected $useSoftDeletes   = true;
  protected $deletedField     = 'deleted_at';
}
