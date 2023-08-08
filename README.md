Installation Steps
================

1. Download zip file from the staging branch https://github.com/ashis-saha-codeclouds/ecomm-project
2. After that Unzip file on your local server.
2. Put this file inside "c:/wamp/www/"  OR "c:/xamp/htdocs/" .

Database Configuration:
==================
1. Open phpmyadmin
2. Create New Database named "ecomm".
3. Import database tables in newly created database "ecomm" from downloaded folder -> database -> ecomm.sql.zip.
4. In the "PROJECT-FOLDER/admin/helper/db-config.php" change the value of const DB_NAME = "ecomm".
5. To Login as admin put inside URL:"http://localhost/ecomm-project/admin/"

Admin login Credentials:
====================
Login Id : admin
Password : test@1234

Pending Sections
====================
1. Admin -> Order Section
2. Admin -> User Section
3. Front End 