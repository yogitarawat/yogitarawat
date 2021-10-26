<?php
session_start();
include("db-connection.php");
if ($_POST) {
    $dep_name = $_POST["department"];

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $name = "$fname " . $lname;
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $pwd = $_POST["pass"];
    $pass = hash("sha512", $pwd);

    $conpass = $_POST["cpass"];
    $cpass = hash("sha512", $conpass);


    if (!empty($dep_name) && !empty($fname) && !empty($lname) && !empty($email) && !empty($gender) && !empty($dob) && !empty($mobile)  && !empty($address) && !empty($pass) && !empty($cpass)) {

        $query = mysqli_query($db_conn, "select * from emp_registration where email='$email' or mobile='$mobile'");
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
            header("location:1-registration.php?msg=already-exist");
            die();
        } else {
            mysqli_query($db_conn, "insert into emp_registration (department,name,email,mobile,gender,date_of_birth,address,status,password,c_password) values('$dep_name','$name','$email','$mobile','$gender','$dob','$address','pending','$pass','$cpass')");

            //fetching id from registration table 
            $fet_query = mysqli_query($db_conn, "select emp_id from emp_registration where email='$email'");
        
                $fet_array = mysqli_fetch_array($fet_query);
                $emp_id = $fet_array["emp_id"];
                $_SESSION['emp_id'] = $emp_id;
            

             header("location:index.php?info=register");
            die();
        }
    } else {
        header("location:1-registration.php?msg=empty");
        die();
    }
}
