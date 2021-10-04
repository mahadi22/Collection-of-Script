# Python Program to calculate the square root
print("This Script finding square root of the number inputted by user\n")
while True:
  try:
    num = int(input('Enter a number: '))
  except ValueError:
    print("Invalid input.")
    continue
  if num < 0:
    print("Sorry, your input must not be negative.")
    continue
  
  num_sqrt = num ** 0.5
  print('The square root of %0.3f is %0.3f'%(num ,num_sqrt))
  
  while True:
    again = input("do it again? (yes/no): ").lower()
    if again == "y" or again == "yes" or again == "ye" or again == "no" or again == "n" :
      break
    else :
      print("Invalid input.")
      continue
    
  if again == "no" or again == "n" :
      break   
