<?php
    require_once "./libs/checkLogin.php";
    require "./libs/dbconnect.php";
    require "./libs/autoloader.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        // get Job by Id
        $arr = Job::getJobById($connect,$id);
    }

    if(isset($_POST['submit'])){
        $cost = $_POST['cost'];
        $laborcost = $_POST['laborcost'];
        $materialscost = $_POST['materialscost'];
        $due = $_POST['due'];
        $user = $_SESSION['user'];
        $postUser = $_POST['postUser'];
        $jobId = $_POST['jobId'];
        // post the Estimate
        Estimate::makeEstimate($connect,$cost,$laborcost,$materialscost,$due,$user,$postUser,$jobId);
    }
    
?>
<?php
    require "./header.php"
?>
<div class='post'>
    <h3>Estimate</h3>
<div>
        <?php
            // Render Estimate data
            foreach($arr as $k=>$row){
               
                echo "<div class='panel panel-success'>
                <div class='panel-heading'>
                
                    <h4 class='panel-title'>".$row['title']." <div style='float:right'>".$row['postDateTime']."</div></h4>
                </div>
                <div class='panel-body'>
                <a href='./message.php?id='".$row['user'].">".$row['user']."</a>
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
                <div class='panel-footer' style='overflow:hidden'><div style='float:left'>2 estimate</div><div style='float:right'></div> </div>
            </div>";
            }
        ?>
        <form action="./post2.php" method="POST" onsubmit="return toValidate()">
<div class="form-group">
    <?php
        if(isset($_GET['user'])){
            echo "<input type='hidden' value='".$_GET['user']."' name='postUser'>";
            echo "<input type='hidden' value='".$_GET['id']."' name='jobId'>";
        }
    ?>
    
    <label for="exampleInputEmail1">Total Cost</label>
    <input type="text" class="form-control" name='cost' id="cost" placeholder="Total Cost">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Labor Cost</label>
    <input type="text" class="form-control" name='laborcost' id="laborcost" placeholder="LaborCost">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Materials Cost</label>
    <input type="text" class="form-control" name='materialscost' id="materialscost" placeholder="MaterialsCost">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Due</label>
    <input type="date" class="form-control" name="due" id="due" placeholder="Due">
  </div>
  
  
  <input type="submit" class="form-control" id="exampleInputPassword1" placeholder="" name='submit' value='estimate'>
  
</form>
</div>
</div>
<script>
    // function toValidate input
function toValidate(){
    if($("#cost").val() == ""){
            alert("cost can not be empty");
            return false;
    }

    if($("#laborcost").val() == ""){
            alert("laborcost can not be empty");
            return false;
    }

    if($("#materialscost").val() == ""){
            alert("materialscost can not be empty");
            return false;
    }

    if($("#due").val() == ""){
            alert("due can not be empty");
            return false;
    }

    return true;
}
</script>
<?php
    require "./footer.php"
?>