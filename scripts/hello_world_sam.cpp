// LANGUAGE: C++
// AUTHOR: Sam
// GITHUB: https://github.com/Smriti925

#include<iostream>
using namespace std;
int main()
{
    char str[200], *ptr;
    cout<<"Enter name: ";
    gets(str);
    ptr = &str[0];
    cout<<"Hello World \nHi ";
    while(*ptr)
    {
        cout<<*ptr;
        ptr++;
    }
    cout<<"!";
    return 0;
}
