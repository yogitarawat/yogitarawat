<?php
session_start();
include("db-connection.php");

if ($_POST) {
    if (!empty($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (!empty($_POST["pass"])) {
        $pwd = $_POST["pass"];
        $pass = hash("sha512", $pwd);
    }

    $query = mysqli_query($db_conn, "select * from emp_registration where email='$email' and password='$pass'");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        $array = mysqli_fetch_array($query);
        $id = $array["emp_id"];
        $_SESSION['id'] = $id;

        header("location:2-qualification.php");
        die;
    } else {
        header("location:index.php?a=register_first");
        die;
    }
}

if (isset($_GET["info"])) {
    if ($_GET["info"] && $_GET["info"] == "register") {
        $_GET["info"] = "You're Registered";
        $register = $_GET["info"];
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
    <title>employee-login</title>
    <style>
        .main {
            height: 100vh;
        }

        .jumbotron {
            padding-bottom: 2rem !important;
            padding-top: 2rem !important;
        }

        .reg {
            display: block;
            text-align: center;

        }

        .register {
            color: green;
            text-align: center;
            display: block;
        }
    </style>

</head>

<body>
    <form action="index.php" method="post">
        <div class="main-wrapper">
            <div class="main">
                <div class="container jumbotron">
                    <h4 class="register">
                        <?php if(!empty($_GET["info"]))echo $register ?>
                    </h4>
                    <img src="logo.png">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">E-mail</label>
                        <input type="email" class="form-control" autocomplete="off" id="formGroupExampleInput" placeholder="Enter your email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password </label>
                        <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter your password" name="pass">
                    </div>
                    <a href="#" class="d-block text-center">Forget your Password ?</a>
                    <div class="pt-2">
                        <input type="submit" value="login" class="btn btnco px-4 py-2 mx-auto d-block">
                    </div>
                    <a href="logout.php?a=new_reg" class="reg pt-2">New registration?</a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>