<?php
//connect to the user account class
include("../classes/product_class.php");

//sanitize data
function cleanText($data)
{
  $data = trim($data);
  //$data = stripslashes($data);
  //$data = htmlspecialchars($data);
  return $data;
}


//--INSERT--//
//brand
function insert_new_brand_ctr($bname)
{
  $insert = new product_class;
  return $insert->add_brand_cls($bname);
}
//category
function insert_new_category_ctr($cname)
{
  $insert = new product_class;
  return $insert->add_product_category_cls($cname);
}
//product
function insert_new_product_ctr($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords)
{
  $insert = new product_class;
  return $insert->add_product_cls($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);
}

//--SELECT--//
//for brand
function select_all_brand_ctr()
{
  $log = new product_class;
  return $log->select_all_brand_cls();
}
function select_one_brand_ctr($brandID)
{
  $log = new product_class;
  return $log->select_one_brand_cls($brandID);
}

//for category
function select_all_category_ctr()
{
  $log = new product_class;
  return $log->select_all_category_cls();
}
function select_one_category_ctr($categoryID)
{
  $log = new product_class;
  return $log->select_one_category_cls($categoryID);
}

//for product
function select_all_product_ctr()
{
  $log = new product_class;
  return $log->select_all_product_cls();
}
function select_one_product_ctr($productID)
{
  $log = new product_class;
  return $log->select_one_product_cls($productID);
}

//count all products
function count_product_ctr()
{
  $log = new product_class;
  return $log->count_product_cls();
}


//--UPDATE--//
//for brand
function edit_brand_ctr($brandID, $brandName)
{
  $log = new product_class;
  return $log->edit_brand_cls($brandID, $brandName);
}
//for category
function edit_category_ctr($categoryID, $categoryName)
{
  $log = new product_class;
  return $log->edit_category_cls($categoryID, $categoryName);
}
//for product
function edit_product_ctr($productID, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords)
{
  $log = new product_class;
  return $log->edit_product_cls($productID, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords);
}

function edit_productImg_ctr($productID, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords)
{
  $log = new product_class;
  return $log->edit_productImg_cls($productID, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);
}


//--DELETE--//
//for brand
function delete_brand_ctr($brandID)
{
  $log = new product_class;
  return $log->delete_brand_cls($brandID);
}
// for category
function delete_category_ctr($categoryID)
{
  $log = new product_class;
  return $log->delete_category_cls($categoryID);
}

// for product
function delete_product_ctr($productID)
{
  $log = new product_class;
  return $log->delete_product_cls($productID);
}

//search product
function search_product_ctr($find)
{
  $log = new product_class;
  return $log->search_product_cls($find);
}
function cart_quantity_ctr($c_id)
{
  $quantity = new product_class();
  return $quantity->cart_quantity_cls($c_id);
}
