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
+ The first line of the program #include <stdio.h> is a preprocessor command, which tells a C compiler to include stdio.h file before going to actual compilation.

+ The next line int main() is the main function where the program execution begins.

+ The next line /*...*/ will be ignored by the compiler and it has been put to add additional comments in the program. So such lines are called comments in the program.

+ The next line printf(...) is another function available in C which causes the message "Hello, World!" to be displayed on the screen.

+ The next line return 0; terminates the main() function and returns the value 0.

#### Compile and Execute C Program
+ Open a text editor and add the above-mentioned code.

+ Save the file as hello.c

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