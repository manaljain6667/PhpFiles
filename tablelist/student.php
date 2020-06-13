<?php

$servername = "localhost";
$username = "root";
$password = "manaL@12345";
$dbname = "tablelist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>

</head>
<body>
	<div style="height: 30px;background-color:#000000;margin: 0px;padding: 0px">
	</div>
	<form method="post">
	<div align="center" style="height: 200px;width: 600px;margin-left: 400px ; background-color: grey">
		<h3 style="padding-left: 20px">Student Name:</h3>
		<input type="text" name="name"><br>
		<h3 style="padding-left: 20px">Branch:</h3>
		  <select name="branch">
			<option >It</option>
			<option >CSE</option>
			<option >ME</option>
			<option >CE</option>
			<option>CHE</option>
		</select><br><br>
		<input type="submit" name="submit" value="submit">
	</div>
</form>
</body>
</html>
<?php
if (isset($_POST["submit"])) {
	$name=mysqli_real_escape_string($conn,$_POST["name"]);
	$branch=mysqli_real_escape_string($conn,$_POST["branch"]);
	$sq="SELECT * from students where s_name='$name' and branch='$branch'";
	$res=mysqli_query($conn,$sq);
	if(mysqli_num_rows($res)==0)
	{
		$sql="INSERT into students(s_name,branch) Values ('$name','$branch')";
		$conn->query($sql);
    }
    $it="SELECT * from students where branch='It'";
     $rit=mysqli_query($conn,$it);

     while ($row=mysqli_fetch_array($rit)) {
     	# code...
     	$name=$row['s_name'];

     	$sqs="SELECT * from it where s_name='$name' ";
			$res=mysqli_query($conn,$sqs);
			if(mysqli_num_rows($res)==0)
			{
				
     	$sql="INSERT into it(s_name) Values ('$name')";
     	$conn->query($sql);
		    }

     }
    $cse="SELECT * from students where branch='CSE'";
     $rcse=mysqli_query($conn,$cse);
     while ($row=mysqli_fetch_array($rcse)) {
     	# code...
     	$name=$row['s_name'];

     	$sqs="SELECT * from cse where s_name='$name' ";
			$res=mysqli_query($conn,$sqs);
			if(mysqli_num_rows($res)==0)
			{
				
		     	$sql="INSERT into cse(s_name) Values ('$name')";
		     	$conn->query($sql);
		    }

     }
    $me="SELECT * from students where branch='ME'";
     $rme=mysqli_query($conn,$me);
     while ($row=mysqli_fetch_array($rme)) {
     	# code...
     	$name=$row['s_name'];

     	$sqs="SELECT * from me where s_name='$name' ";
			$res=mysqli_query($conn,$sqs);
			if(mysqli_num_rows($res)==0)
			{
				
		     	$sql="INSERT into me (s_name) Values ('$name')";
     	        $conn->query($sql);
		    }

     	
     }
    $ce="SELECT * from students where branch='CE'";
     $rce=mysqli_query($conn,$ce);
     while ($row=mysqli_fetch_array($rce)) {
     	# code...
     	$name=$row['s_name'];

     	$sqs="SELECT * from ce where s_name='$name' ";
			$res=mysqli_query($conn,$sqs);
			if(mysqli_num_rows($res)==0)
			{
		     	$sql="INSERT into ce (s_name) Values ('$name')";
		     	$conn->query($sql);
		    }
     }
    $che="SELECT * from students where branch='CHE'";
     $rche=mysqli_query($conn,$che);
    while ($row=mysqli_fetch_array($rche)) {
     	# code...
     	$name=$row['s_name'];

     	$sqs="SELECT * from che where s_name='$name' ";
			$res=mysqli_query($conn,$sqs);
			if(mysqli_num_rows($res)==0)
			{
		     	$sql="INSERT into che (s_name) Values ('$name')";
     	        $conn->query($sql);
		    }
     	
     }
}
?>