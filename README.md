# Admin Panel

A basic CRUD Application using MySQL Database and PHP to create a basic but dynamic website with HTML, CSS and JavaScript.

Showcases CRUD API Functionality compatible with the MySQL DB using PHP.

## Software Used:- 

XAMPP :- https://www.apachefriends.org/

## Installation 
1. Download and Install XAMPP in ```C:\\```.

2. Once Installed, Set the environment variables in your System Path as ```C:\xampp\php```. 

3. Open the XAMPP application and check the Service Checkbox for Apache and MySQL to install their local servers.

4. Click on Start Buttons in the action tab for Apache and MySQL (it will start Apache and MySQL Server).

5. Open this link 'http://localhost/phpmyadmin/' to access PhpMyAdmin.

6. Click on Test Database then click on the Import button Choose the file called 'inventory.sql' and click on the Import button at the bottom. (This will import the inventory.sql table structure in the test database)


## Environment Variables

To run this project, you will need to change the following variables to your connection.php file

```
 // SQL Database Credentials 
	$HOSTNAME = "localhost";
	$USERNAME = "root";
	$PASSWORD = "";
	$DBNAME = "test";
	$TABLE = "inventory";
```

## Deployment
1. Open CMD in the project directory and type the following command :
   ```php -S localhost:8000``` to activate the PHP Server locally.
   
2. Open the browser and visit ```"localhost:8000/index.php"``` to access the Admin-Panel webpage.

# API Testing 

**>!! Any API Testing application will work, ReqBin is being used here to keep installations at a minimum.**

1. Open the Chrome browser and visit ```https://reqbin.com/```. Install the required extension if prompted. (ReqBin HTTP Client extension)


## GET -> /GetAll


Set the HTTP Request to GET and enter 'localhost:8000/api.php/getall'. 

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/bb6d4626-eae5-4d8f-b28a-cc171a72a00a)


After submitting the request, results will be displayed at the bottom.

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/a92a894b-7657-48a5-8030-8d5489110375)




## POST -> /Add


Set the HTTP Request to POST and access the add data API at ```localhost:8000/api.php/add```

Enter the following sample json data in the input text-box:

```{"SKU":"TRS_TWK363696-KI34T", "TSI":"1019-8088", "VENDOR":"104155", "BRAND":"Transolid", "SHIPPING_TEMPLATE":"LTL Freight - By Zone", "TEMPLATE_CODE":"5", "INSTOCK_LEADTIME":"1", "NOSTOCK_LEADTIME":"DEL", "QUANTITY":"29", "OBSOLETE":"N", "IS_UPDATED":"1" }```

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/8972e233-561e-4970-891f-4bea75ca0671)


After Submission, the success message is delivered. (check the database for the added values).

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/ae329f5c-f190-47fb-96a3-bdfce0538aa5)



## DELETE -> /delete


Set the HTTP Request to DELETE and access the delete API at ```localhost:8000/delete/SKU="<Enter any SKU from the Database>"``` and submit.

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/68cb7e37-362a-4a4b-bb31-2a6c426f1cd4)

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/39f1182a-2f05-473a-9d5b-3801b0a3e543)



## UPDATE -> /update


Set the HTTP Request to PUT and access the update API at ```localhost:8000/api.php/update``` 

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/710fe3aa-51c8-41c8-ba73-8eec00caca0e)


Enter the following sample JSON data in the input text box and submit:

```{"SKU":"TRS_TWK363696-KI31G", "TSI":"1019-8088", "VENDOR":"104135", "BRAND":"Transolid", "SHIPPING_TEMPLATE":"LTL Freight - By Zone", "TEMPLATE_CODE":"5", "INSTOCK_LEADTIME":"1", "NOSTOCK_LEADTIME":"DEL", "QUANTITY":"49", "OBSOLETE":"N", "IS_UPDATED":"1" }```

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/55c2a0ae-3cee-4d50-91da-137a77d605c5)



# Snapshots for Execution of the Project Admin Panel

## index.php

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/b43c280e-bf53-418e-86b5-69741107ccab)


## add.php

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/ad85bb39-dd61-4cb7-bd33-a7833ac82b52)


## update.php

![image](https://github.com/anish-chougule/admin-panel/assets/96962237/2e350a8e-efcc-4789-88ea-3fbd106e0377)


By, 
Anish Kiran Chougule
anishchougule@gmail.com
