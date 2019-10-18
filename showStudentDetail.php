<?php

require_once("header.php");

if(array_key_exists("id", $_GET) == false){
    header("location:showAllStudents.php");
    exit(0);
}

$student = Student::find($mysqli, $_GET['id']);

echo "<h2>Job Details</h2>";
echo "<p>Title: ".$student->getTitle()."</p>";
echo "<p>Job Location:".$student->getJobLocation()."</p>";
echo "<p>Job Type: ".$student->getJobType()."</p>";
echo "<p>Job Category:".$student->getJobCategory()."</p>";
echo "<p>Company: ".$student->getCompany()."</p>";
echo "<p>End Date: ".$student->getDob()->format('d-m-Y')."</p>";




echo "<p><a href=\"showAllStudents.php\">Show All Students</a></p>";

require_once("footer.php");

?>

