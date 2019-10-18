<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enter New Job Detatils</title>
</head>


<body>
<h1>Enter New Job Detatils</h1>
<form method="post" action="addNewStudent.php" enctype="application/x-www-form-urlencoded">
<p><label>Job Title</label><input name="jobTitle" type="text"></p>
<p><label>Job Location</label><input name="jobLocation" type="text"></p>
<p><label>Job Type</label><input name="jobType" type="text"></p>
<p><label>Job Category</label><input name="jobCategory" type="text"></p>
<p><label>Company</label><input name="company" type="text"></p>
<p><label>End Date</label><input name="endDate" type="date"></p>
<p><input type="submit" value="Add New Job"></p>
</form>
</body>

</html>