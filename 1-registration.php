<?php

session_start();
include("db-connection.php");
$query = mysqli_query($db_conn, "select * from department_table where status='active'");
$rows = mysqli_num_rows($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="admin/style.css">
    <title>personal details</title>
    <style>
        .jumbotron {
            padding: 1rem 2rem 1rem !important;
            width: 550px;
        }

        .email {
            width: 98%;
        }

        .validate {
            color: red;
            padding-left: .5rem;
            display: none;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="main">
            <div class="container jumbotron mt-4">
                <img src="logo.png">
                <h3 class="text-center py-3 mb-0">Registration form</h3>

                <form action="1-registration-handler.php" method="post" class="pt-1">
                    <div class="form-group w-100 mx-auto mb-2">
                        <label for="select1" class="h5">Select your Department/Office</label>
                        <select class="form-control" id="select1" name="department">
                            <option value=""> -- Select Department name -- </option>
                            <?php
                            if ($rows > 0) {
                                while ($fetch_active = mysqli_fetch_array($query)) {
                                    $dep_id = $fetch_active['id'];
                                    $dep_name = $fetch_active['department'];
                                    if ($dep_id == $depart) {
                                        echo "<option value='$dep_id' selected>$dep_name </option>";
                                    } else {
                                        echo "<option value='$dep_id'> $dep_name</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                        <span class="validate">*Department field is required</span>
                    </div>

                    <div class="row w-100 mx-auto mb-2">
                        <div class="col">
                            <input type="text" class="form-control name1" placeholder="First name" name="fname">
                            <span class="validate">*name field is required</span>

                        </div>
                        <div class="col">
                            <input type="text" class="form-control name2" placeholder="Last name" name="lname">
                            <span class="validate">*name field is required</span>
                        </div>
                    </div>

                    <div class="row w-100 mx-auto mb-2">
                        <div class="col w-25">
                            <input type="text" class="form-control email" placeholder="Email" name="email">
                            <span class="validate">*Email field is required</span>
                        </div>
                        <div class="col d-flex align-item-center pr-2 flex-wrap">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input gender" type="radio" name="gender" id="Radio1" value="male">
                                <label class="form-check-label" for="Radio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input gender" type="radio" name="gender" id="Radio2" value="female">
                                <label class="form-check-label" for="Radio2">Female</label>
                            </div>
                            <span class="validate gen">*Gender field is required</span>
                        </div>
                    </div>

                    <div class="row w-100 mx-auto mb-2">
                        <div class="col">
                            <input type="number" class="form-control mobile" placeholder="Mobile" name="mobile">
                            <span class="validate">*mobile field is required</span>
                        </div>
                        <div class="col">
                            <input onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date" placeholder="Date of Birth" name="dob">
                            <span sddde class="validate">*Date field is required</span>
                        </div>
                    </div>

                    <div class="row w-100 mx-auto mb-2">
                        <div class="col">
                            <textarea name="address" cols="30" rows="3" class="form-control add" placeholder="Address"></textarea>
                            <span class="validate">*Address field is required</span>
                        </div>
                    </div>

                    <div class="row w-100 mx-auto mb-2">
                        <div class="col">
                            <input type="password" class="form-control pass" placeholder="Password" name="pass">
                            <span class="validate">*Password field is required</span>

                        </div>
                        <div class="col">
                            <input type="password" class="form-control cpass" placeholder="Confirm password" name="cpass">
                            <span class="validate">*Password field is required</span>
                        </div>
                    </div>

                    <input type="submit" value="continue" class="btn sub_btn mx-auto d-block px-5 mt-4 btnco">
                    <div class="text-center pt-2">Have an Account ?<a href="index.php"> Log in</a></div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $(".sub_btn").click(function() {

            //department
            var depart = $("#select1").val();
            if (depart == "") {
                $("#select1").siblings().fadeIn();
                return false;
            } else {
                $("#select1").siblings().fadeOut();
            }

            //first-name
            var name = $(".name1").val();
            if (name == "") {
                $(".name1").siblings().fadeIn();
                return false;
            } else {
                $(".name1").siblings().fadeOut();
            }

            //last-name
            var name2 = $(".name2").val();
            if (name2 == "") {
                $(".name2").siblings().fadeIn();
                return false;
            } else {
                $(".name2").siblings().fadeOut();
            }
            //email
            var email = $(".email").val();
            if (email == "") {
                $(".email").siblings().fadeIn();
                return false;
            } else {
                $(".email").siblings().fadeOut();
            }

            //gender
            var gender = $(".gender").is(":checked");
            if (gender == false) {
                $(".gen").fadeIn();
                return false;
            } else {
                $(".gen").fadeOut();
            }

            //mobile
            var mobile = $(".mobile").val();
            if (mobile == "") {
                $(".mobile").siblings().fadeIn();
                return false;
            } else {
                $(".mobile").siblings().fadeOut();
            }

            //date
            var date = $(".date").val();
            if (date == "") {
                $(".date").siblings().fadeIn();
                return false;
            } else {
                $(".date").siblings().fadeOut();
            }

            //add
            var add = $(".add").val();
            if (add == "") {
                $(".add").siblings().fadeIn();
                return false;
            } else {
                $(".add").siblings().fadeOut();
            }

            //add password
            var pass = $(".pass").val();
            if (pass == "") {
                $(".pass").siblings().fadeIn();
                return false;
            } else {
                $(".pass").siblings().fadeOut();
            }

            //confirm password
            var cpass = $(".cpass").val();
            if (cpass == "") {
                $(".cpass").siblings().fadeIn();
                return false;
            } else {
                $(".cpass").siblings().fadeOut();
            }


        });


    });
</script>

</html>
<?php
// }
?>