$(document).ready(() => {
    //creating variable using the ids in the forms we want to validate
    let ptitle,
        pprice,
        pdescription,
        pkeyword = "";
        

    // * Validation for Register Form

    $("#ptitle").on("keyup", () => {
        let regex = /^[ A-Za-z]+$/;
        //getting the value of the title
        ptitle = $("#ptitle").val();

        let check = regex.test(ptitle);
        if (check) {
            error_msg = "";
            $("#error_msg_title").hide();
        } else {
            error_msg = "Enter a valid title";
            $("#error_msg_title").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

    $("#pprice").on("keyup", () => {
        let regex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/;
        //getting the value of the price
        pprice = $("#pprice").val();

        let check = regex.test(pprice);
        if (check) {
            error_msg = "";
            $("#error_msg_price").hide();
        } else {
            error_msg = "Enter a valid price";
            $("#error_msg_price").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

    $("#pkeyword").on("keyup", () => {
        let regex = /^[ A-Za-z z.,\/+-]*$/;
        //getting the value of the keyword
        pkeyword = $("#pkeyword").val();

        let check = regex.test(pkeyword);
        if (check) {
            error_msg = "";
            $("#error_msg_keyword").hide();
        } else {
            error_msg = "Enter a valid keyword";
            $("#error_msg_keyword").html(`<p style='color: red'>${error_msg}</p>`);
        }
    });

  

    $("form#product_form").submit(function(e) {
        if (error_msg == "") {
            return;
        } else {
            alert("Fill all input fields");
            e.preventDefault();
        }
    });
});