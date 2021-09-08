<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CarrouselModel;
use App\Models\PersentasePekerjaanModel;
use App\Models\SambutanModel;
use App\Models\KontakModel;
use App\Models\ProdukDesaModel;
use App\Models\AkunModel;

use CodeIgniter\I18n\Time;
use DateTime;

class AdminPage extends BaseController
{
    protected $postModel, $carrouselModel, $persentasePekerjaanModel, $sambutanModel, $kontakModel, $produkDesaModel, $akunModel;
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->carrouselModel = new CarrouselModel();
        $this->persentasePekerjaanModel = new PersentasePekerjaanModel();
        $this->sambutanModel = new SambutanModel();
        $this->kontakModel = new KontakModel();
        $this->produkDesaModel = new ProdukDesaModel();
        $this->produkDesaModel = new ProdukDesaModel();
        $this->akunModel = new AkunModel();

        helper('form');
        $this->doc = new \DOMDocument();
        // $this->load->library('upload');
    }

    /* ======= Session ======= */
    public function login()
    {
        return view('admin/page/login');
    }

    public function auth()
    {
        $inputUsername = $this->request->getVar('username');
        $inputPassword = $this->request->getVar('password');
        $user = $this->akunModel->getUser($inputUsername);

        if ($user) {
            $password = $user['password'];
            if ($inputPassword == $password) {
                $dataSession = [
                    'logged_in' => TRUE
                ];
                session()->set($dataSession);
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('error', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('error', 'username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    /* ======= /Session ======= */

    /* ======= Beranda ======= */
    public function index()
    {
        $data = [
            'halaman'    => 'beranda'
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/beranda', $data);
        } else {
            return redirect()->to('/login');
        }
    }
    /* ======= /Beranda ======= */

    /* ======= Carrousel ======= */
    public function carrousel()
    {
        $data = [
            'halaman'    => 'carrousel',
            'carrousel'  => $this->carrouselModel->getCarrousel()
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/carrousel', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function insertCarrousel()
    {
        if (!$this->validate([
            'gambar' => [
                'rules'  => 'uploaded[gambar]|ext_in[gambar,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => "Gambar harus diisi.",
                    'ext_in'   => "Bukan file gambar.",
                ]
            ],
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'gambar' => $validation->getError('gambar'),
                'judul'  => $validation->getError('judul'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/carrousel#form')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = 'carrousel-' . $this->carrouselModel->getNextID() . '.' . pathinfo($fileGambar->getName(), PATHINFO_EXTENSION);
        $fileGambar->move('assets/img/beranda/carrousel', $namaGambar);

        $this->carrouselModel->insertCarrousel([
            'gambar' => $namaGambar,
            'judul'  => $this->request->getVar('judul')
        ]);

        session()->setFlashdata('success', 'Carrousel berhasil ditambahkan.');
        return redirect()->to('/admin/carrousel');
    }

    public function deleteCarrousel($id)
    {
        $path = 'assets/img/beranda/carrousel/' . $this->carrouselModel->getCarrouselDetail($id)->gambar;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->carrouselModel->deleteCarrousel($id);

        session()->setFlashdata('success', 'Carrousel berhasil dihapus.');
        return redirect()->to('/admin/carrousel');
    }

    public function editCarrousel($id)
    {
        $data = [
            'halaman'         => 'carrousel',
            'carrousel'       => $this->carrouselModel->getCarrousel(),
            'detailCarrousel' => $this->carrouselModel->getCarrouselDetail($id)
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/carrousel', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function updateCarrousel()
    {
        $id = $this->request->getVar('id');
        if (!$this->validate([
            'gambar' => [
                'rules'  => 'ext_in[gambar,png,jpg,jpeg]',
                'errors' => [
                    'ext_in'   => "Bukan file gambar.",
                ]
            ],
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'gambar' => $validation->getError('gambar'),
                'judul'  => $validation->getError('judul'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/edit-carrousel/' . $id . '#form')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getName() !== '') {
            $path = 'assets/img/beranda/carrousel/' . $this->carrouselModel->getCarrouselDetail($id)->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
            $fileGambar->move('assets/img/beranda/carrousel', $this->carrouselModel->getCarrouselDetail($id)->gambar);
        }

        $this->carrouselModel->insertCarrousel([
            'id'     => $id,
            'judul'  => $this->request->getVar('judul')
        ]);

        session()->setFlashdata('success', 'Carrousel berhasil diubah.');
        return redirect()->to('/admin/carrousel');
    }
    /* ======= /Carrousel ======= */

    /* ======= PersentasePekerjaan ======= */
    public function persentasePekerjaan()
    {
        $data = [
            'halaman'    => 'persentase pekerjaan',
            'pekerjaan'  => $this->persentasePekerjaanModel->getPekerjaan()
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/persentase_pekerjaan', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function updatePersentasePekerjaan()
    {
        $pekerjaan = $this->request->getVar('pekerjaan');
        $persentase = $this->request->getVar('persentase');
        $data = [];
        for ($i = 1; $i <= 6; $i++) {
            $value = [
                'id'         => $i,
                'pekerjaan'  => $pekerjaan[$i - 1],
                'persentase' => $persentase[$i - 1]
            ];
            $data[] = $value;
        }

        $this->persentasePekerjaanModel->updatePekerjaan($data);

        session()->setFlashdata('success', 'Persentase Pekerjaan berhasil disimpan.');
        return redirect()->to('/admin/persentase-pekerjaan');
    }
    /* ======= /PersentasePekerjaan ======= */

    /* ======= Sambutan ======= */
    public function sambutan()
    {
        $data = [
            'halaman'  => 'sambutan',
            'sambutan' => $this->sambutanModel->getSambutan()
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/sambutan', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function insertSambutan()
    {
        if (!$this->validate([
            'foto' => [
                'rules'  => 'uploaded[foto]|ext_in[foto,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => "Foto harus diisi.",
                    'ext_in'   => "Bukan file foto.",
                ]
            ],
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                ]
            ],
            'jabatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jabatan harus diisi.',
                ]
            ],
            'pesan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Pesan Sambutan harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'foto'    => $validation->getError('foto'),
                'nama'    => $validation->getError('nama'),
                'jabatan' => $validation->getError('jabatan'),
                'pesan'   => $validation->getError('pesan'),
                'header'  => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/sambutan#form')->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        $namaFoto = 'sambutan-' . $this->sambutanModel->getNextID() . '.' . pathinfo($fileFoto->getName(), PATHINFO_EXTENSION);
        $fileFoto->move('assets/img/beranda/sambutan', $namaFoto);

        $this->sambutanModel->insertSambutan([
            'foto'    => $namaFoto,
            'nama'    => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'pesan'   => $this->request->getVar('pesan')
        ]);

        session()->setFlashdata('success', 'Sambutan berhasil ditambahkan.');
        return redirect()->to('/admin/sambutan');
    }

    public function deleteSambutan($id)
    {
        $path = 'assets/img/beranda/sambutan/' . $this->sambutanModel->getSambutanDetail($id)->foto;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->sambutanModel->deleteSambutan($id);

        session()->setFlashdata('success', 'Sambutan berhasil dihapus.');
        return redirect()->to('/admin/sambutan');
    }

    public function editSambutan($id)
    {
        $data = [
            'halaman'        => 'sambutan',
            'sambutan'       => $this->sambutanModel->getSambutan(),
            'detailSambutan' => $this->sambutanModel->getSambutanDetail($id)
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/sambutan', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function updateSambutan()
    {
        $id = $this->request->getVar('id');
        if (!$this->validate([
            'foto' => [
                'rules'  => 'ext_in[foto,png,jpg,jpeg]',
                'errors' => [
                    'ext_in'   => "Bukan file foto.",
                ]
            ],
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                ]
            ],
            'jabatan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jabatan harus diisi.',
                ]
            ],
            'pesan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Pesan Sambutan harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'foto'    => $validation->getError('foto'),
                'nama'    => $validation->getError('nama'),
                'jabatan' => $validation->getError('jabatan'),
                'pesan'   => $validation->getError('pesan'),
                'header'  => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/edit-sambutan/' . $id . '#form')->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getName() !== '') {
            $path = 'assets/img/beranda/sambutan/' . $this->sambutanModel->getSambutanDetail($id)->foto;
            if (file_exists($path)) {
                unlink($path);
            }
            $fileFoto->move('assets/img/beranda/carrousel', $this->sambutanModel->getSambutanDetail($id)->foto);
        }

        $this->sambutanModel->insertSambutan([
            'id'      => $id,
            'nama'    => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'pesan'   => $this->request->getVar('pesan')
        ]);

        session()->setFlashdata('success', 'Sambutan berhasil diubah.');
        return redirect()->to('/admin/sambutan');
    }
    /* ======= /Sambutan ======= */

    /* ======= Kontak ======= */
    public function kontak()
    {
        $data = [
            'halaman'  => 'kontak',
            'kontak'   => $this->kontakModel->getKontak()
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/kontak', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function updateKontak()
    {
        if (!$this->validate([
            'nomor_telepon' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi.',
                ]
            ],
            'jam_kerja' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jam Kerja harus diisi.',
                ]
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat Email harus diisi.',
                ]
            ],
            'web' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat Web harus diisi.',
                ]
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'provinsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Provinsi harus diisi.',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'nomor_telepon' => $validation->getError('nomor_telepon'),
                'jam_kerja'     => $validation->getError('jam_kerja'),
                'email'         => $validation->getError('email'),
                'web'           => $validation->getError('web'),
                'alamat'        => $validation->getError('alamat'),
                'provinsi'      => $validation->getError('provinsi'),
                'header'        => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/kontak')->withInput();
        }

        $this->kontakModel->insertKontak([
            'id'            => '1',
            'nomor_telepon' => $this->request->getVar('nomor_telepon'),
            'jam_kerja'     => $this->request->getVar('jam_kerja'),
            'email'         => $this->request->getVar('email'),
            'web'           => $this->request->getVar('web'),
            'alamat'        => $this->request->getVar('alamat'),
            'provinsi'      => $this->request->getVar('provinsi'),
        ]);

        session()->setFlashdata('success', 'Kontak berhasil disimpan.');
        return redirect()->to('/admin/kontak');
    }
    /* ======= /Kontak ======= */

    /* ======= Summernote ======= */
    function upload_image()
    {
        $file = $this->request->getFile('image');
        $fileName = $file->getRandomName();
        $file->move('./assets/img/beranda/post/inside', $fileName);
        echo base_url('assets/img/beranda/post/inside') . '/' . $fileName;
    }

    function delete_image()
    {
        $src = $this->request->getPost('src');
        $file_name = ltrim(str_replace(base_url(), '', $src), '/');
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }
    /* ======= /Summernote ======= */

    /* ======= Profil Desa ======= */
    public function profilDesa()
    {
        $data = [
            'halaman'  => 'profil_desa',
            'post'     => $this->postModel->getPostKategori('Profil Desa')
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/profil_desa', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function insertProfilDesa()
    {
        if (!$this->validate([
            'sampul' => [
                'rules'  => 'uploaded[sampul]|ext_in[sampul,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => "Gambar sampul harus diisi.",
                    'ext_in'   => "Gambar sampul bukan file foto.",
                ]
            ],
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul post harus diisi.',
                ]
            ],
            'isi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi post harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'sampul' => $validation->getError('sampul'),
                'judul'  => $validation->getError('judul'),
                'isi'    => $validation->getError('isi'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/profil-desa#form')->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $fileSampul = $this->request->getFile('sampul');
        $namaSampul = $slug . '.' . pathinfo($fileSampul->getName(), PATHINFO_EXTENSION);
        $fileSampul->move('assets/img/beranda/post/profil', $namaSampul);

        $this->postModel->insertPost([
            'sampul'     => $namaSampul,
            'kategori'   => 'Profil Desa',
            'judul'      => $this->request->getVar('judul'),
            'slug'       => $slug,
            'isi'        => $this->request->getVar('isi'),
            'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ]);

        session()->setFlashdata('success', 'Post berhasil ditambahkan.');
        return redirect()->to('/admin/profil-desa');
    }

    public function editProfilDesa($slug)
    {
        $data = [
            'halaman'    => 'profil_desa',
            'post'       => $this->postModel->getPostKategori('Profil Desa'),
            'detailPost' => $this->postModel->getPostSlug($slug)
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/profil_desa', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function updateProfilDesa()
    {
        $id = $this->request->getVar('id');
        $slug = $this->request->getVar('slug');
        if (!$this->validate([
            'sampul' => [
                'rules'  => 'ext_in[sampul,png,jpg,jpeg]',
                'errors' => [
                    'ext_in'   => "Gambar sampul bukan file foto."
                ]
            ],
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul post harus diisi.'
                ]
            ],
            'isi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi post harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'sampul' => $validation->getError('sampul'),
                'judul'  => $validation->getError('judul'),
                'isi'    => $validation->getError('isi'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/edit-profil-desa/' . $slug . '#form')->withInput();
        }

        $fileGambar = $this->request->getFile('sampul');
        if ($fileGambar->getName() !== '') {
            $path = 'assets/img/beranda/post/profil/' . $this->postModel->getPostSlug($slug)->sampul;
            if (file_exists($path)) {
                unlink($path);
            }
            $fileGambar->move('assets/img/beranda/post/profil', $this->postModel->getPostSlug($slug)->sampul);
        }

        $this->postModel->insertPost([
            'id'         => $id,
            'judul'      => $this->request->getVar('judul'),
            'isi'        => $this->request->getVar('isi'),
            'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ]);

        session()->setFlashdata('success', 'Post Profil Desa berhasil diubah.');
        return redirect()->to('/admin/profil-desa');
    }

    public function deleteProfilDesa($slug)
    {
        $id = $this->postModel->getPostSlug($slug)->id;

        $path = 'assets/img/beranda/post/profil/' . $this->postModel->getPostSlug($slug)->sampul;
        if (file_exists($path)) {
            unlink($path);
        }

        $this->doc->loadHTML($this->postModel->getPostSlug($slug)->isi);
        $imageTags = $this->doc->getElementsByTagName('img');
        foreach ($imageTags as $tag) {
            $imageName = ltrim(str_replace(base_url(), '', $tag->getAttribute('src')), '/');
            if (file_exists($imageName)) {
                unlink($imageName);
            }
        }

        $this->postModel->deletePost($id);

        session()->setFlashdata('success', 'Post Profil Desa berhasil dihapus.');
        return redirect()->to('/admin/profil-desa');
    }
    /* ======= /Profil Desa ======= */

    /* ======= Lembaga Masyarakat ======= */
    public function lembagaMasyarakat()
    {
        $data = [
            'halaman'  => 'lembaga_masyarakat',
            'post'     => $this->postModel->getPostKategori('Lembaga Masyarakat')
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/lembaga_masyarakat', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function insertLembagaMasyarakat()
    {
        if (!$this->validate([
            'sampul' => [
                'rules'  => 'uploaded[sampul]|ext_in[sampul,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => "Gambar sampul harus diisi.",
                    'ext_in'   => "Gambar sampul bukan file foto.",
                ]
            ],
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul post harus diisi.',
                ]
            ],
            'isi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi post harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'sampul' => $validation->getError('sampul'),
                'judul'  => $validation->getError('judul'),
                'isi'    => $validation->getError('isi'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/lembaga-masyarakat#form')->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $fileSampul = $this->request->getFile('sampul');
        $namaSampul = $slug . '.' . pathinfo($fileSampul->getName(), PATHINFO_EXTENSION);
        $fileSampul->move('assets/img/beranda/post/lembagamasyarakat', $namaSampul);

        $this->postModel->insertPost([
            'sampul'     => $namaSampul,
            'kategori'   => 'Lembaga Masyarakat',
            'judul'      => $this->request->getVar('judul'),
            'slug'       => $slug,
            'isi'        => $this->request->getVar('isi'),
            'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ]);

        session()->setFlashdata('success', 'Post berhasil ditambahkan.');
        return redirect()->to('/admin/lembaga-masyarakat');
    }

    public function editLembagaMasyarakat($slug)
    {
        $data = [
            'halaman'    => 'lembaga_masyarakat',
            'post'       => $this->postModel->getPostKategori('Lembaga Masyarakat'),
            'detailPost' => $this->postModel->getPostSlug($slug)
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/lembaga_masyarakat', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function updateLembagaMasyarakat()
    {
        $id = $this->request->getVar('id');
        $slug = $this->request->getVar('slug');
        if (!$this->validate([
            'sampul' => [
                'rules'  => 'ext_in[sampul,png,jpg,jpeg]',
                'errors' => [
                    'ext_in'   => "Gambar sampul bukan file foto."
                ]
            ],
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul post harus diisi.'
                ]
            ],
            'isi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi post harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'sampul' => $validation->getError('sampul'),
                'judul'  => $validation->getError('judul'),
                'isi'    => $validation->getError('isi'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/edit-lembaga-masyarakat/' . $slug . '#form')->withInput();
        }

        $fileGambar = $this->request->getFile('sampul');
        if ($fileGambar->getName() !== '') {
            $path = 'assets/img/beranda/post/lembagamasyarakat/' . $this->postModel->getPostSlug($slug)->sampul;
            if (file_exists($path)) {
                unlink($path);
            }
            $fileGambar->move('assets/img/beranda/post/lembagamasyarakat', $this->postModel->getPostSlug($slug)->sampul);
        }

        $this->postModel->insertPost([
            'id'         => $id,
            'judul'      => $this->request->getVar('judul'),
            'isi'        => $this->request->getVar('isi'),
            'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ]);

        session()->setFlashdata('success', 'Post Lembaga Masyarakat berhasil diubah.');
        return redirect()->to('/admin/lembaga-masyarakat');
    }

    public function deleteLembagaMasyarakat($slug)
    {
        $id = $this->postModel->getPostSlug($slug)->id;

        $path = 'assets/img/beranda/post/lembagamasyarakat/' . $this->postModel->getPostSlug($slug)->sampul;
        if (file_exists($path)) {
            unlink($path);
        }

        $this->doc->loadHTML($this->postModel->getPostSlug($slug)->isi);
        $imageTags = $this->doc->getElementsByTagName('img');
        foreach ($imageTags as $tag) {
            $imageName = ltrim(str_replace(base_url(), '', $tag->getAttribute('src')), '/');
            if (file_exists($imageName)) {
                unlink($imageName);
            }
        }

        $this->postModel->deletePost($id);

        session()->setFlashdata('success', 'Post Lembaga Masyarakat berhasil dihapus.');
        return redirect()->to('/admin/lembaga-masyarakat');
    }
    /* ======= /Lembaga Masyarakat ======= */

    /* ======= Berita ======= */
    public function berita()
    {
        $data = [
            'halaman'  => 'berita',
            'post'     => $this->postModel->getPostKategori('Berita')
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/berita', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function insertBerita()
    {
        if (!$this->validate([
            'sampul' => [
                'rules'  => 'uploaded[sampul]|ext_in[sampul,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => "Gambar sampul harus diisi.",
                    'ext_in'   => "Gambar sampul bukan file foto.",
                ]
            ],
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul post harus diisi.',
                ]
            ],
            'isi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi post harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'sampul' => $validation->getError('sampul'),
                'judul'  => $validation->getError('judul'),
                'isi'    => $validation->getError('isi'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/berita#form')->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $fileSampul = $this->request->getFile('sampul');
        $namaSampul = $slug . '.' . pathinfo($fileSampul->getName(), PATHINFO_EXTENSION);
        $fileSampul->move('assets/img/beranda/post/berita', $namaSampul);

        $this->postModel->insertPost([
            'sampul'     => $namaSampul,
            'kategori'   => 'Berita',
            'judul'      => $this->request->getVar('judul'),
            'slug'       => $slug,
            'isi'        => $this->request->getVar('isi'),
            'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ]);

        session()->setFlashdata('success', 'Post berhasil ditambahkan.');
        return redirect()->to('/admin/berita');
    }

    public function editBerita($slug)
    {
        $data = [
            'halaman'    => 'berita',
            'post'       => $this->postModel->getPostKategori('Berita'),
            'detailPost' => $this->postModel->getPostSlug($slug)
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/berita', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function updateBerita()
    {
        $id = $this->request->getVar('id');
        $slug = $this->request->getVar('slug');
        if (!$this->validate([
            'sampul' => [
                'rules'  => 'ext_in[sampul,png,jpg,jpeg]',
                'errors' => [
                    'ext_in'   => "Gambar sampul bukan file foto."
                ]
            ],
            'judul' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul post harus diisi.'
                ]
            ],
            'isi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi post harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'sampul' => $validation->getError('sampul'),
                'judul'  => $validation->getError('judul'),
                'isi'    => $validation->getError('isi'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/edit-berita/' . $slug . '#form')->withInput();
        }

        $fileGambar = $this->request->getFile('sampul');
        if ($fileGambar->getName() !== '') {
            $path = 'assets/img/beranda/post/berita/' . $this->postModel->getPostSlug($slug)->sampul;
            if (file_exists($path)) {
                unlink($path);
            }
            $fileGambar->move('assets/img/beranda/post/berita', $this->postModel->getPostSlug($slug)->sampul);
        }

        $this->postModel->insertPost([
            'id'         => $id,
            'judul'      => $this->request->getVar('judul'),
            'isi'        => $this->request->getVar('isi'),
            'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ]);

        session()->setFlashdata('success', 'Post Berita berhasil diubah.');
        return redirect()->to('/admin/berita');
    }

    public function deleteBerita($slug)
    {
        $id = $this->postModel->getPostSlug($slug)->id;

        $path = 'assets/img/beranda/post/berita/' . $this->postModel->getPostSlug($slug)->sampul;
        if (file_exists($path)) {
            unlink($path);
        }

        $this->doc->loadHTML($this->postModel->getPostSlug($slug)->isi);
        $imageTags = $this->doc->getElementsByTagName('img');
        foreach ($imageTags as $tag) {
            $imageName = ltrim(str_replace(base_url(), '', $tag->getAttribute('src')), '/');
            if (file_exists($imageName)) {
                unlink($imageName);
            }
        }

        $this->postModel->deletePost($id);

        session()->setFlashdata('success', 'Post Berita berhasil dihapus.');
        return redirect()->to('/admin/berita');
    }
    /* ======= /Berita ======= */

    /* ======= Belanja ======= */
    public function belanja()
    {
        $data = [
            'halaman' => 'belanja',
            'produk'  => $this->produkDesaModel->getAllProduk()
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/belanja', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function insertProduk()
    {
        if (!$this->validate([
            'gambar' => [
                'rules'  => 'uploaded[gambar]|ext_in[gambar,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => "Gambar produk harus diisi.",
                    'ext_in'   => "Gambar produk bukan file foto.",
                ]
            ],
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama produk harus diisi.',
                ]
            ],
            'penjual' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Penjual produk harus diisi.',
                ]
            ],
            'deskripsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Deskripsi produk harus diisi.',
                ]
            ],
            'notelepon' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nomor telepon penjual produk harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'gambar'    => $validation->getError('gambar'),
                'nama'      => $validation->getError('nama'),
                'penjual'   => $validation->getError('penjual'),
                'deskripsi' => $validation->getError('deskripsi'),
                'notelepon' => $validation->getError('notelepon'),
                'header'    => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/belanja#form')->withInput();
        }

        $slug = url_title($this->request->getVar('nama') . ' ' . $this->request->getVar('penjual'), '-', true);
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $slug . '.' . pathinfo($fileGambar->getName(), PATHINFO_EXTENSION);
        $fileGambar->move('assets/img/beranda/belanja', $namaGambar);

        $this->produkDesaModel->insertProduk([
            'gambar'    => $namaGambar,
            'nama'      => $this->request->getVar('nama'),
            'penjual'   => $this->request->getVar('penjual'),
            'notelepon' => $this->request->getVar('notelepon'),
            'kategori'  => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('success', 'Produk berhasil ditambahkan.');
        return redirect()->to('/admin/belanja');
    }

    public function editProduk($id)
    {
        $data = [
            'halaman'     => 'belanja',
            'produk'      => $this->produkDesaModel->getAllProduk(),
            'detailProduk' => $this->produkDesaModel->getProdukDetail($id)
        ];

        if (session()->get('logged_in')) {
            return view('admin/page/belanja', $data);
		} else {
			return redirect()->to('/login');
		}
    }

    public function updateProduk()
    {
        $id = $this->request->getVar('id');
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama produk harus diisi.',
                ]
            ],
            'penjual' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Penjual produk harus diisi.',
                ]
            ],
            'deskripsi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Deskripsi produk harus diisi.',
                ]
            ],
            'notelepon' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nomor telepon penjual produk harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'gambar'    => $validation->getError('gambar'),
                'nama'      => $validation->getError('nama'),
                'penjual'   => $validation->getError('penjual'),
                'deskripsi' => $validation->getError('deskripsi'),
                'notelepon' => $validation->getError('notelepon'),
                'header'    => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to('/admin/edit-belanja/' . $id . '#form')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getName() !== '') {
            $path = 'assets/img/beranda/belanja/' . $this->produkDesaModel->getProdukDetail($id)->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
            $fileGambar->move('assets/img/beranda/belanja', $this->produkDesaModel->getProdukDetail($id)->gambar);
        }

        $this->produkDesaModel->insertProduk([
            'id'        => $id,
            'nama'      => $this->request->getVar('nama'),
            'penjual'   => $this->request->getVar('penjual'),
            'notelepon' => $this->request->getVar('notelepon'),
            'kategori'  => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('success', 'Produk desa berhasil diubah.');
        return redirect()->to('/admin/belanja');
    }

    public function deleteProduk($id)
    {
        $path = 'assets/img/beranda/belanja/' . $this->produkDesaModel->getProdukDetail($id)->gambar;
        if (file_exists($path)) {
            unlink($path);
        }

        $this->doc->loadHTML($this->produkDesaModel->getProdukDetail($id)->deskripsi);
        $imageTags = $this->doc->getElementsByTagName('img');
        foreach ($imageTags as $tag) {
            $imageName = ltrim(str_replace(base_url(), '', $tag->getAttribute('src')), '/');
            if (file_exists($imageName)) {
                unlink($imageName);
            }
        }

        $this->produkDesaModel->deleteProduk($id);

        session()->setFlashdata('success', 'Produk desa berhasil dihapus.');
        return redirect()->to('/admin/belanja');
    }
    /* ======= /Belanja ======= */

    public function insertPost()
    {
        $data = [
            'kategori'   => $this->request->getVar('kategori'),
            'judul'      => $this->request->getVar('judul'),
            'slug'       => url_title($this->request->getVar('judul'), '-', true),
            'isi'        => $this->request->getVar('isi'),
            'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        $this->postModel->insertPost($data);
        return redirect()->to('/adminpage/editpost');
    }

    public function insertImg()
    {
        $file = $this->request->getFile('upload');
        $fileName = $file->getRandomName();
        $path = './post/insidepost';
        $file->move($path, $fileName);
        $data = [
            'uploaded' => true,
            'url' => base_url('post/insidepost/' . $fileName)
        ];

        return $this->response->setJSON($data);
    }
}
