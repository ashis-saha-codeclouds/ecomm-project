<?php 
session_start();
if(isset($_POST['_addToCart'])){
    $productid=$_POST['_addToCart'];
    if(!in_array($productid,$_SESSION['cart'])){
        array_push($_SESSION['cart'],$productid);
        $_SESSION['message']='Product added to the cart';
    }else{
        $_SESSION['message']='Product already in the cart';
    }
}
?>