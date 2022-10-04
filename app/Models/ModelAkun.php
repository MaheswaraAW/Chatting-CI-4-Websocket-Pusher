<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAkun extends Model
{

    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = [
        'id_akun', 'nama', 'email', 'password'
    ];
}
