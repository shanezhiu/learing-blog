# Variable and Type Related Extensions

以下跟迭代相关
## Arrays
### array_filter()
使用**回调函数**过滤数组**元素**

该函数主要是遍历数组，然后对每个元素值或者键做操作。如果回调函数返回true，那么该值会被fill到返回数组中，并且保留键名。

array array_filter ( array $array [, callable $callback [, int $flag = 0 ]] )

params:

+ $array 需要操作的数组
+ $callback 回调函数，如果未提供回调函数，那么$array 中所有*元素值*为false的元素将会被移除，这个回调函数需要return
+ $flag 这个参数决定了传入回调函数的个数，有两个预定义常量
> - ARRAY_FILTER_USE_KEY: 只传入元素键名到回调函数中
> - ARRAY_FILTER_USE_BOTH: 传入键名与值到回调函数中

默认$flag = 0 ，代表的意思是只对数组元素的值做操作。
由上述描述可知道，回调函数的返回值一般为bool类型。

Tips:
>保留0,去除null,值为false，还有"",请使用 array_filter($arr, 'strlen');

### array_reduce()

用回调函数迭代地将数组简化为单一的值(算数运算，字符串)。
mixed array_reduce ( array $array , callable $callback [, mixed $initial = NULL ] )

Params:

+ $array 将要操作的数组
+ $callback mixed callback ( mixed $carry , mixed $item ) 

  其有两个参数，
  + $carry 携带上次迭代的值;如果本次迭代是第一次，那么其值为$initial
  + $item 本次迭代携带的值
  
+ $initial
  默认为null，该参数将在处理开始前使用，或者当处理结束，数组为空时的最后一个结果。
Return:

返回结果值，$initial,array_reduce() => null


    Code:
    var_dump(array_reduce());//null warning expected 2 paramaters 0 given
    <?php
    function sum($carry, $item)
    {
        $carry += $item;
        return $carry;
    }
    function product($carry, $item)
    {
        $carry *= $item;
        return $carry;
    }
    $a = array(1, 2, 3, 4, 5);
    $x = array();
    var_dump(array_reduce($a, "sum")); // int(15)
    var_dump(array_reduce($a, "product", 10)); // int(1200), because: 10*1*2*3*4*5
    var_dump(array_reduce($x, "sum", "No data to reduce")); // string(17) "No data to reduce"


### array_map()

为数组每个元素应用回调函数。也是迭代。
返回数组，数组元素为后续数组元素经过回调函数操作后组成的，

**Note:**

    回调函数的形参数量需与传入map函数数组的数量一致

array array_map ( callable $callback , array $array1 [, array $... ] )

Params:
+ $callback  回调函数，应用到每个数组元素__值__回调函数
+ $array1 需要操作的数组，会遍历数组，然后每个元素**值**都将经过回调函数处理。
+ ... 数组列表，每个都会遍历运行回调函数

返回值：

返回数组，包含回调函数处理之后的array1的所有元素。

**NOTE**
+ map 函数操作的是数组元素的值，回调函数传入的也是值，为了传入keys
请使用：$keys = array_keys($array1),然后，array_map(function($item){},$array1, $kyes);
+ 其返回的数组为新构成的索引数组。[0 => '',1 => ''].
+ 传入两个或者两个以上数组时候，数组数量将会保持一致，因此，数组长度都将以最长数组为主，以空元素填充来实现。
+ 如果callback函数为null，那么将会产生多维数组。



### array_walk()
 使用用户自定义函数对数组中的每个元素做回调处理.
 将用户自定义函数 funcname 应用到 array 数组中的每个单元。

**Note:(不太明白这里)**
||todo 怎么理解这个地方 ||
>array_walk() 不会受到 array 内部数组指针的影响。array_walk() 会遍历整个数组而不管指针的位置。


 bool array_walk ( array &$array , callable $callback [, mixed $userdata = NULL ] )

Params:

+ array:输入数组。引用类型。
+ $callback
  典型的，回调函数一般接受两个参数，待操作的数组值为第一个，键名为第二个
  + 如果 callback 需要直接作用于数组中的值，则给 callback 的第一个参数指定为引用。这样任何对这些单元的改变也将会改变原始数组本身。
  + 当参数数量超过预期的时候，很多内置函数将会抛出一个警告，所以，并不适合直接当做回调函数。
+ userdata
如果提供了可选参数 userdata，将被作为第三个参数传递给 callback funcname

**Note:**

只有 array 的值才可以被改变，用户不应在回调函数中改变该数组本身的结构。例如增加/删除单元，unset 单元等等。如果 array_walk() 作用的数组改变了，则此函数的的行为未经定义，且不可预期。

 Return:

 返回的是bool值
 如果 callback 函数需要的参数比给出的多，则每次 array_walk() 调用 callback 时都会产生一个 E_WARNING 级的错误。

 Code:

    $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");

    function test_alter(&$item1, $key, $prefix)
    {
        $item1 = "$prefix: $item1";
    }

    function test_print($item2, $key)
    {
        echo "$key. $item2<br />\n";
    }

    echo "Before ...:\n";
    array_walk($fruits, 'test_print');

    array_walk($fruits, 'test_alter', 'fruit');
    echo "... and after:\n";

    array_walk($fruits, 'test_print');

### array_walk_recursive()

array_walk_recursive — 对数组中的每个成员递归地应用用户函数

本函数会应用到数组每个元素中，并且会运用到深层的数组层次。

参数说明跟array_walk一样。

***Note:*
 当期作用于两维数组及以上时，任何二维数组及以上的键名并不会传入回调函数中

## array_combine

创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值

array array_combine ( array $keys , array $values )

返回一个数组，用来自__keys__数组的值作为键名，用来自__values__数组的值作为新数组值。

Params:

$keys 新数组的的键名，非法的值将会被转换为string类型

$values 新数组的值。

Return

返回合并后的array,如果两个数组的单元数不同则返回false,同时会抛出一个警告级别错误。

    code:
    // 如果想所有的数组都保留，那么就请使用多维数组。
    function array_combine_($keys, $values)
    {
    $result = array();
    foreach ($keys as $i => $k) {
        $result[$k][] = $values[$i];
    }
    array_walk($result, create_function('&$v', '$v = (count($v) == 1)? array_pop($v): $v;'));
    return    $result;
    }

    print_r(array_combine_(Array('a','a','b'), Array(1,2,3)));

**NOTE:**

+ 如果数组键名出现相同，以最后一个为主

### array_unique()

array_unique — 移除数组中重复的值

array array_unique ( array $array [, int $sort_flags = SORT_STRING ] )



### extract()

extract — 从数组中将变量导入到当前的符号表

int extract ( array &$array [, int $flags = EXTR_OVERWRITE [, string $prefix = NULL ]] )



### compact() 

compact — 建立一个数组，包括变量名和它们的值

array compact ( mixed $varname1 [, mixed $... ] )


## array_merge


## 指针相关







