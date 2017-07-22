/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.22 : Database - elogbook
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`elogbook` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `eventschedulebimbingan` */

DROP TABLE IF EXISTS `eventschedulebimbingan`;

CREATE TABLE `eventschedulebimbingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertemuanygke` int(11) DEFAULT NULL,
  `tanggaldiajukan` date DEFAULT NULL,
  `direncanakantgl` date DEFAULT NULL,
  `direncanakanjan` varchar(15) DEFAULT NULL,
  `tugasid` int(11) DEFAULT NULL,
  `disetujuitgl` date DEFAULT NULL,
  `disetujuijam` varchar(15) DEFAULT NULL,
  `statusid` int(11) DEFAULT NULL,
  `realisasitgl` date DEFAULT NULL,
  `realisasijam` varchar(15) DEFAULT NULL,
  `keteranganpengajuan` varchar(1500) DEFAULT NULL,
  `keteranganpembimbing` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `eventschedulebimbingan` */

insert  into `eventschedulebimbingan`(`id`,`pertemuanygke`,`tanggaldiajukan`,`direncanakantgl`,`direncanakanjan`,`tugasid`,`disetujuitgl`,`disetujuijam`,`statusid`,`realisasitgl`,`realisasijam`,`keteranganpengajuan`,`keteranganpembimbing`) values (6,NULL,'2017-07-22','2017-07-27','10:30',1,NULL,NULL,1,NULL,NULL,'agar bimbingan skripsi',NULL);

/*Table structure for table `logbimbingan` */

DROP TABLE IF EXISTS `logbimbingan`;

CREATE TABLE `logbimbingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventbimbinganid` int(11) DEFAULT NULL,
  `userlogid` int(11) DEFAULT NULL,
  `keterangan` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `logbimbingan` */

/*Table structure for table `lognotbimbingan` */

DROP TABLE IF EXISTS `lognotbimbingan`;

CREATE TABLE `lognotbimbingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventbimbinganid` int(11) DEFAULT NULL,
  `userloginid` int(11) DEFAULT NULL,
  `lognote` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lognotbimbingan` */

/*Table structure for table `maintypeuser` */

DROP TABLE IF EXISTS `maintypeuser`;

CREATE TABLE `maintypeuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertypeid` int(11) DEFAULT NULL,
  `menutypekey` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `maintypeuser` */

insert  into `maintypeuser`(`id`,`usertypeid`,`menutypekey`) values (1,3,0),(2,3,1),(3,3,2),(4,3,3),(5,3,4),(6,1,8),(7,2,8),(8,2,3),(10,1,3);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headerid` int(11) DEFAULT NULL,
  `kode` varchar(15) DEFAULT NULL,
  `namamenu` varchar(90) DEFAULT NULL,
  `menutypekey` int(11) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `icon` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`headerid`,`kode`,`namamenu`,`menutypekey`,`url`,`icon`) values (1,0,'01','Dasborad',1,NULL,'fa fa-dashboard  pull-left  fa-2x'),(2,0,'02','Master File',2,NULL,'fa fa-book  pull-left  fa-2x'),(3,0,'03','Bimbingan',3,NULL,'fa fa-comments-o  pull-left  fa-2x'),(4,0,'04','Laporan',4,NULL,'fa fa-list pull-left fa-2x'),(5,2,'0201','Semester File',2,'master/semester.php',NULL),(6,2,'0202','User Type File',2,'master/usertype.php',NULL),(7,2,'0203','Status File',2,'master/status.php',NULL),(8,3,'0301','Bimbingan Tugas List',3,'bimbingan/bimbinganhome.php',NULL),(9,3,'0302','Event Bimbingan Tugas',5,NULL,NULL),(10,4,'0401','Historis Realisasi Bimbingan tugas',4,NULL,NULL),(11,2,'0204','Mahasiswa',2,'master/mahasiswa.php',NULL),(12,2,'0205','Dosen',2,'master/dosen.php',NULL);

/*Table structure for table `pembimbingtugas` */

DROP TABLE IF EXISTS `pembimbingtugas`;

CREATE TABLE `pembimbingtugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tugasid` int(11) DEFAULT NULL,
  `pembimbingid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembimbingtugas` */

/*Table structure for table `semester` */

DROP TABLE IF EXISTS `semester`;

CREATE TABLE `semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodesemester` varchar(3) DEFAULT NULL,
  `namasemester` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `semester` */

insert  into `semester`(`id`,`kodesemester`,`namasemester`) values (1,'I','Semester I'),(2,'II','Semester II'),(3,'III','Semester III'),(4,'IV','Semester IV');

/*Table structure for table `statusbimbingan` */

DROP TABLE IF EXISTS `statusbimbingan`;

CREATE TABLE `statusbimbingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `statusbimbingan` */

insert  into `statusbimbingan`(`id`,`keterangan`) values (1,'Ajukan'),(2,'Terima'),(3,'Tolak');

/*Table structure for table `tugas` */

DROP TABLE IF EXISTS `tugas`;

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ygdibimbingid` int(11) DEFAULT NULL,
  `pembimbingsatuid` int(11) DEFAULT NULL,
  `pembimbingduaid` int(11) DEFAULT NULL,
  `tanggalmulai` date DEFAULT NULL,
  `semesterid` int(11) DEFAULT NULL,
  `judultugas` varchar(1500) DEFAULT NULL,
  `keterangan` varchar(3000) DEFAULT NULL,
  `jumlahpertemuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tugas` */

insert  into `tugas`(`id`,`ygdibimbingid`,`pembimbingsatuid`,`pembimbingduaid`,`tanggalmulai`,`semesterid`,`judultugas`,`keterangan`,`jumlahpertemuan`) values (1,2,5,4,'2017-07-25',1,'rwerewr','werewr',0);

/*Table structure for table `usertbl` */

DROP TABLE IF EXISTS `usertbl`;

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `userpassword` varchar(30) DEFAULT NULL,
  `usertypeid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `usertbl` */

insert  into `usertbl`(`id`,`userid`,`username`,`nim`,`userpassword`,`usertypeid`) values (1,'admin','admin','1111','123456',3),(2,'herman','Herman','2222','123456',2),(3,'andi','Andi','3333','123456',2),(4,'santi','ibu santi','4444','123456',1),(5,'heru','bpk Heru','1234','123456',1);

/*Table structure for table `usertype` */

DROP TABLE IF EXISTS `usertype`;

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(150) DEFAULT NULL,
  `admin` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usertype` */

insert  into `usertype`(`id`,`keterangan`,`admin`) values (1,'Dosen Pembimbing',0),(2,'Mahasiswa',0),(3,'Admin',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
