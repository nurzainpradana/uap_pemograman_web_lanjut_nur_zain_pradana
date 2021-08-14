/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 100417
Source Host           : localhost:3306
Source Database       : db_uap9117

Target Server Type    : MYSQL
Target Server Version : 100417
File Encoding         : 65001

Date: 2021-08-14 19:59:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for table_barang
-- ----------------------------
DROP TABLE IF EXISTS `table_barang`;
CREATE TABLE `table_barang` (
  `kode_barang` varchar(4) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_barang` int(8) NOT NULL,
  `jumlah_barang` int(4) NOT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of table_barang
-- ----------------------------
INSERT INTO `table_barang` VALUES ('', '', '0', '0');
INSERT INTO `table_barang` VALUES ('1', 'Baju', '80000', '5');
INSERT INTO `table_barang` VALUES ('2', 'Celana', '100000', '10');

-- ----------------------------
-- Table structure for table_barang_masuk
-- ----------------------------
DROP TABLE IF EXISTS `table_barang_masuk`;
CREATE TABLE `table_barang_masuk` (
  `kode_barang_masuk` varchar(5) NOT NULL,
  `kode_barang` varchar(4) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah_barang_masuk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of table_barang_masuk
-- ----------------------------
INSERT INTO `table_barang_masuk` VALUES ('1', '2', 'Celana', '12');
INSERT INTO `table_barang_masuk` VALUES ('123', '2', 'Celana', '123');
INSERT INTO `table_barang_masuk` VALUES ('1231', '2', 'Celana', '123');
INSERT INTO `table_barang_masuk` VALUES ('12412', '1', 'Baju', '12421');
INSERT INTO `table_barang_masuk` VALUES ('12312', '1', 'Baju', '124');
INSERT INTO `table_barang_masuk` VALUES ('12312', '1', 'Baju', '124');
INSERT INTO `table_barang_masuk` VALUES ('12313', '1', 'Baju', '123123');
INSERT INTO `table_barang_masuk` VALUES ('12341', '1', 'Baju', '123');
INSERT INTO `table_barang_masuk` VALUES ('43623', '2', 'Celana', '234');
INSERT INTO `table_barang_masuk` VALUES ('12312', '2', 'Celana', '123124');
INSERT INTO `table_barang_masuk` VALUES ('967', '1', 'Baju', '567');
SET FOREIGN_KEY_CHECKS=1;
