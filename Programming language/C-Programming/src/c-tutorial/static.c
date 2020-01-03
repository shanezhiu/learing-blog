#include <stdio.h>

int test(void);
void test1(int b);

int main (void)
{
    int b;
    printf("%d\n",b);
    b = test();
    printf("%d\n",b);
    test1(b);
    printf("%d\n",b);
    test();
}

int test()
{
    static int b;
    b = 1;
    printf("test %d\n", b);
    return b;
}

void test1(int b)
{
    printf("test1 param %d", b);
    b = b - 10;
    printf("test1 %d", b);
}