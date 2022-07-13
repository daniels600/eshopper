<?php
require('../controllers/cart_controller.php');
session_start();
$ip_add = getenv("REMOTE_ADDR");

    $p_id = $_GET["pid"];
    $qty  = 1;

    if(isset($_SESSION['cid'])){
        $c_id = $_SESSION['cid'];
        
        $cart = select_cart_notlogin_ctr($c_id, $p_id);
        
        if(!empty($cart)){

            echo ("<script>alert('Product already in the cart'); window.location.href = '../view/home.php';</script>");
        
        }else{
            $result = add_to_cart_controller($p_id,$ip_add,$c_id, $qty);
            if($result){
                echo ("<script>alert('Product added to cart'); window.location.href = '../view/cart.php';</script>");
            }else{
                echo ("<script>alert('Product not added to cart'); window.location.href = '../view/home.php';</script>");
            }
        }

    }else{
        $cart = select_one_cart_controller($p_id, $ip_add);
        
        if(!empty($cart)){
            echo ("<script>alert('Product already in the cart'); window.location.href = '../view/home.php';</script>");
        }else{
            $result = add_to_cart_notLogin_controller($p_id,$ip_add, $qty);
            
            if($result){
                echo ("<script>alert('Product added to cart'); window.location.href = '../view/cart.php';</script>");
             }else{
                echo ("<script>alert('Product added to cart'); window.location.href = '../view/cart.php';</script>");
             }
        }
    } 





//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["cid"])) {
		$session = $_SESSION["cid"];
        $result = getCartItemQty_Login_controller($session);
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$result = getCartItemQty_controller($ip_add);
	}
	echo $result["count_item"];
}
?>