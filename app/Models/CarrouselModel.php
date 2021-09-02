<?php

namespace App\Models;

use CodeIgniter\Model;

class CarrouselModel extends Model
{
	protected $table = 'carrousel';
	protected $allowedFields = [
		'gambar',
		'judul'
	];

	public function getCarrousel()
	{
		return $this->findAll();
	}

	public function getCarrouselDetail($id)
	{
		return $this->getWhere(['id' => $id])->getRow();
	}

	public function getNextID()
	{
		return $this->selectMax('id')->get()->getRow()->id + 1;
	}

	public function insertCarrousel($data)
	{
		return $this->save($data);
	}

	public function deleteCarrousel($id)
	{
		return $this->delete($id);
	}
}
