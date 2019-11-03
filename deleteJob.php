<?php
    require_once "./libs/checkLogin.php";
    require_once "./libs/dbconnect.php";
    require_once "./libs/autoloader.php";
    // delete Job by Id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        Job::deleteJob($connect,$id);
    }
?>