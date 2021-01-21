CREATE TABLE k(
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int DEFAULT 0 NOT NULL COMMENT 'created time',
  `updated_time` int DEFAULT 0 NOT NULL COMMENT 'updated time',
  `uid` bigint DEFAULT 0 NOT NULL COMMENT '用户编号',
  `salt` char(32) DEFAULT '' NOT NULL COMMENT '盐',
  PRIMARY KEY (`id`),
  UNIQUE KEY `u` (`uid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = '加密';
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int DEFAULT '0' COMMENT 'created time',
  `updated_time` int DEFAULT '0' COMMENT 'updated time',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = '用户表';
CREATE TABLE social_account(
  uid bigint(20) NOT NULL primary key COMMENT 'primary key',
  created_time int(10) DEFAULT 0 NOT NULL COMMENT 'created time',
  updated_time int(10) DEFAULT 0 NOT NULL COMMENT 'updated time',
  openid VARCHAR(100) DEFAULT '' NOT NULL COMMENT '第三方id',
  `source` TINYINT(2) DEFAULT 0 NOT NULL COMMENT '来源 1微信 2支付宝'
) ENGINE = InnoDB DEFAULT CHARSET utf8 COMMENT '社交账号表';
create TABLE resume(
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int DEFAULT 0 NOT NULL COMMENT 'created time',
  `updated_time` int DEFAULT 0 NOT NULL COMMENT 'updated time',
  `uid` bigint(20) DEFAULT 0 NOT NULL COMMENT '用户编号',
  is_valid tinyint(1) DEFAULT 0 NOT NULL COMMENT '是否为有效简历 1有效 2过期',
  show_end_time int(10) DEFAULT 0 NOT NULL COMMENT '有效展示结束时间',
  `type` tinyint(1) DEFAULT 0 NOT NULL COMMENT '类型 1免费在线简历 2付费在线简历',
  share_counter int(10) DEFAULT 0 NOT NULL COMMENT '简历分享次数',
  `rcid` bigint(20) DEFAULT 0 NOT NULL COMMENT '简历信息编号',
  PRIMARY KEY (`id`),
  UNIQUE KEY `u` (`uid`)
) ENGINE = InnoDB DEFAULT CHARSET utf8 COMMENT '简历表';
create table resume_content(
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `created_time` int DEFAULT 0 NOT NULL COMMENT 'created time',
  `updated_time` int DEFAULT 0 NOT NULL COMMENT 'updated time',
  `uid` bigint(20) DEFAULT 0 NOT NULL COMMENT '用户编号',
  title VARCHAR(500) DEFAULT '' NOT NULL COMMENT '标题',
  `target` VARCHAR(100) DEFAULT '' NOT NULL COMMENT '目标岗位',
  contact VARCHAR(500) DEFAULT '' NOT NULL COMMENT '联系方式',
  personal VARCHAR(500) DEFAULT '' NOT NULL COMMENT '个人基本信息',
  work_experiences longtext COMMENT '工作经历',
  education_experiences longtext COMMENT '教育经历',
  skills VARCHAR(500) DEFAULT '' NOT NULL COMMENT '技能',
  works longtext NOT NULL COMMENT '作品 演讲 开源项目',
  PRIMARY KEY (`id`),
  KEY `u` (`uid`)
) ENGINE = InnoDB DEFAULT CHARSET utf8 COMMENT '简历内容';
create table resume_shared(
  `id` char(32) NOT NULL COMMENT 'primary key',
  `created_time` int DEFAULT 0 NOT NULL COMMENT 'created time',
  `updated_time` int DEFAULT 0 NOT NULL COMMENT 'updated time',
  `rid` bigint(20) DEFAULT 0 NOT NULL COMMENT '简历id',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET utf8 COMMENT '简历分享';