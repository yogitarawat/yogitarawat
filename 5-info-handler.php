<?php

session_start();
$id = $_SESSION["id"];
include("db-connection.php");
//fetching emp_registration table for personal data
$per_query = mysqli_query($db_conn, "select * from emp_registration where emp_id='$id'");
$per_rows = mysqli_num_rows($per_query);
if ($per_rows > 0) {
    $per_fetch = mysqli_fetch_array($per_query);
    $dep = $per_fetch["department"];
    $name = $per_fetch["name"];
    $email = $per_fetch["email"];
    $mobile = $per_fetch["mobile"];
    $gender = $per_fetch["gender"];
    $date_of_birth = $per_fetch["date_of_birth"];
    $address = $per_fetch["address"];
}
//fetching emp_qualification table for qualification
$quali_query = mysqli_query($db_conn, "select * from emp_qualification where emp_id='$id'");
$quali_rows = mysqli_num_rows($quali_query);


//fetching emp_experience table for experience
$exp_query = mysqli_query($db_conn, "select * from emp_experience where emp_id='$id'");
$exp_rows = mysqli_num_rows($exp_query);
if ($exp_rows > 0) {
    $exp_fetch = mysqli_fetch_array($exp_query);
    $lname = $exp_fetch["last_company"];
    $joining = $exp_fetch["date_of_joining"];
    $leaving = $exp_fetch["date_of_leaving"];
    $dep_work = $exp_fetch["depart_work"];
    $years_exp = $exp_fetch["years_exp"];
    $city = $exp_fetch["city"];
    $state = $exp_fetch["state"];
    $zip = $exp_fetch["zip"];
}

//fetching emp_image table for image
$img_query = mysqli_query($db_conn, "select * from emp_image where emp_id='$id'");
$img_rows = mysqli_num_rows($img_query);
if ($img_rows > 0) {
    $img_fetch = mysqli_fetch_array($img_query);
    $img = $img_fetch["emp_img"];
    $pro_img = "reg_image/" . $img;
}

//fetching departments name from admin department table as reg_table has id as department name
$ad_query = mysqli_query($db_conn, "select department from department_table where id='$dep'");
$ad_rows = mysqli_num_rows($ad_query);
if ($ad_rows > 0) {
    $fetch_admin = mysqli_fetch_array($ad_query);
    $dep_name = $fetch_admin["department"];
}


$s_query = mysqli_query($db_conn, "select * from emp_registration where emp_id='$id'");
$s_rows = mysqli_num_rows($s_query);
if ($s_rows > 0) {
    mysqli_query($db_conn, "update emp_registration set status='completed'");
}

$s_query = mysqli_query($db_conn, "select * from emp_qualification where emp_id='$id'");
$s_rows = mysqli_num_rows($s_query);
if ($s_rows > 0) {
    mysqli_query($db_conn, "update emp_qualification set status='completed'");
}

$s_query = mysqli_query($db_conn, "select * from emp_experience where emp_id='$id'");
$s_rows = mysqli_num_rows($s_query);
if ($s_rows > 0) {
    mysqli_query($db_conn, "update emp_experience set status='completed'");
}

$s_query = mysqli_query($db_conn, "select * from emp_image where emp_id='$id'");
$s_rows = mysqli_num_rows($s_query);
if ($s_rows > 0) {
    mysqli_query($db_conn, "update emp_image set status='completed'");
}