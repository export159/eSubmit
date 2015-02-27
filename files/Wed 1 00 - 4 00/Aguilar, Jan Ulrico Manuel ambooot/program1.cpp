#include <iostream>
#include <conio.h>
#include <stdio.h>

using namespace std;

int main(){
	int num, remainder;
	
	cout << "Enter a number: ";
	cin >> num;
	
	remainder = num % 3;
	
	if (remainder == 0){
		cout << "The number you entered is divisible by 3!" << endl;
	} else{
		cout << "The number you entered is not divisible by 3. The remainder is " << remainder <<"." << endl;
	}
	
	system("pause");
}
