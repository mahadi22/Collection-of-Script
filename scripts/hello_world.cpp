// LANGUAGE: C++
// AUTHOR: Sujay Jami
// GITHUB: https://github.com/Sujay99999

// Note: in Cpp excutable file is also created after running the code.

#include <iostream>
using namespace std;

void getValue(string name){
        cout<<"Hello World\nand ";
        cout<<"Hello "<<name<<endl;
}

int main() {
        string name;
        cout<<"Enter you Name please :";
        getline(cin, name);//this command is use to enter sentence
        // cin>>name;  this command is use to enter word.
        getValue(name);
        return 0;
}
