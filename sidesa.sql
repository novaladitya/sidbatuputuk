-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 01:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
(1, 'carrousel-1.jpg', 'Ayo ke Pantai Desaku Desamu!');

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
(1, '081256489630', 'Senin - Jumat (07.30 - 15.00 WIB)', 'desakudesamu@sidesa.id', 'desakudesamu.id', 'Jalan Rengasdengklok Nomor 90', 'Jember');

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
(3, 'sejarah-desa-seiket.jpg', 'Profil Desa', 'Sejarah Desa Seiket', 'sejarah-desa-seiket', '<p><span lang=\"EN-US\"><b>Desa Seiket</b> merupakan salah satu desa yang terletak di Kecamatan\r\nSukses, Kabupaten Sinergritas. Desa ini terbentuk pada tahun 1945 dan dihuni\r\noleh beragam suku. Pada awalnya, desa ini merupakan tempat para pejuang kemerdekaan\r\nyang berkumpul untuk menyatukan perjuangan melawan penjajahan Belanda.<o:p></o:p></span></p><p>\r\n\r\n</p><p><span lang=\"EN-US\">Pada tahun 1970, setelah di pastikan penjajah tidak lagi\r\nberada di wilayah Desa Seiket maka para pejuang yang saat itu sudah senasib dan\r\nsepenanggungan sepakat untuk membangun daerah yang awalnya menjadi tempat\r\nberkumpul tersebut untuk menjadi sebuah desa dan diberi nama Desa Seiket yang\r\nmemiliki makna <em>“Berbeda-beda</em> <em>namun</em> <em>tetap</em> <em>bersaudara”.</em><o:p></o:p></span></p>', '17 August 2021, 2:47 WIB'),
(9, 'demografi-desa-seiket.jpg', 'Profil Desa', 'Demografi Desa Seiket', 'demografi-desa-seiket', '<p>Ini isi demografi desa seiket gais</p>', '20 August 2021, 15:31 WIB'),
(10, 'lembaga-masyarakat-1.jpg', 'Lembaga Masyarakat', 'Lembaga Masyarakat 1', 'lembaga-masyarakat-1', '<p>Ini isi lembaga masyarakat 1 gais</p>', '20 August 2021, 15:40 WIB'),
(11, 'lembaga-masyarakat-2.jpg', 'Lembaga Masyarakat', 'Lembaga Masyarakat 2', 'lembaga-masyarakat-2', '<p>Ini isi lembaga masyarakat 2 gais</p>', '20 August 2021, 15:40 WIB'),
(12, 'berita-1.jpg', 'Berita', 'Berita 1', 'berita-1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>1</li><li>2</li><li>3</li></ul>', '24 August 2021, 4:03 WIB'),
(13, 'berita-2.jpg', 'Berita', 'Berita 2', 'berita-2', '<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. \"What\'s happened to me?\" he thought. It wasn\'t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm toward', '24 August 2021, 4:22 WIB'),
(14, 'lembaga-masyarakat-3.jpg', 'Lembaga Masyarakat', 'Lembaga Masyarakat 3', 'lembaga-masyarakat-3', '<p>Ini isi lemaga masyarakat 3</p>', '23 August 2021, 14:07 WIB');

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
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
