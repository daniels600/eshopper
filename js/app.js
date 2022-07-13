$(document).ready(() => {
    //creating variable using the ids in the forms we want to validate
    let error_msg,
        email,
        password,
        regis_email,
        regis_password,
        regis_country,
        regis_city,
        regis_contact,
        regis_firstname = "";

    // * Validation for Login Form
    $("#email").on("keyup", () => {
        let regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        //getting the value of the password and the email
        email = $("#email").val();
        
        let check = regex.test(email);
        if (check) {
            console.log("email valid");
            $("#error_msg").hide();
        } else {
            error_msg = "Enter a valid email";
            console.log("email invalid");
            $("#error_msg").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

    $("#password").on("keyup", () => {
        password = $("#password").val();

        if (password.length < 6) {
            error_msg = "Password length should be at least 6 characters";
            $("#error_msg_pass").html(`<p style='color: red'>${error_msg}</p>`);
        } else {
            $("#error_msg_pass").hide();
        }
    });

    $("form#login_form").submit(function(e) {
        console.log(email, password);
        if (email != "" && password != "") {
            return;
        } else {
            alert("Fill all input fields");
            e.preventDefault();
        }
    });

    // * Validation for Register Form
    $("#regis_email").on("keyup", () => {
        let regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        //getting the value of the email
        regis_email = $("#regis_email").val();

        let check = regex.test(regis_email);
        if (check) {
            console.log("email valid");
            error_msg = "";
            $("#error_msg_email").hide();
        } else {
            error_msg = "Enter a valid email";
            $("#error_msg_email").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

        //getting the value of the password
    $("#regis_password").on("keyup", () => {
        regis_password = $("#regis_password").val();

        if (regis_password.length < 8) {
            error_msg = "Password length should be at least 8 characters";
            $("#error_msg_pass").html(`<p style='color: red'>${error_msg}</p>`);
        } else {
            error_msg = "";
            $("#error_msg_pass").hide();
        }
    });

    $("#first_name").on("keyup", () => {
        let regex = /^[ A-Za-z]+$/;
        //getting the value of the first name
        regis_firstname = $("#first_name").val();

        let check = regex.test(regis_firstname);
        if (check) {
            error_msg = "";
            $("#error_msg_name").hide();
        } else {
            error_msg = "Enter a valid name";
            $("#error_msg_name").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

    $("#country").on("keyup", () => {
        let regex = /^[ a-zA-Z-]*$/;
        //getting the value of the country
        regis_country = $("#country").val();

        let check = regex.test(regis_country);
        if (check) {
            error_msg = "";
            $("#error_msg_country").hide();
        } else {
            error_msg = "Enter a valid country name";
            $("#error_msg_country").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

    $("#city").on("keyup", () => {
        let regex = /^[ A-Za-z z.,\/+-]*$/;
        //getting the value of the city
        regis_city = $("#city").val();

        let check = regex.test(regis_city);
        if (check) {
            error_msg = "";
            $("#error_msg_city").hide();
        } else {
            error_msg = "Enter a valid city name";
            $("#error_msg_city").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

    $("#contact").on("keyup", () => {
        let regex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/;
        //getting the value of the contact
        regis_contact = $("#contact").val();

        let check = regex.test(regis_contact);
        if (check) {
            error_msg = "";
            $("#error_msg_contact").hide();
        } else {
            error_msg = "Enter a valid contact";
            $("#error_msg_contact").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

    $("form#regis_form").submit(function(e) {
        if (error_msg == "") {
            return;
        } else {
            alert("Fill all input fields");
            e.preventDefault();
        }
    });
});