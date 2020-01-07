#include <stdio.h>

int main(void)
{
	char s[100];

	int i,c;

	for(i=0;i < 100 &&(c=getchar()) != EOF;++i) {
	
		s[i] = c;
	}

	printf("%s", c);

}
