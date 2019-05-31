#include <stdio.h>

int main (void)
{
	/* local variable definition */
	int a = 10;

	/* do loop execution */
	do {
		printf("value of a: %d\n", a);
		a += 1;
	} while ( a < 20 );

	return 0;
}
