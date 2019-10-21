<?php
session_start();

    //connect to database
    $db = mysqli_connect("localhost", "root", "", "loginSystem");
    mysqli_query($db,"set names utf8");
	if (isset($_POST['register_btn'])) {

		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$password2 = trim($_POST['password2']);
        
        if ($password == $password2) {
            $password = md5($password);// hash password before storing for security purposes
            $sql = "insert into `users` (`username`, `email`, `password`) values ('" . $username . "', '" . $email . "', '" . $password . "')";
            $res = mysqli_query($db, $sql);
            $_SESSION['message'] = "You are logged in now";
            $_SESSION['username'] = $username;
            header("location: home.php"); //redirect to home page
        } else {
            $_SESSION['message'] = "The two Passwords do not match";
        }      
    }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/7803e323e3.js" crossorigin="anonymous"></script>
        <!-- Font Google -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">

    <title>Index</title>
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
            <h2>Register here</h2>   
    <?php 
    if(isset($_SESSSION['message'])) {
        echo "<div id='error message'>" .$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    ?>   
    <form method="post" action="userRegister.php">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="textInput" required></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="email" name="email" class="textInput" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="textInput" required></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="password2" class="textInput" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register_btn" value="Register" required></td>
            </tr>
    </form>
</div>
</body>
</html>