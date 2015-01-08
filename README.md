# Parking
Parking management

Hello.
Using MySQL, html/css and php this project helps you to manage your parking system.
I created this keeping SNU in mind.
The general idea is this:
When each customer(or driver) enters the institution, they are greeted by the homepage(home.html).
Here, you will be able to enter details about your vehicle. 

Create a database and inpt some random values.


To run this project, you need a MySQL server running and php enabled.
The database needs a database called 'Parking'
In this database, we need 4 tables:
Slot
Users
administrator
customers

The description of each table is as follows (The size of each field is given in paranthesis):
Slot
3 attributes
  id char(3)
  type char(1)
  free char(1)
  
Users
6 attributes
  id char(5)
  enterTime time
  exitTime time
  enterDate date
  exitDate date
  slot char(3)

administrator
2 attributes
  username varchar(25)
  password varchar(30)

customers
5 attributes
  id char(5)
  name char(255)
  email text
  mobile varchar(13)
  pin char(4)
