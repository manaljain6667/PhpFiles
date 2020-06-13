<?php
$servername = "localhost";
$username = "root";
$password = "manaL@12345";
$dbname = "facebook_like";

// Create connection
session_start();
$_SESSION = array();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST["login"])) 
{
  # code...
  $email=mysqli_real_escape_string($conn,$_POST["email"]);
  $password=mysqli_real_escape_string($conn,$_POST["pswd"]);

  $sql="SELECT email,password FROM user where email='$email' and password='$password' ";
  $result=mysqli_query($conn,$sql);
  if (mysqli_num_rows($result)==0) {
    # code...
    echo "Invalid username or password";
  }
  else{
    $_SESSION["user"]=$email;
    header('Location:index.php');
  }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Modal</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <form method="post" >
  <div class="container jumbotron text-center">
    <h2>Login Form</h2><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Login</button>
  </div>
  
  <div class="modal fade" role="dialog" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background: #17a2b8">
          <h4 class="text-center modal-title text-uppercase" id="loginModal" style="color:white;text-align:center;margin:10px;">Binplus Learning Center</h4><br>
        </div>
        <div class="modal-body">
            <p class="text-center lead">Login Dashboard</p><br>
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Username" name="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pswd">
              </div>
              <input type="checkbox" style="height:15px;width:15px;">&nbsp;Remember Me
              <a href="reg.php" style="float:right">Register here!</a><br><br><br>
              <center><button type="submit" class="btn btn-primary" name="login">Login</button></center>
        </div>
      </div>
    </div>
  </div> 
  </form>
</body>
</html>