
  
<?php

$servername = "localhost";
$username = "root";
$password = "manaL@12345";
$dbname = "loginpage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
   $username="";
	$email="";
	$phoneno="";
	$password="";
	$last_id="";

  if(isset($_POST['save']))
{
	   $username=mysqli_real_escape_string($conn,$_POST['username']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$phoneno=mysqli_real_escape_string($conn,$_POST['phoneno']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	
    $sql = "INSERT INTO users (username, email ,phoneno, password)
    VALUES ('$username','$email','$phoneno','$password')";
    $un=$username;

    if ($conn->query($sql) === TRUE) {
         $last_id = $conn->insert_id;
        echo "successfully signed up!<br>";
        
        $sqli= "INSERT INTO valid (username) SELECT username FROM users";
        $result=mysqli_query($conn,$sqli);
        echo "Hii $username you have spend 1000 rupees";
        
        $query="SELECT * FROM users where id=$last_id";
        $res = mysqli_query($conn,$query);
		    if (mysqli_num_rows($res) == 1) 
		    {
					        
				//Pass, do something
				echo "now you can change the password<br> Please type your new password<br>";
			}

		    } 
		    

     else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else
if (isset($_POST['submit1'])) {
	# code...
	           $qry=mysqli_real_escape_string($conn,$_POST['newpassword']);
	           $user=mysqli_real_escape_string($conn,$_POST['username']);

	          
				$rst="UPDATE users SET password='$qry' WHERE username='$user'";
				 mysqli_query($conn,$rst);
				if ($conn->query($rst)===TRUE) {
					# code...
					
					echo "congratulations you has changed the password";
				}
}


$conn->close();
?>


<!DOCTYPE html>
<head>
 <link rel="stylesheet" href="css.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/ico" href="icon.jpg" />
 <link rel="stylesheet" type="text/css" href="lib.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript"></script>
<title>SIGN UP</title>
</head>
<body>

	<form method="post" action="index.php">
			<label class="f2" >
	<center><table cellpadding="16" class="tab">
		<tr>
			<td><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li></td>
			<td>Sign Up using FACEBOOK</td>
		</tr>
		<tr>
			<td><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li></td>
			<td>Sign Up using TWITTER</td>
		</tr>
		<tr>
			<td><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li></td>
			<td>Sign Up using GOOGLE</td>
		</tr>
	</table>
</center>
</label>
&nbsp
&nbsp
&nbsp
&nbsp
<label class="f3">
	<table class="or">
		<tr>
			<td>
				OR
			</td>
		</tr>
	</table>
	
</label>
&nbsp
&nbsp
&nbsp
&nbsp
		<label class="f1">
		<center>
		<table cellpadding="10">
			<th colspan="2"><center> Sign Up</center></th>
			<tr>
				<td><i class="fa fa-user"></i> Name</td>
				<td><input type="text" name="username" placeholder=" user" size="16"></td>
			</tr>
			<tr>
				<td><i class="fa fa-envelope-o"></i> E-Mail</td>
				<td><input type="text" name="email" placeholder=" e-mail" size="16"></td>
			</tr>
			<tr>
				<td><i class="fa fa-phone"></i>Mobile No.</td>
				<td><input type="text" name="phoneno" placeholder=" mobile number" size="16"></td>
			</tr>
			<tr>
				<td><i class="fa fa-pencil"></i> Password</td>
				<td><input type="Password" name="password" placeholder=" password" size="16"></td>
			</tr>
			
			<th colspan="2"><center><button class="button button1" type="Submit" name="save">Submit</button></center></th>

		</table>
	</center>
		</label>
</form>
<form method="post" action="index.php">
	<table>
		<tr>
			<th>username</th>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
				<td><i class="fa fa-pencil"></i> New Password</td>
				<td><input type="password" name="newpassword" placeholder="new password" size="16"></td>
		</tr>
		<th colspan="2"><center><button class="button button1" type="Submit" name="submit1">Submit</button></center></th>
	</table>
	
</form>
</body>
</html>

