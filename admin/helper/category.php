<?php 
require_once("build_query.php");
class Category extends BuildQuery{
    public function __createProductCategory($payload){
        $cat_name=$this->_escapeTheStringData($payload['cat_name']);
        $this->_selectData('categories','cat_title',"cat_title='$cat_name'");
        $resChekData=$this->_getTheResdata();
        if(!empty($resChekData)){
            return json_encode(array("error" => "false",'errorMsg'=>'Product Category is already exists!'));
        }else{
            $this->_insertTheData("categories",array('cat_title'=>$cat_name));
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

    public function  __getAllTheProductCategory(){
        $this->_selectData('categories','cat_id,cat_title,cat_status',"is_deleted='N'");
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => "false"));
        }
    }

    public function __delTheCategory($payload){
        $catid=$this->_escapeTheStringData($payload['catid']);
        $this->_deleteTheData('categories',"cat_id='$catid'");
        $resData=$this->_getTheResdata();
        if(array_key_exists("success",$resData) && !is_null($resData['affectedrows'])){
            return json_encode(array("success" => true, "status" => 200));
        }else{
            return json_encode(array("error" => 'false'));
        }
    }

}
?>