<?php

    if(isset($_POST['logout'])) {
        
        session_start();
        unset($_SESSION['fname']);
        unset($_SESSION['a_unid']);
        unset($_SESSION['aid']);
        session_unset();
        session_destroy(); 
        header("location: http://localhost/s/s/admin/index");
        exit();

    }


?>