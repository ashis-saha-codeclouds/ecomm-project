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

     /**
     * __delTheUser function to delete the existing banner
     * @param $payload=array() of $_POST Data
     * Return an JSON array of data of the result set
     */
    public function __delTheUser($payload){
        // echo "<pre>";
        // print_r($payload);
        // die();
        $user_id=$this->_escapeTheStringData($payload['userid']);
        $this->_updateData("users",array('user_del'=>'Y'),"user_id='$user_id'");
        $resData=$this->_getTheResdata();
        if(array_key_exists("success",$resData) && !is_null($resData['affectedrows'])){
            return json_encode(array("success" => true, "status" => 200));
        }else{
            return json_encode(array("error" => 'false'));
        }
    }

     /**
     * __getTheUserById function to get the existing User by user ID
     * @param $id=UserId
     * Return an JSON array of data of the result set
     */
    public function __getTheUserById($id){
        // echo "Userid".$id;
        // //die();
        $user_id=$this->_escapeTheStringData($id);
        $this->_selectData('users','user_id,user_fname,user_lname,username,email,mobile,address,city,user_status',null,"user_del='N' AND user_id='$user_id'",null,null);
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }

     /**
     * __updateTheUser function to update the User Data
     * @param $payload=array()
     * Return an JSON array of data of the result set
     */
    public function __updateTheUser($payload){
        //   echo "<pre>";
        // print_r($payload);
        // die();
        $user_id=$this->_escapeTheStringData($payload['userid']);
        $params=[
            "user_fname"=>$this->_escapeTheStringData($payload['user_fname']),
            "user_lname"=>$this->_escapeTheStringData($payload['user_lname']),
            "email"=>$this->_escapeTheStringData($payload['email']),
            "mobile"=>$this->_escapeTheStringData($payload['mobile']),
            "city"=>$this->_escapeTheStringData($payload['city']),
            "address"=>$this->_escapeTheStringData($payload['address']),
            "user_status"=>$this->_escapeTheStringData($payload['user_status'])
        ];
            $this->_updateData("users",$params,"user_id='$user_id'");
            $resData=$this->_getTheResdata();
            if(array_key_exists("success",$resData) && !is_null($resData['affectedrows'])){
                return json_encode(array("success" => true, "status" => 200));
            }else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)){
                return json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"It seems that current and Updated data are same!"));
            }else{
                return json_encode(array("error" => 'false'));
            }
    }
}
?>