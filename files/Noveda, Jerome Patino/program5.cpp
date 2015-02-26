#include <iostream>
#include <conio.h>
#include <stdio.h>
#include <cmath>

using namespace std;

int circumference(double radius);
int area(double radius);
int diameter(double radius);

int main(){
	int choice;
	double radius;
	
	cout << "Enter the radius of the circle: ";
	cin >> radius;
	
	cout << "Find:" << endl;
	cout << "	1 -	Circumference" << endl;
	cout << "	2 -	Area" << endl;
	cout << "	3 -	Diameter" << endl;
	cout << "Your choice: ";
	cin >> choice;
	
	switch(choice){
		case 1:
			{
				cout << "The Circumference of the circle is " << circumference(radius) << endl;
				break;
			}
		case 2:
			{
				cout << "The Area of the circle is " << area(radius) << endl;
				break;
			}
		case 3:
			{
				cout << "The Diameter of the circle is " << diameter(radius) << endl;
				break;
			}
		default:
			{
				cout << "Invalid key inputed....   Exit!" << endl;
				break;
			}
	}
	
	
	system("pause");
}

int circumference(double radius){
	double result;
	
	result = (2*3.14) * diameter(radius);
	
	return result;
}
int area(double radius){
	double result;
	
	result = 3.14 * pow(radius,2);
	
	return result;
}
int diameter(double radius){
	double result;
	
	result = 2 * radius;
	
	return result;
}
