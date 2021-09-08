<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $allowedFields = [
        'username',
        'password'
    ];

    public function getUser($username)
    {
        return $this->where(['username' => $username])->first();
    }
}
