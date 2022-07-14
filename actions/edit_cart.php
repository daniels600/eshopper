<?php

require('../controllers/cart_controller.php');

// session_start();
$ip_add = $_SERVER["REMOTE_ADDR"];

// ini_set('display_errors', 1);

if (isset($_POST['update_cart'])) {
    $prod_id = $_POST['p_id'];
    $qty = $_POST['qty'];

    if (isset($_SESSION['cid'])) {
        $session = $_SESSION['cid'];
        $result = updateCartQty_Logged($qty, $prod_id, $session);

        if ($result) {
            header("Location: ../view/cart.php?msg=success");
        } else {
            header("Location: ../view/cart.php?msg=error");
        }
    } else {
        $result = updateCartQty($qty, $prod_id, $ip_add);

        if ($result) {
            header("Location: ../view/cart.php?msg=success");
        } else {
            header("Location: ../view/cart.php?msg=error");
        }
    }
}
