<?php

session_start();
$_SESSION = array();
session_destroy();

if (isset($_GET["a"]) && $_GET["a"] == "logout") {
    header("location:index.php");
    die();
} 
// else {
//     header("location:admin-login.php"); die();
// }

if($_GET["a"] && $_GET['a']=='new_reg'){
    // session_destroy();
    header("location:1-registration.php"); die;
}