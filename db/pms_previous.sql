/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-12-17 11:51:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `rank` int(255) NOT NULL,
  `theme` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `uname` (`uname`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Admin', 'rahman', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', 'united');
