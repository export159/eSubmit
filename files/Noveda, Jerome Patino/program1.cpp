#include <iostream>


using namespace std;

int no1(int a, int b, int c);
int no2(int a, int b, int c);
int no3(int a, int b, int c);
int no4(int a, int b, int c);
int no5(int a, int b, int c);

int main(){
	int a = 8, b = -2, c = 5;
	
	cout<<"1. " << no1(a,b,c) << endl;
	cout<<"2. " << no2(a,b,c) << endl;
	cout<<"3. " << no3(a,b,c) << endl;
	cout<<"4. " << no4(a,b,c) << endl;
	cout<<"5. " << no5(a,b,c) << endl;
	
	system("pause");
}

int no1(int a, int b, int c){
	int result;
	
	result = (a+b) / a * 10;
	
	return result;
}

int no2(int a, int b, int c){
	int result;
	
	result = a++ + --a *25 % c;
	
	return result;
}
int no3(int a, int b, int c){
	int result;
	
	result = ++b / 80 + (a += 10);
	
	return result;
}
int no4(int a, int b, int c){
	int result;
	
	result = 10 * (c-2*(a-b));
	
	return result;
}
int no5(int a, int b, int c){
	int result;
	
	result = a && (10-2*5) || 10;
	
	return result;
}

