<?php
session_start();

$emp_id = $_SESSION["id"];
include("db-connection.php");
include("admin/function-file.php");

if ($_POST) {
    $quali = $_POST['quali'];
    $uname = $_POST['uniname'];
    $pyear = $_POST['passyear'];
    $percen = $_POST['percentage'];
    // $status=""

    if (!empty($quali) && !empty($uname) && !empty($pyear) && !empty($percen)) {
        $q_id = shortalpha();
        $year = 1980;
        $c_year = date("Y");
        if ($pyear > $year && $pyear < $c_year) {

            mysqli_query($db_conn, "insert into emp_qualification(q_id,emp_id,qualification,university_name,passing_year,  percentage,status) values('$q_id','$emp_id','$quali','$uname','$pyear','$percen','pending')");

            header("location:2-qualification.php");
            die();
        } else {
            header("location:2-qualification.php?msg=invalid_year");
            die();
        }
    } else {
        header("location:2-qualification.php?msg=empty");
    }
}
