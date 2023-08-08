<?php 
require_once("build_query.php");
class User extends BuildQuery{

    /**
     * __getAllTheUsers function to get all the Users
     * Return an JSON array of data of the result set
     */
    public function __getAllTheUsers(){
        $this->_selectData('users','user_id,user_fname,user_lname,username,email,mobile,address,city,user_status',null,"user_del='N'","user_id DESC",null);
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }
}
?>