-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2025 pada 04.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `navigasi_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `operasional` varchar(50) NOT NULL,
  `tiket` varchar(100) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama`, `alamat`, `deskripsi`, `operasional`, `tiket`, `latitude`, `longitude`, `gambar`, `created_at`) VALUES
(1, 'Taman Mini Indonesia Indah', 'Jl. Taman Mini Indonesia Indah, Ceger, Kec. Cipayung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13820', 'Taman Mini Indonesia Indah merupakan suatu taman hiburan bertemakan kebudayaan Indonesia di Jakarta Timur, DKI Jakarta, yang memiliki area seluas kurang lebih 147 hektare atau 1,47 kilometer persegi.', '06.00–22.00 WIB', 'Rp25.000/orang', -6.30188930, 106.89036446, 'Taman Mini Indonesia Indah.jpg', '2025-02-01 11:12:17'),
(2, 'Monumen Nasional', 'Merdeka Square, Jalan Lapangan Monas, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110', 'Monumen Nasional atau yang disingkat dengan Monas atau Tugu Monas adalah monumen peringatan setinggi 132 meter yang terletak tepat di tengah Lapangan Medan Merdeka, Jakarta Pusat.', '08.00 – 22.00 WIB', 'Gratis', -6.17526439, 106.82765705, 'Monumen Nasional.jpg', '2025-02-01 11:12:59'),
(3, 'Kawasan Wisata Kota Tua Jakarta', 'Kawasan Kota Tua, Taman Fatahillah No.1 7, RT.7/RW.7, Pinangsia, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11110', 'Distrik bersejarah tempat bangunan kolonial Belanda, museum & alun-alun ramai dengan pertunjukan jalanan.', 'Setiap Hari 08.00 – 21.00 WIB', 'Gratis', -6.13488735, 106.81428031, 'Kawasan Wisata Kota Tua Jakarta.jpeg', '2025-02-01 11:13:56'),
(4, 'Taman Impian Jaya Ancol', 'Jl. Lodan Timur No.7, RT.14/RW.10, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430', 'Taman Impian Jaya Ancol adalah sebuah taman hiburan di Jakarta Utara, Indonesia. Taman ini dioperasikan oleh PT Pembangunan Jaya Ancol Tbk. lewat anak perusahaannya PT Taman Impian Jaya Ancol, yang pada gilirannya merupakan bagian dari grup Pembangunan Jaya.', 'Setiap Hari 06.00 - 22.00 WIB', 'Rp20.000 - Rp45.000', -6.12480254, 106.83436024, 'Taman Impian Jaya Ancol.jpg', '2025-02-01 11:17:44'),
(5, 'Jakarta Aquarium Safari', 'Jl. Letjen S. Parman No.106, RT.3/RW.3, Tj. Duren Sel., Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470', 'JAQS merupakan indoor living planet terbesar di Indonesia hasil kerja sama Taman Safari Indonesia dengan Aquaria KLCC, Malaysia. Di kawasan konservasi seluas sekitar satu hektar, kami memiliki satwa air dan non-air dengan lebih dari 3500 spesies. Sentuh mereka dan beri mereka makan! Anda bisa merasakan interaksi intim dengan hewan kami. Dipandu oleh animal keeper kami yang berpengalaman, Anda dan keluarga di segala usia akan mendapatkan informasi menarik tentang Kerapu Raksasa, Penguin Humboldt, Naga Laut, dan masih banyak lagi!', 'Setiap Hari 10.00 – 19.00 WIB', 'Rp156.000', -6.17510263, 106.78986530, 'Jakarta Aquarium Safari.jpg', '2025-02-01 11:25:23'),
(6, 'Taman Margasatwa Ragunan', 'Jl. Harsono Rm Dalam No.1, Ragunan, Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12550', 'Taman Margasatwa Ragunan atau juga disebut Kebun Binatang Ragunan adalah sebuah kebun binatang yang terletak di daerah Ragunan, Pasar Minggu, Jakarta Selatan, Indonesia. Kebun binatang seluas 140 hektare ini didirikan pada tahun 1864.', 'Senin - Jumat : 07.00 - 16.00 WIB\r\nSabtu - Minggu ', 'Rp3.000 - Rp4.000 / Orang', -6.30496351, 106.82025692, 'Taman Margasatwa Ragunan.jpg', '2025-02-01 11:39:03'),
(7, 'Dunia Fantasi (Dufan)', 'Jl. Lodan Timur No.7, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430', 'Dunia Fantasi adalah sebuah Taman hiburan yang terletak di kawasan Taman Impian Ancol, Jakarta Utara, Indonesia. Yang diresmikan dan dibuka untuk umum pada tanggal 29 Agustus 1985.', 'Senin - Jumat : 10.00 – 18.00 WIB\r\nSabtu - Minggu ', 'Rp286.000', -6.12514172, 106.83379519, 'Dunia Fantasi (Dufan).jpg', '2025-02-01 11:58:28'),
(8, 'Ocean Dream Samudra', 'VRGR+6X7, Jl. Lodan timur No.7 RW.10, RT.14/RW.10, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430', 'Taman hiburan bertema air yang menampilkan pertunjukan bawah laut, akuarium, & pentas hewan laut.', 'Setiap Hari 09.00 - 17.00 WIB', 'Rp121.000', -6.12496466, 106.84412611, 'Ocean Dream Samudra.jpg', '2025-02-01 12:05:50'),
(9, 'Sea World Indonesia', 'Jl. Lodan timur No.7, RT.14/RW.10, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430', 'Sea World Ancol adalah sebuah akuarium yang terdapat di dalam Taman Impian Jaya Ancol. SeaWorld Ancol didirikan dengan konsep dasar negara maritim yang secara geografis lebih banyak terdiri dari perairan daripada daratan. Pada tanggal 2 Oktober, 1992.', 'Senin - Jumat : 09.30 - 16.00 WIB\r\nSabtu - Minggu ', 'Rp84.001 - Rp288.295', -6.12634498, 106.84224990, 'Sea World Indonesia.jpeg', '2025-02-01 12:18:37'),
(10, 'Kepulauan Seribu', 'Kepulauan Seribu Kantor Kab. Adm. Kepulauan Seribu Jl. Ikan Baracuda No.14 Pulau Pramuka', 'Kabupaten Administrasi Kepulauan Seribu atau yang sering di sebut juga Kepulauan Seribu adalah sebuah kabupaten administrasi di Daerah Khusus Ibukota Jakarta, Indonesia. Wilayahnya meliputi gugusan kepulauan di Teluk Jakarta.', 'Senin - Jumat : 08.00 – 20.00 WIB\r\nSabtu - Minggu ', 'Rp5.000/orang', -5.63504695, 106.58035407, 'Kepulauan Seribu.jpg', '2025-02-01 12:34:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Dinas Pariwisata', 'dinas', 'b9ea7954d280f4d7ef50e536c9acdcf1', 'Super Admin', '2025-01-15 00:44:21'),
(2, 'Pokdarwis (Kelompok Sadar Wisata)', 'pokdarwis', '3ea59612fe675cdf7124c95c28b174f4', 'Admin', '2025-01-15 01:04:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
