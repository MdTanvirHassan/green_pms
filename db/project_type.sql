/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-01-06 10:57:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `project_type`
-- ----------------------------
DROP TABLE IF EXISTS `project_type`;
CREATE TABLE `project_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT '0',
  `is_active` tinyint(4) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_type
-- ----------------------------
INSERT INTO `project_type` VALUES ('1', 'New Project', '0', '1', '1', '2019-01-06', null);
INSERT INTO `project_type` VALUES ('2', 'Existing Project', '0', '1', '1', '2019-01-06', null);
INSERT INTO `project_type` VALUES ('3', 'Pending Project1', '1', '0', '1', '2019-01-06', '2019-01-06');

-- ----------------------------
-- Table structure for `setting`
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `fieldoption` varchar(100) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fieldoption`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('address', '4th Floor, House No # 589, Road No# 09, Avenue 04, Mirpur DOHS, Mirpur-12, Dhaka-1216.');
INSERT INTO `setting` VALUES ('bg_image', 'bg-login1.jpg');
INSERT INTO `setting` VALUES ('email', 'shaheen@4axiz.com');
INSERT INTO `setting` VALUES ('footer', 'Copyright @ By Power China');
INSERT INTO `setting` VALUES ('logo', 'e1293823fd01cff73ff422b752faa0e8.png');
INSERT INTO `setting` VALUES ('phone', '01841552567');
INSERT INTO `setting` VALUES ('title', 'Power China Hubei Electric Engineering Corporation');
