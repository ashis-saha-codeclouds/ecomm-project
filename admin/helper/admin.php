<?php 
require_once("build_query.php");
class Admin extends BuildQuery{
    public function __adminLogin($payload){
        $username = $this->_escapeTheStringData($payload['_username']);
        $password = md5($this->_escapeTheStringData($payload['_password']));
        $this->_selectData('admin', 'username, name, admin_id, role, email_id', "username = '$username' AND password = '$password'");
        $resData = $this->_getTheResdata();
        if (!empty($resData)) {
            session_start();
            $_SESSION['admin_data'] = json_encode($resData);
            //echo json_encode($resData);
            return json_encode(array("success" => true, "status" => 200));
        } else {
            return json_encode(array("error" => "false"));
        }
   
    }

    public function __updateTheAdminPassword($payload){
        $oldpassword = md5($this->_escapeTheStringData($payload['oldPassword']));
        $newpassword = md5($this->_escapeTheStringData($payload['newPassword']));
        $emailid = $this->_escapeTheStringData($_post['email']);
        $this->_updateData('admin', array('password' => $newpassword), "email_id='$emailid' AND password='$oldpassword'");
        $resData = $this->_getTheResdata();
        // echo "<pre>";
        // print_r($resData);
        // echo "</pre>";
        //var_dump($resData);
        //echo !is_null($resData);
        if (array_key_exists("success",$resData) && !is_null($resData['affectedrows'])) {
            return json_encode(array("success" => true, "status" => 200));
        } else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)) {
            return json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"Given Old Password doesn't match!"));
        }else{
            return json_encode(array("error" => 'false'));
        }
    }

    public function __updateTheAdminProfile($payload){
        $name=$this->_escapeTheStringData($payload['name']);
        $email=$this->_escapeTheStringData($payload['email']);
        $admin_id=$this->_escapeTheStringData($payload['role']);
        $this->_updateData('admin', array('name' => $name, 'email_id'=>$email), "admin_id='$admin_id'");
        $resData = $this->_getTheResdata();
        if (array_key_exists("success",$resData) && !is_null($resData['affectedrows'])) {
                session_start();
                $this->_selectData('admin', 'username, name, admin_id, role, email_id', "admin_id='$admin_id'");
                $resAdminData = $this->_getTheResdata();
                if (!empty($resAdminData)) {
                    if(!session_id()){
                        session_start();
                    }
                    $_SESSION['admin_data'] = json_encode($resAdminData);
                }
            return json_encode(array("success" => true, "status" => 200));
        } else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)) {
            return json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"It seems that current and Updated are same!"));
        }else{
            return json_encode(array("error" => 'false'));
        }
    }

    public function __updateTheSiteSettings($_post,$_files){
        if(!empty($_post['site_logo_current']) && empty($_files['site_logo']['name'])){
            $file_name=$_post['site_logo_current'];
        }elseif(!empty($_post['site_logo_current']) && !empty($_files['site_logo']['name'])){
            $file_name=$_files['site_logo']['name'];
            $file_size=$_files['site_logo']['size'];
            $file_type=$_files['site_logo']['type'];
            $file_temp=$_files['site_logo']['tmp_name'];
            $file_name=str_replace(array(',',' '),'',$file_name);
            $file_ext=explode('.',$file_name);
            $file_ext=strtolower(end($file_ext));
            $allowed_ext=array("jpeg","jpg","png");
            if(!in_array($file_ext,$allowed_ext)){
                $errors[]="Sorry! Extension not allowed. Please select a JPEG or PNG image";
            }
            if($file_size>2097152){
                $errors[]="Sorry! Please upload a file less than 2 MB";
            }
            // if(file_exists("../../images/".$_post['site_logo_current'])){
            //     unlink("../../images/".$_post['site_logo_current']);
            // }
            $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        }elseif(empty($_post['site_logo_current']) && !empty($_files['site_logo']['name'])){
            $file_name=$_files['site_logo']['name'];
            $file_size=$_files['site_logo']['size'];
            $file_type=$_files['site_logo']['type'];
            $file_temp=$_files['site_logo']['tmp_name'];
            $file_name=str_replace(array(',',' '),'',$file_name);
            $file_ext=explode('.',$file_name);
            $file_ext=strtolower(end($file_ext));
            $allowed_ext=array("jpeg","jpg","png");
            if(!in_array($file_ext,$allowed_ext)){
                $errors[]="Sorry! Extension not allowed. Please select a JPEG or PNG image";
            }
            if($file_size>2097152){
                $errors[]="Sorry! Please upload a file less than 2 MB";
            }
            // if(file_exists("../../images/".$_post['site_logo_current'])){
            //     unlink("../../images/".$_post['site_logo_current']);
            // }

            $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        }
        if(!empty($errors)){
            echo json_encode($errors);
            exit();
        }else{
            $optn_id=$this->_escapeTheStringData($_post['optn']);
            $params=[
                "site_name"=>$this->_escapeTheStringData($_post['site_name']),
                "site_title"=>$this->_escapeTheStringData($_post['site_title']),
                "site_desc"=>$this->_escapeTheStringData($_post['site_desc']),
                "site_address"=>$this->_escapeTheStringData($_post['site_address']),
                "site_email"=>$this->_escapeTheStringData($_post['site_email']),
                "site_contact"=>$this->_escapeTheStringData($_post['site_contact']),
                "site_logo"=>$this->_escapeTheStringData($file_name)
            ];
            $this->_updateData("options", $params, "opt_id='$optn_id'");
            $resData=$this->_getTheResdata();
            //echo json_encode($resData);
            if(array_key_exists("success",$resData) && !is_null($resData['affectedrows'])){
                if(!empty($_files['site_logo']['name'])){
                    move_uploaded_file($file_temp,"../../images/".$file_name);
                }
                return json_encode(array("success" => true, "status" => 200));
            }else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)){
                return json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"It seems that current and Updated data are same!"));
            }else{
                return json_encode(array("error" => 'false'));
            }
        }
    }

    public function __getTheSiteSettings(){
       $this->_selectData("options","*",null);
       $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => "false"));
        }
    }
}
?>