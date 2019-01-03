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

#### C - Data Types
