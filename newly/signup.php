
<?php



     
if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) 
{
	# code...
	$dbname="new";   
$link=mysqli_connect("localhost","root","manaL@12345",$dbname);
 if(mysqli_connect_error()){
 	die ("Database not connected");
 }
	if ($_POST['email']=='') {
		echo "<p>email field is required</p>";
		# code...
	}

	else if ($_POST['password']=='') {
		echo "<p>password is required</p>";
		# code...
	}
	else 
	   {
            
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) 
            {
                
                echo "<p>That email address has already been taken.</p>";
                
            } 
            else
            {
                
                $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if (mysqli_query($link, $query))
                 {
                    
                    echo "<p>You have been signed up!</p>";
                    
                } 
                // else 
                // {
                    
                //     echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                // }
                
            }
            
        }
        
        
 }

?>
<form method="post" action="signup.php">
	<input type="text" name="email" placeholder="email address">
	<input type="password" name="password" placeholder="password">
	<input type="submit" name="sign up">
</form>