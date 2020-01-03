## C-Tutorial

### C - Program Structure

#### Hello World Example
```
#include <stdio.h>                #preprocessor commands

int main()                        # functions
{                                 # blocks start
    /* my first program in C */   # comments                         
    printf("Hello World\n");      # another function
    return 0;                     # expressions or statements
}                                 # blocks end
```
A C program basically consists of following parts:

+ Preprocessor Commands
+ Functions
+ Variables
+ Statements & Expressions
+ Comments

Details for explaining above example:
+ The first line of the program `#include <stdio.h>` is a preprocessor command, which tells a C compiler to include stdio.h file before going to actual compilation.

+ The next line int main() is the main function where the program execution begins.

+ The next line `/*...*/` will be ignored by the compiler and it has been put to add additional comments in the program. So such lines are called comments in the program.

+ The next line printf(...) is another function available in C which causes the message "Hello, World!" to be displayed on the screen.

+ The next line return 0; terminates the main() function and returns the value 0.

#### Compile and Execute C Program
+ Open a text editor and add the above-mentioned code.

+ Save the file as `hello.c`

+ Open a command prompt and go to the directory where you have saved the file.

+ Type gcc hello.c and press enter to compile your code.

+ If there are no errors in your code, the command prompt will take you to the next line and would generate a.out executable file.

+ Now, type a.out to execute your program.

+ You will see the output "Hello World" printed on the screen.

#### Note
make sure that the compiler command is in your path and run it in the source file directory.


### C - Basic Syntax

#### Tokens In C
+ keywords
+ identifier
+ constant
+ string literal

#### Semicolons

The semicolon is a statement terminator in C program.
It indicates the end of one logical entity.

#### Comments
Comments are like helping text in your C program and they are **ignored by the compiler**. They start with /* and terminate with the characters */ as shown below.

#### Identifiers

+ A C identifier is a name used to identify a variable, function, or any other user-defined item. 
+ An identifier starts with a letter A to Z, a to z, or an underscore '_' followed by zero or more letters, underscores, and digits (0 to 9).
+ C is a case-sensitive programming language.
+ C does not allow punctuation characters such as @, $, and % within identifiers.

#### Keywords

The following list shows the reserved words in C.
```
auto	else	long	switch
break	enum	register	typedef
case	extern	return	union
char	float	short	unsigned
const	for	signed	void
continue	goto	sizeof	volatile
default	if	static	while
do	int	struct	_Packed
double	

```

#### Whitespace in C

+ A line containing only whitespace, possibly with a comment, is known as a blank line, and a C compiler totally ignores it.
+ Whitespace is the term used in C to describe blanks, tabs, newline characters and comments.
+ Whitespace separates one part of a statement from another and enables the compiler to identify where one element in a statement, such as int, ends and the next element begins.

    ```int age ```
+ there must be at least one whitespace character (usually a space) between int and age for the compiler to be able to distinguish them. 

    ```fruit = apples + oranges;   // get the total fruit```
+ no whitespace characters are necessary between fruit and =, or between = and apples, although you are free to include some if you wish to increase readability.

### C - Data Types

Data types in c refer to an extensive system used for declaring variables or functions of different types. The type of a variable determines **how much space it occupies in storage** and **how the bit pattern stored is interpreted**.

+ **Basic Types**

They are arithmetic(算数运算) types and are further classified into: 

    a. integer types and 
    b. floating-point types.

+ **Enumerated types**

They are again arithmetic(算数运算) types and they are used to define variables that can only assign certain discrete(离散) integer values throughout the program.

+ **The type void**

The type specifier void indicates that no value is available.


+ **Derived(派生) types**

They include 

    a. Pointer types
    b. Array types
    c. Structure types
    d. Union types 
    c. Function types

> 
 + The array types and structure types are referred collectively(共同) as the aggregate(聚合，集合) types. 
 +  The type of a function specifies the type of the function's return value. 
 + We will see the basic types in the following section, where as other types will be covered in the upcoming chapters.


 #### Integer Types
 
 The following table provides the details of standard integer types with their storage sizes and value ranges.

 |Type	|Storage Size	|Value range|
 |------|------|------|
|char	|1 byte	|-128 to 127 or 0 to 255|
|unsigned char	|1 byte|	0 to 255|
|signed char	|1 byte|	-128 to 127|
|int	|2 or 4 bytes|	-32,768 to 32,767 or -2,147,483,648 to 2,147,483,647|
|unsigned int|	2 or 4 bytes|	0 to 65,535 or 0 to 4,294,967,295|
|short	|2 bytes	|-32,768 to 32,767|
|unsigned short|	2 bytes|	0 to 65,535|
|long	|4 bytes	|-2,147,483,648 to 2,147,483,647|
|unsigned long	|4 bytes	|0 to 4,294,967,295|

To get the exact size of a type or a variable on a particular platform, you can use the **sizeof operator**. The expressions sizeof(type) yields the storage size of the object or type in bytes. Given below is an example to get the size of int type on any machine −

```
#include <stdio.h>
#include <limits.h>

int main() {
   printf("Storage size for int : %d \n", sizeof(int));
   
   return 0;
}

```

#### Floating-Point Types
The following table provide the details of standard floating-point types with storage sizes and value ranges and their precision −

|Type|	Storage size|	Value range|	Precision(精度)|
|------|------|------|------|
|float	|4 byte	|1.2E-38 to 3.4E+38	|6 decimal places|
|double|	8 byte|	2.3E-308 to 1.7E+308|	15 decimal places|
|long double	|10 byte	|3.4E-4932 to 1.1E+4932	|19 decimal places|

The header file **float.h** defines macros that allow you to use these values and other details about the binary representation of real numbers in your programs. 

The following example prints the storage space taken by a float type and its range values:

```
#include <stdio.h>
#include <float.h>

int main() {
   printf("Storage size for float : %d \n", sizeof(float));
   printf("Minimum float positive value: %E\n", FLT_MIN );
   printf("Maximum float positive value: %E\n", FLT_MAX );
   printf("Precision value: %d\n", FLT_DIG );
   
   return 0;
}

```


#### The void Type

The void type specifies that no value is available. It is used in three kinds of situations −
	
1. **Function returns as void**

> There are various functions in C which do not return any value or you can say they return void. A function with no return value has the return type as void. For example, void exit (int status);

2. **Function arguments as void**

> There are various functions in C which do not accept any parameter. A function with no parameter can accept a void. For example, int rand(void);

3. **Pointers to void**

> A pointer of type void * represents the address of an object, but not its type. For example, a memory allocation(分配) function void *malloc( size_t size ); returns a pointer to void which can be casted(计算) to any data type.

### C - Variables

A variable is nothing but a name given to a storage area that our programs can manipulate(操作). 
Each variable in C has a specific type, which determines the size and layout of the variable's memory; 
the range of values that can be stored within that memory; and the set of operations that can be applied to the variable.

The name of a variable can be composed of letters, digits, and the underscore character. 
It must begin with either a letter or an underscore. Upper and lowercase letters are distinct because C is case-sensitive. Based on the basic types explained in the previous chapter, there will be the following basic variable types −

1. **char**

> Typically a single octet(one byte). This is an integer type.

2. **int**

> The most natural size of integer for the machine.

3. **float**

> A single-precision floating point value.

4. **double**

> A double-precision floating point value.

5. **void**

> Represents the absence(无) of type.

C programming language also allows to define various other types of variables, which we will cover in subsequent chapters like Enumeration, Pointer, Array, Structure, Union, etc. 
For this chapter, let us study only basic variable types.

#### Variable Definition in C

+ A variable definition tells the compiler where and how much storage to create for the variable. 

+ A variable definition specifies a data type and contains a list of one or more variables of that type as follows

    ```type variable_list;```

Here, type must be a valid C data type including `char`, `w_char`, `int`, `float`, `double`, `bool`, or any user-defined object; and variable_list may consist of one or more identifier names separated by commas. 

Some valid declarations are shown here −

```
int    i, j, k;
char   c, ch;
float  f, salary;
double d;

```

The line int `i`, `j`, `k`; declares and defines the variables `i`, `j,` and `k`; which instruct the compiler to create variables named `i`, `j` and `k` of type `int`.Variables can be initialized (assigned an initial value) in their declaration. 

The initializer consists of an equal sign followed by a constant expression as follows −

```type variable_name = value;```

Some examples are −

```
extern int d = 3, f = 5;    // declaration of d and f. 
int d = 3, f = 5;           // definition and initializing d and f. 
byte z = 22;                // definition and initializes z. 
char x = 'x';               // the variable x has the value 'x'.

```

For definition without an initializer: 
variables with static storage duration are implicitly initialized with `NULL` (all bytes have the value 0); the initial value of all other variables are undefined.

#### Variable Declaration in C

A **variable declaration** provides assurance to the compiler that there exists a variable with the given type and name so that the compiler can proceed for further compilation **without requiring the complete detail about the variable**. A **variable definition** has its meaning **at the time of compilation only**, the compiler needs actual variable definition **at the time of linking the program**.

A **variable declaration** is useful when you are using **multiple files** and you define your variable in one of the files which will be available at the time of linking of the program. You will use the keyword `extern` to **declare a variable** at any place. Though you can declare a variable multiple times in your C program, **it can be defined only once in a file, a function, or a block of code.**

**Example:**

Try the following example, where variables have been declared at the top, but they have been defined and initialized inside the main function −

```
#include <stdio.h>

// Variable declaration:
extern int a, b;
extern int c;
extern float f;

int main () {

   /* variable definition: */
   int a, b;
   int c;
   float f;
 
   /* actual initialization */
   a = 10;
   b = 20;
  
   c = a + b;
   printf("value of c : %d \n", c);

   f = 70.0/3.0;
   printf("value of f : %f \n", f);
 
   return 0;
}

```

When the above code is compiled and executed, it produces the following result −

```
value of c : 30
value of f : 23.333334

```

The same concept applies on function declaration where you provide a function name at the time of its declaration and its actual definition can be given anywhere else. For example −

```
// function declaration
int func();

int main() {

   // function call
   int i = func();
}

// function definition
int func() {
   return 0;
}

```

#### Lvalues and Rvalues in C

There are two kinds of expressions in C −

+ **lvalue** − Expressions that refer to a memory location are called "lvalue" expressions. An lvalue may appear as either the left-hand or right-hand side of an assignment.

+ **rvalue** − The term rvalue refers to a data value that is stored at some address in memory. An rvalue is an expression that cannot have a value assigned to it which means an rvalue may appear on the right-hand side but not on the left-hand side of an assignment.

Variables are lvalues and so they may appear on the left-hand side of an assignment. Numeric literals are rvalues and so they may not be assigned and cannot appear on the left-hand side. Take a look at the following valid and invalid statements −

```
int g = 20; // valid statement

10 = 20; // invalid statement; would generate compile-time error

```

### C - Constants and Literals

Constants refer to fixed values that the program may not alter during its execution. These fixed values are also called literals.

Constants can be of any of the basic data types like an integer constant, a floating constant, a character constant, or a string literal. There are enumeration constants as well.

Constants are treated just like regular variables except that their values cannot be modified after their definition.

#### Integer Literals
An integer literal can be a decimal, octal, or hexadecimal constant. A prefix specifies the base or radix: 0x or 0X for hexadecimal, 0 for octal, and nothing for decimal.

An integer literal can also have a suffix that is a combination of U and L, for unsigned and long, respectively. The suffix can be uppercase or lowercase and can be in any order.

Here are some examples of integer literals −

```
212         /* Legal */
215u        /* Legal */
0xFeeL      /* Legal */
078         /* Illegal: 8 is not an octal digit */
032UU       /* Illegal: cannot repeat a suffix */

````

Following are other examples of various types of integer literals −

```
85         /* decimal */
0213       /* octal */
0x4b       /* hexadecimal */
30         /* int */
30u        /* unsigned int */
30l        /* long */
30ul       /* unsigned long */

```


#### Floating-point Literals

**A floating-point literal has an `integer part`, a `decimal point`, a `fractional(分数的) part`, and an `exponent(指数) part`**. You can represent floating point literals either in decimal form or exponential form.

While representing decimal form, you must include the decimal point, the exponent, or both; and while representing exponential form, you must include the integer part, the fractional part, or both. 

The signed exponent is introduced by e or E.

Here are some examples of floating-point literals −

```
3.14159       /* Legal */
314159E-5L    /* Legal */
510E          /* Illegal: incomplete exponent */
210f          /* Illegal: no decimal or exponent */
.e55          /* Illegal: missing integer or fraction */

the integer part is required for exponential form.

```

#### Character Constants

Character literals are enclosed in `single quotes`, e.g., `'x'` can be stored in a simple variable of char type.

A character literal can be a plain character (`e.g., 'x'`), an escape sequence (`e.g., '\t'`), or a universal character (e.g., '\u02C0').

There are certain characters in C that represent special meaning when preceded by a backslash for example, newline (\n) or tab (\t).

Here, you have a list of such escape sequence codes −
|Escape sequence	|Meaning|
|--------|--------|
|\\	|\ character|
|\'	|' character|
|\"	|" character|
|\?	|? character|
|\a	|Alert or bell|
|\b	|Backspace|
|\f	|Form feed|
|\n	|Newline|
|\r	|Carriage return|
|\t	|Horizontal tab|
|\v	|Vertical tab|
|\ooo	|Octal number of one to three digits|
|\xhh |. . .	Hexadecimal number of one or more digits|
Following is the example to show a few escape sequence characters −

```
#include <stdio.h>

int main() {
   printf("Hello\tWorld\n\n");

   return 0;
}

```
When the above code is compiled and executed, it produces the following result −

```Hello World```


#### String Literals

String literals or constants are enclosed in double quotes "". A string contains characters that are similar to character literals: plain characters, escape sequences, and universal characters.

You can break a long line into multiple lines using string literals and separating them using white spaces.

Here are some examples of string literals. All the three forms are identical strings.

```
"hello, dear"

"hello, \

dear"

"hello, " "d" "ear"

```


### Defining Constants

There are two simple ways in C to define constants −

+ Using `#define` preprocessor.

+ Using `const` keyword.

#### The `#define` Preprocessor

Given below is the form to use `#define` preprocessor to define a constant −

```#define identifier value```

The following example explains it in detail −


```
#include <stdio.h>

#define LENGTH 10   
#define WIDTH  5
#define NEWLINE '\n'

int main() {
   int area;  
  
   area = LENGTH * WIDTH;
   printf("value of area : %d", area);
   printf("%c", NEWLINE);

   return 0;
}

```

When the above code is compiled and executed, it produces the following result −

```value of area : 50```

#### The const Keyword

You can use const prefix to declare constants with a specific type as follows −

```const type variable = value;```

The following example explains it in detail −
```
#include <stdio.h>

int main() {
   const int  LENGTH = 10;
   const int  WIDTH = 5;
   const char NEWLINE = '\n';
   int area;  
   
   area = LENGTH * WIDTH;
   printf("value of area : %d", area);
   printf("%c", NEWLINE);

   return 0;
}

```
When the above code is compiled and executed, it produces the following result −

```value of area : 50```

Note that it is a good programming practice to define constants in `CAPITALS`.

#### what'is the difference bettwen `const` and `#define`

1. `#define` is pre-processor directive while `const` is a keyword
2.  `#define` is not scope controlled whereas `const` is scope controlled


### C - Storage Classes

A storage class defines the scope (visibility) and life-time of variables and/or functions within a C Program. They precede(位于...之前) the type that they modify. We have four different storage classes in a C program −

+ auto
+ register
+ static
+ extern

#### The `auto` Storage Class

The `auto` storage class is the **default storage** class for all `local variables`.

```
{
   int mount;
   auto int month;
}

```
The example above defines two variables with in the same storage class. `'auto'` can **only be used within functions**, i.e., local variables.

#### The `register` Storage Class

The `register storage class` is used to define **local variables** that should be stored in a `register instead of RAM`. This means that the variable has a **maximum size equal to the register size** (usually `one word`) and can't have the unary(一元) `'&'` operator applied to it (as it does not have a memory location).

```
{
   register int  miles;
}
```
The `register` should only be used for variables that require quick access such as counters. It should also be noted that defining `'register'` does not mean that the variable will be stored in a register. It means that it `MIGHT` be stored in a register depending on hardware and implementation restrictions(限制).

#### The `static` Storage Class

The `static` storage class instructs(命令，指示) the compiler to **keep** a local variable in existence during the life-time of the program instead of creating and destroying it each time it comes into and goes out of scope. Therefore, making local variables `static` allows them to maintain their values between function calls.

The `static` modifier may also be applied to global variables. When this is done, it causes that variable's scope to be restricted to the file in which it is declared.

In C programming, when **static** is used on a global variable, it causes only one copy of that member to be shared by all the objects of its class.
```

#include <stdio.h>
 
/* function declaration */
void func(void);
 
static int count = 5; /* global variable */
 
main() {

   while(count--) {
      func();
   }
	
   return 0;
}

/* function definition */
void func( void ) {

   static int i = 5; /* local static variable */
   i++;

   printf("i is %d and count is %d\n", i, count);
}

```

When the above code is compiled and executed, it produces the following result −

```
i is 6 and count is 4
i is 7 and count is 3
i is 8 and count is 2
i is 9 and count is 1
i is 10 and count is 0

```

#### The extern Storage Class
The **extern** storage class is used to give a reference of a global variable that is visible to ALL the program files. When you use `'extern'`, the variable cannot be initialized however, it points the variable name at a storage location that has been previously defined.

When you have multiple files and you define a global variable or function, which will also be used in other files, then **extern** will be used in another file to provide the reference of defined variable or function. Just for understanding, **extern** is used to declare a global variable or function in another file.

The extern modifier is most commonly used when there are two or more files sharing the same global variables or functions as explained below.

**First File: main.c**

```

#include <stdio.h>
 
int count ;
extern void write_extern();
 
main() {
   count = 5;
   write_extern();
}

```

**Second File: support.c**

```

#include <stdio.h>
 
extern int count;
 
void write_extern(void) {
   printf("count is %d\n", count);
}

```

Here, extern is being used to declare count in the second file, where as it has its definition in the first file, main.c. Now, compile these two files as follows −

`$gcc main.c support.c`

It will produce the executable program a.out. When this program is executed, it produces the following result −

`count is 5`



### C - Operators

An operator is a symbol that tells the compiler to perform specific mathematical or logical functions. C language is rich in built-in operators and provides the following types of operators −

+ Arithmetic Operators
+ Relational Operators
+ Logical Operators
+ Bitwise Operators
+ Assignment Operators
+ Misc Operators

We will, in this chapter, look into the way each operator works.

#### Arithmetic Operators

The following table shows all the arithmetic operators supported by the C language. Assume variable `A` holds 10 and variable `B` holds 20 then −

|Operator	|Description	|Example|
|----------|----------|----------|
|+	|Adds two operands.	|A + B = 30|
|−	|Subtracts second operand from the first.|	A − B = -10|
|*	|Multiplies both operands.	|A * B = 200|
|/	|Divides numerator by de-numerator.	|B / A = 2|
|%	|Modulus Operator and remainder of after an integer division.	|B % A = 0|
|++	|Increment operator increases the integer value by one.|	A++ = 11|
|--|	Decrement operator decreases the integer value by one.|	A-- = 9|

**Show Examples**:

```
#include <stdio.h>

main() {

   int a = 21;
   int b = 10;
   int c ;

   c = a + b;
   printf("Line 1 - Value of c is %d\n", c );
	
   c = a - b;
   printf("Line 2 - Value of c is %d\n", c );
	
   c = a * b;
   printf("Line 3 - Value of c is %d\n", c );
	
   c = a / b;
   printf("Line 4 - Value of c is %d\n", c );
	
   c = a % b;
   printf("Line 5 - Value of c is %d\n", c );
	
   c = a++; 
   printf("Line 6 - Value of c is %d\n", c );
	
   c = a--; 
   printf("Line 7 - Value of c is %d\n", c );
}

```

#### Relational Operators

The following table shows all the relational operators supported by C. Assume variable `A` holds 10 and variable `B` holds 20 then −
|Operator	|Description	|Example|
|----------|----------|----------|
|==	|Checks if the values of two operands are equal or not. If yes, then the condition becomes true.	|(A == B) is not true.|
|!=	|Checks if the values of two operands are equal or not. If the values are not equal, then the condition becomes true.|(A != B) is true.|
|>	|Checks if the value of left operand is greater than the value of right operand. If yes, then the condition becomes true.	|(A > B) is not true.|
|<	|Checks if the value of left operand is less than the value of right operand. If yes, then the condition becomes true.	|(A < B) is true.|
|>=	|Checks if the value of left operand is greater than or equal to the value of right operand. If yes, then the condition becomes true.	|(A >= B) is not true.|
|<=	|Checks if the value of left operand is less than or equal to the value of right operand. If yes, then the condition becomes true.	|(A <= B) is true.|

**Show Examples**:
```
#include <stdio.h>

main() {

   int a = 21;
   int b = 10;
   int c ;

   if( a == b ) {
      printf("Line 1 - a is equal to b\n" );
   } else {
      printf("Line 1 - a is not equal to b\n" );
   }
	
   if ( a < b ) {
      printf("Line 2 - a is less than b\n" );
   } else {
      printf("Line 2 - a is not less than b\n" );
   }
	
   if ( a > b ) {
      printf("Line 3 - a is greater than b\n" );
   } else {
      printf("Line 3 - a is not greater than b\n" );
   }
   
   /* Lets change value of a and b */
   a = 5;
   b = 20;
	
   if ( a <= b ) {
      printf("Line 4 - a is either less than or equal to  b\n" );
   }
	
   if ( b >= a ) {
      printf("Line 5 - b is either greater than  or equal to b\n" );
   }
}

```

#### Logical Operators

Following table shows all the logical operators supported by C language. Assume variable `A` holds 1 and variable `B` holds 0, then −


|Operator	|Description	|Example|
|-----------|-----------|-----------|
|&&	|Called Logical AND operator. If both the operands are non-zero, then the condition becomes true.	|(A && B) is false.
|\|\|	|Called Logical OR Operator. If any of the two operands is non-zero, then the condition becomes true.	|(A || B) is true.|
|!	|Called Logical NOT Operator. It is used to reverse the logical state of its operand. If a condition is true, then Logical NOT operator will make it false.	|!(A && B) is true.

**Show Examples**:

```
#include <stdio.h>

main() {

   int a = 5;
   int b = 20;
   int c ;

   if ( a && b ) {
      printf("Line 1 - Condition is true\n" );
   }
	
   if ( a || b ) {
      printf("Line 2 - Condition is true\n" );
   }
   
   /* lets change the value of  a and b */
   a = 0;
   b = 10;
	
   if ( a && b ) {
      printf("Line 3 - Condition is true\n" );
   } else {
      printf("Line 3 - Condition is not true\n" );
   }
	
   if ( !(a && b) ) {
      printf("Line 4 - Condition is true\n" );
   }
	
}

```

#### Bitwise Operators

Bitwise operator works on bits and perform bit-by-bit operation. The truth tables for `&`, `|`, and `^` is as follows −


|p	|q	|p & q|	p \| q|	p ^ q|
|----|----|----|----|----
|0	|0	|0	|0	|0|
|0	|1|	0|	1	|1|
|1	|1	|1|	1|	0|
|1	|0|	0|	1|	1|

Assume A = 60 and B = 13 in binary format, they will be as follows −
```
A = 0011 1100

B = 0000 1101

-----------------

A&B = 0000 1100

A|B = 0011 1101

A^B = 0011 0001

~A = 1100 0011
```
The following table lists the bitwise operators supported by `C`. Assume variable `'A'` holds 60 and variable `'B'` holds `13`, then −


|Operator	|Description	|Example
|----|----|----|----|
|&	|Binary AND Operator copies a bit to the result if it exists in both operands.	|(A & B) = 12, i.e., 0000 1100
|\|	|Binary OR Operator copies a bit if it exists in either operand.	(A | B) = 61, i.e., 0011 1101
|^	|Binary XOR Operator copies the bit if it is set in one operand but not both.	|(A ^ B) = 49, i.e., 0011 0001
|~	|Binary One's Complement Operator is unary and has the effect of 'flipping' bits.	|(~A ) = ~(60), i.e,. -0111101
|<<	|Binary Left Shift Operator. The left operands value is moved left by the number of bits specified by the right operand.	|A << 2 = 240 i.e., 1111 0000
|>>	|Binary Right Shift Operator. The left operands value is moved right by the number of bits specified by the right operand.	|A >> 2 = 15 i.e., 0000 1111

```
#include <stdio.h>

main() {

   unsigned int a = 60;	/* 60 = 0011 1100 */  
   unsigned int b = 13;	/* 13 = 0000 1101 */
   int c = 0;           

   c = a & b;       /* 12 = 0000 1100 */ 
   printf("Line 1 - Value of c is %d\n", c );

   c = a | b;       /* 61 = 0011 1101 */
   printf("Line 2 - Value of c is %d\n", c );

   c = a ^ b;       /* 49 = 0011 0001 */
   printf("Line 3 - Value of c is %d\n", c );

   c = ~a;          /*-61 = 1100 0011 */
   printf("Line 4 - Value of c is %d\n", c );

   c = a << 2;     /* 240 = 1111 0000 */
   printf("Line 5 - Value of c is %d\n", c );

   c = a >> 2;     /* 15 = 0000 1111 */
   printf("Line 6 - Value of c is %d\n", c );
}

```

#### Assignment Operators

The following table lists the assignment operators supported by the C language −

|Operator	|Description	|Example
|----|----|----|
|=	|Simple assignment operator. Assigns values from right side operands to left side operand	|C = A + B will assign the value of A + B to C
|+=	|Add AND assignment operator. It adds the right operand to the left operand and assign the result to the left operand.	|C += A is equivalent to C = C + A
|-=	|Subtract AND assignment operator. It subtracts the right operand from the left operand and assigns the result to the left operand.	|C -= A is equivalent to C = C - A
|*=	|Multiply AND assignment operator. It multiplies the right operand with the left operand and assigns the result to the left operand.	|C *= A is equivalent to C = C * A
|/=	|Divide AND assignment operator. It divides the left operand with the right operand and assigns the result to the left operand.	|C /= A is equivalent to C = C / A
|%=	|Modulus AND assignment operator. It takes modulus using two operands and assigns the result to the left operand.	C %= A is equivalent to C = C % A
|<<=	|Left shift AND assignment operator.	|C <<= 2 is same as C = C << 2
|>>=	|Right shift AND assignment operator.	|C >>= 2 is same as C = C >> 2
|&=	|Bitwise AND assignment operator.	|C &= 2 is same as C = C & 2
|^=	|Bitwise exclusive OR and assignment operator.	|C ^= 2 is same as C = C ^ 2
|\|=	|Bitwise inclusive OR and assignment operator.|C \|= 2 is same as C = C \| 2

**SHow Examples**:
```
#include <stdio.h>

main() {

   int a = 21;
   int c ;

   c =  a;
   printf("Line 1 - =  Operator Example, Value of c = %d\n", c );

   c +=  a;
   printf("Line 2 - += Operator Example, Value of c = %d\n", c );

   c -=  a;
   printf("Line 3 - -= Operator Example, Value of c = %d\n", c );

   c *=  a;
   printf("Line 4 - *= Operator Example, Value of c = %d\n", c );

   c /=  a;
   printf("Line 5 - /= Operator Example, Value of c = %d\n", c );

   c  = 200;
   c %=  a;
   printf("Line 6 - %= Operator Example, Value of c = %d\n", c );

   c <<=  2;
   printf("Line 7 - <<= Operator Example, Value of c = %d\n", c );

   c >>=  2;
   printf("Line 8 - >>= Operator Example, Value of c = %d\n", c );

   c &=  2;
   printf("Line 9 - &= Operator Example, Value of c = %d\n", c );

   c ^=  2;
   printf("Line 10 - ^= Operator Example, Value of c = %d\n", c );

   c |=  2;
   printf("Line 11 - |= Operator Example, Value of c = %d\n", c );
}

```

#### Misc Operators ↦ sizeof & ternary

Besides the operators discussed above, there are a few other important operators including sizeof and ? : supported by the C Language.

|Operator	|Description	|Example
|-----|-----|-----|
|sizeof()	|Returns the size of a variable.	|sizeof(a), where a is integer, will return 4.
|&	|Returns the address of a variable.	&a; |returns the actual address of the variable.
|*	|Pointer to a variable.	|*a;
|? :	|Conditional Expression.	|If Condition is true ? then value X : otherwise value Y

**Show Examples**:
```
#include <stdio.h>

main() {

   int a = 4;
   short b;
   double c;
   int* ptr;

   /* example of sizeof operator */
   printf("Line 1 - Size of variable a = %d\n", sizeof(a) );
   printf("Line 2 - Size of variable b = %d\n", sizeof(b) );
   printf("Line 3 - Size of variable c= %d\n", sizeof(c) );

   /* example of & and * operators */
   ptr = &a;	/* 'ptr' now contains the address of 'a'*/
   printf("value of a is  %d\n", a);
   printf("*ptr is %d.\n", *ptr);

   /* example of ternary operator */
   a = 10;
   b = (a == 1) ? 20: 30;
   printf( "Value of b is %d\n", b );

   b = (a == 10) ? 20: 30;
   printf( "Value of b is %d\n", b );
}

```

#### Operators Precedence in C

Operator precedence determines the grouping of terms in an expression and decides how an expression is evaluated. Certain operators have higher precedence than others; for example, the multiplication operator has a higher precedence than the addition operator.

For example, `x = 7 + 3 * 2`; here, `x` is assigned `13`, not `20` because operator `*` has a higher precedence than `+`, so it first gets multiplied with 3*2 and then adds into 7.

Here, operators with the highest precedence(优先) appear at the top of the table, those with the lowest appear at the bottom. Within an expression, higher precedence operators will be evaluated first.

|Category	|Operator	|Associativity|
|------|------|------|
|Postfix|	() [] -> . ++ - -	|Left to right
|Unary	|+ - ! ~ ++ - - (type)* & sizeof	|Right to left
|Multiplicative	|* / %	|Left to right
|Additive	|+ -	|Left to right
|Shift	|<< >>	|Left to right
|Relational	|< <= > >=|	Left to right
|Equality	|== !=	|Left to right
|Bitwise |AND	&	|Left to right
|Bitwise XOR	^	|Left to right
|Bitwise |OR	\|	|Left to right
|Logical |AND	&&	|Left to right
|Logical |OR	\|\|	|Left to right
|Conditional	|?:	|Right to left
|Assignment	|= += -= *= /= %=>>= <<= &= ^= \|=	|Right to left
|Comma|	,	|Left to right

**SHow Examples**:

```

#include <stdio.h>

main() {

   int a = 20;
   int b = 10;
   int c = 15;
   int d = 5;
   int e;
 
   e = (a + b) * c / d;      // ( 30 * 15 ) / 5
   printf("Value of (a + b) * c / d is : %d\n",  e );

   e = ((a + b) * c) / d;    // (30 * 15 ) / 5
   printf("Value of ((a + b) * c) / d is  : %d\n" ,  e );

   e = (a + b) * (c / d);   // (30) * (15/5)
   printf("Value of (a + b) * (c / d) is  : %d\n",  e );

   e = a + (b * c) / d;     //  20 + (150/5)
   printf("Value of a + (b * c) / d is  : %d\n" ,  e );
  
   return 0;
}

```




## C - Decision Making

Decision making structures require that the programmer specifies one or more conditions to be evaluated or tested by the program, along with a statement or statements to be executed if the condition is determined to be true, and optionally, other statements to be executed if the condition is determined to be false.

Show below is the general form of a typical decision making structure found in most of the programming languages −

   ![decision Making](https://www.tutorialspoint.com/cprogramming/images/decision_making.jpg)

C programming language assumes any **non-zero** and **non-null** values as true, and if it is either **zero** or **null**, then it is assumed as false value.

C programming language provides the following types of decision making statements.


|Sr.No.	|Statement & Description|
|----------|----------|
|1	|if statement.An if statement consists of a boolean expression followed by one or more statements.
|2|	if...else statement.An if statement can be followed by an optional else statement, which executes when the Boolean expression is false.
|3	|nested if statement.You can use one if or else if statement inside another if or else if statement(s).
|4	|switch statement.A switch statement allows a variable to be tested for equality against a list of values.
|5|	nested switch statements.You can use one switch statement inside another switch statement(s).

### The ? : Operator
We have covered conditional operator `? :` in the previous chapter which can be used to replace if...else statements. It has the following general form −

```Exp1 ? Exp2 : Exp3;```

Where `Exp1`, `Exp2`, and `Exp3` are expressions. Notice the use and placement of the colon.

The value of a `?` expression is determined like this −

+ Exp1 is evaluated. If it is true, then Exp2 is evaluated and becomes the value of the entire ? expression.

+ If Exp1 is false, then Exp3 is evaluated and its value becomes the value of the expression.

- [ ] C - Loops

- [ ] C - Functions

- [ ] C - Scope Rules

- [ ] C - Arrays