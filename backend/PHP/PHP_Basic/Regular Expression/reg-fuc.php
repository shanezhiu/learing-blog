<?php
	/**
	 * @Author: shanezhiu
	 * @Date:   2017-04-11 00:20:57
	 * @Last Modified by:   shanezhiu
	 * @Last Modified time: 2017-04-11 01:14:10
	 */



	
	/**
	 * 函数preg_match()
	 * 作用：按指定的表达式模式，对字符串进行一次搜索与匹配
	 * 语法格式：int preg_match ( string $pattern , string $subject 
	 * [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] )
	 * 两个必选参数
	 * @param      <string> <pattern> { 正则表达式模式 } 
	 * @param      <string> <subject> { 要匹配的目标字符串 }
	 * @param      <array> <matches> { 如果提供了参数matches，它将被填充为搜索结果。 $matches[0]
	 * 将包含完整模式匹配到的文本， $matches[1] 将包含第一个捕获子组匹配到的文本，以此类推。  }
	 * @return     <int> ( preg_match()返回 pattern 的匹配次数。 它的值将是0次（不匹配）或1次，因为preg_match()
	 * 在第一次匹配后 将会停止搜索。preg_match_all()不同于此，它会一直搜索subject 直到到达结尾。 
	 * 如果发生错误preg_match()返回 FALSE。  )
	 */
	function tpreg_match()
	{
		// 一个用于匹配URL的正则表达式
		$pattern = "/(https?|http?|ftp?):\/\/(www)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i";

		echo preg_match('/http\\./', 'http.');
		echo '<hr>';
		echo '/http\n/';
		echo '<hr>';
		echo "/http\n/";
		exit;


		// 被搜索字符串
		$subject = "网站为http://noapes.com/2017/04/04/regular02/的位置是Noapes博客";

		// 使用preg_match()函数进行匹配
		if(preg_match($pattern, $subject, $matches)){
			echo '搜索到的ＵＲＬ为：'.$matches[0].'<br>';		//数组中第一个元素保存全部匹配全部结果
			echo 'URL中的协议为：'.$matches[1].'<br>';			//数组第二个元素保存第一个子表达式
			echo 'URL中的主机为：'.$matches[2].'<br>';         //数组中第三个元素保存第二个子表达式
			echo 'URL中的域名为：'.$matches[3].'<br>';        //数组中第四个元素保存第三个子表达式
			echo 'URL中的顶级域名为'.$matches[4].'<br>';      // 数组中第五个元素保存第四个子表达式
			echo 'URL中的文件为：'.$matches[5].'<br>';        //数组中第六个元素保存第五个字表打死
		} else {
			echo '匹配失败';                 //如果和正则表达式没有匹配成功则输出，包括出现错误的情况
		}
	}


tpreg_match();

