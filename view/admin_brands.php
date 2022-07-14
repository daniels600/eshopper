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
    <title>Brands Admin Dashboard</title>
</head>

<body>
    <?php
    include("../settings/core.php");
    include("../controllers/product_controller.php");
    include("../functions/showAlerts.php");

    if (check_user_role() != 1) {
        header("Location: ../index.php");
    }

    showAddBrandAlert();
    showUpdateBrandAlert();
    showDeleteBrandAlert();

    $brandlist = select_all_brand_ctr();


    if (isset($_GET['edit'])) {
        $categoryID = $_GET['edit'];
        $old_cname = select_one_category_ctr($categoryID);
    }
    ?>
    <h2 style="text-align: center">Brand List</h2>
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
            <button style="margin-right: 80px; background-color: #4F6D7A; color: white" type="button" class="btn" data-toggle="modal" data-target="#addBrandModal"><i class="fa-solid fa-plus"></i> Add Brand</button>
        </div>

    </div>

    <div style=" margin-left:300px; margin-right:300px;">
        <div class="row justify-content-center">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <?php
                if ($brandlist) {

                    foreach ($brandlist as $one_item) {
                        $brandID = $one_item['brand_id'];
                        $brandName = $one_item['brand_name'];

                        echo " <tr>
                        <td>$brandID</td>
                        <td>$brandName</td>
                        <td>
                            <a href='update_brand.php?edit=$brandID'  '><button class='btn btn-success' type='button' ><i class='fa-solid fa-pen-to-square'></i>  edit
                                </button></a>
                            <a href='../actions/brand_action.php?delete=$brandID' class='btn btn-danger'> <i class='fa-solid fa-trash-can'></i>  Delete</a>  
                        </td>
                    </tr>
                        ";
                    }
                }

                ?>

            </table>

        </div>

    </div>
    <script src="../js/bform.js"></script>

    <!-- Add Brand Modal -->
    <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../actions/brand_action.php" onsubmit="required()" name="form1">
                        <label for="exampleInputEmail1" class="form-label">Enter Brand</label>
                        <input name="bname" type="text" class="form-control" id="exampleInputEmail1">
                        <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Add brand</button>
                </div>
                </form>
            </div>
        </div>
    </div>
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