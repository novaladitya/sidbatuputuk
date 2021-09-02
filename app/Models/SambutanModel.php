<?php

namespace App\Models;

use CodeIgniter\Model;

class SambutanModel extends Model
{
    protected $table = 'sambutan';
    protected $allowedFields = [
        'foto',
        'nama',
        'jabatan',
        'pesan'
    ];

    public function getSambutan()
    {
        return $this->findAll();
    }

    public function getSambutanDetail($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    public function getNextID()
    {
        return $this->selectMax('id')->get()->getRow()->id + 1;
    }

    public function insertSambutan($data)
    {
        return $this->save($data);
    }

    public function deleteSambutan($id)
    {
        return $this->delete($id);
    }
}
