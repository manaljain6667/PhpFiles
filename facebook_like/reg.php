<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "manaL@12345";
$dbname = "facebook_like";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

   
if (isset($_POST["submit"]))
{
  # code...
   $e_name=mysqli_real_escape_string($conn,$_POST["name"]);
  $email=mysqli_real_escape_string($conn,$_POST["email"]);
  $password=mysqli_real_escape_string($conn,$_POST["pswd"]);
  

   
  
  $qry="SELECT email,e_name from user where email='$email' and name='$e_name' ";
  $result=mysqli_query($conn,$qry);

  if(mysqli_num_rows($result)==0)
  {
    $sql="INSERT INTO user(name,email,password) VALUES('$e_name','$email','$password')";
    if ($conn->query($sql) === TRUE)
    {
      $_SESSION["user"]=$email;
       header('Location:index.php');
    }
    else
    {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    else
      echo "email id already exists";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Employee Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<form method="post" >
  <div class="container jumbotron text-center">
        <h2>Registration Form</h2><br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Register</button>
  </div>

  <div class="modal fade" role="dialog" id="loginModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background: #17a2b8">
            <h4 class="text-center modal-title text-uppercase" id="loginModal" style="color:white;text-align:center;margin:10px;">Binplus Learning Center</h4><br>
          </div>

          <div class="modal-body">
            <section>
              <div class="container">
              <h2>New Employee Registration</h2><br>
              <form action="#">
                <h5>Personal Information:</h5>
                <div class="row">
                  <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Employee Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" >
                </div></div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="email">E-Mail:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" >
                </div>
               <a href="login.php" style="float:right">Log In</a><br><br><br>
                <br><br><center><button type="submit" class="btn btn-primary" name="submit">Register Now</button></center>
                </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div> 
</form>

</body>
</html>
