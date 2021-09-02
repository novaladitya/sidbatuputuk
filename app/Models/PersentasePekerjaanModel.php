<?php

namespace App\Models;

use CodeIgniter\Model;

class PersentasePekerjaanModel extends Model
{
    protected $table = 'persentase_pekerjaan';
    protected $allowedFields = [
        'pekerjaan',
        'persentase'
    ];

    public function getPekerjaan()
    {
        return $this->findAll();
    }

    public function updatePekerjaan($data)
    {
        return $this->updateBatch($data, 'id');
    }
}
