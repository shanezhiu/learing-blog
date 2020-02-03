## Memcache 与 Memcached
两者使用函数相同，但是还是有区别的。
### 1. Memcache
这是一个完全基于PHP的一个面向对象的oop.
### 2. Memcached
这个通常以守护进程的形式存在于系统，是基于libmemcached的。其它语言也可以使用。
建议使用Memcached替代Memcache


首先需要在服务器安装`Memcached`，然后再选择是安装`Memcache`还是`Memcached`拓展
只是安装PHP-Memcached 拓展依赖libmemcached拓展

## 参考资料

1. [https://serverfault.com/questions/63383/memcache-vs-memcached](https://serverfault.com/questions/63383/memcache-vs-memcached "memcache与memcached")
2. [http://lookingdream.blog.51cto.com/5177800/1908902](http://lookingdream.blog.51cto.com/5177800/1908902)
3. [http://blog.wpjam.com/m/memcache-vs-memcached/](http://blog.wpjam.com/m/memcache-vs-memcached/)