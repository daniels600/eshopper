<?php
session_start();
include("../controllers/customer_controller.php");
// include("../settings/core.php");


if (isset($_POST['submit'])) {
  $email = $_POST['customer_email'];
  $password = $_POST['customer_pass'];

  //calling the login ctr
  $check = loginCustomer_ctr($email, $password);

  //method for checking the email and password to retrive the information for the touser logins
  if ($check) {
    //print_r ($check);
    //set session for customer_id and user role
    // session_start();
    $_SESSION['cid'] = $check['customer_id'];
    $_SESSION['userRole'] = $check['user_role'];

    // now redirects to the index page
    header("Location: ../view/login.php?login=success");
  } else {
    echo "Log in failed,check your password or email again";
    header("Location: ../view/login.php?login=error");
  }
}
