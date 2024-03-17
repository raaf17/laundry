<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table            = 'users';
  protected $primaryKey       = 'id_user';
  protected $returnType       = 'object';
  protected $allowedFields    = ['username', 'password', 'nama', 'jenis_kelamin', 'alamat', 'no_telepon', 'foto', 'level', 'created_at', 'updated_at', 'deleted_at'];
  protected $useTimestamps    = true;
  protected $useSoftDeletes   = true;
  protected $deletedField     = 'deleted_at';
}
