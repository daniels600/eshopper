<?php
include ("../settings/core.php");
include("../controllers/product_controller.php");

$productlist=select_all_product_ctr();

if (isset($_GET['vid'])) {
    //getting the id and product list
    $productID= $_GET['vid'];
    $product_list=select_one_product_ctr($productID);
    
    $product_cat= $product_list['product_cat'];
    $cname=select_one_category_ctr($product_cat);
    $product_brand= $product_list['product_brand'];
    $bname=select_one_brand_ctr($product_brand);
    $product_title= $product_list['product_title'];
    $product_price= $product_list['product_price'];
    $product_desc= $product_list['product_desc'];
    $product_image= $product_list['product_image'];
    $product_keywords= $product_list['product_keywords'];
    # code...
}

// to select the number of products in the cart
if (logged_in()==true) {
    function cart_count(){
        $c_id= $_SESSION['cid'];
        $total= cart_quantity_ctr($c_id);
        $total=$total[0];
        $total1=$total['SUM(qty)'];
        return $total1;
    }
}


 


?>