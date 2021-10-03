# Program to display calendar of the given month and year
import calendar

#Default year and month
yy = 2008
mm = 1

while True:
  while True:
    try: 
      mm = int(input("Enter month: "))
    except ValueError:
      print("Invalid input.")
      continue
    if mm < 0:
      print("Sorry, your response must not be negative.")
      continue
    else :
      break
  
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
    print(calendar.month(yy, mm))
  except :
    print("Invalid Input / Something Wrong.")
    continue

  while True:
    again = input("do it again? (yes/no): ")
    if again == "y" or again == "yes" or again == "Y" or again == "YES" :
        break
    if again == "no" or again == "n" or again == "NO" or again == "N" :
        break
    else :
      print("Invalid input.")
      continue
    
  if again == "no" or again == "n" or again == "NO" or again == "N" :
      break    
