#include <iostream>
#include <conio.h>
#include <stdio.h>

using namespace std;

int main(){
	int speed;
	
	cout << "Enter speed: ";
	cin >> speed;
	
	if(speed >= 55 && speed <= 60){
		cout << "Speeding...  your penalty fee is P200.00" << endl;
	}else if(speed >= 61 && speed <= 70){
		cout << "Speeding...  your penalty fee is P250.00" << endl;
	}else if(speed >= 71 && speed <= 80){
		cout << "Speeding...  your penalty fee is P300.00" << endl;
	}else{
		cout << "Not speeding" << endl;
	}
	
	system("pause");
}
