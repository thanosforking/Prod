<?php

error_reporting(0);
session_start();
require './vendor/autoload.php';
$con = new MongoDB\Client( 'mongodb://localhost:27017' );
$db = $con->php_mongo;
$auth_msg = ''; 

if($_GET['auth'] == 'failed') {
    $auth_msg = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                    <strong>Wrong Credentials !</strong> Please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}
else if($_GET['login'] == 'now') {
    $auth_msg = '<div class="alert alert-success alert-dismissible fade show " role="alert">
                    <strong>Your account created successfully !</strong> Login Now !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

?>


<!doctype html>
<html lang="en">

<head>
    <?php include './assest/top_links.php'; ?>
    <title>Scheduld yourself !</title>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class='navbar-brand text-light mx-4' href='http://localhost/s/s/'>
                <img src="http://localhost/s/s/public/image/logo.png" height="60" alt="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/s/s/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/s/s/d">Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/s/s/p">Patient</a>
                    </li>
                </ul>
                <a href="http://localhost/s/s/d" class='btn btn-outline-primary text-primary px-3 py-2 mx-5'>LOGIN
                    /
                    SIGNUP</a>
            </div>
        </div>
    </nav>

    <?php echo $auth_msg; ?>


    <div class="container  my-5">
        <div class="reg_cont d-flex justify-content-center">
            <div class="img my-auto mx-4">
                <img src="http://localhost/s/s/public/image/login-banner.png" height="300" alt="" srcset="">
            </div>
            <div class="forms mx-4">
                <div class="reg" id="patreg">
                    <div class="d-flex justify-content-between px-3 pb-2">
                        <h5>Patient Register</h5>
                        <a href="http://localhost/s/s/d">Not a Patient ?</a>
                    </div>
                    <form class="container" action="http://localhost/s/s/controller/php/signup.php" method="POST">
                        <div class="d-flex justify-content-between">
                            <div class="mb-3 mx-1">
                                <label for="email" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname">
                            </div>
                            <div class="mb-3 mx-1">
                                <label for="email" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="sname" id="sname">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Patient ID</label>
                            <input type="number" name="empid" class="form-control" id="empsid" aria-describedby="empid">
                            <small class="small" id="empsid_small"></small>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" id="empsemail"
                                aria-describedby="email">
                            <small class="small" id="empsemail_small"></small>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" id="empspass"
                                aria-describedby="password">
                            <small class="small" id="empspass_small"></small>
                        </div>
                        <button class="btn m-0 p-0 text-primary al-p" type="button" >Already Have an account ?</button>
                        <div class="d-grid gap-2 my-3">
                            <button type="submit" name="employee_signup" class="btn btn-primary py-2">Create
                                Account</button>
                        </div>
                    </form>
                    <p class="text-center">or</p>
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-sm px-5 btn-danger" disabled>Google</button>
                        <button class="btn btn-sm px-5 btn-primary" disabled>Facebook</button>
                    </div>
                </div>
                <div class="log" id="patlog">
                    <div class="d-flex justify-content-between px-3 pb-2">
                        <h5>Patient Login</h5>
                        <a href="http://localhost/s/s/d">Not a Patient ?</a>
                    </div>
                    <form class=" container e_log_form" action="http://localhost/s/s/controller/php/login.php"
                        method="POST">
                        <div class="mb-3">
                            <label for="number" class="form-label">Patient ID</label>
                            <input type="number" name="empid" class="form-control" id="log_empid"
                                aria-describedby="empid">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" id="log_pass"
                                aria-describedby="password">
                        </div>
                        <button class="btn m-0 p-0 text-primary al-p" type="button" >Don't Have an account ?</button>
                        <div class="d-grid gap-2 my-5">
                            <button type="submit" class="btn btn-primary py-2" name="employee_login">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <?php include './assest/bottom_links.php'; ?>
    <script src='http://localhost/s/s/controller/js/index.js?ver=1.3'></script>
</body>

</html>