Final Project
Group #14
Windows Version:Windows 10 64-bit
Package Used:XAMPP Version 1.8.2
Server Used:Apache Version 2.4.7
Database Used:MySQL 5.5.34
PHP:5.4.22
phpMyAdmin:4.0.9
Python Version 2.7

Requirements:
1. xampp software bundle

Creating the database, obtaining stock information:
1. Launch the Apache server and MySQL server in the xampp application
2. Place all the php scripts in the folder 'xampp' under /xampp/htdocs/xampp/
3. Go to /localhost/phpmyadmin/ in your web browser and create a new database with the name "webapps_group14"
4. Go to /localhost/xampp and run the php scripts "history_table.php", "current_table.php" 
	to create the database tables "price_history" and "price_current"
5. In the script "history_1year.php", change the value of the variable "id" to the ticker symbol
	whose stock history you want to download and run the script
6. Run the "currentprice.php" 
	to get values of prices of the stocks "GOOG, YHOO, MSFT, INTC, CSCO" every 60 seconds
7. Enter localhost/sourceCode/login.php in any of the Web Browsers.
8. To Compile the Python files:python "name of the python file'.py in the cmd. The folder has the compliled files as of now.

Note: There is a script "clear_table.php" to clear the contents of a table if needed. 
	Change the name of the table to the one you wish to delete. 


Folder Descriptions:
1> 'Database dumps' has the database dumps.
2> 'sourceCode' has the PHP and Python files required for the website.
3> UML diagrams are in the report
4> Database tables has the scripts for creating the tables

