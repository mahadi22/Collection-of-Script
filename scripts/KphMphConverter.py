print("-------------------------------------")
print("- Convert KPH to MPH and vice versa -")
print("-------------------------------------")
while True :
  print(" ")
  print("1. KPH to MPH")
  print("2. MPH to KPH")
  try :
    c1 = int(input("What do you want to convert(1/2): "))
  except ValueError:
    print("Invalid input.")
  if c1 < 0 or c1 > 2:
    print("Sorry, please input 1 or 2.")

  if c1 == 1 :
    while True :
      try :
        in1 = int(input("Input KPH number here: "))
      except :
        print("Invalid input.")
      else :
        out1 = in1 * 0.621371
        print("%0.3f KPH = %0.3f MPH" % (in1, out1))
        break

  if c1 == 2 :
    while True :
      try :
        in2 = int(input("Input MPH number here: "))
      except :
        print("Invalid input.")
      else :
        out2 = in2 * 1.60934
        print("%0.3f MPH = %0.3f KPH" % (in2, out2))
        break

  while True:
    print("")
    try :
      again = input("do it again? (yes/y/no/n): ").lower()
    except :
      print("Invalid input.")
    else :
      if again == "y" or again == "yes" or again == "no" or again == "n" :
        break
      else :
        print("Invalid input.")

  if again == "no" or again == "n" :
      break
