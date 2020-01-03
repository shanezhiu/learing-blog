#include<stdio.h>
#define LENGTH 10
#define WITDHT 5
#define NEWLINE '\n'

int main (void)
{
    int area;
    
    area = LENGTH * WITDHT;
    printf("value of area: %d", area);
    printf("%c", NEWLINE);
}