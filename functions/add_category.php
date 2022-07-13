<?php
include("../controllers/product_controller.php");

if (isset($_POST['add']) ) {
    $cname= addslashes($_POST['cname']);
    
    
    $check= insert_new_category_ctr($cname);
    if ($check) {
      header ("location:../admin/category.php");
    } else {
      echo "fail";
    }
  }
  
// for delete
if (isset($_GET['delete']) ) {
  $categoryID= $_GET['delete'];
  $check= delete_category_ctr($categoryID);
  if ($check) {
    header("location:../admin/category.php");
  } else {
    echo "fail";
  }

}
  
?>