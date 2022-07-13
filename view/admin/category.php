<?php
include("../controllers/product_controller.php");
include ("../Settings/core.php");
// check_login_index();
// $user_role= check_role();
// if ($user_role != 1) {//change to 1
//     header("location:403.php");
// }
 $cat_list= select_all_category_ctr();
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

      <div style="font-size: 40px; margin-left:500px; margin-bottom:100px;"> Add Category
      <a href="../view/home.php" class="btn btn-dark text-light" style="margin-left:550px;" >Home</a>
    </div>   

    <div style=" margin-left:500px; margin-right:500px;">
        
        <form method="POST" action="../functions/add_category.php" onsubmit="required()" name="form1">
            <label for="exampleInputEmail1" class="form-label">Enter Category</label>
            <input  name="cname" type="text"  class="form-control" id="exampleInputEmail1">
            <br>
            <button type="submit" class="btn btn-dark text-light" name="add">Add</button>
        </form>
        <br><br>
    </div>
    <div style=" margin-left:300px; margin-right:300px;">
       <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                  if ($cat_list) {
                      
                    foreach($cat_list as $one_item){
                        $categoryID = $one_item['cat_id'];
                        $categoryName = $one_item['cat_name'];
                        echo " 
                         <tr>
                        <td>$categoryID</td>
                        <td>$categoryName</td>
                        <td>
                            <a href='update_category.php?edit=$categoryID' class='btn btn-dark' '>edit</a>
                            <a href='../functions/add_category.php?delete=$categoryID' class='btn btn-dark'>Delete</a>
                        </td>
                    </tr>
                        ";

                    }
                }
                        
                  
                     ?>

            </table>
        
        </div>

    </div> 
    <script src="../js/cform.js"></script>
</body>

</html>