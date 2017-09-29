## 关于JavaScript 中闭包的笔记
### Note
>闭包是JavaScript中的一个特性，其极其灵活的使用方式，是重点也是难点，难点是用起来很方便，理解起来难度。
### 1. 基本概念
#### 1.1 闭包是什么？
>A closure is the combination of a function and the lexical environment within which that function was declared.                                
                                                                --FROM [MDN][1]

闭包-是由函数以及该函数声明的词法环境构成(我更喜欢成为上下文的描述)组成。

变量声明作用域跟他的上下文问有很大的关系。

local variable : 局部变量(称之为本地变量更好一些，会有使用范围)
global variable : 全局变量
lexical scoping : 被描述成解析器在存在嵌套函数的情况的时候，如何解析变量。
lexical 指的是词法作用域使用代码内部声明变量的位置来决定变量能在哪里被使用。
Nested Function 可以使用在他们外部声明的变量。


    function makeFunc() {
      var name = 'Mozilla';
      function displayName() {
        alert(name);
      }
      return displayName;
    }

    var myFunc = makeFunc();
    myFunc();


在上面这个例子中：```makeFunc()```中的```displayName()```函数在函数里面被返回出来了(请注意，在```JavaScript```中一切都是对象，所以```displayName()```也是一个对象，即```return displayName```返回的是个对象)

> 一般来说，函数内部局部变量的lifecycle是在该函数执行的时期才存在的，一旦函数执行完毕，是获取不到局部变量的。然而，跟其 他语言不一样的是：在displayName函数执行前，它以对象的方式被返回出来了。
> The reason is that functions in JavaScript form closures.
> 原因就是在Javascript中函数会形成闭包。
> 闭包就是函数以及其声明的地方内部的词法环境(context的解释)
> lexical environment 是由在闭包创建的时候在该范围内的变量组成。(上下文--指的是上文与下文)


### 2. 闭包的应用


### 3. 闭包的注意事项
> 1. 函数调用的方法：a. 函数名 + 一对括号，b. 匿名函数的方式 c. 函数立即调用的方式(immediately-invoked-function-expression)
    (function test(){}())
    (function test(){})()

### 4. Closures, CallBack, Anonymous Function 之间的那点关系



### 参考资料
1. [How do JavaScript closures work?](https://stackoverflow.com/questions/111102/how-do-javascript-closures-work/111111#111111 "How do JavaScript closures work?")
2. [Closures](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Closures "Closures")
3. [IIFE](http://benalman.com/news/2010/11/immediately-invoked-function-expression/ "IIFE")
4. [IIFE-Wiki][2]
5. [context][3]
[1]:https://developer.mozilla.org/en-US/docs/Web/JavaScript/Closures
[2]:https://en.wikipedia.org/wiki/Immediately-invoked_function_expression
[3]:https://en.wikipedia.org/wiki/Context_(computing)