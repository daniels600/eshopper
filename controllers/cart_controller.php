<?php

require('../classes/cart_class.php');

function add_to_cart_controller($p_id,$ip_add,$c_id, $qty){
    $cart_instance = new Cart();
    return $cart_instance->add_to_cart($p_id,$ip_add,$c_id, $qty);
}

function add_to_cart_notLogin_controller($p_id,$ip_add, $qty){
    $cart_instance = new Cart();
    return $cart_instance->add_to_cart_notLogin($p_id,$ip_add, $qty);

}

//Validating the cart before adding
function getValidated_Controller($c_id, $p_id){
    $cart_instance = new Cart();
    return $cart_instance->getValidated($c_id, $p_id);
}

function select_all_products_cart_controller($ip_add){
    $cart_instance = new Cart();
    return $cart_instance->select_all_products_cart($ip_add);
}

function select_cart_notlogin_ctr($c_id, $p_id){
    $cart_instance = new Cart();
    return $cart_instance->select_cart_notlogin($c_id, $p_id);
}
function select_one_cart_ctr($p_id, $ip_add){
    $cart_instance = new Cart();
    return $cart_instance->select_one_cart($p_id, $ip_add);
}
function remove_cart($prod_id,$session){
    $cart_instance = new Cart();
    return $cart_instance->remove_cart($prod_id,$session);
}

function getCartItemQty($ip_add,$session){
    $cart_instance = new Cart();
    return $cart_instance->getCartItemQty($ip_add,$session);
}



function get_Cartitem(){
    $product_array = array();

    //create an instance of the product class
    $cart_instance = new Cart();
  
    //run the search product method
    $ip_add = getenv("REMOTE_ADDR");

    if (isset($_SESSION["cid"])){
        $session = $_SESSION['cid'];
        $product_records = $cart_instance->select_all_products_carts($session);
    }else{
        $product_records = $cart_instance->select_all_products_cart($ip_add);
    }

    
  
    //check if the method worked
    if ($product_records) {
  
        //loop to see if there is more than one result
        //fetch one at a time
        $product_array[] = $product_records;
  
            //Assign each result to the array
           
      
    }
    //return the array
    return $product_array;
}

//--INSERT INTO PAYMENT--//

function insert_payment_ctr($amount, $c_id, $order_id, $cc, $pdate)
{
  //create an instance of the class
  $newclass = new Cart();
  
  //returning the method 
  return $newclass->insert_payment_cls($amount, $c_id, $order_id, $cc, $pdate);
}


function insert_order_ctr($c_id, $invoice, $date, $status){
     $newclass = new Cart();
     return $newclass->insert_order($c_id, $invoice, $date, $status);
}


function insert_orderDetails_ctr($order_id, $product_id, $qty){
     $newclass = new Cart();
     return $newclass->insert_orderDetails($order_id, $product_id, $qty);
}

function updateCartQty_Login($qty, $prod_id, $session){
    $newclass= new Cart();
    return $newclass->updateCartQty_Login($qty, $prod_id, $session);
}

function recent_order_ctr(){
     $newclass = new Cart();
     return $newclass->recentOrder();
}
function cart_quantity_ctr($c_id){
    $quantity= new Cart();
    return $quantity->cart_quantity_cls($c_id);
  }

 // remove all from cart
 function remove_all_from_cart_ctr($c_id){
    $remove= new Cart();
    return $remove -> remove_all_from_cart_cls($c_id);
}
//view the last orders of a cudstomer details
function view_last_order_ctr($order_id){
    $order= new Cart();
    return $order -> view_last_order_cls($order_id);
  }

