# LANGUAGE: Python
# AUTHOR: Andre Westerlund
# GITHUB: https://github.com/westerandr

print('Welcome to the Body Mass Index Calculator\n')

try: 
    # Get user name
    name = input('Hello, I\'m a bot, whats your name?\n')

    # check if name contains only letters
    if not name.isalpha():
        raise Exception('Please enter a valid name\n')
    
    print('Hi '+name)

    weight = input('What is your weight? (kg)\n')
    weight = float(weight)

    height = input('What is your height? (metres)\n')
    height = float(height)

    # BMI = WEIGHT / (HEIGHT ^ 2)
    bmi = weight / (height * height)
    
    print('Your Body Mass Index is '+ str(bmi))

    # Get result of BMI
    if(bmi < 18.5):
        print('You are underweight\n')
    elif(bmi >= 18.5 and bmi < 25):
        print("You are at a healthy weight\n")
    elif(bmi >= 25 and bmi < 30):
        print('You are overweight\n')
    elif(bmi >= 30):
        print('You are obese\n')
    else:
        raise Exception('Unexpected Error Calculating BMI')

# Handle Errors
except Exception as e:
    print(e)
except ZeroDivisionError:
    print('Hey! Your height or weight is not zero 0_0')
except ValueError:
    # Handle
    print('Please enter valid numbers')

finally:
    print('Thank you for using the Body Mass Index Calculator\n')
