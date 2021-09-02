<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
	protected $table = 'kontak';
	protected $allowedFields = [
		'nomor_telepon',
		'jam_kerja',
		'email',
		'web',
		'alamat',
		'provinsi'
	];

	public function getKontak()
	{
		return $this->findAll();
	}

	public function insertKontak($data)
	{
		return $this->save($data);
	}
}
