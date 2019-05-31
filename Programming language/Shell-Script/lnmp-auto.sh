#!/bin/sh

# lnmp开发环境自动化安装脚本,源码安装脚本
# lnmp安装顺序一般为MariaDB > Nginx > PHP
# 同时还需要源码安装redis，memcahce-nosql服务

# PHP，Nginx,MariaDB,memcached,redis服务将使用systemd管理
# PHP systemd服务比较简单，在源码sapi下自带php-fpm.service文件.
# Nginx systemd服务可以在官网找到service 例子，可修改为当前环境
# 为了保持使用最新的开发库，几个重要的工具也是用源码安装
# 比如curl，ssh,pcre最新的开发库，openssl开发库
# 为了统一管理，lnmp及相应的nosql工具将安装在/opt/soft内,相关文件将会下载在/opt/src内
# curl工具也将安装在/opt/soft内

# C/C++工程构建工具
echo "将安装C/C++工程构建工具"
apt -y install bison cmake make m4 g++ autoconf

# MariaDB-10.1.2 Install
## 需要额外安装的工具
echo "MariaDB 需要libnucrues,libevent-dev"
apt -y install libnucrues libevent-dev

# 请选择你的安装目录

# PHP-7.2.1

# Nginx-1.13

# Redis-4.0.7

# Mecached-1.5.4


