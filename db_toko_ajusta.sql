-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Agu 2023 pada 20.26
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_ajusta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_album_barang`
--

CREATE TABLE `tb_album_barang` (
  `id_album` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_album_barang`
--

INSERT INTO `tb_album_barang` (`id_album`, `id_brg`, `gambar`) VALUES
(1, 5, '565a11fb818fb345900b1974eb12ecbfd.png'),
(3, 5, '5dc92689834d66695f6772ee808fe9c0b.png'),
(4, 6, '6ed4d6a7a0feb2a7879c57f879b8914f8.png'),
(5, 6, '6afc98386ead565f94459aa7660969e51.png'),
(6, 6, '61f49ded174c76c99059fc4dd2cd9ad09.png'),
(7, 1, '1b382cc76ffbb96a7d00fcb687f66659e.png'),
(8, 1, '11b8571e857801e8d8d88824286f11d81.png'),
(9, 1, '15fd3752fc1c5a3c4e93d49445bb9e2b0.png'),
(10, 1, '155a01f1bb9ffc8c6229762f3368a646f.png'),
(11, 1, '1fc7c8718fc32219883b2aa5772a5d5b7.png'),
(12, 1, '1155f43cb767c576252ba8ca95ef20fe2.png'),
(13, 1, '14868f1ce0fc661818fdc31b82865d84e.png'),
(14, 1, '1192109fa86603d23cf78cee3b2c08c13.png'),
(15, 1, '1bed805e62c65f60ff3da23787939de51.png'),
(16, 1, '1f0e88a10937b8569ed7c40a82bdafab8.png'),
(17, 1, '1937580639878f11b5049225eab67273b.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'LAMPU SIGNAL TOWER LAMP', 'dfdaf basfsa', 'Alat Pertukangan', 1000000, 998, 'bfecf12b646763b152ceb150cef96e6520230826143729.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pesanan`
--

CREATE TABLE `tb_detail_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pesanan`
--

INSERT INTO `tb_detail_pesanan` (`id`, `id_pesanan`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`, `id_user`) VALUES
(22, 15, 5, 'CONVEX MIRROR KACA CEMBUNG 60 CM outdoor / indoor ', 1, 300000, 0, 11),
(23, 16, 5, 'CONVEX MIRROR KACA CEMBUNG 60 CM outdoor / indoor ', 1, 300000, 0, 11),
(24, 17, 5, 'CONVEX MIRROR KACA CEMBUNG 60 CM outdoor / indoor ', 1, 300000, 0, 11),
(25, 18, 6, 'Toggle Clamp Vertikal dan Horizontal Handle - RX-1', 1, 279000, 0, 11),
(26, 19, 1, 'LAMPU SIGNAL TOWER LAMP', 1, 1000000, 0, 11),
(27, 20, 1, 'LAMPU SIGNAL TOWER LAMP', 1, 1000000, 0, 11);

--
-- Trigger `tb_detail_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_detail_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `jasa_pengiriman` varchar(20) NOT NULL,
  `nomor_telephon` int(15) NOT NULL,
  `pilih_bank` varchar(100) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `bukti_transfer` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `nama`, `alamat`, `jasa_pengiriman`, `nomor_telephon`, `pilih_bank`, `tgl_pesan`, `batas_bayar`, `id_user`, `bukti_transfer`, `status`) VALUES
(15, 'Andrean Budi Setyanto', 'taman raya bekasi blok q1 no 12', 'JNE', 2147483647, 'BCA - 23012910', '2023-08-23 07:46:28', '2023-08-24 07:46:28', 11, '1120230823074628.png', 'Diterima'),
(16, 'Celinne', 'Villa ', 'GRAB', 2147483647, 'BNI - 290000', '2023-08-23 22:35:35', '2023-08-24 22:35:35', 11, '1120230823223534.png', 'Diterima'),
(17, 'Andrean Budi Setyanto', 'taman raya bekasi blok q1 no 12', 'JNE', 2147483647, 'BCA - 23012910', '2023-08-25 10:01:29', '2023-08-26 10:01:29', 11, '1120230825100129.png', 'Diterima'),
(18, 'Andrean Budi Setyanto', 'taman raya bekasi blok q1 no 12', 'JNE', 2147483647, 'BCA - 23012910', '2023-08-26 05:47:59', '2023-08-27 05:47:59', 11, '1120230826054758.png', 'Dibatalkan'),
(19, 'Andrean Budi Setyanto', 'taman raya bekasi blok q1 no 12 Rt 005 Rw 022 Mangunjaya Tambun Selatan', 'JNE', 2147483647, 'BCA - 23012910', '2023-08-26 19:39:58', '2023-08-27 19:39:58', 11, '1120230826193958.png', 'Diterima'),
(20, 'Andrean Budi Setyanto', 'taman raya bekasi blok q1 no 12 Rt 005 Rw 022 Mangunjaya Tambun Selatan', 'JNE', 2147483647, 'BCA - 23012910', '2023-08-29 20:02:18', '2023-08-30 20:02:18', 11, '1120230829200217.png', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`, `telp`, `email`, `alamat`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 1, '', '', ''),
(11, 'Andrean Budi Setyanto', 'Andrean Budi ', '25f9e794323b453885f5181f1b624d0b', 2, '081717754778', 'andreanbudi23062001@gmail.com', 'taman raya bekasi blok q1 no 12 Rt 005 Rw 022 Mangunjaya Tambun Selatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_album_barang`
--
ALTER TABLE `tb_album_barang`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_pesanan`,`id_brg`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_album_barang`
--
ALTER TABLE `tb_album_barang`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  ADD CONSTRAINT `tb_detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id`),
  ADD CONSTRAINT `tb_detail_pesanan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
