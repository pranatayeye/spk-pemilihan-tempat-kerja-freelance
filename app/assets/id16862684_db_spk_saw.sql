-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2021 at 05:55 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16862684_db_spk_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` char(3) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password_admin` varchar(60) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `password_admin`, `no_telp`, `email`, `alamat`) VALUES
('001', 'Yeye', '$2y$10$HVEx3/DdHvZY4tzVbP6rhu4n.hDbk9u4YlggHln51ffEDHvMl2n72', '087861189600', 'pranatayeye18@gmail.com', 'jl. letda reta 19 Denpasar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode_alternatif` char(2) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `nim` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`, `status`, `nim`) VALUES
(4, 'A1', 'Rumah', 1, '170030055'),
(5, 'A2', ' ITB STIKOM Bali', 1, '170030055'),
(6, 'A3', 'Wifi Corner', 1, '170030055'),
(7, 'A1', 'A1', 0, '170030042'),
(8, 'A1', 'Kafe', 0, '170030898'),
(9, 'A1', 'Kafe', 1, '170030083'),
(10, 'A2', 'Coworking', 1, '170030083'),
(11, 'A3', 'Asdasd', 1, '170030083'),
(12, 'A1', 'Coworking Space', 0, '170030482'),
(13, 'A2', 'Rumah', 0, '170030482'),
(14, 'A1', 'Kafe', 0, '200030707'),
(15, 'A1', 'Warnet', 0, '170010028'),
(22, 'A1', 'STIKOM Bali', 1, '111222333'),
(23, 'A2', 'Universitas Indonesia', 1, '111222333'),
(24, 'A3', 'Universitas Gadjah Mada', 1, '111222333'),
(25, 'A1', 'Rumah', 0, '123456789'),
(26, 'A2', 'ITB STIKOM Bali', 0, '123456789'),
(27, 'A1', 'Rumah', 1, '170030237'),
(28, 'A2', 'ITB STIKOM Bali', 1, '170030237'),
(29, 'A3', 'Wifi Corner', 1, '170030237');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `id_bobot` int(11) NOT NULL,
  `keterangan` char(30) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bobot`
--

INSERT INTO `tb_bobot` (`id_bobot`, `keterangan`, `bobot`) VALUES
(249, 'Sangat Baik', 5),
(250, 'Baik', 4),
(251, 'Cukup', 3),
(252, 'Kurang', 2),
(253, 'Sangat Kurang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` char(2) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `pernyataan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot_kriteria`, `keterangan`, `pernyataan`) VALUES
('C1', 'Fasilitas', 0.3, 'Benefit', 'memiliki fasilitas yang dibutuhkan saat bekerja.'),
('C2', 'Lokasi', 0.3, 'Cost', 'memiliki lokasi yang dekat dengan lokasi saya saat ini.'),
('C3', 'Kebersihan', 0.2, 'Benefit', 'memiliki lingkungan sekitar yang bersih.'),
('C4', 'Keamanan', 0.2, 'Benefit', 'memiliki protokol kesehatan dan ruang privasi.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `cap_waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `cap_waktu`, `keterangan`) VALUES
(18, '2021-05-16 12:45:49', '001 menghapus mahasiswa 123456789'),
(19, '2021-05-16 12:45:57', '001 menghapus admin 002'),
(34, '2021-05-21 02:00:08', '001 mengedit mahasiswa 123123123 Yen'),
(35, '2021-05-21 02:00:13', '001 menghapus mahasiswa 123123123'),
(36, '2021-05-21 02:00:26', '001 menambah admin 002 N'),
(37, '2021-05-21 02:00:34', '001 menghapus admin 002'),
(38, '2021-05-21 02:01:31', '123123123 123 telah mendaftar'),
(39, '2021-05-21 03:16:30', '123456789 Inopranata telah mendaftar'),
(40, '2021-05-21 07:38:36', '001 menghapus mahasiswa 123123123'),
(41, '2021-05-21 07:38:40', '001 menghapus mahasiswa 123456789'),
(47, '2021-05-25 02:16:18', '001 menambah mahasiswa 123456789 Adad'),
(48, '2021-05-25 02:16:41', '001 mengedit mahasiswa 123456789 Dadaada'),
(49, '2021-05-25 02:16:47', '001 menghapus mahasiswa 123456789'),
(50, '2021-05-25 02:17:10', '001 menambah admin 002 Haa'),
(51, '2021-05-25 02:17:43', '001 mengedit admin 002 Haa'),
(52, '2021-05-25 02:17:55', '001 menghapus admin 002'),
(53, '2021-05-25 02:19:18', '123456789 Yye telah mendaftar'),
(56, '2021-05-25 10:41:26', '001 menghapus mahasiswa 123456789'),
(57, '2021-05-25 11:00:12', '170030276 Wahyu telah mendaftar'),
(58, '2021-05-25 11:16:43', '170030042 Made telah mendaftar'),
(59, '2021-05-25 12:17:56', '170030330 I telah mendaftar'),
(60, '2021-05-25 12:31:03', '170030898 Arya telah mendaftar'),
(61, '2021-05-25 12:38:51', '170030083 Fajar telah mendaftar'),
(62, '2021-05-25 15:27:24', '170030063 Aldilla telah mendaftar'),
(63, '2021-05-25 19:05:33', '170030081 Adi telah mendaftar'),
(64, '2021-05-26 03:30:40', '180031198 Marinus telah mendaftar'),
(65, '2021-05-26 04:55:45', '170030702 Radita telah mendaftar'),
(66, '2021-05-26 15:44:05', '170030482 Zinedine telah mendaftar'),
(67, '2021-05-27 00:29:32', '200030707 I telah mendaftar'),
(68, '2021-05-30 00:10:53', '170010028 Bhasita telah mendaftar'),
(69, '2021-06-03 01:39:13', '001 menambah kriteria C5 Ha'),
(70, '2021-06-03 01:39:32', '001 mengedit kriteria C5 Haa'),
(71, '2021-06-03 01:39:39', '001 menghapus kriteria C5'),
(72, '2021-06-03 01:41:24', '123456789 Yee telah mendaftar'),
(73, '2021-06-04 05:49:01', '001 menambah kriteria C5 Ha'),
(74, '2021-06-04 05:49:26', '001 mengedit kriteria C5 Haa'),
(75, '2021-06-04 05:49:33', '001 menghapus kriteria C5'),
(76, '2021-06-04 05:52:36', '111111111 Yee telah mendaftar'),
(77, '2021-06-04 09:13:09', '111222333 Cyrilus telah mendaftar'),
(78, '2021-06-09 08:14:10', '001 menghapus mahasiswa 111111111'),
(79, '2021-06-09 08:14:45', '001 mengedit mahasiswa 123456789 Yee'),
(80, '2021-06-09 08:28:27', '170030237 Christopher telah mendaftar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `nim` char(9) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `password_mhs` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`nim`, `nama_mhs`, `password_mhs`) VALUES
('111222333', 'Cyrilus Santio Pranata', '$2y$10$Kk7pEfiOrF1Mk5qPyrF4AOh7I/a04lBTJE1irIooNBLdZjdMpuhf6'),
('123456789', 'Yee', '$2y$10$4DsF2mRpTe/f3rq47SDvJ.xywfpQ2MKI71t2hb0t0PigSfTKlkfyG'),
('170010028', 'Bhasita Ananta', '$2y$10$46FWsUP9uDqlyqGyeV0QW.M0/JfgQbUK6A/soKywOKBIPHACdOVha'),
('170030042', 'Made Vidella Wianindra Wijaya', '$2y$10$F0F6HDZULTmgjrasXruzgeMY3rtCqSRIzV.YN8iiHjc.BItYx2kXy'),
('170030055', 'Cyrilus Santio Pranata', '$2y$10$QfMYiNYj2fuqQhrxctTHquPNEoZ2Q8koRhEsdYWIAGw4RPGtl7/EG'),
('170030063', 'Aldilla Fadjra Zhaqia Agatha', '$2y$10$c8SoTHmDGAWYd8XluMu5HuknuMD5fJCgugzI60x.tePYHfQPcqjam'),
('170030081', 'Adi', '$2y$10$BCk99A05d7w1/es2s25mQe3N/4Rj8R72EpJdgZbFa7fPIfZWD4P0K'),
('170030083', 'Fajar Alnito Bagasnanda', '$2y$10$44/xEYUE5fhJkXfXEPCgB.u34qRkw.4.neDgsG9m29V6BDei6OM8G'),
('170030237', 'Christopher Theo', '$2y$10$eIIL5TsBRIU/Hb86Q3RKu.ZqDhUmOjdL1Dk.rsmsKyB7iSPuEZWpG'),
('170030276', 'Wahyu ', '$2y$10$J43TPu9m6MSfzvlg84F7a.FJjqSdS0nrtUE0YsPlbze0jgPdqte7C'),
('170030330', 'I Gede Dyas Arya Budi Prabowo', '$2y$10$/YJ6DGGKY9pb3.dSKIL96uuU0WVjgtwB5N9AZc88Sg1iKRplJ19Du'),
('170030482', 'Zinedine Zidane Bawazir', '$2y$10$/M8RR9xscgfTslLstFhT6.QS5t2Ye1KPr.2YS8C0viOKlgt9/3spa'),
('170030702', 'Radita Safitri', '$2y$10$mwWJrN2Y4mF6UR.9drj00eJAQABUGW1fXJHMcGFrq4RTAiTbgRDY2'),
('170030898', 'Arya', '$2y$10$9nbb3O4Kv4URdzDRw.bJ0.Aj//JzlkdzXret8w86652iA6SLG0UdK'),
('180031198', 'Marinus Bora Tanggu', '$2y$10$0HDA5Tg8tLdhuZVTZtYhT.c8PPEwarDhu6HuYd.8.49LSp5KAno8O'),
('200030707', 'I Putu Indra Arsana', '$2y$10$qDLoHVH81ySPgsINEP7fTuiXqGA6tl.rxILeicqKkJRBw/4Nlieqy');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_bobot` int(11) NOT NULL,
  `kode_kriteria` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_alternatif`, `id_bobot`, `kode_kriteria`) VALUES
(358, 4, 251, 'C1'),
(359, 4, 249, 'C2'),
(360, 4, 250, 'C3'),
(361, 4, 250, 'C4'),
(362, 5, 250, 'C1'),
(363, 5, 252, 'C2'),
(364, 5, 249, 'C3'),
(365, 5, 249, 'C4'),
(366, 6, 250, 'C1'),
(367, 6, 250, 'C2'),
(368, 6, 251, 'C3'),
(369, 6, 250, 'C4'),
(370, 7, 249, 'C1'),
(371, 7, 249, 'C2'),
(372, 7, 249, 'C3'),
(373, 7, 249, 'C4'),
(374, 8, 250, 'C1'),
(375, 8, 249, 'C2'),
(376, 8, 249, 'C3'),
(377, 8, 251, 'C4'),
(378, 9, 249, 'C1'),
(379, 9, 249, 'C2'),
(380, 9, 249, 'C3'),
(381, 9, 249, 'C4'),
(382, 10, 249, 'C1'),
(383, 10, 249, 'C2'),
(384, 10, 249, 'C3'),
(385, 10, 249, 'C4'),
(386, 11, 249, 'C1'),
(387, 11, 249, 'C2'),
(388, 11, 251, 'C3'),
(389, 11, 252, 'C4'),
(390, 12, 250, 'C1'),
(391, 12, 251, 'C2'),
(392, 12, 249, 'C3'),
(393, 12, 249, 'C4'),
(394, 13, 249, 'C1'),
(395, 13, 249, 'C2'),
(396, 13, 249, 'C3'),
(397, 13, 250, 'C4'),
(398, 14, 250, 'C1'),
(399, 14, 250, 'C2'),
(400, 14, 250, 'C3'),
(401, 14, 250, 'C4'),
(402, 15, 249, 'C1'),
(403, 15, 249, 'C2'),
(404, 15, 249, 'C3'),
(405, 15, 249, 'C4'),
(430, 22, 252, 'C1'),
(431, 22, 252, 'C2'),
(432, 22, 253, 'C3'),
(433, 22, 252, 'C4'),
(434, 23, 249, 'C1'),
(435, 23, 250, 'C2'),
(436, 23, 249, 'C3'),
(437, 23, 250, 'C4'),
(438, 24, 249, 'C1'),
(439, 24, 250, 'C2'),
(440, 24, 250, 'C3'),
(441, 24, 250, 'C4'),
(442, 25, 249, 'C1'),
(443, 25, 250, 'C2'),
(444, 25, 250, 'C3'),
(445, 25, 250, 'C4'),
(446, 26, 250, 'C1'),
(447, 26, 250, 'C2'),
(448, 26, 251, 'C3'),
(449, 26, 249, 'C4'),
(454, 27, 251, 'C1'),
(455, 27, 249, 'C2'),
(456, 27, 250, 'C3'),
(457, 27, 250, 'C4'),
(458, 28, 250, 'C1'),
(459, 28, 252, 'C2'),
(460, 28, 249, 'C3'),
(461, 28, 249, 'C4'),
(462, 29, 252, 'C1'),
(463, 29, 250, 'C2'),
(464, 29, 251, 'C3'),
(465, 29, 250, 'C4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_bobot` (`id_bobot`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD CONSTRAINT `tb_alternatif_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_1` FOREIGN KEY (`id_bobot`) REFERENCES `tb_bobot` (`id_bobot`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rating_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `tb_alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rating_ibfk_3` FOREIGN KEY (`kode_kriteria`) REFERENCES `tb_kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
