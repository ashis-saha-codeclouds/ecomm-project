<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include('../helper/database.php');
// $db = new Database();
// $db->_selectData("admin","");
// $result=$db->_getTheResdata();
// echo json_encode($result);
if (isset($_POST['_login'])) {
    if (!isset($_POST['_username']) || empty($_POST['_username'])) {
        json_encode(array("error" => "Name is Empty!"));
    } elseif (!isset($_POST['_password']) || empty($_POST['_password'])) {
        json_encode(array("error" => "Password is Empty!"));
    } else {
        $db = new Database();
        $username = $db->_escapeTheStringData($_POST['_username']);
        $password = md5($db->_escapeTheStringData($_POST['_password']));
        $db->_selectData('admin', 'username, name, admin_id, role, email_id', "username = '$username' AND password = '$password'");
        $resData = $db->_getTheResdata();
        if (!empty($resData)) {
            session_start();
            $_SESSION['admin_data'] = json_encode($resData);
            //echo json_encode($resData);
            echo json_encode(array("success" => true, "status" => 200));
            exit();
        } else {
            echo json_encode(array("error" => "false"));
            exit();
        }

    }
}

if (isset($_POST['updateThepassword'])) {
    if (!isset($_POST['oldPassword']) || empty($_POST['oldPassword'])) {
        echo json_encode(array("errorMsg" => "Old Password is required!","error" => "false"));
        exit();
    } else if (!isset($_POST['newPassword']) || empty($_POST['newPassword'])) {
        echo json_encode(array("errorMsg" => "New Password is required!","error" => "false"));
        exit();
    } else if($_POST['newPassword'] == $_POST['oldPassword']){
        echo json_encode(array("errorMsg" => "New Password is same as the old password!","error" => "false"));
        exit();
    } else {
        $db = new Database();
        $oldpassword = md5($db->_escapeTheStringData($_POST['oldPassword']));
        $newpassword = md5($db->_escapeTheStringData($_POST['newPassword']));
        $emailid = $db->_escapeTheStringData($_POST['email']);
        $db->_updateData('admin', array('password' => $newpassword), "email_id='$emailid' AND password='$oldpassword'");
        $resData = $db->_getTheResdata();
        // echo "<pre>";
        // print_r($resData);
        // echo "</pre>";
        //var_dump($resData);
        //echo !is_null($resData);
        if (array_key_exists("success",$resData) && !is_null($resData['affectedrows'])) {
            echo json_encode(array("success" => true, "status" => 200));
            exit();
        } else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)) {
            echo json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"Given Old Password doesn't match!"));
            exit();
        }else{
            echo json_encode(array("error" => 'false'));
            exit();
        }


    }
}

if (isset($_POST['updateTheProfile'])) {
    // echo "<pre>";
    //     print_r($_POST);
    //     echo "</pre>";
    if (!isset($_POST['name']) || empty($_POST['name'])) {
        echo json_encode(array("errorMsg" => "Name is required!","error" => "false"));
        exit();
    } else if (!isset($_POST['email']) || empty($_POST['email'])) {
        echo json_encode(array("errorMsg" => "Email is required!","error" => "false"));
        exit();
    }else{
        $db = new Database();
        $name=$db->_escapeTheStringData($_POST['name']);
        $email=$db->_escapeTheStringData($_POST['email']);
        $admin_id=$db->_escapeTheStringData($_POST['role']);
        $db->_updateData('admin', array('name' => $name, 'email_id'=>$email), "admin_id='$admin_id'");
        $resData = $db->_getTheResdata();
        if (array_key_exists("success",$resData) && !is_null($resData['affectedrows'])) {
                session_start();
                $db->_selectData('admin', 'username, name, admin_id, role, email_id', "admin_id='$admin_id'");
                $resAdminData = $db->_getTheResdata();
                if (!empty($resAdminData)) {
                    if(!session_id()){
                        session_start();
                    }
                    $_SESSION['admin_data'] = json_encode($resAdminData);
                }
            echo json_encode(array("success" => true, "status" => 200));
            exit();
        } else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)) {
            echo json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"It seems that current and Updated are same!"));
            exit();
        }else{
            echo json_encode(array("error" => 'false'));
            exit();
        }
    }
    
}

if (isset($_POST['siteSettings'])) {
    echo "<pre>";
        print_r($_POST);
        echo "</pre>";
}

?>