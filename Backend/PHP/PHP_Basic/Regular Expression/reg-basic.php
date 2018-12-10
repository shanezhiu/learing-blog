<?php
	/**
	 * @Author: shane
	 * @Date:   2017-04-04 15:26:02
	 * @Last Modified by:   shanezhiu
	 * @Last Modified time: 2017-04-09 16:40:04
	 */
	// 匹配ＵＲＬ地址
	$pattern = "/^[a-zA-Z]+:\/\/[^\s]*$/";
	echo preg_match($pattern, 'http://www.baidu.com');
	echo '<hr>';
	// 匹配HTML标签
	$pattern = "/^<(\S*?)[^>]*>.*?<\/\\1>|<.*?\/$/i";
	echo preg_match($pattern, "<hr>sdf</hr><img src='sdfsd'>");
	echo '<hr>';
	// 匹配邮箱地址
	$pattern = "/^\w+([-+.]\w+)*@\w+([-+.]\w+)*\.\w+([-.]\w)*$/";
	echo preg_match($pattern, 'shanechiu@163.com.cn');
	echo '<hr>';
	echo preg_match($pattern, 'shanechiu-shane_xdsf.dfsd@163-dfkd1384.com-sdfs.cn');
	echo '<hr>';
	// 匹配图像地址
	echo preg_match("/^<img\s+[^>]*\s*src\s*=\s*([']?)(?<url>\S+)'?[^>l ]*>$/", "<img src=\"sdfsdf\">");

	echo '<hr>';
	// 匹配email,使用类原子来写模式
	echo preg_match('/^[0-9a-zA-Z]+@[0-9a-zA-Z_]+(\.[0-9a-zA-Z_]+){0,3}$/', 'shanechiu@163.com');

	echo '<hr>';
	// 断言  边界限制
	echo preg_match('/\bis\b\sis\b/', 'this is is xx',$arr);
	echo '<hr>';
	print_r($arr);
	echo '<hr>';
	echo preg_match('/is\b\sis\b/', "this is is xx",$arr);
	echo '<hr>';
	print_r($arr);
	// 验证\w是否可以匹配汉字
	echo '<hr>';
	echo preg_match('/\w/', '对方水电费干啥的');	//结果显示它并不匹配汉字

