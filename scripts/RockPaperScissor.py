import random, os, re, atexit
from colorama import Fore, Style

def exit_handler():
    print(Style.RESET_ALL + "Exiting....   ")
atexit.register(exit_handler)

os.system('cls' if os.name=='nt' else 'clear')
while (1 < 2):
    print ("\n")
    print (Fore.WHITE + "Rock, Paper, Scissors - Shoot!")
    userChoice = input(Fore.WHITE + "Choose your weapon [R]ock], [P]aper, or [S]cissors or [E]xit: ").lower()
    if not re.match("[SsRrPpEe]", userChoice):
        print (Fore.WHITE + "Please choose a letter:")
        print (Fore.WHITE + "[R]ock, [S]cissors or [P]aper or [E]xit.")
        continue

    print ("You chose: " + userChoice)
    if userChoice == "e" :
        break
    choices = ['R', 'P', 'S']
    opponentChoice = random.choice(choices)
    print (Fore.RED + "I chose: " + opponentChoice)
    if opponentChoice == str.upper(userChoice):
        print (Fore.CYAN + "      %%% Tie ! %%% ")
        print(Style.RESET_ALL)
    #if opponentChoice == str("R") and str.upper(userChoice) == "P"
    elif opponentChoice == 'R' and userChoice.upper() == 'S':      
        print (Fore.MAGENTA + "      Rock beats Scissors, I win! ")
        print(Style.RESET_ALL)
        continue
    elif opponentChoice == 'S' and userChoice.upper() == 'P':      
        print (Fore.MAGENTA + "      Scissors beats paper! I win! ")
        print(Style.RESET_ALL)
        continue
    elif opponentChoice == 'P' and userChoice.upper() == 'R':      
        print (Fore.MAGENTA + "      Paper beat rock, I win! ")
        print(Style.RESET_ALL)
        continue
    else:       
        print (Fore.GREEN + "      *** Congratulations ! You won ! ***")
        print(Style.RESET_ALL)   
    
