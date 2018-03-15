# shell script 入门

## 第一个shell script 脚本入门

> 一般来说，shell script 脚本中的第一行是指定该脚本的解释器程序，不可省略。像一般Linux或者Unix系统中，第一行即为```#!/bin/sh```

在shell script脚本中，使用#表示注释，即已#号开头的语句是注释语句，当然，第一行`#!`特殊处理。

注意：

- #!/bin/sh这行是指定你要解释脚本的程序，跟你当前使用那种类型的shell是没有关系的，不管你当前交互的shell是csh,ksh,tcsh,还是其他，最终解释脚本的程序还是Bourne shell。
- echo 可以接受多个变量。

## 变量I

跟所有的程序语言中的变量一样，都是在内存中开辟一片空间进行储值。Bourne Shell也不例外

### 变量声明

shell跟所有的弱类型语言一样，声明时并不需要加类型限定，解释器会做判断。声明方式，即`变量名`。

变量名的命名规则，也跟所有编程语言命名规则一致，即有意义，由字母，数字，下划线构成。
TODO:变量名的其他限制？
###  变量赋值
`变量名=值`，=左右不能有空格，`变量名 = 值` or `变量名 =值` or `变量名= 值`都是无效的，会报语法错误。


请注意：

+ 一个变量只能储存某种一类型的一个值。即类似这种 `VAR=Hello World` VAR只有一个Hello

+ shell script是弱类型语言，变量可以存储多种类型的值，类型由程式本身去做判定，比如expr这个函数，只接受numeric类型，当传一个字符型的参数给他，
会报错。

+ 对于一些特殊字符，为了避免被shell解析，需要进行转义，后续会讲到。


> 当然，除了声明变量之外，我们可以跟用户交互，使用read函数将输入的字符串赋值给变量，read将从标准输入中读取用户输入的数据。

	echo "Please input your name?"
	read MY_NAME
	echo "Hello ${MY_NAME} - hope you have a nice day!"

### 变量作用域

在shell script 中变量声明并不是必须的，但是如果你使用了一个未声明的变量，该变量的值为空(empty string),而且，shell 不会给出任何警告或者错误提示。

> 变量作用域是怎么回事？

通过`export` 和 `source`(`.`)来改变变量作用域

当前shell在解析脚本第一行时，会平滑开启一个新的shell来执行这个脚本。这也就说明了，我们在当前交互的shell中声明的变量并不能用于其它shell，
为了让当前的shell声明的变量可以被其它shell使用，需要使用`export`命令。但是尽管变量的值可能会在脚本执行中改变，但是脚本执行完成后，在当前脚本输出该变量，变量值并没有改变。这是一种继承关系，解析脚本程序（shell)从当前脚本(shell)继承了该变量，但是解析过中变量的变化并不会影响到原来shell中变量的值

有点像将变量从局部导出到全局(但是又不是全局，因为最终脚本的中的变量变化并没有影响这个全局变量)，为了让变化体现在这个变量上，我们可以`source`这个脚本到当前shell中执行，当然也可以简写为`.`(dot),这样在脚本的变量变化最终会返回到当前shell中变量中来，而此时，我们并不需要提前`export`变量。

这也是`profile`和`.bashrc`工作原理

### 容易犯错的地方

> 变量识别

请考虑以下的代码：

	#!/bin/sh
	echo "What is your name?"
	read USER_NAME
	echo "Hello $USER_NAME"
	echo "I will create you a file called $USER_NAME_file"
	touch $USER_NAME_file

假如，我们输入shane，该程序会像咱们期待的那样执行吗？最终结果与我们的预期结果会一致吗？即会“I will create you a file called shane_file”,然后在当前目录下生成一个shane_file文件？

并不会，因为后两行代码，解释器并没法识别变量的结束，也没法确定剩余部分的开始。

为了让解析器识别哪部分是变量，我们需要给变量加上一对大括号，即：
	
	#!/bin/sh
	echo "What is your name?"
	read USER_NAME
	echo "Hello $USER_NAME"
	echo "I will create you a file called ${USER_NAME}_file"
	touch ${USER_NAME}_file

注意：
+ 请$符号应该放在花括号外面。
+ 注意最后一行，如果我输入shane chiu，两个单词中间是有空格的，最后一行touch shane chiu_file,将会创建两个文件，shane,chiu_file,如果只想得到一个文件，请添加双引号 `touch "touch ${USER_NAME}_file"`


### 通配符(WildCards)

虽然他们在shell脚本中用处可能不大，但是我们可能会遇到这种需要，给目录下后缀名为.txt批量重命名为.bak,这个时候需要用到通配符

`mv ./*.txt ./*.bak`

或者在不用`ls` 的情况下，输出当前目录下所有文件与目录，可以使用`echo ./*`或者`echo *`，区别是ls会对文件目录进行不同颜色高亮

在后面的loop中也会使用到。
### 转义字符(Escape Characters)

转义字符即对shell有意义的字符，比如，double quote(")和single quote(')这些字符能影响解析器对tab键和空白键的解析。

如果要得到Hello "World"这种，需要对双引号转义，即 

	$ echo "Hello \"World\""

	$ echo "Hello "World"" # 双引号之间并没有空白字符，那么echo 会将将整个整体当做一个字符串

	$ echo "*" # *会被当做一个字符解析，而不是通配符

然而有些字符，比如",\,\`,这些是会被解释器解析的，为了将他们不被解析，需要使用反斜线(\)转义。

考虑下面的输出(假设$X=5)
	
	A quote is ", backslash is \, backtick is `.
	A few spaces are    and dollar is $. $X is 5.
我们应该这样做：

	$ echo "A quote is \", backslash is \\, backtick is \`."
	A quote is ", backslash is \, backtick is `.
	$ echo "A few spaces are    ; dollar is \$. \$X is ${X}."
	A few spaces are    ; dollar is $. $X is 5.

注意： 
+ $符号很特殊，因为他标记了变量，当然只在使用的时候使用
+ "或者'标记了字符或者字符串
+ \这个使得一些shell可解析的字符不可用
+ backstick(反引号)使得被引起的字符当做可执行程序使用

## 循环(Loops)

很多语言都有循环的概念：有些时候，我们可能需要重复某些事情很多次，从而导致我们需要
重复代码，然而，每次动作的改变其实是很微小的。

### For Loops 
for循环迭代一个set值，直到这个set所有值都遍历完了

	#!/bin/sh
	for i in 1 2 3 4 5
	do 
		echo "Looping ... number $i"
	done
	

	result:
	Looping .... number 1
	Looping .... number 2
	Looping .... number 3
	Looping .... number 4
	Looping .... number 5

第二个例子，关于通配符*的使用，请记住，解析器会在传参之前，将echo的参数处理，去除双引号，当做一个字符串整体传给echo
	
	#!/bin/sh
	for i in hell 1 * 2 goodbye
	do 
		echo "Looping ... i is set to $i"
	done

> Note: 
* 代表当前脚本下所有文件与目录，除去 . ..

### While Loops
while 循环会很有趣，取决与你的想法。
示例：
	
	#!/bin/sh
	INPUT_STRING=hello
	while [ "$INPUT_STRING" != "bye" ]
	do
		echo "Please type something in (bye to quit)"
		read INPUT_STRING
		echo "You typed: $INPUT_STRING"
	done
> note:
为什么提前声明变量？因为根据变量I章节，变量声明在shell script中不是必须的，但是当使用未声明的
变量时，该变量的值为空。

同时，在while中，(:) 表示恒为真，这在某些时候是很有必要的，他经常用来一个真实的退出条件(即我们通常只有输入^C才退出的情况)

	#!/bin/sh
	while :
	do
		echo "Please type something in (^C to quit)"
		read INPUT_STRING
		echo "You typed: $INPUT_STRING"
	done

另外一个比较好的用法是 while read f(遍历文件内容),下面这个例子将会用到`case`语句，它将从`myfile`文件中一行一行读取内容
请注意，每一行都需要以LF(new line)结尾,如果myfile文件最后一行不是以空行结束，那么代码最后一行将不会执行

	#!/bin/sh
	while read f
	do
		case $f in
			hello) echo "English"
			"您好！" echo "Chinese"
			bonjoure) echo "French"
			*) echo "Unkonow Language: $f"
			;;
		esac
	done
在大多数的Unix/Linux 系统中，还可以这样做.（我的报了permission报告)

	#!/bin/sh
	while f=`line`
	do
		.. process f ..
	done < myfile
但是自从`while read f` 在所有的*nix中起作用时，并不需要额外的程序`line`，前者已经更受欢迎了。通过使用反引号，程序可以使用外部函数

当我将case中的$f 改成$i,程序并不会报任何警告或者错误，即使$i未被声明
示例

	i=THIS_IS_A_BUG
	export i
	. ./while3a.sh
	
所以，尽可能避免拼写错误，给变量加上{}就是个不错的方法，如果你有个变量 $X并且X=A,你现在想输出X1
请使用echo ${X}1,而不是echo $X1,因为解析器并不能够识别$X变量,他可能会将$X1整体当做一个变量，也许$X1=B.

> 批量创建文件夹，mkdir rc{1,2,3,4,5,S}.d 

还可以递归实现
	cd /
	ls -ld	{,/usr,/usr/local}/{bin,sbin,lib}


## Test

