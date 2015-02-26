#include <iostream>
#include <conio.h>
#include <stdio.h>

using namespace std;

int main(){
	
	double q1, q2, q3, quiz, midterms, finals, final_result;
	
	
	cout << "Enter the three quizzes(maximum of 10 points each)" << endl;
	cin >> q1;
	cin >> q2;
	cin >> q3;
	
	cout << "Enter midterms points (maximum of 100): ";
	cin >> midterms;
	
	cout << "Enter finals points (maximum of 100): ";
	cin >> finals;
	
	quiz = ((q1+q2+q3)/3)*10*0.25;
	midterms = midterms * 0.25;
	finals = finals * 0.5;
	
	final_result = quiz + midterms + finals;
	
	cout << "Quiz: " << quiz << endl;
	cout << "Midterms: " << midterms << endl;
	cout << "Finals: " << finals << endl;
	cout << "Final Grade: " << final_result << endl;
	cout << "Rating: ";
	if(final_result >= 90){
		cout << "A" << endl;
	} else if(final_result < 90 && final_result >= 80){
		cout << "B" << endl;
	} else if(final_result < 80 && final_result >= 70){
		cout << "C" << endl;
	} else if(final_result < 70 && final_result >= 60){
		cout << "D" << endl;
	} else {
		cout << "F" << endl;
	}
	
	system("pause");
}
