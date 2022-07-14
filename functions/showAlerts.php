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

function showAddCategoryAlert()
{
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'New category added successfully',
            }).then(function() {
                window.location.href = '../view/admin_categories.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'New addition failed'
            }).then(function() {
                window.location.href = '../view/admin_categories.php'
            }) </script>";
        }
    }
}


function showUpdateCategoryAlert()
{
    if (isset($_GET['update'])) {
        if ($_GET['update'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Updated successful',
            }).then(function() {
                window.location.href = '../view/admin_categories.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Update failed'
            }).then(function() {
                window.location.href = '../view/admin_categories.php'
            }) </script>";
        }
    }
}


function showDeleteCategoryAlert()
{
    if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Category deleted successfully',
            }).then(function() {
                window.location.href = '../view/admin_categories.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Deletion failed'
            }).then(function() {
                window.location.href = '../view/admin_categories.php'
            }) </script>";
        }
    }
}

function showAddBrandAlert()
{
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'New brand added successfully',
            }).then(function() {
                window.location.href = '../view/admin_brands.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'New addition failed'
            }).then(function() {
                window.location.href = '../view/admin_brands.php'
            }) </script>";
        }
    }
}


function showUpdateBrandAlert()
{
    if (isset($_GET['update'])) {
        if ($_GET['update'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Updated successful',
            }).then(function() {
                window.location.href = '../view/admin_brands.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Update failed'
            }).then(function() {
                window.location.href = '../view/admin_brands.php'
            }) </script>";
        }
    }
}


function showDeleteBrandAlert()
{
    if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Brand deleted successfully',
            }).then(function() {
                window.location.href = '../view/admin_brands.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Deletion failed'
            }).then(function() {
                window.location.href = '../view/admin_brands.php'
            }) </script>";
        }
    }
}


function showAddProductAlert()
{
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'New product added successfully',
            }).then(function() {
                window.location.href = '../view/admin_products.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'New addition failed'
            }).then(function() {
                window.location.href = '../view/admin_products.php'
            }) </script>";
        }
    }
}


function showUpdateProductAlert()
{
    if (isset($_GET['update'])) {
        if ($_GET['update'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Updated successful',
            }).then(function() {
                window.location.href = '../view/admin_products.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Update failed'
            }).then(function() {
                window.location.href = '../view/admin_products.php'
            }) </script>";
        }
    }
}


function showDeleteProductAlert()
{
    if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Product deleted successfully',
            }).then(function() {
                window.location.href = '../view/admin_products.php'
            }) </script>";
        } else if ($_GET['update'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Deletion failed'
            }).then(function() {
                window.location.href = '../view/admin_products.php'
            }) </script>";
        }
    }
}

function showItemAddedToCartAlert()
{
    if (isset($_GET['add_cart'])) {
        if ($_GET['add_cart'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Product added to cart successfully',
            }).then(function() {
                window.location.href = '../view/home.php'
            }) </script>";
        } else if ($_GET['add_cart'] == 'already') {
            echo "<script> Swal.fire({
                icon: 'info',
                type: 'info',
                title: 'Product already in cart. Go to cart to update quantity.'
            }).then(function() {
                window.location.href = '../view/cart.php'
            }) </script>";
        } else if ($_GET['add_cart'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Adding to cart failed.'
            }).then(function() {
                window.location.href = '../view/home.php'
            }) </script>";
        }
    }
}


function showPaymentAlert()
{
    if (isset($_GET['payment'])) {
        if ($_GET['payment'] == 'success') {
            echo "<script> Swal.fire({
                icon: 'success',
                type: 'success',
                title: 'Your order has been received successfully',
            }).then(function() {
                window.location.href = '../view/home.php'
            }) </script>";
        } else if ($_GET['payment'] == 'error') {
            echo "<script> Swal.fire({
                icon: 'error',
                type: 'error',
                title: 'Your order failed. Try again.'
            }).then(function() {
                window.location.href = '../view/checkout.php'
            }) </script>";
        } 
    }
}
