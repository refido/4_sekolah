/*
Navicat MySQL Data Transfer

Source Server         : 3306
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : rapor_lte

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2018-02-26 08:33:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Sofia Jeni Agustina', 'sofia@gmail.com', 'sofia');
INSERT INTO `admin` VALUES ('1', 'refi', 'refi@berliano', 'refi'); 
-- ----------------------------
-- Table structure for guru
-- ----------------------------
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `nip` varchar(50) NOT NULL,
  `nama_gr` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guru
-- ----------------------------
INSERT INTO `guru` VALUES ('1234567890', 'rika retnaning S.pd', 'malang', 'p');

-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `id_jrsn` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jrsn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES ('1', '19', 'Rekayasa Perangkat Lunak 6');
INSERT INTO `jurusan` VALUES ('5', '25', 'Animasi');
INSERT INTO `jurusan` VALUES ('6', '19', 'Teknik Kendaraan Ringan');
INSERT INTO `jurusan` VALUES ('7', '25', 'Management Niaga');
INSERT INTO `jurusan` VALUES ('15', '19', 'Pembangkit Listrik');
INSERT INTO `jurusan` VALUES ('20', '25', 'Rekayasa Perangkat Lunak');
INSERT INTO `jurusan` VALUES ('21', '19', 'Rekayasa Perangkat Lunak');
INSERT INTO `jurusan` VALUES ('22', '19', '');
INSERT INTO `jurusan` VALUES ('23', '19', '');
INSERT INTO `jurusan` VALUES ('24', '19', 'pembangkit');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_jrsn` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `nip_genap` varchar(50) NOT NULL,
  `nip_ganjil` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES ('1', '5', '1', '056789987654876567', '', 'X-RPC');
INSERT INTO `kelas` VALUES ('4', '1', '1', '076509876545678', '', 'X-RPAl');
INSERT INTO `kelas` VALUES ('5', '15', '3', '12345567', '12345567', 'X-RPL A');
INSERT INTO `kelas` VALUES ('6', '15', '1', '1234567890', '-', 'wd');

-- ----------------------------
-- Table structure for kel_sis
-- ----------------------------
DROP TABLE IF EXISTS `kel_sis`;
CREATE TABLE `kel_sis` (
  `nis` varchar(50) NOT NULL,
  `id_kelas` int(50) NOT NULL,
  `id_tahun` int(50) NOT NULL,
  `id_jrsn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kel_sis
-- ----------------------------
INSERT INTO `kel_sis` VALUES ('12345', '4', '6', '1');
INSERT INTO `kel_sis` VALUES ('2017', '4', '25', '1');
INSERT INTO `kel_sis` VALUES ('30789', '5', '25', '15');
INSERT INTO `kel_sis` VALUES ('1', '5', '25', '15');

-- ----------------------------
-- Table structure for mapel
-- ----------------------------
DROP TABLE IF EXISTS `mapel`;
CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `semester` enum('1','2','3','4','5','6') NOT NULL,
  `kode` varchar(20) NOT NULL,
  `urutan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mapel
-- ----------------------------
INSERT INTO `mapel` VALUES ('1', '26', '19', '.l,kmjn', '5', '', '3');
INSERT INTO `mapel` VALUES ('22', '26', '19', 'Bahasa Inggris', '3', 'K-5', '-');
INSERT INTO `mapel` VALUES ('23', '25', '25', 'Bahasa Daerah', '3', 'K3', '-');
INSERT INTO `mapel` VALUES ('28', '26', '19', 'n', '2', 'k8', '-');
INSERT INTO `mapel` VALUES ('29', '27', '25', 'matematika 2', '3', '', '-');
INSERT INTO `mapel` VALUES ('30', '26', '19', 'matemtika 23', '3', '', '-');
INSERT INTO `mapel` VALUES ('31', '2', '1', '2', '3', '87', '8');
INSERT INTO `mapel` VALUES ('32', '2', '1', '2', '3', '87', '8');
INSERT INTO `mapel` VALUES ('33', '26', '19', 'w', '2', '', '-');
INSERT INTO `mapel` VALUES ('34', '26', '19', ',mnb', '2', '', '0');
INSERT INTO `mapel` VALUES ('35', '26', '19', ',mnb', '2', '', '0');
INSERT INTO `mapel` VALUES ('36', '26', '19', 'kjh', '2', '', '90');
INSERT INTO `mapel` VALUES ('37', '26', '19', 'l,k', '2', '', '8');
INSERT INTO `mapel` VALUES ('38', '26', '0', '.kjh', '4', '', '-');
INSERT INTO `mapel` VALUES ('39', '26', '0', ',lknj', '3', '', '-');
INSERT INTO `mapel` VALUES ('40', '26', '27', ',mjnhg', '3', '9876', '-');
INSERT INTO `mapel` VALUES ('78', '6', '8', '7', '', '8', '-');
INSERT INTO `mapel` VALUES ('79', '6', '8', '7', '', 'j8', '-');
INSERT INTO `mapel` VALUES ('82', '26', '27', 'kjafah', '3', 'K-5', '-');
INSERT INTO `mapel` VALUES ('83', '26', '27', 'asasasas', '2', '', '1');
INSERT INTO `mapel` VALUES ('84', '26', '27', 'z', '1', '', '1');

-- ----------------------------
-- Table structure for pel_sis
-- ----------------------------
DROP TABLE IF EXISTS `pel_sis`;
CREATE TABLE `pel_sis` (
  `nis` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pel_sis
-- ----------------------------
INSERT INTO `pel_sis` VALUES ('12345', '28', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '23', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '22', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '29', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '28', '19', '4');
INSERT INTO `pel_sis` VALUES ('2017', '23', '19', '4');
INSERT INTO `pel_sis` VALUES ('2017', '22', '19', '4');
INSERT INTO `pel_sis` VALUES ('2017', '29', '19', '4');
INSERT INTO `pel_sis` VALUES ('2017', '28', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '23', '19', '2');
INSERT INTO `pel_sis` VALUES ('2017', '23', '19', '6');
INSERT INTO `pel_sis` VALUES ('12345', '23', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '22', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '29', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '28', '19', '4');
INSERT INTO `pel_sis` VALUES ('12345', '23', '19', '2');
INSERT INTO `pel_sis` VALUES ('2017', '23', '19', '2');
INSERT INTO `pel_sis` VALUES ('12345', '22', '19', '4');

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `nis` varchar(50) NOT NULL,
  `siswa` varchar(50) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES ('', '', 'l');
INSERT INTO `siswa` VALUES ('1', 'amanda ', 'l');
INSERT INTO `siswa` VALUES ('12345', 'refi', 'l');
INSERT INTO `siswa` VALUES ('2017', 'indro', 'l');
INSERT INTO `siswa` VALUES ('30789', 'maria', 'p');

-- ----------------------------
-- Table structure for tahun
-- ----------------------------
DROP TABLE IF EXISTS `tahun`;
CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL,
  `status_smt` enum('semester ganjil','semester genap') NOT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tahun
-- ----------------------------
INSERT INTO `tahun` VALUES ('25', '2017/20190', 'non-aktif', 'semester ganjil');
INSERT INTO `tahun` VALUES ('26', '098765', 'non-aktif', 'semester ganjil');
INSERT INTO `tahun` VALUES ('27', '8009', 'aktif', 'semester ganjil');
INSERT INTO `tahun` VALUES ('28', '9876', 'non-aktif', 'semester ganjil');

-- ----------------------------
-- Table structure for tingkat
-- ----------------------------
DROP TABLE IF EXISTS `tingkat`;
CREATE TABLE `tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tingkat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tingkat
-- ----------------------------
INSERT INTO `tingkat` VALUES ('1', 'XI');
INSERT INTO `tingkat` VALUES ('3', 'X');
INSERT INTO `tingkat` VALUES ('4', 'jb');

-- ----------------------------
-- Table structure for tipe
-- ----------------------------
DROP TABLE IF EXISTS `tipe`;
CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `tipe` enum('Kelompok A','Kelompok B','Kelompok C') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `urutan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipe
-- ----------------------------
INSERT INTO `tipe` VALUES ('25', 'Kelompok C', 'Muatan Wilayah', '8');
INSERT INTO `tipe` VALUES ('26', 'Kelompok B', 'Muatan Nasional A', '-');
INSERT INTO `tipe` VALUES ('27', 'Kelompok A', 'Normatif 2', '-');
INSERT INTO `tipe` VALUES ('28', 'Kelompok A', 'aws', '-');
