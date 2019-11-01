<?php

// Methods about User
class User {

    public static function login($connect,$user,$pwd){
        session_start();
        $sql = "select * from user where username = '$user' and password = '$pwd'";
        $query = mysqli_query($connect,$sql);
        $arr = mysqli_fetch_array($query);
        $num = mysqli_affected_rows($connect);
        if($num > 0){
            $_SESSION['user'] = $user;
            $_SESSION['role'] = $arr['role'];
            return true;
        }else{
            return false;
            
        }
    }
    
    public static function register($connect,$user,$pwd,$role,$phone,$email){
        $sql = "select * from user where username = '$user'";
        $query = mysqli_query($connect,$sql);
        $num = mysqli_affected_rows($connect);
        if($num > 0){
            exit("error:the username had been exist,please <a href='./register.php'>try</a> again");
        }else{
            $sql1 = "insert into user (username,password,role,phone,email) values ('$user','$pwd','$role','$phone','$email')";
            $query1 = mysqli_query($connect,$sql1);
            if($query1){
                exit("success:regist successfully , go <a href='./login.php'>logining</a>");
            }
        }
    }
    public static function getUserMessage($connect,$userId){
        $sql = "select * from user where username = '$userId'";
        $query = mysqli_query($connect,$sql);
        $arr = mysqli_fetch_all($query,1);
        return $arr;
    }

    public function logout(){
       
    }

    public function debug(){
        echo "<pre><code>";
        var_dump($this);
        echo "</code></pre>";
    }

}

?>