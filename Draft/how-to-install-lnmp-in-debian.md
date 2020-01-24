# Debian9下源码安装LNMP

## 一、前言

  之前，我的开发环境是Windows-10+PHP-7.1+Nginx-1.10+MariaDB-10.1。

后面开发需要使用到memcached,redis等nosql比较多，而在Windows下定制难度，PHP拓展compile难度还是比较大的。

所以促使我转向Linux下开发。

首先，我search了一下，主要是Red Hat 与Debian。

Red Hat：商业版，Centos，Fedora
Debian: Debian,Ubuntu

我选择了Debian 9,PHP-7.2,MariaDB-10.2,Nginx-1.13


## 二、Requirements

> 一般安装顺序，mariadb > nginx > php，以下的涉及的软件，库名均是基于Debian(Ubuntu)。

### 2.1 PHP的需要的额外库：
    
    ## 源码需要的词法分析器
    apt install bison
    ## 源码都是c程序，需要c编译器，注意编译器版本
    apt install gcc-6
    ## C++编译器
    apt install g++
    ## xml解析库
    apt install libxml2 libxml2-dev
    ## make cmake m4 autoconf
    apt install make cmake m4 autoconf
    ## webp 格式，能够带来更小体积的图片
    apt install libwebp6 libwebp-dev
    ## jpeg格式支持
    apt install libjpeg-dev
    ## png格式支持
    apt install libpng-dev
    ## 免费开源字体引擎
    apt install libfreetype6 libfreetype6-dev
    ## ssl加密库支持（源码安装openssl，可以选择使用Debian 包来安装openssl）
    apt install openssl
    ## ssh2 库（源码安装）
    apt install libssh2-1-dev
    ## mhash 库
    apt install libmhash2
    ## zlib 压缩库(源码安装)
    apt install zlib1g zlib1g-dev
    ## pcre 正则表达式库(源码安装)
    apt install libpcre3-dev libpcre3
    ## gzip
    apt install gzip
    ## bz2
    apt install libbz2-1.0 libbz2-dev
    ## soduim php7.2新特性 现代加密标准
    apt install libsodium-dev
    ## argon2 php7.2新特性 新的加密函数，由PHC(Password Hashing Competition)发布
    apt install argon2 libargon2-0 libargon2-0-dev

### 2.2 Nginx 需要的额外库

  主演是三个，openssl,zlib,pcre,可以通过Debian本身的库安装，也可以选择源码安装。我选择后者，所以，

并不会与上面的冲突，后面会涉及到原因。

### 2.3 MariaDB 需要的额外库

    ## bison词法分析器
    apt install bison
    ## libncurses 一个可用于编写独立终端基于文本的的程序库
    apt install libncurses5 libncurses5-dev
    ## libevent-dev 一个事件库
    apt install libevent-dev
    ## openssl 一个加密库
    apt install openssl
    

## 三、 安装过程
 
  按照MariaDB > Nginx > PHP的顺序安装，安装前请再次检查上述所需的额外库都已安装。

### 3.1 对应的系统用户创建

  为什么要创建用户？
  答：因为安装完成后，我们只需要这些程序只用于系统服务就好（daemon或者其他自己运行的进程)，并不需要使用一个具体用户身份去操作他。即创建系统账户，以及系统用户组。

    groupadd -r mysql
    useradd -r -g mysql -s /bin/false   -M mysql
    mkdir /usr/local/data/mysql
    chown -R mysql:mysql /usr/local/data/mysql 

> note 参数含义
    
    通过man groupadd 或者man useradd 可以调出具体的手册

    -r  创建系统用户或者用户组
    -g  指定用户所属用户组
    -s  指定用户登录shell名字，sh,bash,因为是系统用户，并不需要，设置 /bin/false或者/usr/sbin/nologin
    -M  不创建用户主目录
    
同样，分别创建nginx,php-fpm

    groupadd -r php-fpm
    useradd -r -g php-fpm -s /bin/false -M php-fpm
    
    groupadd -r nginx
    useradd -r -g nginx -s /bin/false -M nginx 

### 3.2 MariaDB

  MariaDB 安装可能略显麻烦，并不是常见的make方式，而是cmake方式。
  
  获取mariadb-10.2源码
    wget http://mirror.jaleco.com/mariadb//mariadb-10.2.12/source/mariadb-10.2.12.tar.gz 
    tar -zxvf mariadb-10.2.12.tar.gz
    mkdir build-mariadb
    cd build-mariadb
    cmake ../ -DCMAKE_INSTALL_PREFIX=/opt/soft/mariadb-10.2 \
    -DMYSQL_DATADIR=/data/mysql \
    -DSYSCONFDIR=/etc \
    -DWITHOUT_TOKUDB=1 \
    -DWITH_INNOBASE_STORAGE_ENGINE=1 \
    -DWITH_ARCHIVE_STPRAGE_ENGINE=1 \
    -DWITH_BLACKHOLE_STORAGE_ENGINE=1 \
    -DWIYH_READLINE=1 \
    -DWIYH_SSL=system \
    -DVITH_ZLIB=system \
    -DWITH_LOBWRAP=0 \
    -DMYSQL_UNIX_ADDR=/tmp/mysql.sock \
    -DDEFAULT_CHARSET=utf8 \
    -DDEFAULT_COLLATION=utf8_general_ci
    make && make install 
如果失败 使用 rm -rf CMakeCache.txt

#### 3.2.1 配置MariaDB

    vim /etc/profile.d/mariadb.sh
    
add
 ```export PATH=$PATH:/opt/soft/mariadb-10.2/bin```

   
    source /etc/profile.d/mariadb.sh

    cd /opt/soft/mariadb-10.2
    scripts/mysql_install_db --user=mysql --datadir=/usr/local/data/mysql

 成功输出信息：

    Installing MariaDB/MySQL system tables in '/data/mysql' ...
    OK

    To start mysqld at boot time you have to copy
    support-files/mysql.server to the right place for your system

    PLEASE REMEMBER TO SET A PASSWORD FOR THE MariaDB root USER !
    To do so, start the server, then issue the following commands:

    './bin/mysqladmin' -u root password 'new-password'
    './bin/mysqladmin' -u root -h localhost.localdomain password 'new-password'

    Alternatively you can run:
    './bin/mysql_secure_installation'

    which will also give you the option of removing the test
    databases and anonymous user created by default.  This is
    strongly recommended for production servers.

    See the MariaDB Knowledgebase at http://mariadb.com/kb or the
    MySQL manual for more instructions.

    You can start the MariaDB daemon with:
    cd '.' ; ./bin/mysqld_safe --datadir='/data/maria'

    You can test the MariaDB daemon with mysql-test-run.pl
    cd './mysql-test' ; perl mysql-test-run.pl

    Please report any problems at http://mariadb.org/jira

    The latest information about MariaDB is available at http://mariadb.org/.
    You can find additional information about the MySQL part at:
    http://dev.mysql.com
    Consider joining MariaDB's strong and vibrant community:
    https://mariadb.org/get-involved/


复制
    cd /opt/soft/mariadb-10.2
    cp support-files/my-large.cnf /etc/my.cnf
或者 
    cp support-files/my-large.cnf /etc/mysql/my.cnf

创建系统启动脚本(使用systemd)
    cd /etc/systemd/system
    vim mysqld.service 

    [Unit]
    Description=MariaDB Server
    After=network.target

    [Service]
    ExecStart=/opt/soft/mariadb-10.2/bin/mysqld --defaults-file=/etc/mysql/my.cnf  --datadir=/usr/local/data/mysql --socket=/tmp/mysql.sock
    User=mysql
    Group=mysql
    WorkingDirectory=/opt/soft/mariadb-10.2

    [Install]
    WantedBy=multi-user.target

    systemctl daemon-reload
    systemctl restart mysqld.service
    systemctl status mysqld.servie 

如果没有启动,请使用```journalctl -xn``` 或者 ```journalctl -xl```来查看错误信息

如果想开机启动，请使用```systemctl enable mysqld.service```



安全设置

    
    $:mysql_secure_installation 
    
    Enter current password for root (enter for none):     输入当前root密码(没有输入)

    Set root password? [Y/n]     设置root密码?(是/否)

    New password:    输入新root密码

    Re-enter new password:        确认输入root密码

    Password updated successfully!         密码更新成功

    By default, a MariaDB installation has an anonymous user, allowing anyone
    to log into MariaDB without having to have a user account created for
    them.  This is intended only for testing, and to make the installation
    go a bit smoother.  You should remove them before moving into a
    production environment.

    默认情况下,MariaDB安装有一个匿名用户,
    允许任何人登录MariaDB而他们无需创建用户帐户。
    这个目的是只用于测试,安装去更平缓一些。
    你应该进入前删除它们生产环境。

    Remove anonymous users? [Y/n]         删除匿名用户?(是/否)

    Normally, root should only be allowed to connect from 'localhost'.  This
    ensures that someone cannot guess at the root password from the network.

    通常情况下，root只应允许从localhost连接。
    这确保其他用户无法从网络猜测root密码。

    Disallow root login remotely? [Y/n]     不允许root登录远程?(是/否)

    By default, MariaDB comes with a database named 'test' that anyone can
    access.  This is also intended only for testing, and should be removed
    before moving into a production environment.

    默认情况下，MariaDB提供了一个名为“测试”的数据库，任何人都可以访问。
    这也只用于测试，在进入生产环境之前应该被删除。

    Reloading the privilege tables will ensure that all changes made so far
    will take effect immediately.

    重新加载权限表将确保所有到目前为止所做的更改将立即生效。

    Reload privilege tables now? [Y/n]      现在重新加载权限表(是/否)

    All done!  If you've completed all of the above steps, your MariaDB
    installation should now be secure.

    全部完成!如果你已经完成了以上步骤,MariaDB安装现在应该安全。

    Thanks for using MariaDB!





至此，mariaddb已经安装完成，可以使用 ps -aux | grep mysql 查看服务

现在测试一下，```mysql -u root -p``` 或者 ```mysql -h localhost -P 5001 -u shanechiu -p ```

## 3.3 PHP 安装

PHP 安装比较简单，主要是选择你要安装的拓展或者需要开启的功能

可以使用```./configure --help 来浏览源码安装提供的安装选项

有些属于PHP内置的功能，你只需要 enable或者disable，比如php-fpm，是需要启用的。

有些拓展是可以动态加载的，称之为shared extension,但是官方也说了，并不是所有的拓展都是能够shared.

获取源码：
wget http://am1.php.net/distributions/php-7.2.1.tar.bz2
解压：
    tar -xvf php-7.2.1.tar.bz2
    cd php-7.2.1
    ./configure --prefix=/opt/soft/php7.2 \
    --with-config-file-path=/opt/soft/php7.2/etc \
    --with-mysql-sock=/tmp/mysql.sock \
    --with-openssl \
    --with-mhash \
    --with-mysqli=shared,mysqlnd \
    --with-pdo-mysql=shared,mysqlnd \
    --with-pdo-pgsql=/opt/soft/pgsql \
    --with-gd \
    --with-iconv \
    --with-zlib \
    --enable-exif \
    --enable-intl \
    --enable-calendar \
    --enable-zip \
    --enable-inline-optimization \
    --disable-debug \
    --disable-rpath \
    --enable-shared \
    --enable-xml \
    --enable-bcmath \
    --enable-shmop \
    --enable-mbregex \
    --enable-mbstring \
    --enable-ftp \
    --enable-sysvmsg \
    --enable-sysvsem \
    --enable-sysvshm \
    --enable-pcntl \
    --enable-sockets \
    --enable-ipv6 \
    --with-bz2 \
    --with-xmlrpc \
    --enable-soap \
    --without-pear \
    --with-gettext \
    --enable-session \
    --with-curl=/opt/soft/curl7.57--enable-debug \
    --with-jpeg-dir \
    --with-png-dir \
    --with-freetype-dir \
    --enable-opcache \
    --enable-fpm \
    --with-fpm-user=nginx \
    --with-fpm-group=nginx \
    --with-sodium \
    --with-libxml-dir \
    --with-password-argon2 \
    --without-gdbm \
    --with-pcre-regex \
    --with-pcre-jit \
    --enable-fast-install \
    --disable-fileinfo
 配置
进入源码文件，cp php.ini.development /opt/soft/php-7.2/php.ini
修改以下部分
extension_dir=/opt/soft/php-7.2/lib/php/extensions/no-debug-non-zts-20170718/
extension=mysqli
time_zone=PRC

PHP-FPM启动脚本(systemd)
PHP 非常人性化，在源码目录下/sapi/fpm下可以找到php-fpm.service文件，复制到/etc/systemd/system/php-fpm.service中
systemdctl start php-fpm.service
systemdctl status php-fpm.service
如果发生错误，使用journalctl -xn查看具体错误信息
开启动，sytemctl enable php-fpm.service

同时要添加php-fpm配置文件，安装目录下etc/ 下 cp php-fpm.conf.default php-fpm.conf cp php.conf.d/www.conf.default
 php.conf.d/www.conf



## 四、参考资料

1. [systemd 入门教程](http://www.ruanyifeng.com/blog/2016/03/systemd-tutorial-commands.html "systemd入门教程")
2. [CentOS7.3编译安装MariaDB10.2.6](https://segmentfault.com/a/1190000009909776 "CentOS7.3编译安装MariaDB10.2.6")
3. [CentOS7.3编译安装php7.1](https://segmentfault.com/a/1190000009909817 "CentOS7.3编译安装php7.1")
4. [GNU bison](https://zh.wikipedia.org/wiki/GNU_bison "GNU bison")
5. [GD-support configure PHP](http://php.net/manual/en/image.installation.php "GD-support configure PHP")
6. [Argon2](https://en.wikipedia.org/wiki/Argon2 "Argon2")
7. [The Sodium crypto library (libsodium)](https://download.libsodium.org/doc/ "The Sodium crypto library (libsodium)")
8. [get the mariadb code,buildit,test it](https://mariadb.org/get-involved/getting-started-for-developers/get-code-build-test/ "Get the code, build it, test it")
9. [Generic Build Instructions](https://mariadb.com/kb/en/library/generic-build-instructions/ "Generic Build Instructions")
10. [Installing System Tables (mysql_install_db)](https://mariadb.com/kb/en/library/installing-system-tables-mysql_install_db/ "Installing System Tables (mysql_install_db)")
11. ["Compiling MariaDB From Source"](https://mariadb.com/kb/en/library/compiling-mariadb-from-source/ "Compiling MariaDB From Source")
12. [ncurses](https://zh.wikipedia.org/zh-hans/Ncurses "ncurses")
13. [CMake](https://cmake.org/cmake/help/latest/index.html "CMake document")
14. [php-manul](http://php.net/manual/en/install.unix.nginx.php "Install-php-manual")
15. [PHP7.2 NEW FEATURE](http://php.net/manual/en/migration72.new-features.php "New features")
16. [Building nginx from Sources](http://nginx.org/en/docs/configure.html "Building nginx from Sources")
## APPEND
