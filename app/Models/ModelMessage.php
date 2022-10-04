<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMessage extends Model
{

    protected $table = 'message';
    protected $primaryKey = 'id_message';
    protected $allowedFields = [
        'id_message', 'id_akun', 'id_pengirim', 'id_penerima', 'pesan'
    ];
}
