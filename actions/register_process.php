<?php
// landing/index page
include("../controllers/customer_controller.php");

if (isset($_POST['submit'])) {
  $name = $_POST['customer_name'];
  $email = $_POST['customer_email'];
  $password = $_POST['customer_pass'];
  $country = $_POST['customer_country'];
  $city = $_POST['customer_city'];
  $contact = $_POST['customer_contact'];
  $user_role = 2;
  $filename = $_FILES['img']['name'];
  $tempname = $_FILES['img']['tmp_name'];
  $photo = "../images/" . $filename;

  move_uploaded_file($tempname, $photo);

  // echo ($photo);

  $registering = registerCustomer_ctr($name, $email, $password, $country, $city, $contact, $photo, $user_role);
  if ($registering) {
    echo "You have sucessfully registered a new customer.";
    // now redirects to the login page
    header("Location: ../view/register.php?register=success");
  } else {
    echo "Your registration was unsuccessful";
    header("Location: ../view/register.php?register=error");
  }
}
