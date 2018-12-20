-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 08:09 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depresi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aturan`
--

CREATE TABLE `tb_aturan` (
  `id_aturan` int(5) NOT NULL,
  `id_premis1` int(5) NOT NULL,
  `id_premis2` int(5) NOT NULL,
  `id_premis3` int(5) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pemeriksaan`
--

CREATE TABLE `tb_detail_pemeriksaan` (
  `id_detail` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_faktor` varchar(5) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `id_gejala` varchar(5) DEFAULT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_faktor`
--

CREATE TABLE `tb_faktor` (
  `id_faktor` varchar(5) NOT NULL,
  `faktor` varchar(20) NOT NULL,
  `flag` int(1) DEFAULT '0' COMMENT '0=non aktif 1=aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_faktor`
--

INSERT INTO `tb_faktor` (`id_faktor`, `faktor`, `flag`) VALUES
('F001', 'Afektif', 0),
('F002', 'Kognitif', 1),
('F003', 'Somatik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_faktor_pemeriksaan`
--

CREATE TABLE `tb_faktor_pemeriksaan` (
  `id_cat_pemeriksaan` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_faktor` varchar(5) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `gejala` text NOT NULL,
  `bobot_gj` float NOT NULL,
  `id_kategori` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `gejala`, `bobot_gj`, `id_kategori`) VALUES
('G001', 'Saya tidak merasa sedih', 0, 'K001'),
('G002', 'Saya seringkali merasa sedih', 0.33, 'K001'),
('G003', 'Saya merasa sedih sepanjang waktu', 0.66, 'K001'),
('G004', 'Saya merasa sangat tidak bahagia atau sedih sampai tidak tertahankan', 1, 'K001'),
('G005', 'Saya tidak meragukan masa depan saya', 0, 'K002'),
('G006', 'Saya merasa lebih meragukan masa depan saya dibanding biasanya', 0.33, 'K002'),
('G007', 'Saya merasa segala sesuatu tidak berjalan dengan baik bagi saya', 0.66, 'K002'),
('G008', 'Saya merasa masa depan saya tidak ada harapan dan akan semakin buruk', 1, 'K002'),
('G009', 'Saya tidak merasa gagal', 0, 'K003'),
('G010', 'Saya telah gagal lebih dari yang seharusnya', 0.33, 'K003'),
('G011', 'Saya melakukan banyak kegagalan di masa lalu', 0.66, 'K003'),
('G012', 'Saya merasa gagal sama sekali (betul-betul gagal)', 1, 'K003'),
('G013', 'Saya mendapatkan kesenangan dari hal-hal yang saya lakukan', 0, 'K004'),
('G014', 'Saya tidak menikmati sesuatu seperti biasanya', 0.33, 'K004'),
('G015', 'Saya hanya mendapatkan sangat sedikit kesenangan dari hal-hal yang biasanya bisa saya nikmati', 0.66, 'K004'),
('G016', 'Saya tidak mendapatkan kesenangan sama sekali dari hal-hal yang biasanya bisa saya nikmati', 1, 'K004'),
('G017', 'Saya sama sekali tidak merasa bersalah', 0, 'K005'),
('G018', 'Saya merasa bersalah atas banyak hal yang telah atau seharusnya saya lakukan', 0.33, 'K005'),
('G019', 'Saya sering merasa bersalah', 0.66, 'K005'),
('G020', 'Saya merasa bersalah setiap saat', 1, 'K005'),
('G021', 'Saya tidak merasa bahwa saya sedang dihukum', 0, 'K006'),
('G022', 'Saya merasa bahwa mungkin saya akan dihukum', 0.33, 'K006'),
('G023', 'Saya yakin bahwa saya akan dihukum', 0.66, 'K006'),
('G024', 'Saya merasa bahwa saya sedang dihukum', 1, 'K006'),
('G025', 'Saya tidak merasa kecewa pada diri sendiri', 0, 'K007'),
('G026', 'Saya kehilangan kepercayaan pada diri sendiri', 0.33, 'K007'),
('G027', 'Saya merasa kecewa pada diri sendiri', 0.66, 'K007'),
('G028', 'Saya benci pada diri sendiri', 1, 'K007'),
('G029', 'Saya tidak mengkritik atau menyalahkan diri sendiri lebih dari biasanya', 0, 'K008'),
('G030', 'Saya mengkritik diri sendiri lebih dari biasanya', 0.33, 'K008'),
('G031', 'Saya mengkritik diri sendiri atas semua kesalahan yang saya lakukan', 0.66, 'K008'),
('G032', 'Saya menyalahkan diri sendiri untuk semua hal-hal buruk yang terjadi', 1, 'K008'),
('G033', 'Saya tidak berpikir untuk bunuh diri', 0, 'K009'),
('G034', 'Saya berpikir untuk bunuh diri, tetapi hal itu tidak akan saya lakukan', 0.33, 'K009'),
('G035', 'Saya ingin bunuh diri', 0.66, 'K009'),
('G036', 'Saya akan bunuh diri seandainya ada kesempatan', 1, 'K009'),
('G037', 'Saya tidak menangis lagi seperti biasanya', 0, 'K010'),
('G038', 'Saya lebih sering menangis dibanding biasanya', 0.33, 'K010'),
('G039', 'Saya menangis bahkan untuk masalah kecil', 0.66, 'K010'),
('G040', 'Rasanya saya ingin sekali menangis tetapi tidak bisa', 1, 'K010'),
('G041', 'Saya  tidak  lagi  merasa  gelisah\r\natau tertekan dibandingkan biasanya\r\n', 0, 'K011'),
('G042', 'Saya merasa lebih mudah gelisah atau tertekan dibanding biasanya', 0.33, 'K011'),
('G043', 'Saya sangat tertekan dan gelisah sampai sulit untuk berdiam diri', 0.66, 'K011'),
('G044', 'Saya sangat gelisah sehingga harus senantiasa bergerak atau melakukan sesuatu', 1, 'K011'),
('G045', 'Saya tidak kehilangan minat atau berelasi dengan orang lain atau melakukan aktivitas', 0, 'K012'),
('G046', 'Saya kurang berminat untuk berelasi dengan orang lain atau terhadap sesuatu dibandingkan biasanya', 0.33, 'K012'),
('G047', 'Saya kehilangan hampir seluruh minat saya untuk berelasi dengan orang lain atau terhadap sesuatu', 0.66, 'K012'),
('G048', 'Saya tidak berminat akan apapun', 1, 'K012'),
('G049', 'Saya dapat mengambil keputusan sebagaimana yang biasanya saya lakukan', 0, 'K013'),
('G050', 'Saya agak sulit mengambil keputusan dibanding biasanya', 0.33, 'K013'),
('G051', 'Saya   lebih   banyak   mengalami\r\nkesulitan dalam mengambil keputusan dibanding biasanya\r\n', 0.66, 'K013'),
('G052', 'Saya sangat mengalami kesulitan setiap kali mengambil keputusan', 1, 'K013'),
('G053', 'Saya merasa layak', 0, 'K014'),
('G054', 'Saya merasa tidak layak dan tidak berguna dibandingkan biasanya', 0.33, 'K014'),
('G055', 'Saya merasa lebih tidak layak dibanding orang lain', 0.66, 'K014'),
('G056', 'Saya merasa sama sekali tidak layak', 1, 'K014'),
('G057', 'Saya memiliki tenaga (semangat) seperti biasanya', 0, 'K015'),
('G058', 'Saya memiliki tenaga lebih sedikit dibanding yang seharusnya saya miliki', 0.33, 'K015'),
('G059', 'Saya tidak memiliki tenaga yang cukup untuk berbuat banyak', 0.66, 'K015'),
('G060', 'Saya tidak memiliki tenaga yang cukup untuk melakukan apapun', 1, 'K015'),
('G061', 'Saya tidak mengalami perubahan\r\napapun dalam pola tidur saya', 0, 'K016'),
('G062', 'Saya tidur lebih dari biasanya / saya tidur kurang dari biasanya', 0.33, 'K016'),
('G063', 'Saya tidur jauh lebih lama dari biasanya / saya tidur sangat kurang dari biasanya', 0.66, 'K016'),
('G064', 'Saya tidur hampir sepanjang hari / saya bangun 1-2 jam lebih awal dan tidak dapat tidur kembali', 1, 'K016'),
('G065', 'Saya tidak lebih mudah marah seperti biasanya', 0, 'K017'),
('G066', 'Saya lebih mudah marah dibanding biasanya', 0.33, 'K017'),
('G067', 'Saya jauh lebih mudah marah dibanding biasanya', 0.66, 'K017'),
('G068', 'Saya mudah marah sepanjang waktu', 1, 'K017'),
('G069', 'Selera makan saya tidak berubah (tidak lebih buruk) dari biasanya', 0, 'K018'),
('G070', 'Selera makan saya kurang dari biasanya / selera makan saya lebih dari biasanya', 0.33, 'K018'),
('G071', 'Selera makan saya sangat kurang dibanding biasanya / selera makan saya sangat lebih dibanding biasanya', 0.66, 'K018'),
('G072', 'Saya tidak punya selera makan sama sekali / saya ingin makan setiap waktu', 1, 'K018'),
('G073', 'Saya mampu berkonsentrasi seperti biasanya', 0, 'K019'),
('G074', 'Saya tidak mampu berkonsentrasi seperti biasanya', 0.33, 'K019'),
('G075', 'Saya sangat sulit untuk tetap memusatkan pikiran terhadap sesuatu dalam jangka waktu yang panjang', 0.66, 'K019'),
('G076', 'Saya merasa saya tidak mampu berkonsentrasi dalam semua hal', 1, 'K019'),
('G077', 'Saya tidak lebih capek atau lelah dibanding biasanya', 0, 'K020'),
('G078', 'Saya lebih mudah capek atau lelah dari biasanya', 0.33, 'K020'),
('G079', 'Saya merasa capek atau lelah untuk melakukan banyak hal yang biasanya saya lakukan', 0.66, 'K020'),
('G080', 'Saya terlalu capek atau lelah untuk melakukan hampir semua hal yang biasanya saya lakukan', 1, 'K020'),
('G081', 'Saya tidak melihat adanya perubahan pada gairah seksual saya', 0, 'K021'),
('G082', 'Gairah seksual saya berkurang tidak seperti biasanya', 0.33, 'K021'),
('G083', 'Saya menjadi sangat kurang berminat pada aktivitas seksual saat ini', 0.66, 'K021'),
('G084', 'Gairah seksual saya hilang sama sekali', 1, 'K021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_aturan` int(5) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `id_faktor` varchar(5) NOT NULL,
  `kategori` text NOT NULL,
  `bobot_kat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `id_faktor`, `kategori`, `bobot_kat`) VALUES
('K001', 'F001', 'Kesedihan', 0.69),
('K002', 'F001', 'Pesimis', 0.38),
('K003', 'F002', 'Kegagalan masa lalu', 0.5),
('K004', 'F003', 'Kehilangan gairah', 0.58),
('K005', 'F002', 'Perasaan bersalah', 0.34),
('K006', 'F002', 'Perasaan dihukum', 0.46),
('K007', 'F002', 'Tidak menyukai diri sendiri', 0.65),
('K008', 'F002', 'Mengkritik diri sendiri', 0.57),
('K009', 'F002', 'Pikiran-pikiran atau keinginan bunuh diri', 0.8),
('K010', 'F001', 'Menangis', 0.43),
('K011', 'F001', 'Gelisah', 0.6),
('K012', 'F003', 'Kehilangan minat', 0.6),
('K013', 'F002', 'Sulit mengambil keputusan', 0.57),
('K014', 'F002', 'Merasa tidak layak', 0.77),
('K015', 'F003', 'Kehilangan tenaga (semangat)', 0.5),
('K016', 'F003', 'Perubahan pola tidur', 0.57),
('K017', 'F001', 'Mudah marah', 0.47),
('K018', 'F003', 'Perubahan selera makan', 0.44),
('K019', 'F002', 'Sulit berkonsentrasi', 0.58),
('K020', 'F003', 'Capek atau kelelahan', 0.45),
('K021', 'F003', 'Kehilangan gairah seksual', 0.26);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pakar`
--

CREATE TABLE `tb_pakar` (
  `id_pakar` int(5) NOT NULL,
  `id_faktor` varchar(5) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `bobot_kat` float NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `bobot_gj` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pakar`
--

INSERT INTO `tb_pakar` (`id_pakar`, `id_faktor`, `id_kategori`, `bobot_kat`, `id_gejala`, `bobot_gj`) VALUES
(1, 'F001', 'K001', 0.61, 'G001', 0),
(2, 'F001', 'K001', 0.6, 'G002', 0.33),
(3, 'F001', 'K001', 0.6, 'G003', 0.66),
(4, 'F001', 'K001', 0.6, 'G004', 1),
(5, 'F001', 'K002', 0.38, 'G005', 0),
(6, 'F001', 'K002', 0.38, 'G006', 0.33),
(7, 'F001', 'K002', 0.38, 'G007', 0.66),
(8, 'F001', 'K002', 0.38, 'G008', 1),
(9, 'F002', 'K003', 0.5, 'G009', 0),
(10, 'F002', 'K003', 0.5, 'G010', 0.33),
(11, 'F002', 'K003', 0.5, 'G012', 1),
(12, 'F003', 'K004', 0.58, 'G013', 0),
(13, 'F003', 'K004', 0.58, 'G014', 0.33),
(14, 'F003', 'K004', 0.58, 'G015', 0.66),
(15, 'F003', 'K004', 0, 'G016', 0),
(16, 'F002', 'K005', 0, 'G017', 0),
(17, 'F002', 'K005', 0, 'G018', 0),
(18, 'F002', 'K005', 0, 'G019', 0),
(19, 'F002', 'K005', 0, 'G020', 0),
(20, 'F002', 'K006', 0, 'G021', 0),
(21, 'F002', 'K006', 0, 'G022', 0),
(22, 'F002', 'K006', 0, 'G023', 0),
(23, 'F002', 'K006', 0, 'G024', 0),
(24, 'F002', 'K007', 0, 'G025', 0),
(25, 'F002', 'K007', 0, 'G026', 0),
(26, 'F002', 'K007', 0, 'G027', 0),
(27, 'F002', 'K007', 0, 'G028', 0),
(28, 'F002', 'K008', 0, 'G029', 0),
(29, 'F002', 'K008', 0, 'G030', 0),
(30, 'F002', 'K008', 0, 'G031', 0),
(31, 'F002', 'K008', 0, 'G032', 0),
(32, 'F002', 'K009', 0, 'G033', 0),
(33, 'F002', 'K009', 0, 'G034', 0),
(34, 'F002', 'K009', 0, 'G035', 0),
(35, 'F002', 'K009', 0, 'G036', 0),
(36, 'F001', 'K010', 0, 'G037', 0),
(37, 'F001', 'K010', 0, 'G038', 0),
(38, 'F001', 'K010', 0, 'G039', 0),
(39, 'F001', 'K010', 0, 'G040', 0),
(40, 'F001', 'K011', 0, 'G041', 0),
(41, 'F001', 'K011', 0, 'G042', 0),
(42, 'F001', 'K011', 0, 'G043', 0),
(43, 'F001', 'K011', 0, 'G044', 0),
(44, 'F003', 'K012', 0, 'G045', 0),
(45, 'F003', 'K012', 0, 'G046', 0),
(46, 'F003', 'K012', 0, 'G047', 0),
(47, 'F003', 'K012', 0, 'G048', 0),
(48, 'F002', 'K013', 0, 'G049', 0),
(49, 'F002', 'K013', 0, 'G050', 0),
(50, 'F002', 'K013', 0, 'G051', 0),
(51, 'F002', 'K013', 0, 'G052', 0),
(52, 'F002', 'K014', 0, 'G053', 0),
(53, 'F002', 'K014', 0, 'G054', 0),
(54, 'F002', 'K014', 0, 'G055', 0),
(55, 'F002', 'K014', 0, 'G056', 0),
(56, 'F003', 'K015', 0, 'G057', 0),
(57, 'F003', 'K015', 0, 'G058', 0),
(58, 'F003', 'K015', 0, 'G059', 0),
(59, 'F003', 'K015', 0, 'G060', 0),
(60, 'F003', 'K016', 0, 'G061', 0),
(61, 'F003', 'K016', 0, 'G062', 0),
(62, 'F003', 'K016', 0, 'G063', 0),
(63, 'F003', 'K016', 0, 'G064', 0),
(64, 'F001', 'K017', 0, 'G065', 0),
(65, 'F001', 'K017', 0, 'G066', 0),
(66, 'F001', 'K017', 0, 'G067', 0),
(67, 'F001', 'K017', 0, 'G068', 0),
(68, 'F003', 'K018', 0, 'G069', 0),
(69, 'F003', 'K018', 0, 'G070', 0),
(70, 'F003', 'K018', 0, 'G071', 0),
(71, 'F003', 'K018', 0, 'G072', 0),
(72, 'F002', 'K019', 0, 'G073', 0),
(73, 'F002', 'K019', 0, 'G074', 0),
(74, 'F002', 'K019', 0, 'G075', 0),
(75, 'F002', 'K019', 0, 'G076', 0),
(76, 'F003', 'K020', 0, 'G077', 0),
(77, 'F003', 'K020', 0, 'G078', 0),
(78, 'F003', 'K020', 0, 'G079', 0),
(79, 'F003', 'K020', 0, 'G080', 0),
(80, 'F003', 'K021', 0, 'G081', 0),
(81, 'F003', 'K021', 0, 'G082', 0),
(82, 'F003', 'K021', 0, 'G083', 0),
(83, 'F003', 'K021', 0, 'G084', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemeriksaan`
--

CREATE TABLE `tb_pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemeriksaan`
--

INSERT INTO `tb_pemeriksaan` (`id_pemeriksaan`, `user_id`, `creation_date`) VALUES
(1, 1, '2018-12-18'),
(2, 1, '2018-12-20'),
(3, 1, '2018-12-20'),
(4, 1, '2018-12-20'),
(5, 1, '2018-12-20'),
(6, 1, '2018-12-20'),
(7, 1, '2018-12-20'),
(8, 1, '2018-12-20'),
(9, 1, '2018-12-20'),
(10, 1, '2018-12-20'),
(11, 1, '2018-12-20'),
(12, 1, '2018-12-20'),
(13, 1, '2018-12-20'),
(14, 1, '2018-12-20'),
(15, 1, '2018-12-20'),
(16, 1, '2018-12-20'),
(17, 1, '2018-12-20'),
(18, 1, '2018-12-20'),
(19, 1, '2018-12-20'),
(20, 1, '2018-12-20'),
(21, 1, '2018-12-20'),
(22, 1, '2018-12-20'),
(23, 1, '2018-12-20'),
(24, 1, '2018-12-20'),
(25, 1, '2018-12-20'),
(26, 1, '2018-12-20'),
(27, 1, '2018-12-20'),
(28, 1, '2018-12-20'),
(29, 1, '2018-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_premis1`
--

CREATE TABLE `tb_premis1` (
  `id_premis1` int(5) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `bts_bwh` float NOT NULL,
  `bts_ats` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_premis2`
--

CREATE TABLE `tb_premis2` (
  `id_premis3` int(5) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `bts_bwh` float NOT NULL,
  `bts_atas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_premis3`
--

CREATE TABLE `tb_premis3` (
  `id_premis3` int(5) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `bts_bwh` float NOT NULL,
  `bts_ats` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `usia` int(2) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `alamat`, `usia`, `gender`, `level`) VALUES
(1, 'aji', '21232f297a57a5a743894a0e4a801fc3', 'aji', 'Sleman', 18, 'L', 'admin'),
(2, 'nuri', '827ccb0eea8a706c4c34a16891f84e7b', 'nuri', 'mejing', 26, 'L', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `id_faktor` varchar(5) NOT NULL,
  `faktor` varchar(30) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `kategori` varchar(55) NOT NULL,
  `bobot_kat` float NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `gejala` text NOT NULL,
  `bobot_gj` float NOT NULL,
  `cek` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `tb_detail_pemeriksaan`
--
ALTER TABLE `tb_detail_pemeriksaan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_faktor`
--
ALTER TABLE `tb_faktor`
  ADD PRIMARY KEY (`id_faktor`);

--
-- Indexes for table `tb_faktor_pemeriksaan`
--
ALTER TABLE `tb_faktor_pemeriksaan`
  ADD PRIMARY KEY (`id_cat_pemeriksaan`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pakar`
--
ALTER TABLE `tb_pakar`
  ADD PRIMARY KEY (`id_pakar`);

--
-- Indexes for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `tb_premis1`
--
ALTER TABLE `tb_premis1`
  ADD PRIMARY KEY (`id_premis1`);

--
-- Indexes for table `tb_premis2`
--
ALTER TABLE `tb_premis2`
  ADD PRIMARY KEY (`id_premis3`);

--
-- Indexes for table `tb_premis3`
--
ALTER TABLE `tb_premis3`
  ADD PRIMARY KEY (`id_premis3`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  MODIFY `id_aturan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detail_pemeriksaan`
--
ALTER TABLE `tb_detail_pemeriksaan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_faktor_pemeriksaan`
--
ALTER TABLE `tb_faktor_pemeriksaan`
  MODIFY `id_cat_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pakar`
--
ALTER TABLE `tb_pakar`
  MODIFY `id_pakar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_premis1`
--
ALTER TABLE `tb_premis1`
  MODIFY `id_premis1` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_premis2`
--
ALTER TABLE `tb_premis2`
  MODIFY `id_premis3` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_premis3`
--
ALTER TABLE `tb_premis3`
  MODIFY `id_premis3` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
