<?php
include("../controllers/product_controller.php");

if (isset($_POST['Add'])) {
  $tm = md5(time());

  $target = "../img/product_images/" . $tm . basename($_FILES['image']['name']);
  $product_cat = $_POST['category'];
  $product_brand = $_POST['brand'];
  $product_title = $_POST['title'];
  $product_price = $_POST['price'];
  $product_desc = $_POST['description'];
  $product_image = $_FILES['image']['name'];
  $product_keywords = $_POST['keyword'];


  $check = insert_new_product_ctr($product_cat, $product_brand, $product_title, $product_price, $product_desc, $target, $product_keywords);
  if ($check) {
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      header("location:../view/admin_products.php?add=success");
    } else {
      header("location:../view/admin_products.php?add=error");
    }
  } else {
    header("location:../view/admin_products.php?add=error");
  }
}

// for delete
if (isset($_GET['delete'])) {
  $productID = $_GET['delete'];
  $check = delete_product_ctr($productID);
  if ($check) {
    header("location:../view/admin_products.php?delete=success");
  } else {
    header("location:../view/admin_products.php?delete=error");
  }
}


if (isset($_POST['update'])) {
  $product_id = $_POST['product_id'];
  $product_cat = $_POST['category'];
  $product_brand = $_POST['brand'];
  $product_title = $_POST['title'];
  $product_price = $_POST['price'];
  $product_desc = $_POST['description'];
  $product_keywords = $_POST['keyword'];

  $tm = md5(time());


  if (
    !empty($_FILES['image']['tmp_name'])
    && file_exists($_FILES['image']['tmp_name'])
  ) {
    $target = "../img/product_images/" . $tm . basename($_FILES['image']['name']);

    $product_image = $_FILES['image']['name'];

    $check = edit_productImg_ctr($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $target, $product_keywords);

    if ($check) {
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "success";
        header("location:../view/admin_products.php?update=success");
      } else {
        $msg = "fail";
        header("location:../view/admin_products.php?update=error");
      }
    } else {
      header("location:../view/admin_products.php?update=error");
    }
  } else {
    $check = edit_product_ctr($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords);

    if ($check) {
      header("location:../view/admin_products.php?update=success");
    } else {
      echo "fail";
      header("location:../view/admin_products.php?update=error");
    }
  }
}
