-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 03:42 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digikas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `username`, `password`) VALUES
('19523074@students.uii.ac.id', 'admin', '$2y$10$HWByVHC2Us3xuwGtKBNwTOi5iaa5SsfPxzDXUaA2xvwbHIFkijHZe');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(8) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `gambar` varchar(90) NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `tanggal`, `penulis`, `gambar`, `isi`) VALUES
(3, 'Manfaat Menabung Pada Kesehatan Mental', '2020-04-25', 'Muhammad Idris', '5fd228ee8b503.png', 'Bagi sebagian orang, menabung adalah hal yang rasanya sulit dilakukan. Terkadang tak semudah teori, menabung membutuhkan kesadaran ekstra dan kemauan yang ditanam sejak dini. Manfaat menabung tak hanya menyehatkan secara finansial, namun juga menyehatkan dari sisi mental. Manfaatnya juga tak terbatas usia, beragam keuntungan menabung berlaku bagi orang dewasa maupun anak-anak. Selain itu, sarana menabung juga semakin beragam seperti sekarang. \r\nDulu aktivitas menabung bisa dikatakan cenderung menumpuk uang di rumah seperti di bawah bantal atau celengan, alternatif lainnya dengan membuka rekening bank ( bagaimana caranya menabung). Saat ini menabung sudah meluas sembari berinvestasi seperti menabung emas, menabung saham, hingga menyimpannya di reksadana atau membeli surat utang dari uang yang disisihkan.  \r\nBerikut beberapa manfaat menabung untuk kesehatan mental: \r\nMenjauhkan dari hutang Sesuai dengan filosofi pakemnya sejak dulu, menabung yakni mengumpulkan uang sedikit demi sedikit untuk kebutuhan masa depan, baik kebutuhan yang sudah terencana maupun kebutuhan mendesak. Dengan menabung, seorang bisa terhindarkan dari hutang ketika tiba-tiba harus mengeluarkan pengeluaran untuk hal darurat seperti sakit dan sebagainya. \r\nTabungan yang mencukupi bisa menambal pengeluaran yang tak bisa ditutup dari pendapatan rutin bulanan. Beberapa orang terpaksa berhutang ke orang lain, bahkan mengajukan utang ke bank, saat terdesak untuk membayar suatu kebutuhan yang sifatnya mendesak. Tabungan di saat kondisi sulit, adalah penyelamat dari hutang Memberikan ketenangan Sejumlah penelitian yang dilakukan psikolog mengungkapkan kalau menabung juga bisa memberikan ketenangan batin. Dengan adanya cadangan uang, pikiran seseorang akan lebih terkontrol saat menghadapi situasi yang tak diduga. \r\nApa manfaat menabung? \r\nOrang yang memiliki tabungan cukup dan menyisihkan uangnya secara rutin secara mental lebih tenang dibanding mereka yang memiliki tabungan sedikit, apalagi dibandingkan dengan orang yang sama sekali tak memiliki tabungan. Lebih disiplin Menyisihkan sebagian uang dari penghasilannya cukup sulit bagi sebagian orang. Dengan menerapkan disiplin menabung, bisa dibilang adalah memaksakan orang menyisihkan uangnya untuk disimpan.  Apalagi jika tabungan dipotong di awal bulan bagi seorang yang punya penghasilan rutin sebagai karyawan. Efeknya, orang yang konsisten menabung akan berpikir dua kali untuk pengeluaran yang tidak perlu. \r\nDi sisi lain, secara tak sadar, seseorang yang rajin menabung memiliki perencanaan keuangan yang lebih rapi ketimbang mereka yang menyisihkan penghasilannya untuk ditabung. Di sisi lain, menabung juga memaksa untuk bisa melatih kesabaran. Dengan alokasi tabungan yang dipotong rutin, memaksa seseorang harus bisa sabar atau menahan diri dari membeli barang yang bukan prioritas. Orang yang memiliki tabungan cenderung memiliki hidup yang lebih optimis. Meski tabungannya kecil, jika dilakukan secara konsisten, hal tersebut bisa membangun semangat optimisme. Menabung merupakan aktivitas mengumpulkan uang bertahap. Sehingga meski nilainya kecil, ketika mengetahui saldo tabungannya semakin besar, akan mendorong orang lebih optimis dan mendorongnya lebih bekerja keras\r\n Dengan membiasakan diri untuk menabung, artinya Anda juga dapat membuat karakter atau pribadi menjadi orang yang lebih bertanggung jawab. Patuh pada tujuan utama, meski banyak sekali keinginan untuk mengeluarkan uangnya.\r\n'),
(4, 'Apa Itu Dana Darurat?', '2017-04-14', 'Mohamad Taufik Ismail', '5fd37c6617c98.jpg', 'Sebagian dari Anda pasti ada yang sudah pernah mendengar tentang dana darurat bukan? Semoga Anda sudah mengerti akan pengertian serta manfaat dari dana darurat tersebut. Untuk Anda yang belum pernah mendengar dana darurat, yuk mari kita coba bahas sebentar, semoga tulisan ini dapat bermanfaat bagi Anda.\r\n\r\nDana darurat, seperti namanya, maka ini adalah dana yang akan digunakan pada saat keadaan darurat. Mengapa harus ada dana darurat? Karena seringkali kita tidak memiliki dana khusus untuk keadaan darurat. Dana tabungan kita biasanya tersimpan di tabungan yang menjadi rekening gaji, belanja dan investasi sekaligus, tidak kita pisahkan.\r\n\r\nSekarang coba Anda bayangkan terjadi keadaan darurat pada keluarga Anda, misalnya Anda di-PHK! Ya, kemungkinan itu ada lho, untuk Anda yang karyawan. Bahkan BUMN sekalipun. Ingat kejadian Merpati Airlines? Bagaimana Anda mengantisipasinya?\r\nPakai tabungan? Uangnya adakah? Cukup sampai berapa lama? Cari pekerjaan lain? Oke.. gajinya samakah? Dapat kerjaan barunya cepatkah? Dalam seminggu? Sebulan? Setahun? Hmm.. mencari pekerjaan baru memang tidak semudah membalikkan telapak tangan.\r\n\r\nAtau ada alternatif lain.. Jual rumahkah? Langsung ada yang beli? Harganya cocokkah? Jual mobil kah? Oke langsung jual BU (butuh uang), cukup untuk berapa lama uangnya? Sebulan? 3 bulan? 6 bulan?\r\n\r\nOke.. pertanyaan-pertanyaan itu biasanya terlontar oleh sebagian dari Anda.. ada yang sama jawabannya, ada juga yang tidak. Dan bahkan ada yang bingung, tidak punya jawaban sama sekali. Masing-masing orang punya pemikirannya sendiri.\r\n\r\nWell.. inti dari jawabannya sebenarnya sama, Anda butuh dana pengganti secepat mungkin untuk menggantikan penghasilan Anda bukan? Itulah gunanya dana darurat.. Kondisinya juga tidak hanya untuk PHK, bisa juga terjadi kerusakan mobil yang cukup parah di tengah jalan, sehingga Anda butuh membeli spare part yang cukup mahal di bengkel di kota kecil yang Anda lalui bersama keluarga saat liburan misalnya, butuh uang juga kan?\r\n\r\nBisa juga Anda mengalami musibah orang tua atau saudara Anda meninggal, sedangkan jenazah harus segera diterbangkan ke kota kelahiran untuk dimakamkan, untuk pengiriman jenazah menggunakan cargo pesawat udara membutuhkan dana yang tidak sedikit. Atau keluarga Anda sakit dan harus segera dirawat dan membutuhkan jaminan dana untuk tindakan segera, masalahnya rumah sakitnya bukan provider asuransi Anda, maka Anda juga membutuhkan dana darurat pada saat itu.\r\n\r\nKondisinya bisa macam-macam tergantung pada persepsi kita masing-masing, sedarurat apakah kondisinya. Yang terpenting, apakah kita memiliki dana untuk mengatasi kondisi darurat tersebut? Apakah kita sudah menyiapkan dana jika terjadi kondisi darurat tersebut? Jika sudah, alhamdulillah.. pertanyaan berikutnya, di mana dana darurat tersebut Anda simpan?\r\n\r\nDana darurat harus ditempatkan di instrumen yang memiliki 3 kriteria berikut, aman, mudah dan cepat diakses/diperoleh, serta likuid. Misalnya tabungan dengan fasilitas ATM. Jika Anda membutuhkan dana darurat, Anda bisa segera pergi ke ATM terdekat. Bisa juga di perhiasan emas atau logam mulia yang disimpan di rumah, Anda tinggal bawa ke toko emas untuk dijual, namun likuiditasnya lebih rendah dari uang di tabungan karena Anda harus ke toko dulu, nah, siapa tahu Anda butuh uang jam 12 malam? Apakah ada toko emas yang buka?\r\n                                                                                                                                                                                                   \r\nNah, berapa besarnya dana darurat yang harus disiapkan? Pilihannya antara angka 3, 6 atau 12. Maksudnya adalah 3 atau 6 atau 12 kali pengeluaran bulanan. Jika Anda adalah seorang single, maka sediakan dana darurat 3 kali pengeluaran bulanan. Jika Anda telah berkeluarga dengan satu anak, minimal 6 kali pengeluaran bulanan. Jika Anda berkeluarga dengan dua anak atau lebih, maka sebaiknya sediakan dana darurat 12 kali pengeluaran bulanan.\r\n\r\n                                                                                                                                                                                                                                              \r\n\r\n\r\nFoto oleh Micheile Henderson pada Unsplash');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(8) NOT NULL,
  `tanggal_cat` date NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nominal` int(15) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `id_pengguna` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `tanggal_cat`, `jenis`, `nominal`, `keterangan`, `id_pengguna`) VALUES
(4, '2020-12-10', 'Pengeluaran', 200000, 'Servis Mobil', ''),
(5, '2020-12-01', 'Pemasukan', 15000000, 'Gaji', ''),
(6, '2020-12-07', 'Pengeluaran', 300000, 'Hiburan', ''),
(7, '2020-12-09', 'Pengeluaran', 350000, 'Kesehatan', ''),
(8, '2020-11-10', 'Pengeluaran', 4000000, 'Cicilan', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`email`, `username`, `password`) VALUES
('kosaka@mail.com', 'kosaka', '$2y$10$21qvrwW5xU430Uwg7kL1Fu/3nO7CoKVnX4mPDOg27SywDVwM5jrAO');

-- --------------------------------------------------------

--
-- Table structure for table `rencana`
--

CREATE TABLE `rencana` (
  `id_rencana` int(11) NOT NULL,
  `n_rencana` varchar(100) NOT NULL,
  `n_skrg` int(30) NOT NULL,
  `n_target` int(30) NOT NULL,
  `t_target` date NOT NULL,
  `id_pengguna` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rencana`
--

INSERT INTO `rencana` (`id_rencana`, `n_rencana`, `n_skrg`, `n_target`, `t_target`, `id_pengguna`) VALUES
(10, 'Dana Darurat', 3700000, 22000000, '2022-11-01', ''),
(12, 'Pendidikan', 25000000, 50000000, '2023-07-20', ''),
(14, 'Tabungan rumah impian', 180000000, 450000000, '2021-11-17', ''),
(15, 'Jalan-jalan ke Yunani', 17000000, 22000000, '2021-06-11', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id_rencana`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
