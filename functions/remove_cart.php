<?php

require('../controllers/cart_controller.php');
session_start();


$ip_address = $ip_add = getenv("REMOTE_ADDR");
if (isset($_GET['removeProd_ID'])){
    $p_id = $_GET['removeProd_ID'];
    
        $session = $_SESSION["cid"];
        $result = remove_cart($p_id,$session);

        if($result){
            
            header("location:../view/cart.php");
         }else{
            echo "Product Not removed!";
            header("location:../view/home.php");
         }

    
}



?>