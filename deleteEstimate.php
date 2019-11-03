<?php
    require_once "./libs/checkLogin.php";
    require_once "./libs/dbconnect.php";
    require_once "./libs/autoloader.php";
    // delete Estimate by Id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        Estimate::deleteEstimate($connect,$id);
    }
?>