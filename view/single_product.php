
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/psr.css">
    <title>Document</title>
</head>
<body>
    <?php
include("../controllers/product_controller.php");
		$pro_id= $_GET['p'];
		$product=get_one_pro_ctr($pro_id);
		print_r($pro_id);
        echo"<div class='column'>
                           
                    <h2 style='text-align:left'>$product[product_title]</h2>

                    <div class='card'>

                        <img src = '$product[product_image]' alt='card image' style='width:100%'>
                        <p>$product[product_title]</p>
                        <p>$product[product_desc]</p>
                        <p>$product[product_keywords]</p>
                        <p>$product[product_brand]</p>
                        <p>$product[product_cat]</p>
                        <p>GHC$product[product_price]</p>
                        <p><button><a href=  '../actions/add_to_cart.php'> Add to Cart</button></p>
                    </div>
                    </br></br>;
                    
            </div>"


                
?>
</body>
</html>