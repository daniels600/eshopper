<?php
include("../controllers/product_controller.php");

if (isset($_POST['Add']) ) {
  //$temp = explode(".", $_FILES['image']['name']);
  //$newfilename = round(microtime(true)) . '.' . end($temp);
  $target= "../uploads/".basename($_FILES['image']['name']);
  $product_cat=$_POST['category'];
  $product_brand= $_POST['brand'];
  $product_title= $_POST['title'];
  $product_price= $_POST['price'];
  $product_desc= $_POST['description'];
  $product_image= $_FILES['image']['name'];
  $product_keywords= $_POST['keyword'];
  //echo $target;
    $check= insert_new_product_ctr($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords);
    if ($check) {
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg= "success";
        # code...
      }else {
        $msg= "fail";
      }
        header ("location:../admin/product.php");
      //echo "success";
    } else {
      echo "fail";
    }
    
  }
  
// for delete
  if (isset($_GET['delete']) ) {
    $productID= $_GET['delete'];
    $check= delete_product_ctr($productID);
    if ($check) {
      header("location:../admin/product.php");
    } else {
      echo "fail";
    }

   }

   
  
?>