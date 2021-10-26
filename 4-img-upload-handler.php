<?php

session_start();
$emp_id = $_SESSION["id"];
include("db-connection.php");
if (!empty($_FILES["image"])) {
    $p_img = $_FILES["image"]["name"];
    $temp_name = $_FILES["image"]["tmp_name"];
    $ext = strtolower(pathinfo($p_img, PATHINFO_EXTENSION));
    $supp_ext = array("jpeg", "jpg", "png");
    if (in_array($ext, $supp_ext)) {
        $dest = "reg_image/$p_img";
        move_uploaded_file($temp_name, $dest);

        mysqli_query($db_conn, "insert into emp_image (emp_id,emp_img,status) values('$emp_id','$p_img','pending')");

        header("location:4-img-upload.php");
        die();
    }
}
//deleting img
if (isset($_GET['a']) && $_GET['a'] == 'delete') {
    $del_id = $_SESSION["id"];
    $query = mysqli_query($db_conn, "select * from emp_image where emp_id='$del_id'");
    $row = mysqli_num_rows($query);
    if ($row > 0) {
        $fetch = mysqli_fetch_array($query);
        $del_img = $fetch['emp_img'];
        $path = "reg_image/" . $del_img;
        mysqli_query($db_conn, "delete from emp_image where emp_id='$del_id'");
    }
    $aff_rows = mysqli_affected_rows($db_conn);
    if ($aff_rows > 0) {
        if (file_exists($path)) {
            unlink($path);
        }
    }
    header("location:4-img-upload.php");
    die();
}

