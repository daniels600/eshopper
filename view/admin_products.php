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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>eShopper Admin Dashboard</title>
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
    include("../settings/core.php");
    include("../controllers/product_controller.php");
    include("../functions/showAlerts.php");

    showAddProductAlert();
    showUpdateProductAlert();
    showDeleteProductAlert();


    if (check_user_role() != 1) {
        header("Location: ../index.php");
    }


    $productlist = select_all_product_ctr();
    ?>

    <h2 style="text-align: center">Product List</h2>
    <div style="font-size: 40px; margin-left:200px; margin-bottom:50px;">
        <div class="container" style="margin-bottom: 30px; margin-left: 280px;
  margin-right: auto;text-align: center">
            <div class="row">
                <a href="../index.php"><button style="margin-right: 80px;" type="button" class="btn btn-dark text-light"><i class="fa-solid fa-house"></i> Home</button></a>
                <a href="admin_products.php"><button style="margin-right: 80px;background-color: #DD6E42; color: white" type="button" class="btn"><i class="fa-brands fa-product-hunt"></i> Product</button></a>
                <a href="admin_categories.php"><button style="margin-right: 80px;" type="button" class="btn btn-primary"><i class="fa-solid fa-boxes-stacked"></i> Category</button></a>
                <a href="admin_brands.php"><button type="button" class="btn" style="background-color: #7C72A0; color: white"><i class="fa-solid fa-copyright"></i> Brand</button></a>

            </div>

        </div>

    </div>


    <div class="container" style="margin-bottom: 30px; margin-left: 280px;
  margin-right: auto;text-align: center">
        <div class="row">
            <button style="margin-right: 80px;background-color: #4F6D7A; color: white" type="button" class="btn" data-toggle="modal" data-target="#addProductModal"><i class="fa-solid fa-plus"></i> Add Product</button>
        </div>

    </div>


    <!-- displaying all the products in the db -->
    <div style=" margin-left:300px; margin-right:300px;">
        <div class="row justify-content-center">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Desc.</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                if ($productlist) {

                    foreach ($productlist as $one_item) {
                        $productID = $one_item['product_id'];
                        $product_title = $one_item['product_title'];
                        $product_img = $one_item['product_image'];
                        $product_desc = $one_item['product_desc'];
                        $product_price = $one_item['product_price'];

                        echo " <tr>
                        <td><img src='$product_img' alt='Product img' width='80' height='60'></td>
                        <td>$product_title</td>
                        <td>$product_price</td>
                        <td>$product_desc</td>
                        <td>
                            <a href='update_product.php?edit=$productID'  '><button class='btn btn-success' type='button' ><i class='fa-solid fa-pen-to-square'></i>  edit
                                    </button></a>
                            <a href='../actions/product_action.php?delete=$productID' class='btn btn-danger'> <i class='fa-solid fa-trash-can'></i>  Delete</a>  
                    
                        </td>
                    </tr>
                        ";
                    }
                }
                ?>

            </table>

        </div>

    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../actions/product_action.php" class="form-container" onsubmit="required()" name="form1" enctype="multipart/form-data">
                        <label for="title" class="form-label">Enter product title</label>
                        <input name="title" type="text" class="form-control" id="title">
                        <label for="price" class="form-label">Enter product price</label>
                        <input name="price" type="text" class="form-control" id="price">
                        <label for="description" class="form-label">Enter product description</label>
                        <input name="description" type="text" class="form-control" id="description">
                        <label for="keyword" class="form-label">Enter product keywords</label>
                        <input name="keyword" type="text" class="form-control" id="keyword"><br>
                        <select name="category" class="form-control">
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
                        </select> <br>

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
                        <label lass="form-label">Product Image</label> <br>
                        <input type="file" id="text" class="form-control" name="image"><br><br>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="Add" class="btn btn-primary">Add product</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <script src="../js/pform.js"></script>
    <script>
        $(".btn-danger").on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }

            })
        })
    </script>

</body>

</html>