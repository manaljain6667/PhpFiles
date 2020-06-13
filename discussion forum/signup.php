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
    $name="";
	$email="";
	$password="";

  if(isset($_POST['submit']))
{
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	
    $sql = "INSERT INTO users(name,email_id,password) VALUES ('$name','$email','$password')";
    $un=$name;

    if ($conn->query($sql) === TRUE) {
         
        echo "successfully signed up!<br>";
        $_SESSION["user"]=$email;
         header("location: index.php");
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
			<h1>signup</h1>
			Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" required><br><br>
			Email id:&nbsp&nbsp&nbsp<input type="email" name="email" required><br><br>
			Password:&nbsp<input type="Password" name="password" required><br><br>
			<input type="submit" name="submit" style="background-color: red; font-size: 20px">
		</form>
		<h2>Already have an account</h2>
		<a href="login.php">Login</a>
    </div>

</body>
</html>
