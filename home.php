<?php 
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
        <div class="logo">
            <h1 class="logo-text"><span>Safe</span>Trade</h1> 
        </div>
        <i class="fa fa-bars menu-toggle"></i>
            <ul class="nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <!-- <li><a href="#">SignUp</a></li>
                <li><a href="#">Login</a></li> -->
                <li>
                    <a href="#">
                        <i class="fa fa-user"></i>
                         Register
                        <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                    </a>
                    <ul>
                        <li><a href="userRegister.php">Customer?</a></li>    
                        <li><a href="trademanRegister.php">Trademan?</a></li> 
                    </ul>
                </li>
            </ul>
    </header>
    <div class="wrap">
		<h2>Register successfully</h2>
		<h3>Welcome <?php echo $_SESSION["username"]; ?></h3>
		<a href="login.php"><button type="button" class="back_btn"><< Ready to Login</button></a>
    </div>
</body>
</html>

<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}

?>

</body>
</html>