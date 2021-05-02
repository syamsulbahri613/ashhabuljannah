-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2021 pada 08.05
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashhabuljannah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `kd_admin` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `notelpon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kd_admin`, `nama_admin`, `username`, `password`, `email`, `alamat`, `notelpon`) VALUES
(1, 'Ari', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 'bintaro', ''),
(2, 'miftahul jannah', 'miftah', '202cb962ac59075b964b07152d234b70', 'miftahuljannah@gmail.com', 'jl. haji some', '08978755656');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `kd_berita` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tgl_terbit` varchar(20) NOT NULL,
  `image_berita` varchar(100) NOT NULL,
  `kd_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`kd_berita`, `judul`, `isi`, `tgl_terbit`, `image_berita`, `kd_admin`) VALUES
(1, 'Memperingati Lebaran anak yatim 10 muharram, santunan yatim di moment lebaran yatim ', 'Momentum 10 Muharram dijadikan sebagai Idul Yatama, berdasarkan anjuran untuk menyantuni anak-anak yatim pada hari tersebut. Dalam sebuah hadis disebutkan bahwa Rasulullah SAW sangat menyayangi anak-anak yatim. Beliau lebih menyayangi lagi pada hari Asyura (tanggal 10 Muharram).\r\n\r\noleh sebab itu ash-habul jannah mengajak kita semua untuk berpartisipasi dalam program yatim dan duafa untuk periode 21 agustus 2020. semoga kita semua di berikan kelapangan dan dibukakan pintu rezeki yang seluas-luasnya oleh allah SWT.\r\n\r\natas perhatiannya terimakasih, Selamat hari raya idul yatama 10 muharram 1436 H', '2020-07-22', 'shaum-muharam.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `kd_donasi` int(11) NOT NULL,
  `tanggal_donasi` varchar(20) NOT NULL,
  `jumlah` int(1) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `kd_program` int(11) NOT NULL,
  `kd_admin` int(11) DEFAULT NULL,
  `notif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`kd_donasi`, `tanggal_donasi`, `jumlah`, `keterangan`, `status`, `kd_user`, `kd_program`, `kd_admin`, `notif`) VALUES
(69, '2021-02-08', 150000, 'semoga bermanfaat', 'Success', 11, 4, 2, 'Transaksi Anda Berhasil Diproses, Trimakasih sudah bergabung dalam program kami ! '),
(70, '2021-02-08', 500000, 'semoga bermanfaat', 'Success', 5, 4, 1, 'Transaksi Anda Berhasil Diproses, Trimakasih sudah bergabung dalam program kami ! '),
(71, '2021-02-09', 50000, 'semoga bermanfaat', 'Success', 11, 4, 1, 'Transaksi Anda Berhasil Diproses, Trimakasih sudah bergabung dalam program kami ! '),
(72, '2021-02-09', 100000, '', 'Gagal', 11, 3, 1, 'Transaksi Anda Gagal Diproses. Harap priksa kembali data donasi dan bukti transaksi anda dan lakukan transaksi kembali trimakasih !'),
(73, '2021-02-09', 50000, '', 'Proses', 11, 4, NULL, 'Transaksi Anda Sedang Diproses Trimakasih ! '),
(74, '2021-02-13', 100000, 'semoga dapat berbarti bagi merka yang membutuhkan', 'Success', 5, 4, 1, 'Transaksi Anda Berhasil Diproses, Trimakasih sudah bergabung dalam program kami ! '),
(75, '2021-02-05', 50000, 'semoga bermanfaat', 'Gagal', 5, 3, 1, 'Transaksi Anda Gagal Diproses. Harap priksa kembali data donasi dan bukti transaksi anda dan lakukan transaksi kembali trimakasih !'),
(76, '2021-02-01', 200000, 'barakallah', 'Proses', 12, 4, NULL, 'Transaksi Anda Sedang Diproses Trimakasih ! '),
(77, '2021-02-04', 20000, 'semoga dapat membantu mereka yang membutuhkan meskipun sedikit', 'Success', 12, 3, 1, 'Transaksi Anda Berhasil Diproses, Trimakasih sudah bergabung dalam program kami ! ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `kd_fb` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `status_komentar` varchar(10) NOT NULL,
  `reply` text NOT NULL,
  `kd_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`kd_fb`, `kd_user`, `komentar`, `status_komentar`, `reply`, `kd_admin`) VALUES
(29, 11, 'Tolong di tampilannya di buat lebih menarik.', 'On', 'trimakasih atas masukan dan sarannya.', 1),
(30, 5, 'sukses selalu ash-habul jannah\r\n', 'Off', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `kd_konfirmasi` int(11) NOT NULL,
  `tgl_transfer` varchar(20) NOT NULL,
  `namarek` varchar(30) NOT NULL,
  `kd_donasi` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`kd_konfirmasi`, `tgl_transfer`, `namarek`, `kd_donasi`, `image`) VALUES
(73, '2021-02-08', 'Muhammad wahyu', 69, 'test.jpg'),
(74, '2021-02-08', 'syamsul ', 70, 't2.jpg'),
(75, '2021-02-09', 'wahyudianto', 71, 't21.jpg'),
(76, '2021-02-10', 'wahyu', 72, 'test1.jpg'),
(77, '2021-02-11', 'budi', 73, 'test2.jpg'),
(78, '2021-02-14', 'syahrizal ari', 74, 'solaria-pasaraya-grande.jpg'),
(79, '2021-02-13', 'syahrizala', 75, 'solaria-pasaraya-grande1.jpg'),
(80, '2021-02-13', 'agus ', 77, 'ReceiptSwiss.jpg'),
(81, '2021-02-12', 'agus suhendara', 76, 'struk-pembayaran-tagihan-listrik-indomaret.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `kd_keluar` int(11) NOT NULL,
  `tgl_keluar` varchar(20) NOT NULL,
  `judul_keluar` text NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kd_program` int(11) NOT NULL,
  `kd_admin` int(11) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `ket1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `ket2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `ket3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `ket4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`kd_keluar`, `tgl_keluar`, `judul_keluar`, `keterangan`, `jumlah`, `kd_program`, `kd_admin`, `foto1`, `ket1`, `foto2`, `ket2`, `foto3`, `ket3`, `foto4`, `ket4`) VALUES
(9, '2021-02-08', 'Penyaluran Jumat Berkah Periode 12 Februari 2021', 'Nasi Box 70 box\r\nJeruk 70 buah\r\nayam 70 potong\r\nair mineral 2 dus', 500000, 4, 1, 'IMG-20201007-WA0015.jpg', 'nasi box 70 box', 'IMG-20201007-WA0013.jpg', 'Penyaluran jumat berkah februari 2021', 'IMG-20201007-WA0022.jpg', 'Penyaluran jumat berkah kepada pekera kebersihan kawasan bintaro sektor 9', 'IMG-20201007-WA0024.jpg', 'penyaluran jumat berkah ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `kd_program` int(11) NOT NULL,
  `nama_program` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `image_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`kd_program`, `nama_program`, `deskripsi`, `image_program`) VALUES
(3, 'program Yatim Dan duafa', '\"Sebaik-baiknya rumah ialah yang didalamnya terdapat anak yatim yang dilayani dengan baik\"\r\n\r\nProgram santunan yatim dan duafa adalah program santunan bulanan yang rutin dilakukan ash-habul jannah setiap bulan sekali. yang nantinya akan di salurkan kepada anak-anak yatim yang di naungi oleh ash habul jannah dan juga para duafa yang layak dibantu khususnya untuk daerah pondok pucung kecamatan pondok aren.\r\n\r\nLembaga Organisasi Sosial Ash-Habul Jannah bertekad untuk senantiasa memberikan program-program pemberdayaan kepada yatim dan kaum duafa agar dapat tumbuh kembang secara baik, memperoleh kehidupan yang lebih baik. Oleh karna ini kami selaku pengurus mengucapkan banyak trimakasih untuk para donatur yang senantiasa mau membantu program-program kami, karna berapa pun nominal yang para donatur berikan sangat berarti untuk mereka yang membutuh kan.', 'yd.png'),
(4, 'Program jumat berkah', '\"Hari baik ini datang kembali menghampiri, bagaimana bisa kau melupakan banyak hal baik yang bisa dilakukan,\r\nbergegaslah dan berbuatlah !\"\r\n\r\nProgram jumat berkah adalah program ash-habul jannah yang di selenggarakan setiap jumat, untuk pengumpulan dananya dibuka setiap hari dan di tutup per jumat pagi. untuk dana yang masuk per jumat pagi akan di salurkan untuk periode jumat yang akan datang.\r\n\r\ntarget penerima dana jumat berkah bisa berubah - ubah sesuai periode setiap jumat. aktifitas pengeluaran dana jumat berkah akan di post sesudah selesai kegiatan.\r\n\r\nSelamat Menikmati Hari Jumat, Mari Menebarkan Senyum dan Memberikan Kasih Sayang Bersama Sedekah Supaya Lebih Berkah dan Lebih Bersyukur.\r\n\r\nAsh - habul Jannah\r\n( Peduli Yatim Dan Duafa )', 'jumatbrkah.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kd_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notelpon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kd_user`, `nama_lengkap`, `username`, `password`, `notelpon`, `email`, `alamat`) VALUES
(5, 'syamsul', 'ari', '202cb962ac59075b964b07152d234b70', '089746747467474', 'syamsulbahri21102@gmail.com', 'bintaro'),
(11, 'Wahyu Priambodo', 'wahyu', '8cbbdc3fff847eee79abadc7b693b60e', '089602616426', 'wahyupriambodo140398@gmail.com', 'Jakarta Selatan'),
(12, 'agus salim', 'agus123', 'dfafffb20eb32108bb5c75fef6f7b792', '098765767876686', 'agussalim217@gmail.com', 'pondok ranji');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`kd_berita`),
  ADD KEY `kd_admin` (`kd_admin`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`kd_donasi`),
  ADD KEY `kd_user` (`kd_user`),
  ADD KEY `kd_program` (`kd_program`),
  ADD KEY `kd_admin` (`kd_admin`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`kd_fb`),
  ADD KEY `kd_user` (`kd_user`),
  ADD KEY `kd_admin` (`kd_admin`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`kd_konfirmasi`),
  ADD KEY `kd_donasi` (`kd_donasi`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`kd_keluar`),
  ADD KEY `kd_program` (`kd_program`),
  ADD KEY `kd_admin` (`kd_admin`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`kd_program`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `kd_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `kd_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `kd_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `kd_fb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `kd_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `kd_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `kd_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`);

--
-- Ketidakleluasaan untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `user` (`kd_user`),
  ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`kd_program`) REFERENCES `program` (`kd_program`),
  ADD CONSTRAINT `donasi_ibfk_3` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`);

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `user` (`kd_user`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`);

--
-- Ketidakleluasaan untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`kd_donasi`) REFERENCES `donasi` (`kd_donasi`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`kd_program`) REFERENCES `program` (`kd_program`),
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
