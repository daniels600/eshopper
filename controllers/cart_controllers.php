<?php

include("../classes/cart_class.php");
// if (!isset($_SESSION)) {
//   session_start();
// }


//INSERT
//CART
function add_to_cart_controller($p_id, $ip_add, $c_id, $qty)
{
  $cart_instance = new cart_class();
  return $cart_instance->add_to_cart($p_id, $ip_add, $c_id, $qty);
}

function add_to_cart_notLogin_controller($p_id, $ip_add, $qty)
{
  $cart_instance = new cart_class();
  return $cart_instance->add_to_cart_notLogin($p_id, $ip_add, $qty);
}


function select_all_products_cart_controller($ip_add)
{
  $cart_instance = new cart_class();
  return $cart_instance->select_all_products_cart($ip_add);
}

function get_CartItems()
{
  $product_array = array();

  //create an instance of the product class
  $cart_instance = new cart_class();

  $ip_add = getenv("REMOTE_ADDR");

  if (isset($_SESSION["cid"])) {
    $user_id = $_SESSION['cid'];
    $product_records = $cart_instance->select_all_products_carts_loggedIn($user_id);
  } else {
    $product_records = $cart_instance->select_all_products_cart($ip_add);
  }


  if ($product_records) {

    //loop to see if there is more than one result
    //fetch one at a time
    while ($rec = $cart_instance->db_fetch()) {
      $product_array[] = $rec;
    }
  }
  return $product_array;
}

/*Removing Items from Cart */
function remove_cart_controller($prod_id, $ip_add)
{
  $cart_instance = new cart_class();
  return $cart_instance->remove_cart_cls($prod_id, $ip_add);
}

function remove_carts_controller($prod_id, $session)
{
  $cart_instance = new cart_class();
  return $cart_instance->remove_carts_user_id_cls($prod_id, $session);
}


function updateCartQty($qty, $prod_id, $ip_add)
{ //not logged In
  $cart_instance = new cart_class();
  return $cart_instance->updateCartQty_notLogin($qty, $prod_id, $ip_add);
}

function updateCartQty_Logged($qty, $prod_id, $session)
{ // logged In
  $cart_instance = new cart_class();
  return $cart_instance->updateCartQty_Login($qty, $prod_id, $session);
}

// function updateCart_CID($session){
//   $cart_instance = new Cart();
//   return $cart_instance->updateCart_CID($session);
// }

