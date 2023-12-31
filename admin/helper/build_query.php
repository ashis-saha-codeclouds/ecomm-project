<?php 
require_once("database.php");
require_once("query_build_interface.php");
class BuildQuery extends Database implements QueryBuildInterface
{
    /**
     * Any results from a query will be stored here
     */
    private $resultArr = array();
    /**
     * Used to generate the SQL Query String
     */
    private $mysqli = "";

    public function __construct(){
        $this->mysqli=$this->__dbConnect();
    }

    /**
     * _selectData function to select all the data based from the respective tablename
     * @param $table=Table Name | $columns=Column Names, Default is All
     * @param $wherecond= Where clause, Default is NULL
     * Return an associative array of data of the result set
     */
    public function _selectData($table, $columns = "*", $join=null, $whereClause = null, $orderBy=null, $limit=null)
    {
        /**
         * Check to see if the table exists
         */
        if ($this->_isTableExist($table)) {
            //$sql="select * from $table";

            $sql = "SELECT $columns FROM $table";
            //die($sql);
           // $sql .= " FROM $table";
           if($join != null){
            $sql .= " $join ";
           }
           if (!empty($whereClause)) {
            $sql .= " WHERE $whereClause ";
            }
           if($orderBy != null){
            $sql .= " ORDER BY $orderBy ";
           }
           if($limit != null){
            $sql .= " LIMIT $limit ";
           }
            //die($sql);
            //$sql2="SELECT username,password FROM admin WHERE username = 'admin' AND password = '21232f297a57a5a743894a0e4a801fc3'";

            $queryRes = $this->mysqli->query($sql); 
            if ($queryRes) {
                $this->resultArr = $queryRes->fetch_all(MYSQLI_ASSOC);
                return true;
            }else{
                array_push($this->resultArr,$this->mysqli->error);
                return false;
            }
        } else {
            array_push($this->resultArr, $this->mysqli->error);
            return false;
        }
    }


    public function _updateData($table, $parmas=array(), $whereClause=null){
        //sql="UPDATE `admin` SET `email_id` = 'ashish.saha@codeclouds.inn' WHERE `admin`.`admin_id` = 1;"

        if($this->_isTableExist(($table))){
            $updateCol=array();
            $sql="UPDATE $table SET";
            if(!empty($parmas)){
            foreach($parmas as $key=>$value){
                //echo $key."=".$value;
                array_push($updateCol,"`$key`='$value'");
            }
            // echo "<pre>";
            // print_r($updateCol);
            // echo '</pre>';
            $setCol= implode(",",$updateCol);
            $sql .= " $setCol ";
        }
        //$sql2="UPDATE $table SET " . implode(',',$updateCol);
        if($whereClause!=null){
            $sql .=" WHERE $whereClause";
        }
        // echo $sql;
        // die();
            $queryRes=$this->mysqli->query($sql);
            $affectedRows=$this->mysqli->affected_rows;
            //echo $affectedRows;
            // if($affectedRows){
            //     echo "success!";
            // }else{
            //     echo "Fail";
            // }
            // die();
            if($affectedRows){
                $this->resultArr=array("affectedrows"=>$affectedRows,'success'=>true);
                return true;
            }else{
                $error=$this->mysqli->error?$this->mysqli->error:true;
                $this->resultArr=array("error"=>$error,"affectedrows"=>$affectedRows);
                return false;
            }
        }else{
            $this->resultArr=array("error"=>$this->mysqli->error);
            return false;
        }

    }
/**
 * _insertTheData function to insert the data in the table.
 * @param $table is the Table Name where the data needs to be inserted
 * @param array $payload is a combination of table columns and values
 * Return an associative array of data of the result set
 */
    protected function _insertTheData($table,$payload=array()){
        if($this->_isTableExist($table)){
            //INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_status`, `created_at`, `is_deleted`) VALUES (NULL, 'asas', '1', current_timestamp(), 'N');
            $table_columns = implode(', ',array_keys($payload));
            $table_value =implode("','" , $payload);
            $sql="INSERT INTO $table ($table_columns) VALUES ('$table_value')";
            // echo $sql;
            // die();
            if($this->mysqli->query($sql)){
                $this->resultArr=array("insert_id"=>$this->mysqli->insert_id,'success'=>true);
                return true;
            }else{
                $error=$this->mysqli->error?$this->mysqli->error:true;
                $this->resultArr=array("error"=>$error);
                return false;
            }
        }else{
            $this->resultArr=array("error"=>$this->mysqli->error);
            return false;
        }
    }

    protected function _deleteTheData($table,$whereClause=null){
        if($this->_isTableExist($table)){
            $sql="DELETE from $table";
            if($whereClause!=null){
                $sql .=" WHERE $whereClause";
            }
            // echo $sql;
            // die();
            if($this->mysqli->query($sql)){
                $affectedRows=$this->mysqli->affected_rows;
                if($affectedRows){
                    $this->resultArr=array("affectedrows"=>$affectedRows,'success'=>true);
                    return true;
                }else{
                    $error=$this->mysqli->error?$this->mysqli->error:true;
                    $this->resultArr=array("error"=>$error,"affectedrows"=>$affectedRows);
                    return false;
                }
            }else{
                $this->resultArr=array("error"=>$this->mysqli->error);
                return false;
            }
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

    /**
     * _getTheResdata function to return the result to the respective function call.
     * Return Type is an array.
     */
    public function _getTheResdata()
    {
        $_resData = $this->resultArr;
        $this->resultArr = array();
        return $_resData;
    }

    /**
     * _escapeTheStringData function is used to prevent the SQL injection.
     * Implemented the Trim|StripSlashes|HtmlSpecialChars|Mysql Real_Escape_String Functions.
     * @param string $data is the input string.
     * Return type is a string.
     */

    public function _escapeTheStringData($data){
        $data=trim($data); 
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        $data=$this->mysqli->real_escape_string($data);
        return $data;
    }

    /**
     * Closing the existing MySQL connection.
     * Return type is boolean.
     */

    public function  __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
					return true;
            }else{
                return false;
            }
        }
     }
}

?>