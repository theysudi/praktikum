/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.33 : Database - db_praktikum
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_praktikum` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `data_buku` */

DROP TABLE IF EXISTS `data_buku`;

CREATE TABLE `data_buku` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) DEFAULT NULL,
  `kategori` varchar(250) DEFAULT NULL,
  `penerbit` varchar(250) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `data_buku` */

insert  into `data_buku`(`id`,`judul`,`kategori`,`penerbit`,`tahun_terbit`,`tanggal_pembelian`,`harga`) values 
(1,'Pemrograman Web dengan PHP dan MySQL','Teknologi','Elex Media Komputindo',2020,'2021-03-15',85000),
(2,'Pengantar Ilmu Komputer','Pendidikan','Gramedia',2018,'2021-06-20',72000),
(3,'Belajar Python untuk Pemula','Teknologi','Informatika',2021,'2022-01-10',98000),
(4,'Matematika Dasar','Pendidikan','Erlangga',2019,'2022-02-05',60000),
(5,'Fisika untuk SMA Kelas XII','Pendidikan','Yudhistira',2020,'2022-04-17',68000),
(6,'Novel Laskar Pelangi','Fiksi','Bentang Pustaka',2005,'2021-11-25',95000),
(7,'Manajemen Keuangan','Ekonomi','Salemba Empat',2019,'2022-03-22',105000),
(8,'Statistika Dasar','Pendidikan','Andi Publisher',2020,'2023-01-30',88000),
(9,'Algoritma dan Struktur Data','Teknologi','Informatika Bandung',2022,'2023-05-12',92000),
(10,'Psikologi Pendidikan','Psikologi','Rajagrafindo Persada',2021,'2023-06-18',89000),
(11,'Judul Buku','Pendidikan','Penerbit',2025,'2025-02-05',5000),
(12,'Judul Buku','Pendidikan','Penerbit',2025,'2025-02-05',5000),
(13,'Judul Buku','Pendidikan','Penerbit',2025,'2025-02-05',5000),
(14,'Judul Buku','Pendidikan','Penerbit',2025,'2025-02-05',5000),
(15,'Tambah Buku','Pendidikan','Penerbit',2025,'2025-02-02',90000);

/*Table structure for table `data_mahasiswa` */

DROP TABLE IF EXISTS `data_mahasiswa`;

CREATE TABLE `data_mahasiswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `angkatan` year(4) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_mahasiswa` */

/*Table structure for table `data_peminjaman` */

DROP TABLE IF EXISTS `data_peminjaman`;

CREATE TABLE `data_peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) DEFAULT NULL,
  `nama_peminjam` varchar(250) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `data_peminjaman` */

insert  into `data_peminjaman`(`id`,`id_buku`,`nama_peminjam`,`tgl_pinjam`,`tgl_kembali`) values 
(1,1,'John Doe','2025-06-10','2025-06-10'),
(2,1,'Andi Saputra','2025-06-01','2025-06-03'),
(3,2,'Budi Santoso','2025-06-02','2025-06-05'),
(4,3,'Citra Lestari','2025-06-03','2025-06-06'),
(5,4,'Dina Maulida','2025-06-01','2025-06-04'),
(6,5,'Eko Prasetyo','2025-06-05','2025-06-07'),
(7,6,'Fira Anjani','2025-06-04','2025-06-06'),
(8,7,'Gilang Rahman','2025-06-06','2025-06-09'),
(9,8,'Hesti Noviana','2025-06-07','2025-06-08'),
(10,9,'Indra Wijaya','2025-06-03','2025-06-05'),
(11,10,'Joko Harianto','2025-06-02','2025-06-04');

/*Table structure for table `data_user` */

DROP TABLE IF EXISTS `data_user`;

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_user` */

insert  into `data_user`(`id`,`nama`,`username`,`password`) values 
(1,'Admin Buku','admin','admin');

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
