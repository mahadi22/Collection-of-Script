#include <iostream>
using namespace std;


void print_cards(char *message, char *cards, int user_pick){            //this function will print the structure of the game/cards
    int i;
    cout << "\n    ***" << message << "    ***\n";
    cout << "          ._.     ._.     ._.\n";
    cout << "Cards:    |" << cards[0] << "|     |" << cards[1] << "|     |" << cards[2] << "|\n";
    if(user_pick == -1){
        cout << "           1       2       3 \n\n";
    }
    else{
        for (i=0;i<user_pick;i++){
            cout << "\t";
        }
        cout << "           ^-- your pick\n\n";
    }
}

int find_the_ace(char *p){                                 //find the ace game(main)
    int i, ace, total_wager;
    int invalid_choice, pick= -1, wager_one=-1, wager_two=-1;
    char choice_two, cards[3]= {'X','X','X'};

    ace = rand()%3;

    /*if(player credit ==0){
        ("You don't have any credits to wager!\n");
    }
    while(wager_one==-1){
        //reduce credit
    }*/

    cout<<"************Find the Ace************\n\n";
    cout<<"#This game will cost you 10 credits.\n\n";
    cout<<"Three cards will be dealt out, two queens and one ace,\n";
    cout<<"If you find the ace, you will win your wager.\n";
    cout<<"After choosing a card, one of the queen will be revealed.\n";
    cout<<"At this point, you may either select a different card or\n";
    cout<<"try your luck!\n\n";
    print_cards("Dealing cards", cards, -1);
    pick=-1;
    while((pick<1)||(pick>3)){
        cout<<"Select a card: 1,2 or 3\n";
        cin>>pick;
    }
    pick--;
    i=0;
    while(i==ace || i==pick){
        i++;
    }
    cards[i]='Q';
    print_cards("Revealing a queen", cards, pick);
    invalid_choice=1;
    while(invalid_choice){
        cout<<"Would you like to change your pick (y/n):  ";
        cin>>choice_two;
        if(choice_two=='y'||choice_two=='Y'){
            i=invalid_choice=0;
            while(i==pick || cards[i]=='Q'){
                i++;
            }
            pick=i;
            cout<<"Your card pick has been changed to card "<<pick+1<<endl;
        }
        else{
            cout<<"thank you for playing";
        }
        for(i=0;i<3;i++){
            if(ace==i){
                cards[i]='A';
            }
            else{
                cards[i]='Q';
            }
        }
        print_cards("End result", cards, pick);
        if(pick == ace){
            cout<<"You WON!";
            invalid_choice=0;
        }
        else{
            cout<<"Better luck next time";
        }
    }
}


int main()
{
    char playerName[40];
    cout<<"Enter your name: ";
    cin>>playerName;
    find_the_ace(playerName);

    return 0;
}
