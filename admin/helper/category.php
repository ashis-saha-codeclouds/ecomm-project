<?php 
require_once("build_query.php");
class Category extends BuildQuery{

    /**
     * __createProductCategory function to create a new category
     * @param $payload=array()
     * Return an JSON array of data of the result set
     */
    public function __createProductCategory($payload){
        $cat_name=$this->_escapeTheStringData($payload['cat_name']);
        $this->_selectData('categories','cat_title',null,"cat_title='$cat_name'",null,null);
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

    /**
     * __updateProductCategory function to update the category
     * @param $payload=array()
     * Return an JSON array of data of the result set
     */

    public function __updateProductCategory($payload){
        $cat_name=$this->_escapeTheStringData($payload['cat_name']);
        $catid=$this->_escapeTheStringData($payload['ctid']);
        // $this->_selectData('categories','cat_title',null,"cat_title='$cat_name'",null,null);
        // $resChekData=$this->_getTheResdata();
        // if(!empty($resChekData)){
        //     return json_encode(array("error" => "false",'errorMsg'=>'Product Category is already exists!'));
        // }else{
            $this->_updateData("categories",array('cat_title'=>$cat_name),"cat_id='$catid'");
            $resData=$this->_getTheResdata();
            if(array_key_exists("success",$resData) && !is_null($resData['affectedrows'])){
                return json_encode(array("success" => true, "status" => 200));
            }else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)){
                return json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"It seems that current and Updated data are same!"));
            }else{
                return json_encode(array("error" => 'false'));
            }
        //}
    }

     /**
     * __getAllTheProductCategory function to get all the category
     * Return an JSON array of data of the result set
     */

    public function  __getAllTheProductCategory(){
        $this->_selectData('categories','cat_id,cat_title,cat_status',null,"is_deleted='N'",null,null);
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }

     /**
     * __getTheCategoryById function to get the category by ID
     * @param $id=cayegory id
     * Return an JSON array of data of the result set
     */

    public function  __getTheCategoryById($id){
        $this->_selectData('categories','cat_id,cat_title,cat_status',null,"is_deleted='N' AND cat_id='$id'",null,null);
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }

    /**
     * __delTheCategory function to delete the category
     * @param $payload=array()
     * Return an JSON array of data of the result set
     */

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