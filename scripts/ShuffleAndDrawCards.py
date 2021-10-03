# Python program to shuffle and draw a deck of card
import itertools, random
deck = list(itertools.product(['2','3','4','5','6','7','8','9','10','Jack','Queen','King','Ace'],['Spade','Heart','Club','Diamond','Joker']))
random.shuffle(deck)

# draw five cards
print("You got:")
for i in range(5):
   if deck[i][1] == 'Joker':
     print("Joker")
   else:
     print(deck[i][0], "of", deck[i][1])
