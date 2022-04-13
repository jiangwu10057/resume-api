/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : 127.0.0.1:3306
 Source Schema         : resume

 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001

 Date: 13/04/2022 12:46:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account`  (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `uid` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'uid',
  `created_time` int NULL DEFAULT 0 COMMENT 'created tiem',
  `updated_time` int NULL DEFAULT 0 COMMENT 'updated tiem',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `mobile` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for k
-- ----------------------------
DROP TABLE IF EXISTS `k`;
CREATE TABLE `k`  (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int NOT NULL DEFAULT 0 COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT 0 COMMENT 'updated tiem',
  `uid` bigint NOT NULL DEFAULT 0 COMMENT '用户编号',
  `salt` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '盐',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `u`(`uid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '加密' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for resume
-- ----------------------------
DROP TABLE IF EXISTS `resume`;
CREATE TABLE `resume`  (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int NOT NULL DEFAULT 0 COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT 0 COMMENT 'updated tiem',
  `uid` bigint NOT NULL DEFAULT 0 COMMENT '用户编号',
  `is_valid` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否为有效简历',
  `show_end_time` int NOT NULL DEFAULT 0 COMMENT '有效展示结束时间',
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '类型 1免费在线简历 2付费在线简历',
  `share_counter` int NOT NULL DEFAULT 0 COMMENT '简历分享次数',
  `rcid` bigint NOT NULL DEFAULT 0 COMMENT '简历信息编号',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `u`(`uid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '简历表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for resume_content
-- ----------------------------
DROP TABLE IF EXISTS `resume_content`;
CREATE TABLE `resume_content`  (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `uid` bigint NOT NULL DEFAULT 0 COMMENT '用户编号',
  `personal` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '个人基本信息',
  `work` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '工作经历',
  `education` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '教育经历',
  `skills` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '技能',
  `works` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '作品 演讲 开源项目',
  `except` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '期望',
  `projects` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '项目',
  `created_time` int NOT NULL DEFAULT 0 COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT 0 COMMENT 'updated tiem',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `u`(`uid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '简历内容' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for resume_shared
-- ----------------------------
DROP TABLE IF EXISTS `resume_shared`;
CREATE TABLE `resume_shared`  (
  `id` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'primary key',
  `created_time` int NOT NULL DEFAULT 0 COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT 0 COMMENT 'updated tiem',
  `rid` bigint NOT NULL DEFAULT 0 COMMENT '简历id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '简历内容' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for social_account
-- ----------------------------
DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account`  (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `uid` bigint NOT NULL DEFAULT 0 COMMENT '账号',
  `openid` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '第三方id',
  `source` tinyint NOT NULL DEFAULT 0 COMMENT '来源 1微信 2支付宝',
  `created_time` int NOT NULL DEFAULT 0 COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT 0 COMMENT 'updated tiem',
  `avatarUrl` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '头像',
  `gender` tinyint(1) NOT NULL COMMENT '性别',
  `nickName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '昵称',
  `city` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '城市',
  `country` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '国家',
  `province` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '省份',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `u`(`uid`, `openid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '社交账号表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int NULL DEFAULT 0 COMMENT 'created tiem',
  `updated_time` int NULL DEFAULT 0 COMMENT 'updated tiem',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
