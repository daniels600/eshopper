<?php
include("../controllers/product_controller.php");
//when the edit button is clicked
if (isset($_GET['edit'])) {
    //getting the id and product list
    $productID = $_GET['edit'];
    $old_product_list = select_one_product_ctr($productID);
    $old_product_cat = $old_product_list['product_cat'];
    $old_product_brand = $old_product_list['product_brand'];
    $old_product_title = $old_product_list['product_title'];
    $old_product_price = $old_product_list['product_price'];
    $old_product_desc = $old_product_list['product_desc'];
    $old_product_image = $old_product_list['product_image'];
    $old_product_keyword = $old_product_list['product_keywords'];
    //when the update button id clicked

}
if (isset($_POST['update2'])) {
    $product_id = $_POST['product_id'];
    $product_cat = $_POST['category'];
    $product_brand = $_POST['brand'];
    $product_title = $_POST['title'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['description'];
    $product_keywords = $_POST['keyword'];


    if (
        !empty($_FILES['image']['tmp_name'])
        && file_exists($_FILES['image']['tmp_name'])
    ) {
        $target = "../uploads/" . basename($_FILES['image']['name']);

        $product_image = $_FILES['image']['name'];

        $check = edit_productImg_ctr($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);

        if ($check) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "success";
                header("location:../admin/product.php?update=success");
            } else {
                $msg = "fail";
                header("location:../admin/product.php?update=error");
            }
        } else {
            echo "fail";
        }
    } else {
        $check = edit_product_ctr($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords);

        if ($check) {
            header("location:../admin/product.php?update=success");
        } else {
            echo "fail";
            header("location:../admin/product.php?update=error");
        }
    }
}
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Poks Beauty | Product</title>
</head>

<body>
    <div style="font-size: 40px; margin-left:500px; margin-bottom:50px;"> Edit Product</div>

    <div style=" margin-left:500px; margin-right:500px;">

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="form1" enctype="multipart/form-data">
            <label for="title" class="form-label">Enter product title</label>
            <input name="title" type="text" class="form-control" id="title" value="<?php echo $old_product_title; ?>"><br>
            <label for="price" class="form-label">Enter product price</label>
            <input name="price" type="text" class="form-control" id="price" value="<?php echo $old_product_price; ?>"><br>
            <label for="description" class="form-label">Enter product description</label>
            <input name="description" type="text" class="form-control" id="description" value="<?php echo $old_product_desc; ?>"><br>
            <label for="keyword" class="form-label">Enter product keywords</label>
            <input name="keyword" type="text" class="form-control" id="keyword" value="<?php echo $old_product_keyword; ?>"><br><br>



            <select name="category" id="text" class="form-control">
                <option value="">Select category:</option>
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
            </select><br><br>
            <select name="brand" id="text" class="form-control">
                <option value="">Select Brand:</option>
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
            </select>
            <br><br>
            <label for="file-input" class="form-label">Old Image</label> <br>
            <img src='../uploads/<?php echo $old_product_image; ?>' style='width: 200px; height: 200px; '>
            <input type="file" id="text" name="image" id="file-input" class="form-control">

            <br><br>

            <input type="hidden" value="<?php echo $productID; ?>" name="product_id">

            <button name="update2" type="submit" id="button" class="btn btn-dark text-light"> Update</button>
        </form>
        <br><br>
    </div>


    <script src="../js/pform.js"></script>

</body>

</html>