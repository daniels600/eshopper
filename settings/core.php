<?php
// //start session
session_start();

// //for header redirection
ob_start();

// //function to check for login
function check_login()
{
	if (!isset($_SESSION['cid'])) {
		header('location: ../actions/logout.php');
	}
}

function check_login_index()
{
	if (!isset($_SESSION['cid'])) {
		header('location: ../actions/logout.php');
	}
}


// function to get user ID


//function to check for role (admin, customer, etc)
function check_user_role()
{
	if (isset($_SESSION['userRole'])) {
		return $_SESSION['userRole'];
	} else {
		return false;
	}
}
