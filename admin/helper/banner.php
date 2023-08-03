<?php
require_once("build_query.php");
class Banner extends BuildQuery{
    public function __createTheBanner($_post,$_files){
        if(!empty($_post['banner_image_current']) && empty($_files['banner_image']['name'])){
            $file_name=$_post['banner_image_current'];
        }elseif(!empty($_post['banner_image_current']) && !empty($_files['banner_image']['name'])){
            $file_name=$_files['banner_image']['name'];
            $file_size=$_files['banner_image']['size'];
            $file_type=$_files['banner_image']['type'];
            $file_temp=$_files['banner_image']['tmp_name'];
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
            // if(file_exists("../../images/".$_post['banner_image_current'])){
            //     unlink("../../images/".$_post['banner_image_current']);
            // }
            $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        }elseif(empty($_post['banner_image_current']) && !empty($_files['banner_image']['name'])){
            $file_name=$_files['banner_image']['name'];
            $file_size=$_files['banner_image']['size'];
            $file_type=$_files['banner_image']['type'];
            $file_temp=$_files['banner_image']['tmp_name'];
            $file_name=str_replace(array(',',' '),'',$file_name);
            $file_ext=explode('.',$file_name);
            $file_ext=strtolower(end($file_ext));
            $allowed_ext=array("jpeg","jpg","png");
            if(!in_array($file_ext,$allowed_ext)){
                $errors[]="Sorry! Extension not allowed. Please select a JPEG or PNG image";
            }
            // list($width, $height) = getimagesize($file_temp);
            // if($width < "900" || $height < "900") {
            //     $errors[]="Sorry! Please upload a image of size 900*900";
            // }
            if($file_size>2097152){
                $errors[]="Sorry! Please upload a file less than 2 MB";
            }
            // if(file_exists("../../images/".$_post['banner_image_current'])){
            //     unlink("../../images/".$_post['banner_image_current']);
            // }

            $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        }
        if(!empty($errors)){
            //echo json_encode($errors);
            return json_encode(array("error" => "false","errorMsg"=>$errors[0]));
        }else{
            $banner_title=$this->_escapeTheStringData($_post['banner_title']);
            $this->_selectData('banner','banner_title',"banner_title='$banner_title'");
            $resChekData=$this->_getTheResdata();
            if(!empty($resChekData)){
                return json_encode(array("error" => "false",'errorMsg'=>'Banner with the same title is already exists! Please try to create the banner with a different title'));
            }
            $params=[
                "banner_title"=>$this->_escapeTheStringData($_post['banner_title']),
                "banner_status"=>$this->_escapeTheStringData($_post['banner_status']),
                "banner_image"=>$this->_escapeTheStringData($file_name)
            ];
            $this->_insertTheData("banner",$params);
            $resData=$this->_getTheResdata();
            if (array_key_exists("success",$resData) && !is_null($resData['insert_id'])) {
                return json_encode(array("success" => true, "status" => 200));
            }else if(array_key_exists("error",$resData) && ($resData['insert_id']<1)) {
                return json_encode(array("error" => "false","errorMsg"=>"Error in Data Insert!"));
            }else{
                return json_encode(array("error" => 'false'));
            }

        }
    }
}
?>