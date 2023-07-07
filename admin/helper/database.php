<?php
include("db-config.php");
class Database
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
    private $dbname = DB_NAME;

    /**
     * $mysqli for MySqli object
     */
    private $mysqli;
    /**
     * Declared for the database connection status/res. Default values set as False
     */
    private $conn = false;

    /**
     * Any results from a query will be stored here
     */
    private $resultArr = array();
    /**
     * Used to generate the SQL Query String
     */
    private $myQuery = "";

    public function __construct()
    {
        if (!$this->conn) {
            /**
             * checking the DB connection
             */
            try {
                $this->mysqli = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
            } catch (Exception $e) {
                echo 'Exception Message: ' . $e->getMessage();
            }
        } else {
            echo "Database Connected!";
        }
    }
    /**
     * _selectData function to select all the data based from the respective tablename
     * @param $table=Table Name | $columns=Column Names, Default is All
     * @param $wherecond= Where clause, Default is NULL
     * Return an associative array of data of the result set
     */
    public function _selectData($table, $columns = "*", $wherecond = null)
    {
        /**
         * Check to see if the table exists
         */
        if ($this->_isTableExist($table)) {
            //$sql="select * from $table";

            $sql = "SELECT $columns FROM ". $table;
            if (!empty($wherecond)) {
                $sql .= " WHERE $wherecond ";
            }
            //$this->myQuery=$sql;
            //die($sql);

            $queryRes = $this->mysqli->query($sql);  
            if ($queryRes) {
                $this->resultArr = $queryRes->fetch_assoc();
            }
        } else {
            array_push($this->resultArr, $this->mysqli->error);
            return false;
        }
    }
    /**
     * _isTableExist function to check the table existance in the Database.
     * @param $table is the Table name that need to check in the database.
     * Returns Type boolean either True | False
     */
    private function _isTableExist($table)
    {
        $tableExistsInDb = $this->mysqli->query("show tables from $this->dbname like '$table'");
        if ($tableExistsInDb) {
            if ($tableExistsInDb->num_rows == 1) {
                return true;
            } else {
                array_push($this->resultArr, $table . " not exist in the database!");
                return false;
            }
        }
    }

    public function _getTheResdata()
    {
        $_resData = $this->resultArr;
        $this->resultArr = array();
        return $_resData;
    }


}

?>