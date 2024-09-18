/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-01-06 19:57:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `department_task_status`
-- ----------------------------
DROP TABLE IF EXISTS `department_task_status`;
CREATE TABLE `department_task_status` (
  `dept_task_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `percentage` float DEFAULT NULL,
  `status` enum('incomplete','complete','reset') DEFAULT 'incomplete',
  PRIMARY KEY (`dept_task_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of department_task_status
-- ----------------------------
