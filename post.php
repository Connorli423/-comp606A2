<?php
    require_once "./libs/checkLogin.php";
    require "./libs/dbconnect.php";
    require "./libs/autoloader.php";
    if(isset($_POST['submit'])){
       
        $user = $_SESSION['user'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $cost = $_POST['cost'];
        $active = $_POST['active'];
        $finish = $_POST['finish'];
        $title = $_POST['title'];
        $dateTime = Date("Y-m-d H:i:s",time());
        // post the Job
        Job::postJob($connect,$location,$description,$cost,$active,$finish,$user,$dateTime,$title);
    }
?>
<?php
    require "./header.php"
?>
 
<div class='post'>
<h3 style='margin-bottom:30px;'>Post Jobs</h3>
<form action="./post.php" method="POST" onsubmit="return toValidate()">
<div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name='title' id="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Location</label>
    <input type="text" class="form-control" name='location' id="location" placeholder="Location">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Job Description</label>
    <textarea type="text" class="form-control" name='description' id="description" placeholder="Job Description"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Expectations Around Cost</label>
    <input type="text" class="form-control" name="cost" id="cost" placeholder="Expectations Around Cost">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date When Job Will Be Active</label>
    <input type="date" class="form-control" name="active" id="active" placeholder="Date When Job Will Be Active">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date When Request For Estimates Finishes</label>
    <input type="date" class="form-control" name="finish" id="finish" placeholder="Date When Request For Estimates Finishes">
  </div>
  
  <input type="submit" class="form-control" id="exampleInputPassword1" placeholder="" name='submit' value='submit'>
  
</form>
   
</div>
<script>
  // function toValidate input
function toValidate(){
    if($("#title").val() == ""){
            alert("title can not be empty");
            return false;
    }

    if($("#location").val() == ""){
            alert("location can not be empty");
            return false;
    }

    if($("#description").val() == ""){
            alert("location can not be empty");
            return false;
    }

    if($("#cost").val() == ""){
            alert("location can not be empty");
            return false;
    }

    if($("#active").val() == ""){
            alert("active date can not be empty");
            return false;
    }

    if($("#finish").val() == ""){
            alert("finish date can not be empty");
            return false;
    }
    return true;
}
</script>
<?php
    require "./footer.php"
?>