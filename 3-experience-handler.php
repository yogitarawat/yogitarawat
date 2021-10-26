<?php
session_start();
include("db-connection.php");
$emp_id = $_SESSION["id"];
$quer = mysqli_query($db_conn, "select * from emp_experience where emp_id='$emp_id'");
$rows = mysqli_num_rows($quer);
if ($rows > 0) {

    //edit and then update
    if ($_POST) {
        $lcomp = $_POST["lcompany"];
        $doj = $_POST["doj"];
        $dol = $_POST["dol"];
        $d_work = $_POST["d_work"];
        $years = $_POST["years"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];
        
        if (!empty($lcomp) && !empty($doj) && !empty($dol) && !empty($d_work) && !empty($years) && !empty($city) && !empty($state) && !empty($zip)) {
            
            mysqli_query($db_conn, "update emp_experience set last_company='$lcomp', date_of_joining='$doj', date_of_leaving='$dol', depart_work='$d_work', years_exp='$years', city='$city', state='$state', zip='$zip', status='pending' where emp_id='$emp_id'");

            header("location:4-img-upload.php");
            die();
        } else {
            header("location:3-experience.php?msg=empty");
            die();
        }
    }
} else {
    //insert for the first time
    if ($_POST) {
        $lcomp = $_POST["lcompany"];
        $doj = $_POST["doj"];
        $dol = $_POST["dol"];
        $d_work = $_POST["d_work"];
        $years = $_POST["years"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];
        $m_zip = 6;

        if (!empty($lcomp) && !empty($doj) && !empty($dol) && !empty($d_work) && !empty($years) && !empty($city) && !empty($state) && !empty($zip)) {
           
            mysqli_query($db_conn, "insert into emp_experience (emp_id,last_company, date_of_joining, date_of_leaving, depart_work, years_exp,city, state, zip,status) values('$emp_id','$lcomp','$doj','$dol','$d_work','$years','$city','$state','$zip','pending')");
            header("location:4-img-upload.php");
            die();
        } else {
            header("location:3-experience.php?msg=empty");
            die();
        }
    }
}
