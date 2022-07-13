<?php
function showRegisterAlert()
{
    if (isset($_GET['register'])) {
        if ($_GET['register'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Registration successful',
                text: 'Your account has been registered!'
            }).then(function() {
                window.location.href = 'login.php';
            }) </script>";
        } else if ($_GET['register'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Registration failed',
                text: 'Your account wasn\'t registered'
            }).then(function() {
                window.location.href = 'register.php';
            }) </script>";
        }
    }
}


function showLoginAlert()
{
    if (isset($_GET['login'])) {
        if ($_GET['login'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Login successful',
                text: 'You can proceed to the home page!'
            }).then(function() {
                window.location.href = '../index.php';
            }) </script>";
        } else if ($_GET['login'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Login failed',
                text: 'Your account isn\'t registered'
            }).then(function() {
                window.location.href = 'login.php';
            }) </script>";
        }
    }
}

function showUpdateAlert()
{
    if (isset($_GET['update'])) {
        if ($_GET['update'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Updated successful',
                text: 'The product is updated successfully!'
            }).then(function() {
                window.location.href = 'product.php';
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Update failed',
                text: 'Product couldn\'t be updated'
            }).then(function() {
                window.location.href = 'product.php';
            }) </script>";
        }
    }
}
