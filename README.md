# 屑链生成

代码基于**基于 [CRZ.im](https://github.com/Caringor/CRZ.im) 二次开发的 [Shortlink](https://github.com/renbaoshuo/Shortlink)** 三次开发，感谢原作者们的辛勤劳动。

## 概述

这是一个网址缩短服务的网站的源代码，生成的结果包含中文字符。

Demo: [屑.㏄](https://屑.㏄/)

## 安装

### 环境准备

- `PHP 7.0+`
- `Nginx 1.15+`
- `MySQL 5.5+`
- `请确保搭配HTTPS`

### 配置修改

修改 `config.php` 的相关配置

### URL 重写规则

#### Nginx 用户

需要把 `nginx-rewrite.conf` 里面的内容添加到 `Nginx` 的配置文件里。

## 功能

- 长链转短链
- 界面简洁
- 一键复制
- 链接有效时常

## Todo List

- 其他屑功能
- More...
