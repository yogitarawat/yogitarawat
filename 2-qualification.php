<?php
session_start();
include("db-connection.php");
if (!$_SESSION["id"]) {
    header("location:index.php?msg=register_first");
    die();
} else {
    $id = $_SESSION["id"];
    $chk_query = mysqli_query($db_conn, "select * from  emp_qualification where emp_id='$id'");
    $chk_rows = mysqli_num_rows($chk_query);

    //edit and then update the value
    if (isset($_GET["a"]) && $_GET["a"] == "add") {
        if ($_POST) {
            $qual = $_POST["ed_quali"];
            $uni = $_POST["ed_uniname"];
            $pass = $_POST["ed_passyear"];
            $per = $_POST["ed_percentage"];
            $u_id = $_GET['id'];
            $year = 1980;
            $c_year = date("Y");
 
            if (!empty($qual) && !empty($uni) && !empty($pass) && !empty($per)) {
                $id = mysqli_query($db_conn, "select * from emp_qualification where q_id='$u_id'");
                $rows = mysqli_num_rows($id);
                if ($rows > 0) {
                    if ($pass > $year && $pass < $c_year) {
                        mysqli_query($db_conn, "update emp_qualification set qualification='$qual', university_name='$uni', passing_year='$pass', percentage='$per' where q_id='$u_id'");
                        header("location:2-qualification.php?a=successfull");
                        die();
                    } else {
                        header("location:2-qualification.php?msg=invalid_year");
                    }
                }
            } else {
                header("location:2-qualification.php?a=empty");
                die();
            }
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
        <title>qualification</title>
        <style>
            .container {
                position: relative;
                padding-top: 1.5rem !important;
                padding-bottom: 0;
                width: 98%;
            }

            .main-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
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

                <?php
                if (isset($_GET["a"]) && $_GET["a"] == "edit") {
                    $e_id = $_GET["id"];
                    $e_query = mysqli_query($db_conn, "select * from emp_qualification where q_id='$e_id'");
                    $e_rows = mysqli_num_rows($e_query);
                    if ($e_rows > 0) {
                        $fetch = mysqli_fetch_array($e_query);
                        $qual = $fetch['qualification'];
                        $name = $fetch['university_name'];
                        $year = $fetch['passing_year'];
                        $perc = $fetch['percentage'];
                    }


                ?>
                    <!--this form will open when user clicks on edit button for editing values-->
                    <form action="2-qualification.php?a=add&id=<?= $e_id ?>" method="post" class="d-block mx-auto">
                        <div class="container jumbotron mb-0">
                            <img src="logo.png">
                            <h3 class="text-center pt-3 pb-1">Add your Qualification</h3>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Qualification</th>
                                        <th scope="col">University name</th>
                                        <th scope="col">PASSING YEAR</th>
                                        <th scope="col">PERCENTAGE %</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <select name="ed_quali" class="form-control quali w-100">
                                                <?php
                                                if ($qual == '10th') {
                                                    echo "
                                                <option value='10th' selected>10th</option>
                                                ";
                                                }
                                                if ($qual == '12th') {
                                                    echo "
                                                <option value='12th' selected>12th</option>
                                                ";
                                                }
                                                if ($qual == 'graduated') {
                                                    echo "
                                                <option value='graduated' selected>graduated</option>
                                                ";
                                                }
                                                ?>


                                            </select>
                                            <span class="validate">*Required</span>
                                        </td>

                                        <td>
                                            <input type="text" name="ed_uniname" class="form-control uname" value=" <?= $name ?>">
                                            <span class="validate">*Required</span>
                                        </td>

                                        <td>
                                            <input type="number" name="ed_passyear" class="form-control pass" value="<?= $year ?>">
                                            <span class="validate">*Required</span>
                                        </td>

                                        <td>
                                            <input type="number" name="ed_percentage" class="form-control per" maxlength="2" value="<?= $perc ?>">
                                            <span class="validate">*Required</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <input type="submit" value="Add" class="btn btnco d-block px-4 py-2 mx-auto">
                                            <!-- <a href="2-qualification.php?a=add" class="btn btnco px-4 py-2 mx-auto add-btn">Add</a> -->
                                        </td>
                                    </tr>
                            </table>
                    </form>
                <?php

                } else {
                ?>
                    <!--this form will open when user first lands on this 2-qualification.php page-->
                    <form action="2-qualification-handler.php" method="post" class="d-block mx-auto">
                        <div class="container jumbotron mb-0">
                            <img src="logo.png">
                            <h3 class="text-center pt-3 pb-1">Add your Qualification</h3>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Qualification</th>
                                        <th scope="col">University name</th>
                                        <th scope="col">PASSING YEAR</th>
                                        <th scope="col">PERCENTAGE %</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <?php
                                            $sel_query = mysqli_query($db_conn, "select qualification from emp_qualification where emp_id='$id'");
                                            $sel_rows = mysqli_num_rows($sel_query);
                                            // echo "$sel_rows"; die;
                                            if ($sel_rows > 0) {
                                            ?>
                                                <select name="quali" class="form-control quali">
                                                    <option value="0">select qualification</option>
                                                    <?php
                                                    while ($sel_fetch = mysqli_fetch_array($sel_query)) {
                                                        $quali = $sel_fetch["qualification"];
                                                        $quali_arr[] = $quali;
                                                    }
                                                    if (in_array("10th", $quali_arr)) {
                                                        echo "<option value='10th' style='display:none'>10th</option>"; #hide
                                                    } else {
                                                        echo "<option value='10th'>10th</option>"; #show
                                                    }
                                                    if (in_array("12th", $quali_arr)) {
                                                        echo "<option value='12th' style='display:none'>12th</option>"; #hide
                                                    } else {
                                                        echo "<option value='12th'>12th</option>"; #show
                                                    }
                                                    if (in_array("graduated", $quali_arr)) {
                                                        echo "<option value='graduated' style='display:none'>graduated</option>"; #hide
                                                    } else {
                                                        echo "<option value='graduated'>graduated</option>"; #show
                                                    }
                                                } else {
                                                    ?>
                                                    <select name="quali" class="form-control quali">
                                                        <option value="0">select qualification</option>
                                                        <option value="10th">10th</option>
                                                        <option value="12th">12th</option>
                                                        <option value="graduated">graduated</option>
                                                    </select>
                                                <?php
                                                }
                                                ?>
                                                <span class="validate">*Required</span>

                                        </td>

                                        <td>
                                            <input type="text" name="uniname" class="form-control uname">
                                            <span class="validate">*Required</span>

                                        </td>
                                        <td>
                                            <input type="number" name="passyear" class="form-control pass">
                                            <span class="validate">*Required</span>
                                        </td>
                                        <td>
                                            <input type="number" name="percentage" class="form-control per" maxlength=2>
                                            <span class="validate">*Required</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="5">
                                            <input type="submit" value="Add" class="btn btnco d-block px-4 py-2 mx-auto add-btn">
                                        </td>
                                    </tr>
                            </table>

                        <?php
                    }

                    if ($chk_rows > 0) {
                        $s_no = 0;
                        ?>
                            <table class="table table-striped table-co">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Qualification</th>
                                        <th scope="col">University name</th>
                                        <th scope="col">PASSING YEAR</th>
                                        <th scope="col">PERCENTAGE %</th>
                                        <th scope="col" class="">Action</th>

                                    </tr>
                                </thead>
                                <tbody id="tbody1">
                                    <?php
                                    while ($fetch = mysqli_fetch_array($chk_query)) {
                                        $s_no++;
                                        $quali = $fetch["qualification"];
                                        $uname = $fetch["university_name"];
                                        $pyear = $fetch["passing_year"];
                                        $percen = $fetch["percentage"];
                                        $q_id = $fetch["q_id"];
                                    ?>
                                        <tr>
                                            <td><?php echo $s_no ?></td>
                                            <td><?php echo $quali ?></td>
                                            <td><?php echo $uname ?></td>
                                            <td><?php echo $pyear ?></td>
                                            <td><?php echo $percen ?>%</td>
                                            <td>
                                                <a href="2-qualification.php?a=edit&id=<?= $q_id ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm btn-delete" id="<?= $q_id ?>">Delete</a>
                                                <!-- <a href="#" class="btn btn-danger btn-sm btn-delete" id="<?= $q_id ?>" data-sid=' $fetch["q_id"]'>Delete</a> -->
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr class="w-100">
                                        <td colspan="6">
                                            <a href="3-experience.php" class="btn btn-success d-block mx-auto mt-2 py-2 w-25">continue</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php
                    }
                        ?>
                        </div>

                    </form>
            </div>

            <script src="js/jquery.js"></script>
            <script>
                $(document).ready(function() {
                    $(".btn-delete").click(function() {
                        location.reload();
                        var id = $(this).attr("id");
                        var element = this;

                        if (id != '') {
                            $.ajax({
                                type: 'post',
                                url: '2-qualification-ajax-delete-handler.php',
                                data: {
                                    'uid': id
                                },
                                success: function(output) {
                                    // alert(output);
                                    // if (output == 1) {

                                    //4th Method
                                    var numb = $.parseJSON(output);
                                    var var1 = numb[0];
                                    var var2 = numb[1];
                                    if (var1 == 'del') {
                                        $(element).closest("tr").fadeOut();
                                        if (var2 == 0) {
                                            $(".table-co").fadeOut();
                                        }
                                    }

                                    //3rd Method----
                                    // var out = output.split("~");
                                    // var var1 = out[0];
                                    // var var2 = out[1];

                                    // if (var1 == 'del') {
                                    //     $(element).closest("tr").fadeOut();

                                    //     if (var2 == 0) {
                                    //         $(".table-co").fadeOut();
                                    //     }
                                    // }



                                    //2nd Method----
                                    // $("#tbody1").html(output);


                                    //1st Method----
                                    //     $(element).closest("tr").fadeOut();

                                    // }
                                }

                            });
                        }
                        return false;
                    });

                    $(".add-btn").click(function() {

                        //qualification
                        var quali = $(".quali").val();
                        if (quali == "0") {
                            $(".quali").siblings().fadeIn();
                            return false;
                        } else {
                            $(".quali").siblings().fadeOut();
                        }

                        //university-name
                        var uname = $(".uname").val();
                        if (uname == "") {
                            $(".uname").siblings().fadeIn();
                            return false;
                        } else {
                            $(".uname").siblings().fadeOut();
                        }

                        //passing-year
                        var pass = $(".pass").val();
                        if (pass == "") {
                            $(".pass").siblings().fadeIn();
                            return false;
                        } else {
                            $(".pass").siblings().fadeOut();
                        }

                        //percentage
                        var per = $(".per").val();
                        if (per == "") {
                            $(".per").siblings().fadeIn();
                            return false;
                        } else {
                            $(".per").siblings().fadeOut();
                        }

                    });
                });
            </script>





    </body>

    </html>

<?php
}
?>