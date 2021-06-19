$(document).ready(function () {

    $(".signup").click(function () {
        var empty = $("#name").val();
        var email = $("#mail").val();
        var password = $("#pass").val();
        var cpass = $("#pass1").val();
        if (empty == "") {
            $(".vaccant1").show().css({ "top": "82px", "left": "13px" });
            $("#name").css("border", "1px solid red");
            return false;
        }
        if (email == "") {
            $(".vaccant2").show().css({ "top": "140px", "left": "13px" });
            $("#mail").css("border", "1px solid red");
            return false;
        }
        if (password == "") {
            $(".vaccant3").show().css({ "top": "198px", "left": "13px" });
            $("#pass").css("border", "1px solid red");
            return false;
        }

        if (cpass == "") {
            $(".vaccant4").show().css({ "top": "256px", "left": "13px" });
            $("#pass1").css("border", "1px solid red");
            return false;
        }
        if (password != cpass) {
            alert("password does not match");
            return false;
        }
    });


});