<?php

  global $config;
  $config = [];

  // 程序安装路径
  $config['path'] = '/';
  // ID 长度
  $config['length'] = 1;
  //自定义前缀url（如果不想自动获取）
  $config['url'] = '屑.㏄';
  //大标题，显示在标题上面一行
  $config['bigTitle'] = '屑.㏄';
  // 网站标题
  $config['title'] = '屑链生成';
  // 网站简介
  $config['description'] = '最屑的短链接服务站：屑到网址都不会被自动标蓝';
  //网站底部的信息
  $config['hoster'] = 'provide by <a href="https://www.chenxublog.com/">晨旭</a>';
  //链接有效期，单位天
  $config['expiry'] = 30;

  //mysql地址
  $config['mysql_host'] = "127.0.0.1";
  //mysql数据库
  $config['mysql_db'] = "shiturl";
  //用户名
  $config['mysql_user'] = "shit";
  //密码
  $config['mysql_passwd'] = "114514";

/*
CREATE TABLE `urls` (
  `uid` mediumint(8) unsigned NOT NULL auto_increment,
  `id` VARCHAR(10),
  `data` text,
  `time` datetime,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
*/
?>
