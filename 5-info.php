<?php
include("db-connection.php");
include("5-info-handler.php");
if (!$_SESSION) {
    header("location:1-registration.php");
    die();
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style-2.css">
        <title>Registration Successfull</title>
        <style>
            .name {
                font-size: 1.3rem;
                font-weight: 500;
                border: 1px solid #c5c5c5;
                padding: .2rem;
            }

            .logo-2 {
                width: 150px;
                margin: auto;
                display: block;
                padding-bottom: 2rem;
            }

            .head {
                color: #055160;
            }

            .btn {
                width: 100px;
            }
        </style>
    </head>

    <body>
        <div class="bg p-3">
            <div class="main px-5">

                <!-- logo -->
                <img src="logo.png" class="logo-2">

                <h3 class="mb-3 head">Personal Info:</h3>

                <div class="d-flex justify-content-between">

                    <!-- Personal Details -->
                    <table class="table table-bordered w-75">
                        <tbody>

                            <tr>
                                <th scope="row">Department</th>
                                <td><?php if (!empty($dep_name)) echo $dep_name ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Employee's Name</th>
                                <td><?php if (!empty($name)) echo $name ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Email</th>
                                <td><?php if (!empty($email)) echo $email ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Mob. No.</th>
                                <td><?php if (!empty($mobile)) echo $mobile ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Gender</th>
                                <td><?php if (!empty($gender)) echo $gender ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Date of Birth</th>
                                <td><?php if (!empty($date_of_birth)) echo $date_of_birth ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Address</th>
                                <td><?php if (!empty($address)) echo $address ?></td>
                            </tr>

                        </tbody>
                    </table>

                    <!-- Profile Image -->
                    <div class="text-center mb-2">
                        <img src="<?php if (!empty($pro_img)) echo $pro_img ?>" width="150px" height="150px" class="mb-2">
                        <br>
                        <p class="name"><?php if (!empty($name)) echo $name ?></p>
                    </div>

                </div>

                <h3 class="mb-3 head">Qualifications:</h3>
                <!-- Qualification -->
                <table class="table table-bordered w-100 mx-auto">
                    <thead>
                        <tr>
                            <th scope="col">Qualification</th>
                            <th scope="col">University</th>
                            <th scope="col">Passing Year</th>
                            <th scope="col">Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($quali_rows > 0) {
                            while ($quali_fetch = mysqli_fetch_array($quali_query)) {
                                $quali = $quali_fetch["qualification"];
                                $uni_name = $quali_fetch["university_name"];
                                $pass_year = $quali_fetch["passing_year"];
                                $percen = $quali_fetch["percentage"];

                        ?>
                                <tr>
                                    <th scope="row"><?php if (!empty($quali)) echo $quali ?></th>
                                    <td><?php if (!empty($uni_name)) echo $uni_name ?></td>
                                    <td><?php if (!empty($pass_year)) echo $pass_year ?></td>
                                    <td><?php if (!empty($percen)) echo $percen ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <h3 class="mb-3 head">Experience:</h3>
                <div class="d-flex">
                    <!-- Experience Details -->
                    <table class="table table-bordered w-75 mx-auto">
                        <tbody>

                            <tr>
                                <th scope="row">Company</th>
                                <td><?php if (!empty($lname)) echo $lname ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Joining Date</th>
                                <td><?php if (!empty($joining)) echo $joining ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Experience</th>
                                <td><?php if (!empty($years_exp)) echo $years_exp ?></td>
                            </tr>

                            <tr>
                                <th scope="row">State</th>
                                <td><?php if (!empty($state)) echo $state ?></td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table table-bordered w-75 mx-auto">
                        <tbody>

                            <tr>
                                <th scope="row">Department Name</th>
                                <td><?php if (!empty($dep_work)) echo $dep_work ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Leaving Date</th>
                                <td><?php if (!empty($leaving)) echo $leaving ?></td>
                            </tr>

                            <tr>
                                <th scope="row">City</th>
                                <td><?php if (!empty($city)) echo $city ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Pincode</th>
                                <td><?php if (!empty($zip)) echo $zip ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="button text-center">
                    <a href="2-qualification.php" class="btn btn-warning py-2 mx-2">Edit</a>
                    <a href="logout.php?a=logout" class="btn btn-success py-2">Save</a>
                </div>

            </div>
        </div>
    </body>

    </html>
<?php
}
?>