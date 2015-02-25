#include <iostream>
#include <conio.h>
#include <stdio.h>
#include <cctype>

using namespace std;

int main(){
	char letter;
	
	cout << "Enter a character: ";
	cin >> letter;
	
	cout << "The character is a";
	
	if(isdigit(letter)){
		cout << " number." << endl;
	}else if(!isdigit(letter)){
		cout << " letter ";
		
		if(letter == 'a' || letter == 'e' || letter == 'i' || letter == 'o' || letter == 'u'){
			cout << "and a vowel." << endl;
		}else{
			cout << "and a consonant." << endl;
		}
	}else if(isxdigit(letter)){
		cout << " extended character." << endl;
	}
	
	
	
	
	system("pause");
}
