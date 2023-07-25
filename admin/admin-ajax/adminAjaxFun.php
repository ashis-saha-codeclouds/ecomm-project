<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//include('../helper/build_query.php');
include('../helper/admin.php');
include('../helper/category.php');
// $db = new Database();
// $db->_selectData("admin","");
// $result=$db->_getTheResdata();
// echo json_encode($result);

// $db=new BuildQuery();
// $db->_selectData("admin","*","");
// $result=$db->_getTheResdata();
// echo json_encode($result);
// die();

if (isset($_POST['_login'])) {
    if (!isset($_POST['_username']) || empty($_POST['_username'])) {
        json_encode(array("error" => "Name is Empty!"));
    } elseif (!isset($_POST['_password']) || empty($_POST['_password'])) {
        json_encode(array("error" => "Password is Empty!"));
    } else {
    //     $db = new BuildQuery();
    //     $username = $db->_escapeTheStringData($_POST['_username']);
    //     $password = md5($db->_escapeTheStringData($_POST['_password']));
    //     $db->_selectData('admin', 'username, name, admin_id, role, email_id', "username = '$username' AND password = '$password'");
    //     $resData = $db->_getTheResdata();
    //     if (!empty($resData)) {
    //         session_start();
    //         $_SESSION['admin_data'] = json_encode($resData);
    //         //echo json_encode($resData);
    //         echo json_encode(array("success" => true, "status" => 200));
    //         exit();
    //     } else {
    //         echo json_encode(array("error" => "false"));
    //         exit();
    //     }

    $adminDb=new Admin();
    $res=$adminDb->__adminLogin($_POST);
    echo $res;
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
        $adminDb = new Admin();
        $res=$adminDb->__updateTheAdminPassword($_POST);
        echo $res;
        // $oldpassword = md5($db->_escapeTheStringData($_POST['oldPassword']));
        // $newpassword = md5($db->_escapeTheStringData($_POST['newPassword']));
        // $emailid = $db->_escapeTheStringData($_POST['email']);
        // $db->_updateData('admin', array('password' => $newpassword), "email_id='$emailid' AND password='$oldpassword'");
        // $resData = $db->_getTheResdata();
        // // echo "<pre>";
        // // print_r($resData);
        // // echo "</pre>";
        // //var_dump($resData);
        // //echo !is_null($resData);
        // if (array_key_exists("success",$resData) && !is_null($resData['affectedrows'])) {
        //     echo json_encode(array("success" => true, "status" => 200));
        //     exit();
        // } else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)) {
        //     echo json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"Given Old Password doesn't match!"));
        //     exit();
        // }else{
        //     echo json_encode(array("error" => 'false'));
        //     exit();
        // }


    }
}

if (isset($_POST['updateTheProfile'])) {
    if(!isset($_POST['name']) || empty($_POST['name'])) {
        echo json_encode(array("errorMsg" => "Name is required!","error" => "false"));
        exit();
    }elseif(!isset($_POST['email']) || empty($_POST['email'])) {
        echo json_encode(array("errorMsg" => "Email is required!","error" => "false"));
        exit();
    }else{
        // $db = new BuildQuery();
        // $name=$db->_escapeTheStringData($_POST['name']);
        // $email=$db->_escapeTheStringData($_POST['email']);
        // $admin_id=$db->_escapeTheStringData($_POST['role']);
        // $db->_updateData('admin', array('name' => $name, 'email_id'=>$email), "admin_id='$admin_id'");
        // $resData = $db->_getTheResdata();
        // if (array_key_exists("success",$resData) && !is_null($resData['affectedrows'])) {
        //         session_start();
        //         $db->_selectData('admin', 'username, name, admin_id, role, email_id', "admin_id='$admin_id'");
        //         $resAdminData = $db->_getTheResdata();
        //         if (!empty($resAdminData)) {
        //             if(!session_id()){
        //                 session_start();
        //             }
        //             $_SESSION['admin_data'] = json_encode($resAdminData);
        //         }
        //     echo json_encode(array("success" => true, "status" => 200));
        //     exit();
        // } else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)) {
        //     echo json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"It seems that current and Updated are same!"));
        //     exit();
        // }else{
        //     echo json_encode(array("error" => 'false'));
        //     exit();
        // }
        $adminDb = new Admin();
        $res=$adminDb->__updateTheAdminProfile($_POST);
        echo $res;
        
    }
    
}

if (isset($_POST['siteSettings'])) {
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES['site_logo']);
    // echo $file_name=$_FILES['site_logo']['name'];
    // echo "------";
    //  $file_ext=explode('.',$file_name);
    //  print_r($file_ext);
    //  echo end($file_ext);
    // echo "</pre>";
    // exit();
    if(!isset($_POST['site_name']) || empty($_POST['site_name'])){
        echo json_encode(array('error'=>'Site Name Field is Empty.')); 
        exit;
    }elseif(!isset($_POST['site_title']) || empty($_POST['site_title'])){
        echo json_encode(array('error'=>'Site Title Field is Empty.')); 
        exit;
    }elseif(!isset($_POST['site_desc']) || empty($_POST['site_desc'])){
        echo json_encode(array('error'=>'Site Description Field is Empty.')); 
        exit;
    }elseif(!isset($_POST['site_address']) || empty($_POST['site_address'])){
        echo json_encode(array('error'=>'Site Address Field is Empty.')); 
        exit;
    }elseif(!isset($_POST['site_email']) || empty($_POST['site_email'])){
        echo json_encode(array('error'=>'Site Email Field is Empty.')); 
        exit;
    }elseif(!isset($_POST['site_contact']) || empty($_POST['site_contact'])){
        echo json_encode(array('error'=>'Site Title Field is Empty.')); 
        exit;
    }else{
        // die("Test");
        // $errors=array();
        // if(!empty($_POST['site_logo_current']) && empty($_FILES['site_logo']['name'])){
        //     $file_name=$_POST['site_logo_current'];
        // }elseif(!empty($_POST['site_logo_current']) && !empty($_FILES['site_logo']['name'])){
        //     $file_name=$_FILES['site_logo']['name'];
        //     $file_size=$_FILES['site_logo']['size'];
        //     $file_type=$_FILES['site_logo']['type'];
        //     $file_temp=$_FILES['site_logo']['tmp_name'];
        //     $file_name=str_replace(array(',',' '),'',$file_name);
        //     $file_ext=explode('.',$file_name);
        //     $file_ext=strtolower(end($file_ext));
        //     $allowed_ext=array("jpeg","jpg","png");
        //     if(!in_array($file_ext,$allowed_ext)){
        //         $errors[]="Sorry! Extension not allowed. Please select a JPEG or PNG image";
        //     }
        //     if($file_size>2097152){
        //         $errors[]="Sorry! Please upload a file less than 2 MB";
        //     }
        //     // if(file_exists("../../images/".$_POST['site_logo_current'])){
        //     //     unlink("../../images/".$_POST['site_logo_current']);
        //     // }
        //     $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        // }elseif(empty($_POST['site_logo_current']) && !empty($_FILES['site_logo']['name'])){
        //     $file_name=$_FILES['site_logo']['name'];
        //     $file_size=$_FILES['site_logo']['size'];
        //     $file_type=$_FILES['site_logo']['type'];
        //     $file_temp=$_FILES['site_logo']['tmp_name'];
        //     $file_name=str_replace(array(',',' '),'',$file_name);
        //     $file_ext=explode('.',$file_name);
        //     $file_ext=strtolower(end($file_ext));
        //     $allowed_ext=array("jpeg","jpg","png");
        //     if(!in_array($file_ext,$allowed_ext)){
        //         $errors[]="Sorry! Extension not allowed. Please select a JPEG or PNG image";
        //     }
        //     if($file_size>2097152){
        //         $errors[]="Sorry! Please upload a file less than 2 MB";
        //     }
        //     // if(file_exists("../../images/".$_POST['site_logo_current'])){
        //     //     unlink("../../images/".$_POST['site_logo_current']);
        //     // }

        //     $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        // }
        // if(!empty($errors)){
        //     echo json_encode($errors);
        //     exit();
        // }else{
            // $db = new BuildQuery();
            // $optn_id=$db->_escapeTheStringData($_POST['optn']);
            // $params=[
            //     "site_name"=>$db->_escapeTheStringData($_POST['site_name']),
            //     "site_title"=>$db->_escapeTheStringData($_POST['site_title']),
            //     "site_desc"=>$db->_escapeTheStringData($_POST['site_desc']),
            //     "site_address"=>$db->_escapeTheStringData($_POST['site_address']),
            //     "site_email"=>$db->_escapeTheStringData($_POST['site_email']),
            //     "site_contact"=>$db->_escapeTheStringData($_POST['site_contact']),
            //     "site_logo"=>$db->_escapeTheStringData($file_name)
            // ];
            // $db->_updateData("options", $params, "opt_id='$optn_id'");
            // $resData=$db->_getTheResdata();
            // //echo json_encode($resData);
            // if(array_key_exists("success",$resData) && !is_null($resData['affectedrows'])){
            //     if(!empty($_FILES['site_logo']['name'])){
            //         move_uploaded_file($file_temp,"../../images/".$file_name);
            //     }
            //     echo json_encode(array("success" => true, "status" => 200));
            //     exit();
            // }else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)){
            //     echo json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"It seems that current and Updated data are same!"));
            //     exit();
            // }else{
            //     echo json_encode(array("error" => 'false'));
            //     exit();
            // }    
            $adminDb = new Admin();
            $res=$adminDb->__updateTheSiteSettings($_POST,$_FILES);
            echo $res;    
        }
    }

    if(isset($_POST["categoryAdd"])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        if(!isset($_POST['cat_name']) || empty($_POST['cat_name'])){
            echo json_encode(array('error'=>'Category Name is Empty.')); 
            exit();
        }else{
            $catdb = new Category();
            $res=$catdb->__createProductCategory($_POST);
            echo $res;
        }
    }

    if(isset($_POST['cat_del'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        if(!isset($_POST['catid']) || empty($_POST['catid'])){
            echo json_encode(array('error'=>'category id is missing!'));
            exit();
        }else{
            $catdb = new Category();
            $res=$catdb->__delTheCategory($_POST);
            echo $res;
        }

    }

?>