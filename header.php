<!-- header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./js/jquery.min.js"></script>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    

    <script src="./js/index.js"></script>
    <title>Document</title>
</head>
<body style='background:rgba(249,249,249,1)'>
<div class='header'>
    <div class='header_nav'>
        <div style='display:flex;align-items:center'>
            <div><img src="./image/logo.png" alt="" style='width:40%'> </div>
            <div class='header_nav_content'>
                <div><a href="./index.php">Message</a> </div>
                    <div><a href="./demand.php">Demand Hall</a> </div>
                    <?php
                        if($_SESSION['role'] == 1){
                            echo "<div><a href='./post.php'>Post</a></div>";
                        }else{
                            
                        }
                    ?> 
                </div>
        </div>
        <div class='user'>
            <div>Dear , <?php echo $_SESSION['user']?> ,<a href="./login.php"> logout</a></div>
        </div>
    </div>
</div>