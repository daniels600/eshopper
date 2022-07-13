<?php
//connect to the user account class
include("../classes/customer_class.php");

//sanitize data
function cleanText($data)
{
  $data = trim($data);
  //$data = stripslashes($data);
  //$data = htmlspecialchars($data);
  return $data;
}

// Register customer
function registerCustomer_ctr($name, $email, $password, $country, $city, $contact, $photo, $user_role)
{
  //create an instance of the class
  $obj = new customer_class();

  //connection to the class/returning the method in the customer
  return $obj->registerCustomer_cls($name, $email, $password, $country, $city, $contact, $photo, $user_role);
}

// Login a customer
function loginCustomer_ctr($email, $password)
{

  //create an instance of the class
  $obj = new customer_class();

  //connection to the class/returning the method in the customer 
  return $obj->loginCustomer_cls($email, $password);
}
