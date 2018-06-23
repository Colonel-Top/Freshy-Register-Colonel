#include <stdio.h>
int main()
{
int front = -1 ,sec = 1 , last =1,x=0;
scanf("%d",&x);
for(int i = 1001 ; i <=x ; i++)
{
	front++;
	
	
	if(front ==  10){
		front=0;
		last++;
	}
	if(last== 51)
	{
		sec++;
		last = 1;

	}
	
	printf("%c%d%d\n",front+65,sec,last);
	
	
		
	
}

}
