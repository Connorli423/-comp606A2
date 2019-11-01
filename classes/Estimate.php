<?php

// Methods about Estimation
class Estimate {

    public static function deleteEstimate($connect,$id){
        $sql = "delete from estimate where id = '$id'";
        $query = mysqli_query($connect,$sql);
        if($query){
            exit("Deleting successfully");
        }else{
            exit("error");
        }
    }

    public static function mark($connect,$id){
        $sql = "update estimate set `status`= 1 where id = '$id'";
        $query = mysqli_query($connect,$sql);
        if($query){
            exit("Marking successfully");
        }else{
            exit("error");
        }
    }
    
    public static function getEstimateByJobId($connect,$jobId){
        $sql2 = "select * from estimate where jobId = '$jobId'";
        $query2 = mysqli_query($connect,$sql2);
        $arr2 = mysqli_fetch_all($query2,1);
        return $arr2;
    }

    public static function getEstimateNumByJobId($connect,$jobId1){
        $sql3 = "select * from estimate where jobId = '$jobId1'";
        $query3 = mysqli_query($connect,$sql3);
        $num3 = mysqli_affected_rows($connect);
        return $num3;
    }


    public static function makeEstimate($connect,$cost,$laborcost,$materialscost,$due,$user,$postUser,$jobId){
        $sql = "insert into estimate (`postUser`, `user`, `cost`, `laborcost`, `materialscost`, `due`,`jobId`) values ('$postUser','$user','$cost','$laborcost','$materialscost','$due','$jobId')";
        $query = mysqli_query($connect,$sql);
        if($query){
            exit("estimate successfully , <a href='./index.php'>see my estimation message</a>");
        }else{
            exit("error");
        }
    }

   


}




?>