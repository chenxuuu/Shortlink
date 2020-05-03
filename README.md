# 屑链生成

代码基于**基于 [CRZ.im](https://github.com/Caringor/CRZ.im) 二次开发的 [Shortlink](https://github.com/renbaoshuo/Shortlink)** 三次开发，感谢原作者们的辛勤劳动。

## 概述

这是一个网址缩短服务的网站的源代码，生成等待结果包含中文字符。

Demo: [屑.㏄](https://屑.㏄/)

## 安装

### 环境准备

+ `PHP 7.0+`
+ `Nginx 1.15+`
+ ~~`MySQL 5.5+`~~ （目前还不需要）

### 配置修改

修改 `config.php` 的相关配置并把 `inc` 目录权限设置为 `755` 即可。

### URL 重写规则

#### Apache 用户

直接使用 `.htaccess` 文件即可。

#### Nginx 用户

需要把 `nginx-rewrite.conf` 里面的内容添加到 `Nginx` 的配置文件里。

## 功能

+ 长链转短链
+ 界面简洁
+ 一键复制

## Todo List

+ 增加 `MySQL` 支持
+ More...
