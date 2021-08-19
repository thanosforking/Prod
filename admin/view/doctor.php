<?php

    // error_reporting(0);
    session_start();
    require '../../vendor/autoload.php';
    if($_SESSION['aid'] == '') {
        header('location: http://localhost/s/s/admin/index');
    }
    $con = new MongoDB\Client( 'mongodb://localhost:27017' );
    $db = $con->php_mongo;
    $collection = $db->admin;

    $record = $collection->findOne( [ '_id' =>$_SESSION['aid']] );



?>

<!doctype html>
<html lang='en'>

<head>
    <?php include '../../assest/top_links.php'; ?>
    <link rel="stylesheet" href="http://localhost/s/s/admin/public/stylesheet/dashboard.css?ver=1.2">
    <title>Admin | Dashboard</title>
</head>

<body>

    <div class="main">

        <!-- sidebar -->
        <div class="Sidebar d-flex flex-column flex-shrink-0 p-3 bg-light" id="sidebar">
            <a href="http://localhost/s/s/admin/view/index"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="http://localhost/s/s/admin/public/image/logo.png" height="40" class="mx-auto " alt="">
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="">
                    <a href="http://localhost/s/s/admin/view/index" class="nav-link link-dark">
                        <i class="bi bi-speedometer bi me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="http://localhost/s/s/admin/view/Appoinment" class="nav-link link-dark">
                        <i class="bi bi-calendar-check-fill bi me-2"></i>
                        Appointments
                    </a>
                </li>
                <li>
                    <a href="http://localhost/s/s/admin/view/specialities" class="nav-link link-dark">
                        <i class="bi bi-megaphone-fill bi me-2"></i>
                        Specialities
                    </a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/s/s/admin/view/index" class="nav-link active-sn" aria-current="page">
                        <i class="bi bi-speedometer bi me-2"></i>
                        Doctor
                    </a>
                </li>
                <li>
                    <a href="http://localhost/s/s/admin/view/pending_doc" class="nav-link link-dark">
                        <i class="bi bi-person-dash-fill  bi me-2"></i>
                        Pending Doc
                    </a>
                </li>
                <li>
                    <a href="http://localhost/s/s/admin/view/patient" class="nav-link link-dark">
                        <i class="bi bi-file-person bi me-2"></i>
                        Patients
                    </a>
                </li>
            </ul>
            <hr>

        </div>

        <!-- navbar -->
        <nav class="navbar navbar-light bg-light fixed-top d-flex justify-content-between">
            <div class="container-fluid">
                <button class="btn" id="btn-side"><i class="bi bi-grip-horizontal"></i></button>
                <div class="">
                    <input type="text" class="border rounded-pill px-4 py-2 mx-4 my-0" placeholder="Search Here">
                    <i class="bi bi-search"></i>
                </div>
                <div class="btn-group dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['fname']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="my-5 body-main">
            <div class="my-5 mx-4">
                <h3 class="h3">Doctor</h3>
                <p>Dashboard / Doctor</p>
            </div>

            <!-- cards -->
            
            <!-- doc and patient list -->
            <div class="row">
                <div class="col-md-12 d-flex">
                    <!-- Recent Orders -->
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Doctors List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0" id="doc_table">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Speciality</th>
                                            <th>Member Since</th>
                                            <th>Earned</th>
                                            <th>Account Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $collection = $db->manager;
                                                $record_doc = $collection->find();

                                                foreach($record_doc as $key) {
                                                    if($key['approved'] == true) {
                                                        echo '<tr>
                                                                <td>
                                                                    <h2 class="table-avatar">';
                                                                    if($key['profile_image'] != '') {
                                                                        echo '<a href="#" class="avatar avatar-sm mr-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="http://localhost/s/s/public/image/doc-img/doc-img/'.$key['profile_image'].'"
                                                                                    height="40" alt="User Image"></a>
                                                                            <a href="#">Dr. '.$key['fname'].' '.$key['sname'].'</a>';
                                                                    }
                                                                    else {
                                                                        echo '<a href="#" class="avatar avatar-sm mr-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="http://localhost/s/s/public/image/doc-img/doc-img/default-doc.jpg"
                                                                                    height="40" alt="User Image"></a>
                                                                            <a href="#">Dr. '.$key['fname'].' '.$key['sname'].'</a>';
                                                                    }
                                                            echo '</h2>
                                                                </td>
                                                                <td>Dental</td>
                                                                <td>Member Since</td>
                                                                <td>$'.$key['total_earn'].'</td>
                                                                <td class="text-warning">
                                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                                    </div>
                                                                </td>
                                                            </tr>';
                                                    }
                                                }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php include '../../assest/bottom_links.php'; ?>
    <script src='http://localhost/s/s/admin/controller/js/dashboard.js?ver=1.5'></script>

</body>

</html>