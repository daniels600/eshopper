<?php

require('../controllers/cart_controller.php');

session_start();
$ip_add = getenv("REMOTE_ADDR");

if (isset($_POST['update_cart'])){
    $prod_id = $_POST['p_id'];
    $qty = $_POST['qty'];
    echo $qty;

    if (isset($_SESSION['cid'])){
        $session = $_SESSION['cid'];
        

        $result =updateCartQty_Login($qty, $prod_id, $session);

        print_r($result);

        if($result){
            echo ("<script>alert('Cart Successfully updated!'); window.location.href = '../view/cart.php';</script>");
        }else{
            echo ("<script>alert('Cart Not Successfully updated!'); window.location.href = '../view/cart.php';</script>");
        }
    }
   
}


?>