<?php
session_start();

// $emp_id = $_SESSION["id"];
include("db-connection.php");
if (!$_SESSION['id']) {
    header("location:index.php?msg=login_first");
} else {
    $id = $_SESSION["id"];
    // echo $id; die;
    $query = mysqli_query($db_conn, "select * from emp_experience where emp_id='$id'");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        $arr_fetch = mysqli_fetch_array($query);
        $company = $arr_fetch["last_company"];
        $d_join = $arr_fetch["date_of_joining"];
        $d_leave = $arr_fetch["date_of_leaving"];
        $d_work = $arr_fetch["depart_work"];
        $e_years = $arr_fetch["years_exp"];
        $city = $arr_fetch["city"];
        $state = $arr_fetch["state"];
        $zip = $arr_fetch["zip"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="admin/style.css">
    <title>experience</title>
    <style>
        .main {
            padding: 1.5rem 0;
        }

        .container {
            padding-top: 1rem !important;
            width: 580px;
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
            <div class="container jumbotron py-4 mb-0">
                <img src="logo.png">
                <h4 class="text-center pt-3 pb-3">Work Experience</h4>
                <form action="3-experience-handler.php" method="POST" class="d-block mx-auto">

                    <div class="form-group">
                        <label for="inputcom">Last company you work</label>
                        <input type="text" class="form-control comp" id="inputcom" placeholder="Company name" name="lcompany" value="<?php if(!empty($company)) echo $company ?>">
                        <span class="validate">*This field is required</span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputjoi">Date of Joining</label>
                            <input type="date" class="form-control join" id="inputjoi" name="doj" value="<?php if(!empty($d_join))echo $d_join ?>">
                            <span class="validate">*This field is required</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Date of leaving</label>
                            <input type="date" class="form-control leave" id="inputPassword4" name="dol" value=<?php if(!empty($d_leave))echo $d_leave ?>>
                            <span class="validate">*This field is required</span>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputdep">Department you Work</label>
                            <input type="text" class="form-control work" id="inputdep" name="d_work" value="<?php if(!empty($d_work)) echo $d_work ?>">
                            <span class="validate">*This field is required</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputexp">Years of Experience</label>
                            <input type="number" class="form-control exp" id="inputexp" name="years" value="<?php if(!empty($e_years)) echo $e_years ?>">
                            <span class="validate">*This field is required</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control city" id="inputCity" name="city" value="<?php if(!empty($city))echo $city ?>">
                            <span class="validate">*This field is required</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control state" name="state">
                                <option value="" selected>Choose...</option>
                                <option <?php if(!empty($state) && $state=="Bihar")echo "selected" ?> value="Bihar">Bihar</option>
                                <option <?php if(!empty($state) && $state=="Chennai")echo "selected" ?> value="Chennai">Chennai</option>
                                <option <?php if(!empty($state) && $state=="Chhattisgarh")echo "selected" ?> value="Chhattisgarh">Chhattisgarh</option>
                                <option <?php if(!empty($state) && $state=="Delhi")echo "selected" ?> value="Delhi">Delhi</option>
                                <option <?php if(!empty($state) && $state=="Assam")echo "selected" ?> value="Assam">Assam</option>
                                <option <?php if(!empty($state) && $state=="Maharashtra")echo "selected" ?> value="Maharashtra">Maharashtra</option>
                                <option <?php if(!empty($state) && $state=="Manipur")echo "selected" ?> value="Manipur">Manipur</option>
                                <option <?php if(!empty($state) && $state=="Punjab")echo "selected" ?> value="Punjab">Punjab</option>
                                <option <?php if(!empty($state) && $state=="Rajasthan")echo "selected" ?> value="Rajasthan">Rajasthan</option>
                                <option <?php if(!empty($state) && $state=="Tamil Nadu")echo "selected" ?> value="Tamil Nadu">Tamil Nadu</option>
                                <option <?php if(!empty($state) && $state=="Telangana")echo "selected" ?> value="Telangana">Telangana</option>
                                <option <?php if(!empty($state) && $state=="Tripura")echo "selected" ?> value="Tripura">Tripura</option>
                                <option <?php if(!empty($state) && $state=="Uttar Pradesh")echo "selected" ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                <option <?php if(!empty($state) && $state=="uttrakhand")echo "selected" ?> value="uttrakhand">uttrakhand</option>
                                <option <?php if(!empty($state) && $state=="West Bengal")echo "selected" ?> value="West Bengal">West Bengal</option>
                            </select>
                            <span class="validate">*This field is required</span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="number" class="form-control zip" id="inputZip" name="zip" value="<?php if(!empty($zip))echo $zip ?>">
                            <span class="validate">*Required</span>
                        </div>
                    </div>

                    <input type="submit" class="btn mx-auto d-block px-5 py-2 mt-2 btnco con_btn" value="Continue">
            </div>
            </form>
        </div>
    </div>


    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".con_btn").click(function() {

                //last-company
                var comp = $(".comp").val();
                if (comp == "") {
                    $(".comp").siblings(".validate").fadeIn();
                    return false;
                } else {
                    $(".comp").siblings(".validate").fadeOut();
                }

                //date-of-joining
                var join = $(".join").val();
                if (join == "") {
                    $(".join").siblings(".validate").fadeIn();
                    ".validate"
                    return false;
                } else {
                    $(".join").siblings(".validate").fadeOut();
                }

                //date-of-leaving
                var leave = $(".leave").val();
                if (leave == "") {
                    $(".leave").siblings(".validate").fadeIn();
                    return false;
                } else {
                    $(".leave").siblings(".validate").fadeOut();
                }

                //depart-work
                var work = $(".work").val();
                if (work == "") {
                    $(".work").siblings(".validate").fadeIn();
                    return false;
                } else {
                    $(".work").siblings(".validate").fadeOut();
                }

                //years-of-experience
                var exp = $(".exp").val();
                if (exp == "") {
                    $(".exp").siblings().fadeIn();
                    return false;
                } else {
                    $(".exp").siblings().fadeOut();
                }

                //city
                var city = $(".city").val();
                if (city == "") {
                    $(".city").siblings(".validate").fadeIn();
                    return false;
                } else {
                    $(".city").siblings(".validate").fadeOut();
                }

                //state
                var state = $(".state").val();
                if (state == "") {
                    $(".state").siblings(".validate").fadeIn();
                    return false;
                } else {
                    $(".state").siblings(".validate").fadeOut();
                }

                //zip
                var zip = $(".zip").val();
                if (zip == "") {
                    $(".zip").siblings(".validate").fadeIn();
                    return false;
                } else {
                    $(".zip").siblings(".validate").fadeOut();
                }

            });
        });
    </script>
</body>

</html>