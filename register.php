
<?php
    
   
    require "./libs/dbconnect.php";
    require "./libs/autoloader.php";
    
    session_start();
    
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $pwd = $_POST['password'];
        $role = $_POST['role'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        User::register($connect,$user,$pwd,$role,$phone,$email);
        
       
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
    <title>registration page</title>
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
        background: rgb(249, 249, 249)
    }

    #banner {
        background: url('./image/customer.png');
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
        /* box-shadow: 5px 5px 5px rgb(80,80,80); */
        padding: 0px 18px;
        box-sizing: border-box;
        position:relative
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
        <form id='form' action="./register.php" method="POST" onSubmit='return toValue()'>
            <h2 style='text-align:center;margin-top:16px;'>Registration</h2>
            <p class='label'>ROLE</p>
            <input type='radio' class='role' name='role' value='1' checked style='width:28px' ><span>customer</span>  
            <input type='radio' class='role' name='role' value='2'  style='width:28px' ><span>trademan</span> 
            <!-- <p class='tip_word fullnametip'></p> -->

            <p class='label'>Email</p>
            <input type='text' class='email' name='email' placeholder='Enter your email' value=''>
            <p class='tip_word emailtip'></p>

            <p class='label'>Phone</p>
            <input type='text' class='phone' name='phone' placeholder='Enter your Phone' value=''>
            <p class='tip_word phonetip'></p>

            <p class='label'>Username</p>
            <input type='text' class='username' name='username' placeholder='Enter your username' value=''>
            <p class='tip_word usernametip'></p>

            

            <p class='label'>Password</p>
            <input type='password' class='password' name='password' placeholder='Enter your password' value=''>
            <p class='tip_word passwordtip'></p>

            <!-- <p class='label'>Repeat Password</p>
            <input type='password' class='repeatpassword' name='repeatpassword' placeholder='Enter your password again' value=''>
            <p class='tip_word repeatpasswordtip'></p> -->

            <input type="checkbox" value="" name="checkbox" class='checkbox' style='width: 16px;margin-top:9px;'><span style='font-size: 14px;color: rgb(79,79,79)'> I agree to the Terms of User</span>
            <input type="submit" name='submit' id='submit' style='margin-top:29px;height: 29px;border-radius:29px;background:rgb(181,144,197);color:rgb(249,249,249);' value='Sign Up'>

            <div style='position:absolute;bottom:8px;right:8px;'><a href="./login.php">login page</a></div>
        </form>
       
        
    </div>
</body>
<script>
    // init the background by role input
    if($(".role").val() == 1){
        $("#banner").css("background","url('./image/customer.png')");
           
            $("#banner").css("background-size","cover");
    }else{
        $("#banner").css("background","url('./image/trademan.png')");

            $("#banner").css("background-size","cover");
    }
    // function to change the background by role input
    $(".role").click(function(){
        console.log($(this).val());
        if($(this).val() == 1){
            $("#banner").css("background","url('./image/customer.png')");
           
            $("#banner").css("background-size","cover");
        }else{
            $("#banner").css("background","url('./image/trademan.png')");

            $("#banner").css("background-size","cover");
        }
    })
    // function to validate input
    function toValue(){
        // alert(1);
        // 获得所有表单的值
        var role = $(".role").val();
        var phone = $('.phone').val();
        var email = $('.email').val();
        var username = $('.username').val();
        var password = $('.password').val();
        var checkbox = $("input[name='checkbox']:checked").val();
        // 获取所有提示标签的对象
       
        var phonetip = $('.phonetip');
        var emailtip = $('.emailtip');
        var usernametip = $('.usernametip');
        var passwordtip = $('.passwordtip');
        

        // 清空提示
        
        emailtip.html("");
        usernametip.html("");
        passwordtip.html("");
        
        
        // 开始前端验证

        if(email == ''){
            emailtip.html('required');
            return false;
        }else{
            var emailreg = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
            if(emailreg.test(email)){

            }else{
                emailtip.html('Format Error');
                return false;
            }
        }

        if(username == ''){
            usernametip.html('required');
            return false;
        }else{
            
        }

        // 验证密码
        if(password == ''){
            passwordtip.html('required');
            return false;
        }else{
            
        }

        
        if(checkbox == null){
            alert('please check if you agree to the Terms');
            return false;
        }
        return true;
       
    }
        


    
</script>

</html>