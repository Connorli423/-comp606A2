<?php
    require_once "./libs/checkLogin.php";
    require "./libs/dbconnect.php";
    require "./libs/autoloader.php";
    $user = $_SESSION['user'];
    $role  = $_SESSION['role'];
    // select all the estimate by tradesman
    if($role == 2){
        $arr = Job::getJobByTradesman($connect,$user);
    }

    // select all the job by postUser
    if($role == 1){
        $arr1 = Job::getJobByUser($connect,$user);
    } 
        
    
    // select the estimation by job
    
    

?>
<?php
    require_once "./header.php";
?>
    <div class='post'>
        <h3>Message</h3>
        <div class='message17'>
            <?php
                if($role == 2){
                    if(isset($arr)){
                        foreach($arr as $k=>$row){
                            $jobId1 = $row['jobId'];
                            $num3 = Estimate::getEstimateNumByJobId($connect,$jobId1);
                            if($row['status'] == 0){
                                $status = "panel-info";
                            }else{
                                $status = "panel-success";
                            }
                             
                            echo "<div class='panel ".$status."'>
                            <div class='panel-heading'>
                            
                                <h4 class='panel-title'>".$row['title']." <div style='float:right'>".$row['postDateTime']."</div></h4>
                            </div>
                            <div class='panel-body'>
                                <a href='./message.php?id=".$row['postUser']."'>".$row['postUser']."</a>
                            </div>
                            
                            <table class='table'>
                                    <tr style='background:rgba(243,243,243,1)'>
                                        <td>Job</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Job Description</td>
                                        <td>".$row['des']."</td>
                                    </tr>
                                  
                                    <tr>
                                        <td>Expectations Around Cost</td>
                                        <td>".$row['postCost']."</td>
                                    </tr>
                                    <tr>
                                        <td>Date When Job Will Be Active</td>
                                        <td>".$row['active']."</td>
                                    </tr>
                                    <tr>
                                        <td>Date When Request For Estimates Finishes</td>
                                        <td>".$row['finish']."</td>
                                    </tr>
                                    
                                    <tr style='background:rgba(243,243,243,1)'>
                                        <td>Estimation</td>
                                        <td></td>
                                    </tr>
        
                                    <tr>
                                        <td>Estimate Cost</td>
                                        <td>".$row['estimateCost']."</td>
                                    </tr>
                                    <tr>
                                        <td>Labor Cost</td>
                                        <td>".$row['laborcost']."</td>
                                    </tr>
                                    <tr>
                                        <td>Materials Cost</td>
                                        <td>".$row['materialscost']."</td>
                                    </tr>
                                    <tr>
                                        <td>Due</td>
                                        <td>".$row['due']."</td>
                                    </tr>
                                    
                                </table>
                            <div class='panel-footer' style='overflow:hidden'><div style='float:left'>".$num3." estimate</div><div style='float:right'><button class='btn btn-danger' onclick='estimateDelete(\"".$row['estimateId']."\")'>Delete</button></div> </div>
                        </div>";
                        
                        }
                    }
                    
                }
                if($role == 1){
                    if(isset($arr1)){
                        // Render Job data
                        foreach($arr1 as $arr1k=>$arr1Row){  
                            $jobId = $arr1Row['id'];
                            // getEstimate Num By JobId 
                            $num3 = Estimate::getEstimateNumByJobId($connect,$jobId);
                           
                            // getEstimate By JobId 
                            $arr2 = Estimate::getEstimateByJobId($connect,$jobId);

                            // if getEstimate By JobId data exist 
                            if(isset($arr2)){
                                $str = "";
                                // Render Job detail data
                                foreach($arr2 as $row2){
                                    if($row2['status'] == 0){
                                        $status = "panel-info";
                                    }else{
                                        $status = "panel-success";
                                    }
                                    $str = "<div class='detail'>";
                                    $str = $str . "<div class='panel ".$status."'>
                                    <div class='panel-heading'>".$arr1Row['title']." Estimate Detail</div>
                                        <div class='panel-body'>
                                        <a href='./message.php?id=".$row2['postUser']."'>".$row2['postUser']."</a>
                                        </div>
                                        <table class='table'>
                                                    <tr style='background:rgba(243,243,243,1)'>
                                                        <td>Estimation</td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Estimate Cost</td>
                                                        <td>".$row2['cost']."</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Labor Cost</td>
                                                        <td>".$row2['laborcost']."</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Materials Cost</td>
                                                        <td>".$row2['materialscost']."</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Due</td>
                                                        <td>".$row2['due']."</td>
                                                    </tr>
                                                    </table>
                                        <div class='panel-footer' style='overflow:hidden'>operation<div style='float:right'><button class='btn btn-success' onclick='Mark(\"".$row2['id']."\")'>Mark</button></div>
                                    </div>
                                    
                            </div>";
                                }
                            }

                            // Render Job detail data
                            $str = $str ."</div>";


                            echo "<div class='panel panel-info'>
                            <div class='panel-heading'>

                                <h4 class='panel-title'>".$arr1Row['title']." <div style='float:right'>".$arr1Row['postDateTime']."</div></h4>
                            </div>
                            <div class='panel-body'>
                                <a href='./message.php?id=".$arr1Row['user']."'>".$arr1Row['user']."</a>
                            </div>
                            
                            <table class='table'>
                                    <tr style='background:rgba(243,243,243,1)'>
                                        <td>Job</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Job Description</td>
                                        <td>".$arr1Row['des']."</td>
                                    </tr>
                                  
                                    <tr>
                                        <td>Expectations Around Cost</td>
                                        <td>".$arr1Row['cost']."</td>
                                    </tr>
                                    <tr>
                                        <td>Date When Job Will Be Active</td>
                                        <td>".$arr1Row['active']."</td>
                                    </tr>
                                    <tr>
                                        <td>Date When Request For Estimates Finishes</td>
                                        <td>".$arr1Row['finish']."</td>
                                    </tr>
                                    </table>
                            <div class='panel-footer' style='overflow:hidden'><div style='float:left'>".$num3." estimate</div><div style='float:right'><button class='btn btn-danger' onclick='deleteJob(\"".$arr1Row['id']."\")'>Delete</button><button class='btn btn-primary' class='showDetail'  onclick=\"showDetail(this)\">Detail</button></div> </div>
                            ".$str."
                        </div>";
                        
                        }
                    }
                }
            ?>  
            
            </div>
       
    </div>
<script>
    function estimateDelete(id){
        if(confirm("Are you sure to delete the estimation?")){
            window.location = "./deleteEstimate.php?id="+id;
        }else{
            
        }     
    }
    function deleteJob(id){
        if(confirm("Are you sure to delete the job?")){
            window.location = "./deleteJob.php?id="+id;
        }else{
            
        }  
    }
    function showDetail(obj){
        var detail = $(obj).parents(".panel-footer").siblings(".detail");
        if(detail.css('display') == "block"){
            detail.hide();
        }else{
            detail.show();
            
        }
    }
    function Mark(id){
        if(confirm("Are you sure to mark the estimate?")){
            window.location = "./mark.php?id="+id;
        }else{
            
        }
        
    }
   
   
</script>
<?php
    require_once "./footer.php";
?>
