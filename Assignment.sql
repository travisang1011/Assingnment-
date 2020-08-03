-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Agu 2020 pada 11.42
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiverr_travisang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `seat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `name`, `seat`) VALUES
(1, 'B JU', '40'),
(2, 'Sri Kencana', '45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinations`
--

CREATE TABLE `destinations` (
  `id_destination` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destinations`
--

INSERT INTO `destinations` (`id_destination`, `name`, `image`, `address`) VALUES
(2, 'Jepara', '', 'Pantai kartini jepara'),
(3, 'Yogyakarta', '', 'Pelabuhan ratu'),
(4, 'Penang', '', ''),
(5, 'Kedih', '', ''),
(8, 'Tokyo', '20200728085702tokyo.jpeg', 'Central of japan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_trans` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `pickup_place` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id_trans`, `name`, `phone`, `address`, `pickup_place`, `status`, `user_id`) VALUES
(1, 'Aditya Rizki Pratama', '+6285842074674', 'Ds Dermolo RT 02/06 Kec. Kembang Kab Jepara Hp: 085842074674', 'dermolo', 0, 1),
(2, 'Aditya Rizki Pratama', '+6285842074674', 'Ds Dermolo RT 02/06 Kec. Kembang Kab Jepara Hp: 085842074674', 'kembang', 0, 1),
(3, 'haidityara', '089517542352', 'Ds Dermolo RT 02/06 Kec. Kembang Kab Jepara Hp: 085842074674', 'bangsri', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id_td` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `seat` varchar(50) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction_detail`
--

INSERT INTO `transaction_detail` (`id_td`, `travel_id`, `transaction_id`, `seat`, `price`) VALUES
(1, 3, 1, '1', '102000'),
(2, 3, 2, '1', '102000'),
(3, 4, 2, '2', '156000'),
(4, 3, 3, '1', '102000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `travels`
--

CREATE TABLE `travels` (
  `id_travel` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `start` varchar(100) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `seat_available` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `travels`
--

INSERT INTO `travels` (`id_travel`, `destination_id`, `start`, `bus_id`, `date`, `status`, `price`, `seat_available`) VALUES
(1, 2, 'Malang Agung', 1, '17/12/2020', 1, '90000', '40'),
(2, 5, 'Lombok', 1, '17/12/2020', 1, '90000', '40'),
(3, 8, 'Kyoto', 2, '04/08/2020', 1, '102000', '43'),
(4, 3, 'Jepara', 1, '04/08/2020', 1, '78000', '38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'haidityara', 'arizki@gmail.com', 'adit');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indeks untuk tabel `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id_destination`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indeks untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id_td`);

--
-- Indeks untuk tabel `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id_travel`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id_destination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_td` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `travels`
--
ALTER TABLE `travels`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
