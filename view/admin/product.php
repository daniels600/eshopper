<?php
include_once("../controllers/product_controller.php");
include_once("../settings/core.php");
//include("../functions/add_brand.php")
//check_login_index();
// $productlist = select_all_product_ctr();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Poks Beauty | Product</title>
</head>
<style>
    .open-button {
        background-color: black;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        width: 600px;
        margin-left: 290px;
        margin-bottom: 50px;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        padding: 10px;
        background-color: white;
    }





    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: black;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a black background color to the cancel button */
    .form-container .cancel {
        background-color: black;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }
</style>

<body>
    <?php
    include("../functions/showAlerts.php");

    showUpdateAlert();

    ?>

    <div style="font-size: 40px; margin-left:500px; margin-bottom:50px;">Product list
        <a href="../view/home.php" class="btn btn-dark text-light" style="margin-left:610px;">Home</a>
    </div>
    <button style=" margin-left:290px; " class="open-button" onclick="openForm()">Add Product</button> <br><br><br>



    <div class="form-popup" id="myForm">
        <form method="POST" action="../functions/add_product.php" class="form-container" onsubmit="required()" name="form1" enctype="multipart/form-data">
            <label for="title" class="form-label">Enter product title</label>
            <input name="title" type="text" class="form-control" id="title">
            <label for="price" class="form-label">Enter product price</label>
            <input name="price" type="text" class="form-control" id="price">
            <label for="description" class="form-label">Enter product description</label>
            <input name="description" type="text" class="form-control" id="description">
            <label for="keyword" class="form-label">Enter product keywords</label>
            <input name="keyword" type="text" class="form-control" id="keyword"><br>
            <select name="category" class="form-control" id="text">
                <option value="Select category:">Select category:</option>
                <?php
                $cat_item = select_all_category_ctr();
                //check if anything was returned
                if ($cat_item) {
                    // category found

                    foreach ($cat_item as $one_cat) {
                        $catID = $one_cat['cat_id'];
                        $catName = $one_cat['cat_name'];

                        echo "<option value='$catID'>$catName</option>";
                    }
                } else {
                    //no category found
                    echo "<option value='no_found'>no category found</option>";
                }

                ?>
            </select><br>
            <select name="brand" class="form-control" id="text">
                <option value="Select Brand:">Select Brand:</option>
                <?php
                $brand_item = select_all_brand_ctr();
                //check if anything was returned
                if ($brand_item) {
                    // brand found

                    foreach ($brand_item as $one_brand) {
                        $brandID = $one_brand['brand_id'];
                        $brandName = $one_brand['brand_name'];

                        echo "<option value='$brandID'>$brandName</option>";
                    }
                } else {
                    //no brand found
                    echo "<option value='no_found'>no brand found</option>";
                }

                ?>
            </select><br>

            <input type="file" id="text" class="form-control" name="image"><br><br>

            <button type="submit" class="btn btn-dark text-light" name="Add">Add</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>


    </div>

    <!-- displaying all the products in the db -->
    <div style=" margin-left:300px; margin-right:300px;">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                if ($productlist) {

                    foreach ($productlist as $one_item) {
                        $productID = $one_item['product_id'];
                        $product_title = $one_item['product_title'];

                        echo " <tr>
                        <td>$productID</td>
                        <td>$product_title</td>
                        <td>
                            <a href='update_product.php?edit=$productID' class='btn btn-dark' '>edit</a>
                            <a href='../functions/add_product.php?delete=$productID' class='btn btn-dark'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                }


                ?>

            </table>

        </div>

    </div>

    <script src="../js/pform.js"></script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>

</body>

</html>