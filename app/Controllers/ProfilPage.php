<?php

namespace App\Controllers;

use App\Models\CarrouselModel;
use App\Models\PostModel;
use App\Models\PersentasePekerjaanModel;
use App\Models\ProdukDesaModel;
use App\Models\SambutanModel;
use App\Models\KontakModel;

class ProfilPage extends BaseController
{
	protected $carrouselModel, $postModel, $persentasePekerjaanModel, $produkDesaModel, $sambutanModel, $kontakModel;
	public function __construct()
	{
		$this->carrouselModel = new CarrouselModel();
		$this->postModel = new PostModel();
		$this->persentasePekerjaanModel = new PersentasePekerjaanModel();
		$this->produkDesaModel = new ProdukDesaModel();
		$this->sambutanModel = new SambutanModel();
		$this->kontakModel = new KontakModel();
	}

	public function beranda()
	{
		$data = [
			'halaman'   => 'beranda',
			'carrousel' => $this->carrouselModel->getCarrousel(),
			'pekerjaan' => $this->persentasePekerjaanModel->getPekerjaan(),
			'produk'    => $this->produkDesaModel->getAllProduk(),
			'sambutan'  => $this->sambutanModel->getSambutan(),
			'kontak'    => $this->kontakModel->getKontak(),
			'daftar_post' => $this->postModel->getPostKategori('Berita')
		];

		return view('profil/page/beranda', $data);
	}

	public function profilDesa()
	{
		$data = [
			'halaman'     => 'profil_desa',
			'daftar_post' => $this->postModel->getPostKategori('Profil Desa'),
			'kontak'      => $this->kontakModel->getKontak()
		];

		return view('profil/page/daftar_post', $data);
	}

	public function lembagaMasyarakat()
	{
		$data = [
			'halaman' 	  => 'lembaga_masyarakat',
			'daftar_post' => $this->postModel->getPostKategori('Lembaga Masyarakat'),
			'kontak'      => $this->kontakModel->getKontak()
		];

		return view('profil/page/daftar_post', $data);
	}

	public function berita()
	{
		$data = [
			'halaman' 	  => 'berita',
			'daftar_post' => $this->postModel->getPostKategori('Berita'),
			'kontak'      => $this->kontakModel->getKontak()
		];

		return view('profil/page/daftar_post', $data);
	}

	public function belanja()
	{
		$data = [
			'halaman' => 'belanja',
			'produk'  => $this->produkDesaModel->getAllProduk(),
			'kontak'  => $this->kontakModel->getKontak()
		];

		return view('profil/page/belanja', $data);
	}

	public function blog()
	{
		$data = [
			'halaman' 	  => 'blog',
			'daftar_post' => $this->postModel->getAllPost(),
			'kontak'      => $this->kontakModel->getKontak()
		];

		return view('profil/page/daftar_post', $data);
	}

	public function viewPost($slug)
	{
		$post = $this->postModel->getPostSlug($slug);
		switch ($post->kategori) {
			case 'Profil Desa':
				$halaman = 'profil_desa';
				break;
			case 'Lembaga Masyarakat':
				$halaman = 'lembaga_masyarakat';
				break;
			case 'Berita':
				$halaman = 'berita';
		}
		$data = [
			'halaman'     => $halaman,
			'post'        => $post,
			'daftar_post' => $this->postModel->getPostKategori($post->kategori),
			'kontak'      => $this->kontakModel->getKontak()
		];

		if (empty($data['post'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Konten tidak ditemukan.');
		}
		return view('profil/page/post', $data);
	}
}
