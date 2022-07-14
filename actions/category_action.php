<?php
include("../controllers/product_controller.php");

// For Add
if (isset($_POST['add'])) {
  $cname = addslashes($_POST['cname']);

  $check = insert_new_category_ctr($cname);
  if ($check) {
    header("location:../view/admin_categories.php?add=success");
  } else {
    header("location:../view/admin_categories.php?add=error");
  }
}

// For delete
if (isset($_GET['delete'])) {
  $categoryID = $_GET['delete'];
  $check = delete_category_ctr($categoryID);
  if ($check) {
    header("location: ../view/admin_categories.php?delete=success");
  } else {
    header("location: ../view/admin_categories.php?delete=error");
  }
}


// For Update
if (isset($_POST['update'])) {
  $categoryName = $_POST['cat_name'];
  $categoryID = $_POST['cat_id'];
  $check = edit_category_ctr($categoryID, $categoryName);
  if ($check) {
    header("location: ../view/admin_categories.php?update=success");
  } else {
    header("location: ../view/admin_categories.php?update=error");
  }
}
