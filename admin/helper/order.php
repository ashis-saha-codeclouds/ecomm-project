<?php 
require_once("build_query.php");
class Order extends BuildQuery{
    public function __getAllTheOrders(){
        $this->_selectData("orders",'orders.order_id,orders.product_id,orders.product_qty,orders.total_amount,orders.order_date,products.product_title,products.product_price,users.user_fname,users.user_lname,users.email,users.mobile,users.address,users.city','LEFT JOIN products on find_in_set(products.product_id,orders.product_id) LEFT JOIN users ON orders.user_id=users.user_id GROUP BY orders.order_id',null,'orders.product_id DESC');
        $resData=$this->_getTheResdata();
        if(!empty($resData)){
            return json_encode($resData);
        }else{
            return json_encode(array("error" => false));
        }
    }
}
?>