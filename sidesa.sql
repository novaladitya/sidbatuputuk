-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 07:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `carrousel`
--

CREATE TABLE `carrousel` (
  `id` int(100) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrousel`
--

INSERT INTO `carrousel` (`id`, `gambar`, `judul`) VALUES
(1, 'carrousel-1.jpg', 'Penyerahan Tong Sampah Ke Kelurahan Batu Putuk');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(100) UNSIGNED NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `jam_kerja` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nomor_telepon`, `jam_kerja`, `email`, `web`, `alamat`, `provinsi`) VALUES
(1, '081256489630', 'Senin - Jumat (07.30 - 15.00 WIB)', 'desabatuputuk@desaid.com', 'batuputuk.southeastasia.cloudapp.azure.com', 'Jalan Wan Abdurahman No.31, Kelurahan Batu Putuk, Kecamatan Teluk Betung Barat, Kota Bandar Lampung, Provinsi Lampung', 'Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(6, '2021-05-31-005744', 'App\\Database\\Migrations\\Post', 'default', 'App', 1625458886, 1),
(7, '2021-06-03-091956', 'App\\Database\\Migrations\\Carrousel', 'default', 'App', 1625458886, 1),
(8, '2021-06-12-101953', 'App\\Database\\Migrations\\PersentasePekerjaan', 'default', 'App', 1625458886, 1),
(9, '2021-06-13-104510', 'App\\Database\\Migrations\\Sambutan', 'default', 'App', 1625458886, 1),
(10, '2021-07-03-133935', 'App\\Database\\Migrations\\Kontak', 'default', 'App', 1625458886, 1);

-- --------------------------------------------------------

--
-- Table structure for table `persentase_pekerjaan`
--

CREATE TABLE `persentase_pekerjaan` (
  `id` int(100) UNSIGNED NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `persentase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persentase_pekerjaan`
--

INSERT INTO `persentase_pekerjaan` (`id`, `pekerjaan`, `persentase`) VALUES
(1, 'Petani', '95'),
(2, 'Karyawan Swasta', '85'),
(3, 'Ibu Rumah Tangga', '75'),
(4, 'Wirausaha', '65'),
(5, 'Sekolah', '65'),
(6, 'Tidak Bekerja', '65');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(100) UNSIGNED NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` varchar(5000) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `sampul`, `kategori`, `judul`, `slug`, `isi`, `updated_at`) VALUES
(3, 'sejarah-desa-seiket.jpg', 'Profil Desa', 'Sejarah Desa Seiket', 'sejarah-desa-seiket', '<p><span lang=\"EN-US\"><b>Desa Batu Putuk</b> merupakan salah satu desa yang terletak di Kecamatan\r\nTeluk Betung Barat, Kota Bandar Lampung. Desa ini memiliki warga dari berbagai macam suku. Dengan di dominasi oleh penduduk asli Lampung bahasa yang digunakan oleh warganya masih dengan campuran Bahasa Lampung. <o:p></o:p></span></p><p>\r\n\r\n</p><p><span lang=\"EN-US\">Pada tahun 1970, setelah di pastikan penjajah tidak lagi\r\nberada di wilayah Desa Seiket maka para pejuang yang saat itu sudah senasib dan\r\nsepenanggungan sepakat untuk membangun daerah yang awalnya menjadi tempat\r\nberkumpul tersebut untuk menjadi sebuah desa dan diberi nama Desa Seiket yang\r\nmemiliki makna <em>“Berbeda-beda</em> <em>namun</em> <em>tetap</em> <em>bersaudara”.</em><o:p></o:p></span></p>', '13 September 2021, 21:24 WIB'),
(9, 'demografi-desa-seiket.jpg', 'Profil Desa', 'Demografi Desa Seiket', 'demografi-desa-seiket', '<p>Ini isi demografi desa seiket gais</p>', '20 August 2021, 15:31 WIB'),
(10, 'lembaga-masyarakat-1.jpg', 'Lembaga Masyarakat', 'Wisata Air Terjun Batu Putuk', 'lembaga-masyarakat-1', '<p>Kelurahan Batu Putuk memiliki banyak tempat yang indah sehingga banyak lokasi yang diolah menjadi tempat wisata untuk kemajuan sektor wisata dan sektor ekonomi daerah. Salah satu tempat wisata yang dapat kalian datangi adalah air terjunnya. Desa Batu Putuk adalah desa yang berlokasi di daerah pegunungan, maka tidak heran bila desa memiliki air terjun yang dapat dioleh menjadi tempat wisata. Air Terjun ini memiliki ketinggian berkisar 10 meter, memiliki deburan suara air yang deras sehingga cocok untuk kalian yang ingin menenangkan diri dari kesibukan kantor, karena air terjun ini berada tidak jauh dari pusat perkantoran di Bandar Lampung. Walaupun begitu rintangan jalan yang harus dilewati untuk mendapat kesejukan dari air terjun ini memerlukan sedikit kehati-hatian dikarenakan kita harus melewati jalan setapak berupa anak tangga yang sebagian besar tidak memiliki pegangan.</p><p>Berikut harga tiket masuk air terjun :</p><ul><li>Tiket Masuk Air Terjun&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Rp. 10.000,- per orang</li><li style=\"border: 0px; margin: 0px; padding: 0px;\">Tiket Parkir Motor&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Rp. 10.000,- per unitnya</li><li style=\"border: 0px; margin: 0px; padding: 0px;\">Tiket Parkir Mobil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp. 20.000,- per unitnya</li></ul><p style=\"border: 0px; margin: 0px; padding: 0px;\"><br></p><p style=\"border: 0px; margin: 0px; padding: 0px;\">Dengan harga yang sangat terjangkau kalian dapat menikmati keindahan dan berbagai fasilitas yang ada di air terjun. Selamat bersenang-senang di Air Terjun Batu Putuk dan Selalu Jaga Lingkungan !</p>', '13 September 2021, 23:42 WIB'),
(11, 'lembaga-masyarakat-2.jpg', 'Lembaga Masyarakat', 'Wisata Boemi Kedaton Zoo', 'lembaga-masyarakat-2', '<h6>Tempat Wisata Boemi Kedaton berada di Jalan WA Rahman, Kelurahan Batu Putuk, Teluk Betung Barat, Bandar Lampung, idak jauh dari tempat wisata Wira Garden. Boemi Kedaton Zoo memiliki konsep tempat rekreasi bernuansa alami dengan hewan-hewan di dalamnya. Berwisata di kebun binatang ini lebih terasa mengasikan bila mengajak keluarga dan juga anak-anak karena berkonsep mini zoo yang disukai oleh anak-anak. Ada banyak hewan di dalamnya yang dapat memberikan pengetahuan dan keseruan dari anak-anak. Tidak perlu takut untuk mendekat ke hewan karena sudah dipagari oleh besi pagar yang kuat dan juga kokoh.&nbsp;</h6><h6>Untuk kamu yang berasal dari luar kota juga bisa menyewa Cottage untuk menginap yang disediakan oleh Boemi Kedaton Zoo dengan harga berkisar Rp500.000 hingga Rp2.000.000. Sedangkan untuk biaya masuknya dikenakan Rp15.000 loh perorang sangat terjangkau ya dengan harga segitu kita bisa melihat banyak satwa, taman bermain, dan fasilitas lainnya yang ada di sana.</h6><p></p><h6>Selain minizoo di sana juga ada outbound untuk kegiatan seru-seru kalian ditambah dengan permainan flyingfox, ayunan kora-kora, dan kolam renang menambah kelengkapan fasilitas di tempat wisata Boemi Kedaton Zoo.</h6>', '13 September 2021, 23:44 WIB'),
(12, 'berita-1.jpg', 'Berita', 'Gotong Royong Rutin', 'berita-1', '<h6>Jumat, 13 Agustus 2021</h6><p><br></p><p>Telah dilaksankannya kegiatan gotong royong rutin yang dilakukan oleh masyarakat dan juga satuan petugas Covid-19 untuk menjaga kesehatan lingkungan dengan tetap menerapkan protokol kesehatan untuk mencegah penularan Covid-19. Pada hari ini Desa Batu Putuk kedatangan para mahasiswa KKN Unila Periode II yang ikut turun dalam kegiatan rutin ini.&nbsp;</p><p>Kegiatan berfokus pada daun-daun yang gugur di pinggir jalan sehingga memenuhi selokan yang ada untuk aliran air. Warga, satgas, dan mahasiswa saling membantu dan bergotong royong untuk membersihkan lokasi-lokasi yang telah banyak penumpukan daun-daunnya.</p>', '13 September 2021, 22:26 WIB'),
(13, 'berita-2.jpg', 'Berita', 'Usulan Bantuan Beras Untuk Warga', 'berita-2', '<p>Senin, 16 Agustus 2021</p><p><br></p><p>Kelurahan Desa Batu Putuk sedang menyiapkan usulan bantuan beras untuk warga dengan mendata lebih dari 1000 KK yang terdaftar di Kelurahan Batu Putuk. Pendataan terkoordinir dari ketua RT lalu ke sekretaris lurah dan bapak lurah. Dalam kegiatan pendataan ini, kelurahan dibantu oleh para mahasiswa KKN Unila Periode II untuk menginputkan nomor-nomor KK yang terdaftar di kelurahan dengan menggunakan Ms.Excel. Saat ini data sudah kami kirimkan, semoga kabar baik segera di dapat oleh kelurahan kita.</p>', '13 September 2021, 22:37 WIB'),
(15, 'kegiatan-posyandu-anak-dan-balita.jpg', 'Berita', 'Kegiatan Posyandu Anak dan Balita', 'kegiatan-posyandu-anak-dan-balita', '<p>Kamis, 18 Agustus 2021</p><p><br></p><p>Pelaksanan Posyandu Kelurahan Batu Putuk dibantu oleh mahasiswa KKN untuk memberikan pelayanan kesehatan dimulai pengukuran berat badan anak hingga pemberian vitamin kepada peserta posyandu. Para petugas tidak lupa selalu memberikan arahan dan himbauan untuk peserta agar tetap mematuhi protokol kesehatan guna mencegah penyebaran wabah penyakit Covid-19. Kegiatan ini dilakukan secara rutin oleh Puskesmas Kelurahan Batu Putuk sebagai pelayana kesehatan masyarakat.</p>', '13 September 2021, 22:48 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `produkdesa`
--

CREATE TABLE `produkdesa` (
  `id` int(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `penjual` varchar(255) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `notelepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produkdesa`
--

INSERT INTO `produkdesa` (`id`, `gambar`, `nama`, `penjual`, `deskripsi`, `kategori`, `notelepon`) VALUES
(4, 'toko-buku-pak-ngardi.jpg', 'Toko Buku', 'Pak Ngardi', '<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arc', 'barang', '081219788688'),
(5, 'tanaman-hias-bu-yatinem.jpg', 'Tanaman Hias', 'Bu Yatinem', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolo', 'tanaman', '081219788688'),
(6, 'toko-komputer-pak-adit.jpg', 'Toko Komputer', 'Pak Adit', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolo', 'barang', '081218788688'),
(7, 'toko-alat-ketik-pak-tejo.jpg', 'Toko Alat Ketik', 'Pak Tejo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolo', 'barang', '081278674898'),
(8, 'toko-lukis-pak-sabrut.jpg', 'Toko Lukis', 'Pak Sabrut', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolo', 'barang', '082989876765'),
(9, 'alat-tulis-ibu-suyatri.jpg', 'Alat Tulis', 'Ibu Suyatri', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'barang', '081219788888');

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id` int(100) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sambutan`
--

INSERT INTO `sambutan` (`id`, `foto`, `nama`, `jabatan`, `pesan`) VALUES
(1, 'sambutan-1.jpg', 'Zawyun Cheng', 'Sekretaris Desa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(2, 'sambutan-2.jpg', 'Alexa Chander', 'Bendahara Desa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(3, 'sambutan-3.jpg', 'Jhon Dono', 'Kepala Desa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(4, 'sambutan-4.jpg', 'Paul Subra', 'Staff Desa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrousel`
--
ALTER TABLE `carrousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persentase_pekerjaan`
--
ALTER TABLE `persentase_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produkdesa`
--
ALTER TABLE `produkdesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carrousel`
--
ALTER TABLE `carrousel`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `persentase_pekerjaan`
--
ALTER TABLE `persentase_pekerjaan`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produkdesa`
--
ALTER TABLE `produkdesa`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
