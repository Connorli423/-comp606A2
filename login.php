<<<<<<< HEADcHang


<?php
    
    require "./libs/dbconnect.php";
    require "./libs/autoloader.php";
   
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $pwd = $_POST['password'];
        // login Method
        $res = User::login($connect,$user,$pwd);
        if($res){
            header("Location:./index.php");
        }else{
            exit("error,please <a href='./login.php'>try</a> again");
        }
        
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- cdn引入jquery插件 -->
    <script src="./js/jquery.min.js"></script>
    <title>Login page</title>
</head>
<style>
    body {
        background: rgb(249, 249, 249)
    }

    * {
        margin: 0px;
        padding: 0px;
    }

    .container {
        width: 1000px;
        overflow: hidden;
        margin: 0px auto;
        margin-top: 60px;
        height: auto;
        background: rgb(249, 249, 249);
        position: relative;
    }

    #banner {
        background: url('./image/search.png');
        background-size: cover;
        float: left;
        width: 660px;
        height: 630px;
    }

    #form {
        float: right;
        width: 300px;
        height: 630px;
        background: white;
        border-radius: 29px;
        padding: 0px 18px;
        box-sizing: border-box
    }

    .label {
        margin: 39px 0px 9px;
    }

    input {
        outline: none;
        border: none;
        border-bottom: 1px solid rgb(199, 199, 199);
        width: 264px;
        font-size: 16px;
        color: rgb(79, 79, 79);
    }

    .tip_word {
        display: block;
        float: left;
        color: red;
        width: 300px;
        /* height:20px; */
    }

    #submit :hover {
        background: #a152c4;
        cursor: pointer;
    }
</style>

<body>
    <div class="container">
        <div id='banner'></div>
        <form id='form' action="./login.php" method="POST" onSubmit='return toValue()'>
            <h2 style='text-align:center;margin-top:16px;'>Login</h2>

            <p class='label'>Username</p>
            <input type='text' class='username' name='username' placeholder='Enter your username' value=''>
            <p class='tip_word usernametip'></p>

            <p class='label'>Password</p>
            <input type='password' class='password' name='password' placeholder='Enter your password' value=''>
            <p class='tip_word passwordtip'></p>
          
            <input type="submit" name='submit' id='submit' style='margin-top:29px;height: 29px;border-radius:29px;background:rgb(103,97,161);color:rgb(249,249,249);' value='Submit'>
        </form>
       
        <div style='position:absolute;bottom:8px;right:8px;'><a href="./register.php">register page</a></div>
    </div>
</body>
<script>
    function toValue(){
      
        var username = $('.username').val();
        var password = $('.password').val();
        
        var usernametip = $('.usernametip');
        var passwordtip = $('.passwordtip');
       
        usernametip.html("");
        passwordtip.html("");
       

        if(username == ''){
            usernametip.html('required');
            return false;
        }
        

      
        if(password == ''){
            passwordtip.html('required');
            return false;
        }
       
        return true;
       
    }
        


    
</script>

</html>
=======
<?php

session_start();
	include_once 'class_user.php';
	$user = new User();

	if (isset($_REQUEST['submit'])) {
		extract($_REQUEST);
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Registration Success
	       header("location:home.php");
	    } else {
	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}
?>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style><!--
            #container{width:400px; margin: 0 auto;}

--></style>

<script type="text/javascript" language="javascript">

            function submitlogin() {
                var form = document.login;
				if(form.emailusername.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}
			}

</script>

<span style="font-family: 'Courier 10 Pitch', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;"><div id="container"></span>
<h1>Login Here</h1>
<form action="" method="post" name="login">
<table>
<tbody>
<tr>
<th>UserName or Email:</th>
<td><input type="text" name="emailusername" required="" /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="password" required="" /></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /></td>
</tr>
<tr>
<td></td>
<td><a href="registration.php">Register new user</a></td>
</tr>
</tbody>
</table>
</form></div>
>>>>>>> be7a1fe4df1639f6430bc8bfb1c922bca8673d1c
