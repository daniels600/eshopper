<?php
require('../controllers/cart_controller.php');
session_start();
$ip_add = $_SERVER["REMOTE_ADDR"];

if (isset($_GET["pid"])) {
    $p_id = $_GET["pid"];
    $qty  = 1;
    if (isset($_SESSION['cid'])) {
        $c_id = $_SESSION['cid'];

        $cart = select_cart_notlogin_ctr($c_id, $p_id);

        if (!empty($cart)) {

            header("Location: ../view/home.php?add_cart=already");
        } else {
            $result = add_to_cart_controller($p_id, $ip_add, $c_id, $qty);
            if ($result) {
                header("Location: ../view/home.php?add_cart=success");
            } else {
                header("Location: ../view/home.php?add_cart=error");
            }
        }
    } else {
        $cart = select_one_cart_ctr($p_id, $ip_add);

        if (!empty($cart)) {
            header("Location: ../view/home.php?add_cart=already");
        } else {
            $result = add_to_cart_notLogin_controller($p_id, $ip_add, $qty);

            if ($result) {
                header("Location: ../view/home.php?add_cart=success");
            } else {
                header("Location: ../view/home.php?add_cart=error");
            }
        }
    }
}



//Count User cart item
// if (isset($_POST["count_item"])) {
//     //When user is logged in then we will count number of item in cart by using user session id
//     if (isset($_SESSION["cid"])) {
//         $session = $_SESSION["cid"];
//         $result = cart_quantity_login_ctr($session);
//     } else {
//         //When user is not logged in then we will count number of item in cart by using users unique ip address
//         $result = cart_quantity_ctr($ip_add);
//     }
//     echo $result["count_item"];
// }
