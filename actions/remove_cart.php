<?php

require('../controllers/cart_controller.php');
session_start();


$ip_add = getenv("REMOTE_ADDR");
if (isset($_GET['prod_id'])){
    $p_id = $_GET['prod_id'];

    $result = false;
    if (isset($_SESSION["cid"])) {
        $session = $_SESSION["cid"];
        $result = remove_cart_login($p_id, $session);
    } else {
        $result = remove_cart($p_id, $ip_add);
    }

    if ($result) {
        header("location:../view/cart.php");
    } else {
        header("location:../view/cart.php?msg=error");
    }

    
}
