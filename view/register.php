<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta name="viewport">
    <link rel="stylesheet" href="../css/register.css">
    <title>Register Page</title>
</head>

<body>
    <?php
    // Showing alerts after register
    include("../functions/showAlerts.php");

    showRegisterAlert();


    ?>

    <h1 style="text-align: center">Register</h1>
    <p style="text-align: center">Please fill in this form to create an account.</p>
    <form method="POST" action="../actions/register_process.php" id="regis_form" enctype="multipart/form-data">
        <div class="form-group" style="margin-bottom: 10px">
            <label for="exampleInputEmail1">First name</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter first name" name="customer_name" required id="first_name">
            <div id="error_msg_name"></div>
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="exampleInputEmail1">Email</label> <br>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email" name="customer_email" required id="regis_email">
            <div id="error_msg_email"></div>
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="exampleInputEmail1">Password</label> <br>
            <input type="password" class="form-control" aria-describedby="emailHelp" placeholder="Enter Password" name="customer_pass" required id="regis_password">
            <div id="error_msg_pass"></div>
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="exampleInputEmail1">Country</label> <br>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="country" name="customer_country" required id="country">
            <div id="error_msg_country"></div>
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="exampleInputEmail1">City</label> <br>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="city" name="customer_city" required id="city">
            <div id="error_msg_city"></div>
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="exampleInputEmail1">Contact</label> <br>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="contact" name="customer_contact" required id="contact">
            <div id="error_msg_contact"></div>
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="exampleFormControlFile1">Upload profile picture</label><br>
            <input type="file" class="form-control-file" accept="image/*" name="img" required>
        </div>


        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <button type="submit" class="registerbtn" name="submit" style="background-color:dodgerblue">Register</button>
    </form>
    <script src="../js/app.js"></script>
</body>

</html>