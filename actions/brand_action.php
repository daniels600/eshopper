<?php
include("../controllers/product_controller.php");
$brandName = '';

if (isset($_POST['add'])) {
  $bname = addslashes($_POST['bname']);
  $check = insert_new_brand_ctr($bname);
  if ($check) {
    header("location: ../view/admin_brands.php?add=success");
  } else {
    header("location: ../view/admin_brands.php?add=success");
  }
}

// for delete
if (isset($_GET['delete'])) {
  $brandID = $_GET['delete'];
  $check = delete_brand_ctr($brandID);
  if ($check) {
    header("location:../view/admin_brands.php?delete=success");
  } else {
    echo "fail";
  }
}


// For update
if (isset($_POST['update'])) {
  $brandname = $_POST['bname'];
  $brandID = $_POST['b_id'];
  $check = edit_brand_ctr($brandID, $brandname);
  if ($check) {
    header("location: ../view/admin_brands.php?update=success");
  } else {
    header("location: ../view/admin_brands.php?update=error");
  }
}
