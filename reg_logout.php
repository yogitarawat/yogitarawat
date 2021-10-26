<?php
session_start();
$id = $_SESSION["emp_id"];
include("db-connection.php");

// $complete= "complete";
// mysqli_query($db_conn, "update emp_registration set status='$complete' where emp_id='$id'");
// mysqli_query($db_conn, "update emp_qualification set status='$complete' where emp_id='$id'");
// mysqli_query($db_conn, "update emp_experience set status='$complete' where emp_id='$id'");
// mysqli_query($db_conn, "update emp_image set status='$complete' where emp_id='$id'");

if(isset($_GET["a"]) && $_GET["a"]== "logout"){
    
session_start();
$_SESSION = array();
session_destroy();

header("location:employee-login.php"); die();
}

?> 
