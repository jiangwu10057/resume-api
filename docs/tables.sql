DROP TABLE IF EXISTS account;
CREATE TABLE `account` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int DEFAULT '0' COMMENT 'created tiem',
  `updated_time` int DEFAULT '0' COMMENT 'updated tiem',
  `password` char(32) NOT NULL COMMENT '密码',
  `mobile` char(11) NOT NULL COMMENT '手机号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

DROP TABLE IF EXISTS k;
CREATE TABLE `k` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int NOT NULL DEFAULT '0' COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT '0' COMMENT 'updated tiem',
  `uid` bigint NOT NULL DEFAULT '0' COMMENT '用户编号',
  `salt` char(32) NOT NULL DEFAULT '' COMMENT '盐',
  PRIMARY KEY (`id`),
  UNIQUE KEY `u` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='加密';

DROP TABLE IF EXISTS resume;
CREATE TABLE `resume` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int NOT NULL DEFAULT '0' COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT '0' COMMENT 'updated tiem',
  `uid` varchar(32) NOT NULL DEFAULT '' COMMENT '用户编号',
  `is_valid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为有效简历',
  `show_end_time` int NOT NULL DEFAULT '0' COMMENT '有效展示结束时间',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型 1免费在线简历 2付费在线简历',
  `share_counter` int NOT NULL DEFAULT '0' COMMENT '简历分享次数',
  `rcid` bigint NOT NULL DEFAULT '0' COMMENT '简历信息编号',
  PRIMARY KEY (`id`),
  UNIQUE KEY `u` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='简历表';

DROP TABLE IF EXISTS resume_content;
CREATE TABLE `resume_content` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int NOT NULL DEFAULT '0' COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT '0' COMMENT 'updated tiem',
  `uid` varchar(32) NOT NULL DEFAULT '' COMMENT '用户编号',
  `title` varchar(500) NOT NULL DEFAULT '' COMMENT '标题',
  `target` varchar(100) NOT NULL DEFAULT '' COMMENT '目标岗位',
  `contact` varchar(500) NOT NULL DEFAULT '' COMMENT '联系方式',
  `personal` varchar(500) NOT NULL DEFAULT '' COMMENT '个人基本信息',
  `work_experiences` longtext COMMENT '工作经历',
  `education_experiences` longtext COMMENT '教育经历',
  `skills` varchar(500) NOT NULL DEFAULT '' COMMENT '技能',
  `works` longtext NOT NULL COMMENT '作品 演讲 开源项目',
  `except` varchar(500) NOT NULL DEFAULT '' COMMENT '期望',
  PRIMARY KEY (`id`),
  KEY `u` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='简历内容';

DROP TABLE IF EXISTS resume_shared;
CREATE TABLE `resume_shared` (
  `id` char(32) NOT NULL COMMENT 'primary key',
  `created_time` int NOT NULL DEFAULT '0' COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT '0' COMMENT 'updated tiem',
  `rid` bigint NOT NULL DEFAULT '0' COMMENT '简历id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='简历内容';

DROP TABLE IF EXISTS social_account;
CREATE TABLE `social_account` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `uid` bigint NOT NULL DEFAULT '0' COMMENT '账号',
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT '第三方id',
  `source` tinyint NOT NULL DEFAULT '0' COMMENT '来源 1微信 2支付宝',
  `created_time` int NOT NULL DEFAULT '0' COMMENT 'created tiem',
  `updated_time` int NOT NULL DEFAULT '0' COMMENT 'updated tiem',
  `avatarUrl` varchar(300) NOT NULL COMMENT '头像',
  `gender` tinyint(1) NOT NULL COMMENT '性别',
  `nickName` varchar(30) NOT NULL COMMENT '昵称',
  `city` varchar(20) NOT NULL COMMENT '城市',
  `country` varchar(20) NOT NULL COMMENT '国家',
  `province` varchar(30) NOT NULL COMMENT '省份',
  PRIMARY KEY (`id`),
  KEY `u` (`uid`,`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='社交账号表';