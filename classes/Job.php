<?php


// Methods about Job
class Job {

    public static function getAll($connect){
        $sql = "select * from job";
        $query = mysqli_query($connect,$sql);
        $arr = mysqli_fetch_all($query,1);
        return $arr;
    }
    public static function deleteJob($connect,$id){
        $sql = "delete from job where id = '$id'";
        $query = mysqli_query($connect,$sql);
        if($query){
            $sql1 = "delete from estimate where jobId = '$id'";
            $query1 = mysqli_query($connect,$sql1);
            if($query1){
                exit("Deleting successfully");
            }else{
                exit("error");
            }
        }else{
            exit("error");
        }
    }
    
    public static function postJob($connect,$location,$description,$cost,$active,$finish,$user,$dateTime,$title){
        $sql = "insert into job (`location`,`des`,`cost`,`active`,`finish`,`user`,`postDateTime`,`title`) values ('$location','$description','$cost','$active','$finish','$user','$dateTime','$title')";
        $query = mysqli_query($connect,$sql);
        if($query){
            exit("Post successfully！<a href='./demand.php'>go to the demand hall</a> , <a href='./post.php'>post again!</a>");
        }
    }

    public static function getJobByTradesman($connect,$user){
        $sql = "select a.cost as postCost,b.cost as estimateCost,a.*,b.*,b.id as estimateId,b.jobId as jobId from job a join estimate b on a.user = b.postUser where b.user = '$user'";
        $query = mysqli_query($connect,$sql);
        $arr = (mysqli_fetch_all($query,1));
        return $arr;
    }

    public static function getJobByUser($connect,$user){
        $sql1 = "select * from job where user = '$user'";
        $query1 = mysqli_query($connect,$sql1);
        $arr1 = mysqli_fetch_all($query1,1);
        return $arr1;
    }


    public static function getJobById($connect,$id){
        $sql = "select * from job where id = '$id'";
        $query = mysqli_query($connect,$sql);
        $arr = mysqli_fetch_all($query,1);
        return $arr;
    }


    public function debug(){
        echo "<pre><code>";
        var_dump($this);
        echo "</code></pre>";
    }  
}





?>