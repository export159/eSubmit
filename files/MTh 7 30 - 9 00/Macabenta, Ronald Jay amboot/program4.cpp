#include <iostream>
#include <conio.h>
#include <stdio.h>

using namespace std;

int main(){
	int num1, num2, choice;
	double result;
	
	cout << "Enter 2 numbers" << endl;
	cin >> num1;
	cin >> num2;
	
	cout << "Options" << endl;
	cout << "1 - Sum" << endl;
	cout << "2 - Difference" << endl;
	cout << "3 - Product" << endl;
	cout << "4 - Qoutient" << endl;
	cout << "5 - Exit" << endl;
	cin >> choice;
	
	switch(choice){
		case 1:
			{
				result = num1 + num2;
				cout << "Sum: " << result << endl;
				break;
			}
		case 2:
			{
				result = num1 - num2;
				cout << "Difference: " << result << endl;
				break;
			}
		case 3:
			{
				result = num1 * num2;
				cout << "product: " << result << endl;
				break;
			}
		case 4:
			{
				result = num1 / num2;
				cout << "Qoutient: " << result << endl;
				break;
			}
		default:
			{
				cout << "Exit!" << endl;
				break;
			}
	}
	
	
	system("pause");
}
