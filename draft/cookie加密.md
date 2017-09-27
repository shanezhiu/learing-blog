## cookie与密码加密

1. 加盐

2. 加密函数

	`md5()`,des
	`sha1()`,
	`hash()`,
	`crypt()`,
	`mcrypt`,
	密码散列函数(PHP手册推荐使用)bcrypt：password_hash(),password_verify()验证密码是否和哈希匹配
	这两个函数都推荐使用。
	
	bcrypt被很多框架使用了

	openssl加密拓展函数，openssl_encrypt()，openssl_decrypt()

> 注意：使用sha1或者MD5

#!!important
slim与laravel框架学习

	依赖注入
	container
	collector

参考链接：

1. [http://php.net](http://php.net "PHP Manual")
2. [https://stackoverflow.com/questions/5089841/two-way-encryption-i-need-to-store-passwords-that-can-be-retrieved](https://stackoverflow.com/questions/5089841/two-way-encryption-i-need-to-store-passwords-that-can-be-retrieved)
3. [https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php](https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php)
4. [https://stackoverflow.com/questions/27198572/encoding-a-bcrypt-string-with-mcrypt](https://stackoverflow.com/questions/27198572/encoding-a-bcrypt-string-with-mcrypt)
5. [https://stackoverflow.com/questions/2235158/sha1-vs-md5-vs-sha256-which-to-use-for-a-php-login](https://stackoverflow.com/questions/2235158/sha1-vs-md5-vs-sha256-which-to-use-for-a-php-login)
6. [https://stackoverflow.com/questions/39612656/what-different-between-md5-vs-hash-when-saving-password](https://stackoverflow.com/questions/39612656/what-different-between-md5-vs-hash-when-saving-password)
7. [https://stackoverflow.com/questions/14752416/php-md5-sha-hashing-security](https://stackoverflow.com/questions/14752416/php-md5-sha-hashing-security)
8. [https://www.codeigniter.com/user_guide/libraries/encryption.html](https://www.codeigniter.com/user_guide/libraries/encryption.html)