<?php
require("db-config.php");
abstract class Database
{
    /**
     * $dbhost for the Database Host
     */
    private $dbhost = DB_HOST;
    /**
     * $dbuser for the Database User
     */
    private $dbuser = DB_USER;
    /**
     * $dbpassword for database password
     */
    private $dbpassword = DB_PASSWORD;
    /**
     * $dbname for Database Name
     */
    protected $dbname = DB_NAME;

    /**
     * $mysqli for MySqli object
     */
    private $mysqliq="";
    /**
     * Declared for the database connection status/res. Default values set as False
     */
    protected $conn = false;

    protected function __dbConnect()
    {
        if (!$this->conn) {
            /**
             * checking the DB connection
             */
            try {
                $this->mysqliq = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
                return $this->mysqliq;  
            } catch (Exception $e) {
                echo 'Exception Message: ' . $e->getMessage();
                return false;
                
            }
        } else {
            echo "Database Connected!";
            return $this->mysqliq;  
            //return true;
        }
    }
}

?>