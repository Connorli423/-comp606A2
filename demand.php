<?php
    require_once "./libs/checkLogin.php";
    require "./libs/dbconnect.php";
    require "./libs/autoloader.php";
    // get All Job
    $arr = Job::getAll($connect); 
    

?>
<?php
    require_once "./header.php";
?>
    <div class='post'>
        <h3>Demand Hall</h3>
        <div>
        <?php
            // Render Job data
            foreach($arr as $k=>$row){
                $jobId = $row['id'];
                $sql = "select * from estimate where jobId = '$jobId'";
                $query = mysqli_query($connect,$sql);
                $num = mysqli_affected_rows($connect);
                echo "<div class='panel panel-success'>
                <div class='panel-heading'>
                
                    <h4 class='panel-title'>".$row['title']." <div style='float:right'>".$row['postDateTime']."</div></h4>
                </div>
                <div class='panel-body'>
                    <a href='./message.php?id=".$row['user']."'>".$row['user']."</a>
                </div>
                
                <table class='table'>
                        <tr>
                            <td>Job Description</td>
                            <td>".$row['des']."</td>
                        </tr>
                      
                        <tr>
                            <td>Expectations Around Cost</td>
                            <td>".$row['cost']."</td>
                        </tr>
                        <tr>
                            <td>Date When Job Will Be Active</td>
                            <td>".$row['active']."</td>
                        </tr>
                        <tr>
                            <td>Date When Request For Estimates Finishes</td>
                            <td>".$row['finish']."</td>
                        </tr>
                    </table>
                <div class='panel-footer' style='overflow:hidden'><div style='float:left'>".$num." estimate</div><div style='float:right'><button class='btn btn-primary' onclick='estimate(\"".$row['user']."\",\"".$_SESSION['role']."\",\"".$row['id']."\")'>estimate</button></div> </div>
            </div>";
            }
        ?>
        </div>
    </div>
<script>
    function estimate(user,role,id){
        if(role == "1"){
            alert('You can not estimate , because logining user is not a tradesman');
            return false;
        }else{
            window.location = "./post2.php?id="+id+"&user="+user;
        }
        
    }
</script>
<?php
    require_once "./footer.php";
?>