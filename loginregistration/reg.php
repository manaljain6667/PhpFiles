<?php

$servername = "localhost";
$username = "root";
$password = "manaL@12345";
$dbname = "loginregister";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
if (isset($_POST["submit"]))
{
	# code...
	 $e_name=mysqli_real_escape_string($conn,$_POST["name"]);
	$email=mysqli_real_escape_string($conn,$_POST["email"]);
	$password=mysqli_real_escape_string($conn,$_POST["pswd"]);
	$b_date=mysqli_real_escape_string($conn,$_POST["date"]);
	$mob_no=(int)mysqli_real_escape_string($conn,$_POST["mob"]);

	 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
       
        $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
        $name = basename($_FILES["fileToUpload"]["name"]);

        move_uploaded_file($tmp_name, "$target_dir/$name");

    if($check !== false) 
    {
        // echo "File is an image - " . $check["mime"] . ".";
        

        $uploadOk = 1;
    } else
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
   
	
	$qry="SELECT email from register where email='$email' ";
	$result=mysqli_query($conn,$qry);

	if(mysqli_num_rows($result)==0)
	{
		$sql="INSERT INTO register(e_name,email,password,b_date,mob_no,image,image_name) VALUES('$e_name','$email','$password','$b_date','$mob_no','$name','$tmp_name')";
		if ($conn->query($sql) === TRUE)
		{
			echo "successful";
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

  <div class="container jumbotron text-center">
        <h2>Registration Form</h2><br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Register</button>
  </div>
<form method="post" action="reg.php" enctype="multipart/form-data">
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
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="date">Birth Date:</label>
                    <input type="date" class="form-control" id="date" placeholder="Enter birthdate" name="date" >
                </div></div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="mob">Contact No:</label>
                    <input type="tel" class="form-control" id="mob" placeholder="Enter contact no." name="mob" >
                </div></div>
              </div>
                
                <br>
                <h5>Upload Documents:</h5>
                <div class="form-group">
                    <label for="pan">PAN Card:</label>
                    <input type="file" class="form-control" id="pan" placeholder="Upload Pan card" name="pan" >
                </div>
                <div class="form-group">
                    <label for="pic">Photo:</label>
                    <input type="file" class="form-control" id="pic" placeholder="Upload your photo" name="fileToUpload"  >
                </div>
                <div class="form-group">
                    <label for="aadhaar">Aadhaar Card:</label>
                    <input type="file" class="form-control" id="aadhaar" placeholder="Upload Aadhaar card" name="Aadhaar" >
                </div>

                <br><h5>Your Data Privacy:</h5>
                <p>Binplus is committed to protecting your information security.Your information will be used in accordance with any applicable data privacy law, our internal policies and our privacy policy and will be held security. 
                </p>
                <input type="checkbox" style="height:15px;width:15px;">&nbsp;I have read and accepted the <a href="#">Terms and Conditions</a>&nbsp;of the company.

                <br><br><center><input type="submit" value="submit" name="submit"></center>
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
<!-- class="btn btn-primary" -->
<h3>Selelcted image is:</h3>
<?php

$sql="SELECT image from register";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)) 
{
	# code...
	if($row["image"]!='')
	{
	$img=$row["image"];
	echo '<img src="uploads/'.$img.'" width="100" height="100" />';
    }
}

?>