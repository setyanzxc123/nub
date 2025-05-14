-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2020 pada 15.37
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_dekripsi`
--

CREATE TABLE `rs_dekripsi` (
  `rs_dekripsi_id_ex` varchar(30) NOT NULL,
  `rs_dekripsi_id` int(11) NOT NULL,
  `rs_dekripsi_kode` varchar(12) NOT NULL,
  `rs_dekripsi_kunci` text NOT NULL,
  `rs_dekripsi_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rs_dekripsi`
--

INSERT INTO `rs_dekripsi` (`rs_dekripsi_id_ex`, `rs_dekripsi_id`, `rs_dekripsi_kode`, `rs_dekripsi_kunci`, `rs_dekripsi_file`) VALUES
('ew7J9Zlpgrsq4NssGJhR2qgHCDzxh6', 4, 'labDek-00001', 'Kunci D: 283309, Kunci N: 142661', 'labDek-00001.docx'),
('VUyXmuU9PhYE1ebkxa1BvQKGQqkNiD', 7, 'labDek-00002', 'Kunci D: 318007, Kunci N: 320233', 'labDek-00002.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_diagnosis`
--

CREATE TABLE `rs_diagnosis` (
  `rs_diagnosis_kode` varchar(5) NOT NULL,
  `rs_diagnosis_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rs_diagnosis`
--

INSERT INTO `rs_diagnosis` (`rs_diagnosis_kode`, `rs_diagnosis_nama`) VALUES
('A00.0', 'CHOLERA DUE TO VIBRIO CHOLERAE 01, BIOVAR CHOLERAE'),
('A00.1', 'CHOLERA DUE TO VIBRIO CHOLERAE 01, BIOVAR ELTOR'),
('A00.9', 'CHOLERA, UNSPECIFIED'),
('A01.0', 'TYPHOID FEVER'),
('A01.1', 'PARATYPHOID FEVER A'),
('A01.2', 'PARATYPHOID FEVER B'),
('A01.3', 'PARATYPHOID FEVER C'),
('A01.4', 'PARATYPHOID FEVER, UNSPECIFIED'),
('A02.0', 'SALMONELLA ENTERITIS'),
('A02.1', 'SALMONELLA SEPSIS'),
('A02.2', 'LOCALIZED SALMONELLA INFECTIONS'),
('A02.8', 'OTHER SPECIFIED SALMONELLA INFECTIONS'),
('A02.9', 'SALMONELLA INFECTION, UNSPECIFIED');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_enkripsi`
--

CREATE TABLE `rs_enkripsi` (
  `rs_enkripsi_id_ex` varchar(30) NOT NULL,
  `rs_enkripsi_id` int(11) NOT NULL,
  `rs_enkripsi_kode` varchar(12) NOT NULL,
  `rs_enkripsi_kunci` text NOT NULL,
  `rs_enkripsi_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rs_enkripsi`
--

INSERT INTO `rs_enkripsi` (`rs_enkripsi_id_ex`, `rs_enkripsi_id`, `rs_enkripsi_kode`, `rs_enkripsi_kunci`, `rs_enkripsi_file`) VALUES
('vpberjzx3fZTAmui3fz56DFli2wydG', 14, 'labEnk-00001', 'Kunci P: 647, Kunci Q: 787, Kunci E: 587, Kunci D: 506891, Kunci N: 509189', 'labEnk-00001.docx'),
('vvHN8X3ctT1ixinz4p63VBbJDiJid0', 15, 'labEnk-00002', 'Kunci P: 743, Kunci Q: 431, Kunci E: 303, Kunci D: 318007, Kunci N: 320233', 'labEnk-00002.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_lab_pasien`
--

CREATE TABLE `rs_lab_pasien` (
  `rs_lab_pasien_id_ex` varchar(20) NOT NULL,
  `rs_lab_pasien_pasien` varchar(11) NOT NULL,
  `rs_lab_pasien_diag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_pasien`
--

CREATE TABLE `rs_pasien` (
  `rs_pasien_id_ex` varchar(11) NOT NULL,
  `rs_pasien_id` int(11) NOT NULL,
  `rs_pasien_nama` text NOT NULL,
  `rs_pasien_jenkel` text NOT NULL,
  `rs_pasien_tmpt_lhr` text NOT NULL,
  `rs_pasien_tgl_lhr` text NOT NULL,
  `rs_pasien_kerja` text NOT NULL,
  `rs_pasien_alamat` text NOT NULL,
  `rs_pasien_telp` text NOT NULL,
  `rs_pasien_hub` text NOT NULL,
  `rs_pasien_agama` text NOT NULL,
  `rs_pasien_waktu` text NOT NULL,
  `rs_pasien_ket` text NOT NULL,
  `rs_pasien_ibu` text NOT NULL,
  `rs_pasien_ayah` text NOT NULL,
  `rs_pasien_darah` text NOT NULL,
  `rs_pasien_iden` text NOT NULL,
  `rs_pasien_rad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rs_pasien`
--

INSERT INTO `rs_pasien` (`rs_pasien_id_ex`, `rs_pasien_id`, `rs_pasien_nama`, `rs_pasien_jenkel`, `rs_pasien_tmpt_lhr`, `rs_pasien_tgl_lhr`, `rs_pasien_kerja`, `rs_pasien_alamat`, `rs_pasien_telp`, `rs_pasien_hub`, `rs_pasien_agama`, `rs_pasien_waktu`, `rs_pasien_ket`, `rs_pasien_ibu`, `rs_pasien_ayah`, `rs_pasien_darah`, `rs_pasien_iden`, `rs_pasien_rad`) VALUES
('PASIEN00001', 29, '2258500 660111 540496 984126 3363740 2640597 540496 3363740 3095303 1697313 1272213 540496 3363740 1697313 2258500 2640597 3363740', '1272213', '1272213 1697313 2000286 660111', '1719652 3171156 1719652 3171156 257284 3171156 567782 257284 2629673 1719652', '1272213 3125243 1675415 3043873 3375191 3043873 146730', '1272213 3092538 2258500 624585 1697313 1767592 660111', '3171156 3255772 1719652 1719652 1719652 3255772 3255772 2870533 567782 567782 893076 2465080', '1719652', '2629673', '3171156 567782 2046408 2629673 1719652 2046408 1719652 3171156 1719652 3171156 3095303 2629673 2870533 2076854 147661 2629673 2076854 3171156 1719652', '1870605 1697313 1524185 3363740 2640597 3095303 1697313 1870605 238833 1697313', '1870605 3363740 2640597 3363740', '1870605 660111 2000286 3363740 2640597 3363740 1769416 1989585', '1697313', '2465080 1719652 2171577 2465080 147661 147661 2465080 147661 2465080', 'pic-rad-pasien-PASIEN00001.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_pengguna`
--

CREATE TABLE `rs_pengguna` (
  `rs_pengguna_id_ex` varchar(10) NOT NULL,
  `rs_pengguna_pengguna` varchar(20) NOT NULL,
  `rs_pengguna_nama` text NOT NULL,
  `rs_pengguna_sandi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rs_pengguna`
--

INSERT INTO `rs_pengguna` (`rs_pengguna_id_ex`, `rs_pengguna_pengguna`, `rs_pengguna_nama`, `rs_pengguna_sandi`) VALUES
('LCXUO1LwnA', 'riniwulansari', '540496 3363740 2258500 3363740 3095303 1767592 660111 2000286 1697313 2258500 1870605 1697313 540496 3363740', '2629673 1719652 2171577 147661 567782'),
('YVVQcForEL', 'riniayu', '146730 878738 1730106 878738 3095303 3043873 3473991 3594907', '146730 878738 1730106 878738 3043873 3473991 3594907');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rs_dekripsi`
--
ALTER TABLE `rs_dekripsi`
  ADD PRIMARY KEY (`rs_dekripsi_id_ex`),
  ADD UNIQUE KEY `rs_dekripsi_id` (`rs_dekripsi_id`),
  ADD UNIQUE KEY `rs_dekripsi_kode` (`rs_dekripsi_kode`);

--
-- Indeks untuk tabel `rs_diagnosis`
--
ALTER TABLE `rs_diagnosis`
  ADD PRIMARY KEY (`rs_diagnosis_kode`);

--
-- Indeks untuk tabel `rs_enkripsi`
--
ALTER TABLE `rs_enkripsi`
  ADD PRIMARY KEY (`rs_enkripsi_id_ex`),
  ADD UNIQUE KEY `rs_enkripsi_id` (`rs_enkripsi_id`),
  ADD UNIQUE KEY `rs_enkripsi_kode` (`rs_enkripsi_kode`);

--
-- Indeks untuk tabel `rs_lab_pasien`
--
ALTER TABLE `rs_lab_pasien`
  ADD PRIMARY KEY (`rs_lab_pasien_id_ex`),
  ADD KEY `rs_lab_pasien_pasien` (`rs_lab_pasien_pasien`);

--
-- Indeks untuk tabel `rs_pasien`
--
ALTER TABLE `rs_pasien`
  ADD PRIMARY KEY (`rs_pasien_id_ex`),
  ADD UNIQUE KEY `rs_pasien_id` (`rs_pasien_id`) USING BTREE;

--
-- Indeks untuk tabel `rs_pengguna`
--
ALTER TABLE `rs_pengguna`
  ADD PRIMARY KEY (`rs_pengguna_id_ex`),
  ADD UNIQUE KEY `rs_pengguna_pengguna` (`rs_pengguna_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rs_dekripsi`
--
ALTER TABLE `rs_dekripsi`
  MODIFY `rs_dekripsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rs_enkripsi`
--
ALTER TABLE `rs_enkripsi`
  MODIFY `rs_enkripsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `rs_pasien`
--
ALTER TABLE `rs_pasien`
  MODIFY `rs_pasien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
