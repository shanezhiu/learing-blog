## 关于JavaScript 中闭包的笔记
### Note
>闭包是JavaScript中的一个特性，其极其灵活的使用方式，是重点也是难点，难点是用起来很方便，理解起来难度。
### 1. 基本概念
#### 1.1 闭包是什么？
>A closure is the combination of a function and the lexical environment within which that function was declared.                                
                                                                --FROM [MDN][1]

闭包-是由函数以及该函数声明的词法环境构成(我更喜欢成为上下文)组成。

local variable : 局部变量(称之为本地变量更好一些，会有使用范围)
global variable : 全局变量
lexical scoping : 被描述成解析器在存在嵌套函数的情况的时候，如何解析变量。
lexical 指的是



### 参考资料
1. [How do JavaScript closures work?](https://stackoverflow.com/questions/111102/how-do-javascript-closures-work/111111#111111 "How do JavaScript closures work?")
2. [Closures](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Closures "Closures")
3. [IIFE](http://benalman.com/news/2010/11/immediately-invoked-function-expression/ "IIFE")

[1]:https://developer.mozilla.org/en-US/docs/Web/JavaScript/Closures
