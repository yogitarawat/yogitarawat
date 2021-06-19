$(document).ready(function () {

    //to hide show label on focus
    $("#name").on("focus blur", function () {
        $("#lb_name").toggleClass("opacity_zero");
    });

    $("#lname").on("focus blur", function () {
        $("#lbl_name").toggleClass("opacity_zero");
    });

    $("#number").on("focus blur", function () {
        $("#lb_number").toggleClass("opacity_zero");
    });

    $("#email").on("focus blur", function () {
        $("#lb_email").toggleClass("opacity_zero");
    });

    $("#pincode").on("focus blur", function () {
        $("#lb_pincode").toggleClass("opacity_zero");
    });

    $("#address").on("focus blur", function () {
        $("#lb_address").toggleClass("opacity_zero");
    });

    $("#address2").on("focus blur", function () {
        $("#lb_address2").toggleClass("opacity_zero");
    });

    $("#city").on("focus blur", function () {
        $("#lb_city").toggleClass("opacity_zero");
    });

    //to keep labels hidden when input field is not empty(filled)
    $("#name").blur(function () {
        $("#name , #lb_name").removeClass("shake-horizontal");

        var name = $("#name").val();

        if (name !== "") {
            $("#lb_name").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_name").css("opacity", ".8");
        }
    });

    $("#lname").blur(function () {
        $("#lname , #lbl_name").removeClass("shake-horizontal");

        var name = $("#lname").val();

        if (name !== "") {
            $("#lbl_name").css("opacity", "0");
            return false;
        }
        else {
            $("#lbl_name").css("opacity", ".8");
        }
    });

    $("#number").blur(function () {
        $("#number , #lb_number").removeClass("shake-horizontal");

        var number = $("#number").val();

        if (number !== "") {
            $("#lb_number").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_number").css("opacity", ".8");
        }
    });

    $("#pincode").blur(function () {
        $("#pincode , #lb_pincode").removeClass("shake-horizontal");

        var pincode = $("#pincode").val();

        if (pincode !== "") {
            $("#lb_pincode").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_pincode").css("opacity", ".8");
        }
    });

    $("#email").blur(function () {
        $("#email , #lb_email").removeClass("shake-horizontal");

        var email = $("#email").val();

        if (email !== "") {
            $("#lb_email").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_email").css("opacity", ".8");
        }
    });


    $("#city").blur(function () {
        $("#city , #lb_city").removeClass("shake-horizontal");

        var city = $("#city").val();

        if (city !== "") {
            $("#lb_city").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_city").css("opacity", ".8");
        }
    });

    $("#address").blur(function () {
        $("#address , #lb_address").removeClass("shake-horizontal");

        var address = $("#address").val();

        if (address !== "") {
            $("#lb_address").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_address").css("opacity", ".8");
        }
    });


    $("#address2").blur(function () {
        $("#address2 , #lb_address2").removeClass("shake-horizontal");

        var address2 = $("#address2").val();

        if (address2 !== "") {
            $("#lb_address2").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_address2").css("opacity", ".8");
        }
    });


    //form-validation
    $("#submit_btn").click(function () {

        var name = $("#name").val();
        if (name == "") {
            $("#lb_name").addClass("validate");
            $("#name ,#lb_name").addClass("shake-horizontal");
            $("html, body").animate({ scrollTop: 50 }, "slow");
            return false;
        }
        else {
            $("#lb_name").removeClass("validate");
            $("#name , #lb_name").removeClass("shake-horizontal");
        }

        var lname = $("#lname").val();
        if (lname == "") {
            $("#lbl_name").addClass("validate");
            $("#lname ,#lbl_name").addClass("shake-horizontal");
            $("html, body").animate({ scrollTop: 50 }, "slow");
            return false;
        }
        else {
            $("#lb_name").removeClass("validate");
            $("#name , #lb_name").removeClass("shake-horizontal");
        }

        var number = $("#number").val();
        if (number == "") {
            $("#lb_number").addClass("validate");
            $("#number ,#lb_number").addClass("shake-horizontal");
            $("html, body").animate({ scrollTop: 50 }, "slow");
            return false;
        }
        else {
            $("#lb_number").removeClass("validate");
            $("#number , #lb_number").removeClass("shake-horizontal");
        }

        numlength = number.length;
        if (numlength !== 10) {
            alert("number length should be 10 digit");
            $("html, body").animate({ scrollTop: 50 }, "slow");
            return false;
        }

        
        
        var pincode = $("#pincode").val();
        if (pincode == "") {
            $("#lb_pincode").addClass("validate");
            $("#pincode ,#lb_pincode").addClass("shake-horizontal");
            $("html, body").animate({ scrollTop: 50 }, "slow");
            return false;
        }
        else {
            $("#lb_pincode").removeClass("validate");
            $("#pincode , #lb_pincode").removeClass("shake-horizontal");
        }
        
        pinlength = pincode.length;
        if (pinlength !== 6) {
            alert("pincode should be 6 digit");
            return false;
        }
        
        var email = $("#email").val();
        if (email == "") {
            $("#lb_email").addClass("validate");
            $("#email ,#lb_email").addClass("shake-horizontal");
            $("html, body").animate({ scrollTop: 50 }, "slow");
            return false;
        }
        else {
            $("#lb_email").removeClass("validate");
            $("#email , #lb_email").removeClass("shake-horizontal");
        }

        var city = $("#city").val();
        if (city == "") {
            $("#lb_city").addClass("validate");
            $("#city ,#lb_city").addClass("shake-horizontal");
            $("html, body").animate({ scrollTop: 200 }, "slow");
            return false;
        }
        else {
            $("#lb_city").removeClass("validate");
            $("#city , #lb_city").removeClass("shake-horizontal");
        }


        var address = $("#address").val();
        if (address == "") {
            $("#lb_address").addClass("validate");
            $("#address ,#lb_address").addClass("shake-horizontal");
            $("html, body").animate({ scrollTop: 160 }, "slow");
            return false;
        }
        else {
            $("#lb_address").removeClass("validate");
            $("#address , #lb_address").removeClass("shake-horizontal");
        }

      


    });







});