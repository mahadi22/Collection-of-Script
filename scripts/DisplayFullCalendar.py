# Program to display full calendar of the inputted year
import calendar

#Default year
yy = 2021

while True:
  while True:
    try :
       yy = int(input("Enter year: "))
    except ValueError:
      print("Invalid input.")
      continue
    if yy < 0:
      print("Sorry, your response must not be negative.")
      continue
    else :
      break
  
  try :  
    print(calendar.calendar(yy))
  except :
    print("Invalid Input / Something Wrong.")
    continue

  while True:
    again = input("do it again? (yes/no): ").lower()
    if again == "y" or again == "yes" or again == "no" or again == "n" :
        break
    else :
      print("Invalid input.")
      continue
	  
  try:
    if again == "no" or again == "n" :
      break    
  except : 
    print("Something going wrong")
  else :
    continue
