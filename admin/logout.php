<?php
class Logout{
    public function __construct(){
        if(!session_id()){
            session_start();
            session_destroy();
            header("location:index.php");
        }
    }
} 

$logout=new Logout();
?>