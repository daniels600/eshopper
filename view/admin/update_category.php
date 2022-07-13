<?php
include("../controllers/product_controller.php");
//when the edit button is clicked
if (isset($_GET['edit']) ) {
    $categoryID= $_GET['edit'];
    $old_cname=select_one_category_ctr($categoryID);
    //when the update button id clicked
    if (isset($_POST['update'])) {
        $categoryName= $_POST['cname2'];
        $check= edit_category_ctr($categoryID,$categoryName);
        if ($check) {
        header("location:category.php");
        } else {
        echo "fail";
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
    <title>Poks Beauty | Category</title>
</head>

<body >
      <div style="font-size: 40px; margin-left:500px; margin-bottom:100px;"> Update Category</div>  
    <div style=" margin-left:500px; margin-right:500px;">
    
        <br><br>
        <form method="POST" action="" onsubmit="required()" name="form1">
            <label for="exampleInputEmail1" class="form-label">Enter Category</label>
            <input  name="cname2" type="text"  class="form-control" id="exampleInputEmail1" value="<?php echo $old_cname['cat_name'];?>">
            <br>
            <button type="submit" class="btn btn-dark text-light" name="update">Update</button>
        </form>
        
    </div>
    
    <script src="../js/cform.js"></script>
</body>

</html>