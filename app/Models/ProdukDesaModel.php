<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukDesaModel extends Model
{
    protected $table = 'produkdesa';
    protected $allowedFields = [
        'gambar',
        'nama',
        'penjual',
        'deskripsi',
        'kategori',
        'notelepon'
    ];

    public function getAllProduk()
    {
        return $this->findAll();
    }

    public function getProdukDetail($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    public function insertProduk($data)
    {
        return $this->save($data);
    }

    public function deleteProduk($id)
    {
        return $this->delete($id);
    }
}
