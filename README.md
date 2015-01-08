# Parking
Parking management

Hello.
Using MySQL, html/css and php this project helps you to manage your parking system.
I created this keeping SNU in mind.
The general idea is this:
There are 3 major ways to use this software.
When each customer(or driver) enters the institution, they are greeted by the homepage(home.html).
Here, you will be able to enter details about your vehicle. 

When you exit, you will access the exit page(userExit.html). This completes the entry in the database and also notes the exit date and time.

The final way is the administrator. We have the ultimate power here (though not as much as the programmer :P).
We will be able to view any details of any vehicle at any time and any place. The search function is simply glorious and its really worth to input some values and check it out.



To run this project, you need a MySQL server running and php enabled.
The database needs a database called 'Parking'
In this database, we need 4 tables:
Slot
Users
administrator
customers

The description of each table is as follows:
Slot

Attributes | Type | Size
---------- | ---- | ----
id | char | 3
type | char |1
free | char |1
  
Users

Attributes | Type | Size
---------- | ---- | ----
id         | char | 5
enterTime  | time | -
exitTime   | time | -
enterDate  | date | -
exitDate   | date | -
slot       | char | 3


administrator

Attributes | Type    | Size
---------- | ----    | ----
username   | varchar | 25
password   | varchar | 30

customers

Attributes | Type    | Size
---------- | ----    | ----
id         | char    | 5
name       | char    | 255
email      | text    | -
mobile     | varchar | 13
ping       | char      4
  
Also, be sure to create a admin in sql. Otherwise, you cannot access the administrator page. 
