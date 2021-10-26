<?php
session_start();
include("db-connection.php");
if (!$_SESSION["id"]) {
    header("location:index.php");
    die();
} else {
    $id = $_SESSION["id"];
    $query = mysqli_query($db_conn, "select * from emp_image where emp_id=$id");
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        $f_img = mysqli_fetch_array($query);
        $img = $f_img["emp_img"];
        $pro_img = "reg_image/".$img;
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
    <title>image upload</title>
    <style>
        .inp_box {
            border: 2px solid #15384e;
            border-radius: 6px;
            width: 340px;
            cursor: pointer;
        }

        input[type=file]::-webkit-file-upload-button {
            cursor: pointer;
            outline: 0 !important;
            background: #13364c;
            border: 1px solid #ffffff;
            border-radius: 5px;
            color: #fff;

        }
        .main{
            height: 100vh;
        }
        .container{
            padding-top: 2rem!important;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="main">
            <div class="container jumbotron pb-4 mt-4">
                <img src="logo.png">
                <h4 class="text-center pt-4 pb-3">Upload your Image</h4>
                <?php
                if (!empty($pro_img)) {

                ?>
                    <img src="<?= $pro_img ?>">
                    <a href='4-img-upload-handler.php?a=delete' class="btn btn-danger mx-auto d-block w-25 mt-3">Delete</a>
                    <a href="5-info.php" class="btn btn-primary px-3 py-2 mt-3 d-block w-50 mx-auto">continue</a>
                <?php
                } else {
                ?>
                    <form action="4-img-upload-handler.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" class="inp_box d-block mx-auto"><br />
                        <input type="submit" value="upload" class="btn btnco mt-3 d-block mx-auto px-5 py-2">
                    </form>
                <?php
                }
                ?>
            </div>


        </div>
    </div>
</body>

</html>