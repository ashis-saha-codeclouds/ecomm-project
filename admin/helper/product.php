<?php 
require_once("build_query.php");
class Product extends BuildQuery{

    /**
     * __getTheProductCategory function to get all the category
     * Return an JSON array of data of the result set
     */
    public function __getTheProductCategory(){
        $this->_selectData('categories','cat_id,cat_title,cat_status',null,"is_deleted='N' AND cat_status=1","cat_id DESC",null);
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }

    /**
     * __createTheProduct function to create a new Product
     * @param $_post=array() of $_POST Data
     * @param $_files=array() of $_FILES
     * Return an JSON array of data of the result set
     */
    public function __createTheProduct($_post,$_files){
        if(!empty($_post['product_image_current']) && empty($_files['product_image']['name'])){
            $file_name=$_post['product_image_current'];
        }elseif(!empty($_post['product_image_current']) && !empty($_files['product_image']['name'])){
            $file_name=$_files['product_image']['name'];
            $file_size=$_files['product_image']['size'];
            $file_type=$_files['product_image']['type'];
            $file_temp=$_files['product_image']['tmp_name'];
            $file_name=str_replace(array(',',' '),'',$file_name);
            $file_ext=explode('.',$file_name);
            $file_ext=strtolower(end($file_ext));
            $allowed_ext=array("jpeg","jpg","png","webp");
            if(!in_array($file_ext,$allowed_ext)){
                $errors[]="Sorry! Extension not allowed. Please select a JPEG or PNG image";
            }
            if($file_size>2097152){
                $errors[]="Sorry! Please upload a file less than 2 MB";
            }
            if(file_exists("../../images/product/".$_post['product_image_current'])){
                unlink("../../images/product/".$_post['product_image_current']);
            }
            $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        }elseif(empty($_post['product_image_current']) && !empty($_files['product_image']['name'])){
            $file_name=$_files['product_image']['name'];
            $file_size=$_files['product_image']['size'];
            $file_type=$_files['product_image']['type'];
            $file_temp=$_files['product_image']['tmp_name'];
            $file_name=str_replace(array(',',' '),'',$file_name);
            $file_ext=explode('.',$file_name);
            $file_ext=strtolower(end($file_ext));
            $allowed_ext=array("jpeg","jpg","png","webp");
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
            // if(file_exists("../../images/".$_post['product_image_current'])){
            //     unlink("../../images/".$_post['product_image_current']);
            // }

            $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        }
        if(!empty($errors)){
            //echo json_encode($errors);
            return json_encode(array("error" => "false","errorMsg"=>$errors[0]));
        }else{
            $product_title=$this->_escapeTheStringData($_post['product_title']);
            $product_sku=$this->_escapeTheStringData($_post['product_sku']);
            $this->_selectData('products','product_title,product_sku',null,"product_title='$product_title' OR product_sku='$product_sku'",null,null);
            $resChekData=$this->_getTheResdata();
            if(!empty($resChekData)){
                return json_encode(array("error" => "false",'errorMsg'=>'Product with the same title OR SKU is already exists! Please try to create the product with a different title/SKU'));
            }
            $params=[
                "product_title"=>$this->_escapeTheStringData($_post['product_title']),
                "product_status"=>$this->_escapeTheStringData($_post['product_status']),
                "product_image"=>$this->_escapeTheStringData($file_name),
                "product_sku"=>$this->_escapeTheStringData($_post['product_sku']),
                "product_price"=>$this->_escapeTheStringData($_post['product_price']),
                "product_description"=>$this->_escapeTheStringData($_post['product_desc']),
                "category_id"=>$this->_escapeTheStringData($_post['product_cat']),
                "is_featured"=>$this->_escapeTheStringData($_post['featured_product']),
            ];
            $this->_insertTheData("products",$params);
            $resData=$this->_getTheResdata();
            if (array_key_exists("success",$resData) && !is_null($resData['insert_id'])) {
                if(!empty($_files['product_image']['name'])){
                    move_uploaded_file($file_temp,"../../images/product/".$file_name);
                }
                return json_encode(array("success" => true, "status" => 200));
            }else if(array_key_exists("error",$resData) && ($resData['insert_id']<1)) {
                return json_encode(array("error" => "false","errorMsg"=>"Error in Data Insert!"));
            }else{
                return json_encode(array("error" => 'false'));
            }

        }
    }

    /**
     * __updateTheProduct function to create a new Product
     * @param $_post=array() of $_POST Data
     * @param $_files=array() of $_FILES
     * Return an JSON array of data of the result set
     */
    public function __updateTheProduct($_post,$_files){
        if(!empty($_post['product_image_current']) && empty($_files['product_image']['name'])){
            $file_name=$_post['product_image_current'];
        }elseif(!empty($_post['product_image_current']) && !empty($_files['product_image']['name'])){
            $file_name=$_files['product_image']['name'];
            $file_size=$_files['product_image']['size'];
            $file_type=$_files['product_image']['type'];
            $file_temp=$_files['product_image']['tmp_name'];
            $file_name=str_replace(array(',',' '),'',$file_name);
            $file_ext=explode('.',$file_name);
            $file_ext=strtolower(end($file_ext));
            $allowed_ext=array("jpeg","jpg","png","webp");
            if(!in_array($file_ext,$allowed_ext)){
                $errors[]="Sorry! Extension not allowed. Please select a JPEG or PNG image";
            }
            if($file_size>2097152){
                $errors[]="Sorry! Please upload a file less than 2 MB";
            }
            if(file_exists("../../images/product/".$_post['product_image_current'])){
                unlink("../../images/product/".$_post['product_image_current']);
            }
            $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        }elseif(empty($_post['product_image_current']) && !empty($_files['product_image']['name'])){
            $file_name=$_files['product_image']['name'];
            $file_size=$_files['product_image']['size'];
            $file_type=$_files['product_image']['type'];
            $file_temp=$_files['product_image']['tmp_name'];
            $file_name=str_replace(array(',',' '),'',$file_name);
            $file_ext=explode('.',$file_name);
            $file_ext=strtolower(end($file_ext));
            $allowed_ext=array("jpeg","jpg","png","webp");
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
            // if(file_exists("../../images/".$_post['product_image_current'])){
            //     unlink("../../images/".$_post['product_image_current']);
            // }

            $file_name=time()."-".str_replace(array(" ","_"),"-",$file_name);
        }
        if(!empty($errors)){
            //echo json_encode($errors);
            return json_encode(array("error" => "false","errorMsg"=>$errors[0]));
        }else{
            $product_id=$this->_escapeTheStringData($_post['prdctid']);
            // $product_title=$this->_escapeTheStringData($_post['product_title']);
            // $product_sku=$this->_escapeTheStringData($_post['product_sku']);
            // $this->_selectData('products','product_title,product_sku',null,"product_title='$product_title' AND product_sku='$product_sku'",null,null);
            // $resChekData=$this->_getTheResdata();
            // if(!empty($resChekData)){
            //     return json_encode(array("error" => "false",'errorMsg'=>'Product with the same title or SKU is already exists! Please try to create the product with a different title'));
            // }
            $params=[
                "product_title"=>$this->_escapeTheStringData($_post['product_title']),
                "product_status"=>$this->_escapeTheStringData($_post['product_status']),
                "product_image"=>$this->_escapeTheStringData($file_name),
                "product_sku"=>$this->_escapeTheStringData($_post['product_sku']),
                "product_price"=>$this->_escapeTheStringData($_post['product_price']),
                "product_description"=>$this->_escapeTheStringData($_post['product_desc']),
                "category_id"=>$this->_escapeTheStringData($_post['product_cat']),
                "is_featured"=>$this->_escapeTheStringData($_post['featured_product']),
            ];
            $this->_updateData("products",$params,"product_id='$product_id'");
            $resData=$this->_getTheResdata();
            if(array_key_exists("success",$resData) && !is_null($resData['affectedrows'])){
                if(!empty($_files['product_image']['name'])){
                    move_uploaded_file($file_temp,"../../images/product/".$file_name);
                }
                return json_encode(array("success" => true, "status" => 200));
            }else if(array_key_exists("error",$resData) && ($resData['affectedrows']<1)){
                return json_encode(array("error" => "false","affected_rows"=>$resData['affectedrows'],"errorMsg"=>"It seems that current and Updated product details are same!"));
            }else{
                return json_encode(array("error" => 'false'));
            }

        }
    }

    /**
     * __getTheProductById function to get the existing product by product ID
     * @param $id=ProductId
     * Return an JSON array of data of the result set
     */
    public function __getTheProductById($id){
        // echo "PID".$id;
        // //die();
        $this->_selectData('products','product_id,product_title,product_sku,product_price,product_description,category_id,product_status,product_image,is_featured',null,"is_deleted='N' AND product_id='$id'",null,null);
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }

    /**
     * __getMultipleProductById function to get the existing product by product ID
     * @param $ids=ProductIds
     * Return an JSON array of data of the result set
     */
    public function __getMultipleProductById($ids){
        // echo "PID".$id;
        // //die();
        $this->_selectData('products','product_id,product_title,product_sku,product_price,product_description,category_id,product_status,product_image,is_featured',null,"is_deleted='N' AND product_id IN ('.$ids.')",null,null);
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }

    /**
     * __getTheBanners to fetch all the banners
     * Return an JSON array of data of the result set
     */
    
     public function __getAllTheProducts(){
        $this->_selectData('products','products.product_id,products.product_title,products.product_sku,products.product_price,products.product_description,products.product_status,products.product_image,products.is_featured,categories.cat_title'," JOIN categories ON products.category_id=categories.cat_id","products.is_deleted='N'","products.product_id DESC",null);
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }

     /**
     * __delTheProduct function to delete the existing banner
     * @param $payload=array() of $_POST Data
     * Return an JSON array of data of the result set
     */
    public function __delTheProduct($payload){
        // echo "<pre>";
        // print_r($payload);
        // die();
        $product_id=$this->_escapeTheStringData($payload['productid']);
        $this->_updateData("products",array('is_deleted'=>'Y'),"product_id='$product_id'");
        $resData=$this->_getTheResdata();
        if(array_key_exists("success",$resData) && !is_null($resData['affectedrows'])){
            return json_encode(array("success" => true, "status" => 200));
        }else{
            return json_encode(array("error" => 'false'));
        }
    }
}
?>