<?php
   require_once "./libs/checkLogin.php";
   require "./libs/dbconnect.php";
   require "./libs/autoloader.php";
    if(isset($_GET['id'])){
        $userId = $_GET['id'];
        // getUser by Id
        $arr = User::getUserMessage($connect,$userId);
    }
?>
<?php
    require_once "./header.php";
?>
<div class='post'>
    <h3>User</h3>
    <div>
    <?php
        if(isset($arr)){
            //  Render data
            foreach($arr as $k=>$row){
                
                echo "<div class='panel panel-info'>
        
                <table class='table'>
                        <tr>
                            <td>Username</td>
                            <td>".$row['username']."</td>
                        </tr>
                      
                        <tr>
                            <td>Email</td>
                            <td>".$row['email']."</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>".$row['phone']."</td>
                        </tr>
                        
                </table>
                
            </div>";
            }
        }
            
        ?>
    </div>
</div>
<?php
    require_once "./footer.php";
?>