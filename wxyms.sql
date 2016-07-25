/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : wxyms

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-18 14:04:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wxyms_admin
-- ----------------------------
DROP TABLE IF EXISTS `wxyms_admin`;
CREATE TABLE `wxyms_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '姓名',
  `auth_key` varchar(50) NOT NULL DEFAULT '' COMMENT 'cookie验证密钥',
  `password_hash` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
  `password_reset_token` varchar(50) NOT NULL DEFAULT '' COMMENT '密码重置令牌',
  `access_token` varchar(50) NOT NULL DEFAULT '' COMMENT '访问令牌',
  `tel` char(12) NOT NULL DEFAULT '' COMMENT '电话 e.g. 02888888888  18888888888',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态  1:正常，0禁用 -1删除',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL COMMENT '最后登录时间',
  `last_login_ip` int(10) unsigned NOT NULL COMMENT '最后登录IP',
  `avatar` varchar(150) NOT NULL DEFAULT '' COMMENT '头像',
  `openid` char(32) NOT NULL DEFAULT '' COMMENT '管理员授权微信登录的openid',
  `last_login_source` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '最近登录来源 1帐号  2微信',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `access_token` (`access_token`) USING BTREE,
  KEY `name` (`name`) USING BTREE,
  KEY `openid` (`openid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
-- Records of wxyms_admin
-- ----------------------------
INSERT INTO `wxyms_admin` VALUES ('1', 'admin', '管理员', 'vhKd7NdTjJZWYZTwOFvL97wRTArNkpNr', '$2y$13$rfTdrgcZKnO9jiQxPMfqoeGNjpVrXtSeNAf.VDrmU24qWuHpFijQm', '', '', '02888888888', 'admin@vcyber.com', '10', '0', '1468550738', '3232238413', '', 'oxzahuBZlLsOpKM2efSrvpaMPE3s', '1');

-- ----------------------------
-- Table structure for wxyms_wechat_user
-- ----------------------------
DROP TABLE IF EXISTS `wxyms_wechat_user`;
CREATE TABLE `wxyms_wechat_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '微信昵称',
  `language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(4) NOT NULL COMMENT '性别',
  `headimgurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '头像',
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '国家',
  `province` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '省份',
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '城市',
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `refresh_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `groupid` int(11) DEFAULT NULL,
  `subscribe_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscribe` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of wxyms_wechat_user
-- ----------------------------
INSERT INTO `wxyms_wechat_user` VALUES ('16', 'ojN_qvmFu-EWtM7gWTMT8hkCOWjc', 'E', 'zh_CN', '1', 'http://wx.qlogo.cn/mmopen/SaV8OrD5BEia2dTvT0XicVCwicZNyUUSgXib3hQs3cvjs0YXkqiaP3UBos04icibvhqEmMqSqaUyere5yDdr7crfgreKGUmDMKNlOYJ/0', '中国', '四川', '成都', 'E', 'E', '2016-07-18 11:13:19', '0', '1468811599', '1');

-- ----------------------------
-- Table structure for wxyms_weixin_rule
-- ----------------------------
DROP TABLE IF EXISTS `wxyms_weixin_rule`;
CREATE TABLE `wxyms_weixin_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '使用模块  e.g.   basis',
  `action` varchar(50) NOT NULL COMMENT '动作  e.g.  event/basis/subscribe',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1启用  0禁用 -1删除',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `data` text NOT NULL COMMENT '数据  e.g. 文字信息或素材ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='微信_事件规则';

-- ----------------------------
-- Records of wxyms_weixin_rule
-- ----------------------------
INSERT INTO `wxyms_weixin_rule` VALUES ('1', '首次关注', 'event/basis/subscribe', '0', '1461118797', '');
INSERT INTO `wxyms_weixin_rule` VALUES ('2', '取消关注', 'event/basis/unsubscribe', '0', '1461118797', '');
INSERT INTO `wxyms_weixin_rule` VALUES ('3', '自动回复', 'event/basis/autoreply', '0', '1461118797', '');
INSERT INTO `wxyms_weixin_rule` VALUES ('4', '天气预报', 'event/weather/index', '0', '1461118797', '');
INSERT INTO `wxyms_weixin_rule` VALUES ('5', '笑话', 'event/api/joke', '0', '1461118797', '');

-- ----------------------------
-- Table structure for wxyms_weixin_rule_keywords
-- ----------------------------
DROP TABLE IF EXISTS `wxyms_weixin_rule_keywords`;
CREATE TABLE `wxyms_weixin_rule_keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rule_id` int(10) unsigned NOT NULL COMMENT '规则ID',
  `type` tinyint(1) unsigned NOT NULL COMMENT '匹配模式，1：全等匹配，2：包含匹配，3：正则匹配',
  `content` varchar(255) NOT NULL COMMENT '关键词',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1启用  0禁用 -1删除',
  `count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '统计使用次数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `content` (`content`) USING BTREE,
  KEY `rule_id` (`rule_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='微信_事件规则关键词';

-- ----------------------------
-- Records of wxyms_weixin_rule_keywords
-- ----------------------------
INSERT INTO `wxyms_weixin_rule_keywords` VALUES ('1', '1', '1', 'subscribe', '0', '999');
INSERT INTO `wxyms_weixin_rule_keywords` VALUES ('2', '2', '1', 'unsubscribe', '0', '8');
INSERT INTO `wxyms_weixin_rule_keywords` VALUES ('3', '3', '1', 'autoreply', '0', '10');
INSERT INTO `wxyms_weixin_rule_keywords` VALUES ('4', '5', '2', '笑话', '0', '1');
INSERT INTO `wxyms_weixin_rule_keywords` VALUES ('5', '4', '2', '天气预报', '0', '1');
