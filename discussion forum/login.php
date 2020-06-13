<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "manaL@12345";
$dbname = "discussion_forum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$email="";
	$password="";

	if (isset($_POST["submit"])) {
	      $email=mysqli_real_escape_string($conn,$_POST['email']);
	      $password=mysqli_real_escape_string($conn,$_POST['password']);

	      $sql="select id from users where email_id='$email' and password='$password'";
	      $result=mysqli_query($conn,$sql);
	      
	      if(mysqli_num_rows($result) == 1)
	      {
	      	  $_SESSION['user'] = $email;
	      	  header("location: index.php");
	      }
	      else
	      {
	      	echo "Your email or password is incorrect";
	      }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Discussion forum</title>
	<link rel="stylesheet" type="text/css" href="forum.css">
</head>
<body >
     
     <h1 style="font-size: 60px; text-align: center; color: blue; " >Discussion forum</h1>
       <div style="text-align: center;" class="border">
       	<form method="post">
       	  <h1>Login</h1>
	       	email id:&nbsp&nbsp<input type="email" name="email"><br><br>
	       	Password:<input type="Password" name="password"><br><br>
	       	<input type="submit" name="submit" style="background-color: red;font-size: 20px">
	    </form>
	    <h2>Don't have account</h2>
	    <a href="signup.php">Create account</a>
       </div>

</body>
</html>

