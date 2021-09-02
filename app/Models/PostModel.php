<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
	protected $table = 'post';
	protected $allowedFields = [
		'sampul',
		'kategori',
		'judul',
		'slug',
		'isi',
		'updated_at'
	];

	public function getAllPost()
	{
		return $this->findAll();
	}

	public function getPostKategori($kategori)
	{
		return $this->getWhere(['kategori' => $kategori])->getResultArray();
	}

	public function getPostSlug($slug)
	{
		return $this->getWhere(['slug' => $slug])->getRow();
	}

	public function insertPost($data)
	{
		return $this->save($data);
	}

	public function deletePost($id)
	{
		return $this->delete($id);
	}
}
