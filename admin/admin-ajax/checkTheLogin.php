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
        $username = $_POST['_username'];
        $password = md5($_POST['_password']);
        $db = new Database();
        $db->_selectData('admin', 'username, name, admin_id, role', "username = '$username' AND password = '$password'");
        $resData = $db->_getTheResdata();
        if(!empty($resData)){
            session_start();
            $_SESSION['admin_data']=json_encode($resData);
            //echo json_encode($resData);
            echo json_encode(array("success"=>true,"status"=>200));
            exit();
        }else{
            echo json_encode(array("error"=>"false"));
            exit();
        }
        
    }
}

?>