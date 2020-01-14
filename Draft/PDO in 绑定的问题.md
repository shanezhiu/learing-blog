## PDO 使用中 where in 绑定的问题()

	 find_in_set(str,strlist)
	 cast(id as char)
	 sql 语句：
		>>> 1. $sql = "select * from $this->table where id in (:aids) and status = 1 "; //被注释掉的信息，因为其返回的结果是in('1,2,3,4,5,6,7,8'),带single quote的在mysql里解析的结果是出错的。
		>>> 2.$sql = "select * from $this->table where find_in_set(cast(id as char), :aids) and status = 1 ";
		>>> 3.
		$tmp = $this->db()->createCommand($sql)->bindValue(':aids',$aids)->queryAll();


### 状况：
   1. `find_in_set('1','1,2')`; 结果为全部
   2. `find_in_set(id,'1,2')`; 如果id字段在数据表里存在，那么返回id为1，2的记录
   	  否则，报错
   3. 如果`find_in_set('3','1,2')`；3不在1，2这个字符串里，那么返回结果为空


## url 处理

1. `urlencode`,`urldecode`,`html_build_query`

## 文本处理
1. `addslashes`,`htmlspecialchars('','转义类型')`,`mysqli_real_eacape_string`,`PDO::quote`,`pdo::prepare()`

## SQL functions
1. find_in_set(str,strlist)
2. cast(column as type)

参考资料：
	
1. [https://stackoverflow.com/questions/920353/can-i-bind-an-array-to-an-in-condition](https://stackoverflow.com/questions/920353/can-i-bind-an-array-to-an-in-condition "Can I bind an array to an IN() condition?")
2. [https://stackoverflow.com/questions/1586587/pdo-binding-values-for-mysql-in-statement](https://stackoverflow.com/questions/1586587/pdo-binding-values-for-mysql-in-statement "PDO binding values for MySQL IN statement")
3. [https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_find-in-set](https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_find-in-set "mysql-doc")
4. [https://stackoverflow.com/questions/134099/are-pdo-prepared-statements-sufficient-to-prevent-sql-injection](https://stackoverflow.com/questions/134099/are-pdo-prepared-statements-sufficient-to-prevent-sql-injection)
5. [https://stackoverflow.com/questions/5741187/sql-injection-that-gets-around-mysql-real-escape-string/12118602#12118602](https://stackoverflow.com/questions/5741187/sql-injection-that-gets-around-mysql-real-escape-string/12118602#12118602)
6. [[[https://stackoverflow.com/questions/2269840/how-to-apply-bindvalue-method-in-limit-clause](https://stackoverflow.com/questions/2269840/how-to-apply-bindvalue-method-in-limit-clause)](https://stackoverflow.com/questions/18157981/php-pdo-passing-variables-in-functions)](https://stackoverflow.com/questions/9726597/pdo-bindvalue-does-not-work-where-like-statement)
7. [https://stackoverflow.com/questions/5877892/php-and-mysql-single-quote-or-double-quote](https://stackoverflow.com/questions/5877892/php-and-mysql-single-quote-or-double-quote)
8. [https://stackoverflow.com/questions/8559363/base64-encode-uploaded-file-then-save-in-database](https://stackoverflow.com/questions/8559363/base64-encode-uploaded-file-then-save-in-database)
9.[https://stackoverflow.com/questions/920353/can-i-bind-an-array-to-an-in-condition](https://stackoverflow.com/questions/920353/can-i-bind-an-array-to-an-in-condition) 