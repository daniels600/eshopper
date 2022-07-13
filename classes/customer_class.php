<?php
//connect to database class
require("../settings/db_class.php");

/**
 *General class to handle all functions 
 */
/**
 *@author David Sampah
 *
 */

class customer_class extends db_connection
{
	//--INSERT--//
	public function registerCustomer_cls($name, $email, $password, $country, $city, $contact, $photo, $user_role)
	{
		$passhas = md5($password);
		$sql = "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`,`user_role`) 
			VALUES ('$name','$email','$passhas','$country','$city','$contact','$photo','$user_role')";
		return $this->db_query($sql);
	}

	//--SELECT--//
	//veryfying user email
	public function verify($email)
	{
		$sql = "SELECT * FROM customer WHERE '$email'='customer_email'";
		return $this->db_fetch_one($sql);
	}

	//logging in
	public function loginCustomer_cls($email, $password)
	{
		$passhas = md5($password);
		$sql = "SELECT `customer_id`,`user_role` FROM `customer` WHERE `customer_email` = '$email' and `customer_pass` = '$passhas'";
		return $this->db_fetch_one($sql);
	}
}
