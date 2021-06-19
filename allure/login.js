$(document).ready(function () {


    //to hide show label on focus
    $("#email").on("focus blur", function () {
        $("#lb_email").toggleClass("opacity_zero");
    });
    $("#pass").on("focus blur", function () {
        $("#lb_pass").toggleClass("opacity_zero");
    });

    //to keep labels hidden when input field is not empty(filled)
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

    $("#pass").blur(function () {
        $("#pass , #lb_pass").removeClass("shake-horizontal");
        var pass = $("#pass").val();

        if (pass !== "") {
            $("#lb_pass").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_pass").css("opacity", ".8");
        }
    });



    // login form-validation
    $("#login_btn").click(function () {

        var email = $("#email").val();
        if (email == "") {
            $("#lb_email").addClass("validate");
            $("#email ,#lb_email").addClass("shake-horizontal");
            return false;
        }
        else {
            $("#lb_email").removeClass("validate");
            $("#email , #lb_email").removeClass("shake-horizontal");
        }

        
        var pass = $("#pass").val();
        if (pass == "") {
            $("#lb_pass").addClass("validate");
            $("#pass ,#lb_pass").addClass("shake-horizontal");
            return false;
        }
        else {
            $("#lb_pass").removeClass("validate");
            $("#pass, #lb_pass").removeClass("shake-horizontal");
        }
    });

    //signup//

    //to hide show label on focus
    $("#name").on("focus blur", function () {
        $("#lb_name").toggleClass("opacity_zero");
    });

    $("#semail").on("focus blur", function () {
        $("#lbs_email").toggleClass("opacity_zero");
    });

    $("#spass").on("focus blur", function () {
        $("#lbs_pass").toggleClass("opacity_zero");
    });


    //to keep labels hidden when input field is not empty(filled)
    $("#name").blur(function () {
        $("#name , #lb_name").removeClass("shake-horizontal");

        var sname = $("#name").val();

        if (sname !== "") {
            $("#lb_name").css("opacity", "0");
            return false;
        }
        else {
            $("#lb_name").css("opacity", ".8");
        }
    });


    $("#semail").blur(function () {
        $("#semail , #lbs_email").removeClass("shake-horizontal");

        var mail = $("#semail").val();

        if (mail !== "") {
            $("#lbs_email").css("opacity", "0");
            return false;
        }
        else {
            $("#lbs_email").css("opacity", ".8");
        }
    });

    $("#spass").blur(function () {
        $("#spass , #lbs_pass").removeClass("shake-horizontal");
        var spass = $("#spass").val();

        if (spass !== "") {
            $("#lbs_pass").css("opacity", "0");
            return false;
        }
        else {
            $("#lbs_pass").css("opacity", ".8");
        }
    });

     // login form-validation
     $("#signin_btn").click(function () {

        var sname = $("#name").val();
        if (sname == "") {
            $("#lb_name").addClass("validate");
            $("#name ,#lb_name").addClass("shake-horizontal");
            return false;
        }
        else {
            $("#lb_name").removeClass("validate");
            $("#name , #lb_name").removeClass("shake-horizontal");
        }


        var mail = $("#semail").val();
        if (mail == "") {
            $("#lbs_email").addClass("validate");
            $("#semail ,#lbs_email").addClass("shake-horizontal");
            return false;
        }
        else {
            $("#lbs_email").removeClass("validate");
            $("#semail , #lbs_email").removeClass("shake-horizontal");
        }


        var spass = $("#spass").val();
        if (spass == "") {
            $("#lbs_pass").addClass("validate");
            $("#spass ,#lbs_pass").addClass("shake-horizontal");
            return false;
        }
        else {
            $("#lbs_pass").removeClass("validate");
            $("#spass, #lbs_pass").removeClass("shake-horizontal");
        }
    });


});
