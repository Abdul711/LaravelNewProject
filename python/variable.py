x = 4       # x is of type int
x = "Sally" # x is now of type str
print(x)

###### get the type of variable 
x = 5
y = "John"
print(type(x))
print(type(y))
####A variable name must start with a letter or the underscore character
###A variable name cannot start with a number
###A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )
### variable names are case-sensitive (age, Age and AGE are three different variables)
##### many values to many variable

x, y, z = "Orange", "Banana", "Cherry"
print(x)
print(y)
print(z)
### one value to mamy variable
x = y = z = "Orange"
print(x)
print(y)
print(z)
### extrat the array
fruits = ["apple", "banana", "cherry"]
x, y, z = fruits
print(x)
print(y)
print(z)
###The Python print statement is often used to output variables.

###To combine both text and a variable, Python uses the + character:

x = "awesome"
print("Python is " + x)
##### '+' is used as concatenation 
x = "Python is "
y = "awesome"
z =  x + y
print(z)
