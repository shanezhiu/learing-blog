## 匿名函数(anonymous functions)

匿名函数，也被称为闭包，指的是声明时可以不用指定函数名。
常常被用于callback类型参数，也有其他用法。

匿名函数是Closure类的实现。

    code:
    $test = function () {
        return $_SERVER['HTTP_HOST'];
    };
    // 调用
    $test();
    // Closure
    $test->bindTo();

**Note:**
闭包也可以当做变量值来操作;PHP自动将如此表达式转换为内置closure类。
将一个闭包赋值给一个变量的语法与其他赋值语句是一样的，包括最后的分号。


闭包当然能够从父级作用域继承变量。所有这类变量需要通过```use()```语言结构，
从PHP7.1开始，超全局数组，$this, 与匿名函数有相同变量名的参数不能通过```use()```传递。