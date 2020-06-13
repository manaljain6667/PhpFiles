
<?php

    session_start();
    $error="";
    if (array_key_exists("logout", $_GET)) {
    	# code...
    	unset($_SESSION);
    	setcookie("id","",time()-60*60);
    	$_cookie["id"]="";

    }
    else if((array_key_exists("id", $_SESSION) AND  $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id']))
    {
              header("Location:loggedinpage.php");
    }
  if(array_key_exists("submit",$_POST))
  {
  	include("connection.php");
  	if(!$_POST['email']){
  		$error .="An email address is required<br>";
  	}
  	if(!$_POST['password']){
  		$error .="An password is required<br>";
  	}
  	if($error!=""){
  		$error="<p>There were errors in your form:</p>".$error;
  	}
  	else
  	{
           
           $email=mysqli_real_escape_string($link, $_REQUEST['email']);
  		$password=mysqli_real_escape_string($link, $_REQUEST['password']);

        if ($_POST['signup']==1) 
        {
        	# code...
  		

  		 $query="SELECT id FROM users WHERE email='$email'LIMIT 1";
  		 $result=mysqli_query($link,$query);

  		 if(mysqli_num_rows($result)>0)
  		 {
  			$error="that email address is taken";
  		}else
  		{
  			$query="INSERT INTO users (email,password) VALUES ('$email','$password')";

  			if(!mysqli_query($link,$query))
  			{
  				// $error="<p>Could not logged in</p>";
  				echo "Error: " . $query . "<br>" . $link->error;
  			}else
  			{
  				$query="UPDATE users SET password='".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' where id=".mysqli_insert_id($link)."LIMIT 1";
  				mysqli_query($link,$query);

  				$_SESSION['id']=mysqli_insert_id($link);

  				if($_POST['stayloggedin']=='1')
  				{
  					setcookie("id",mysqli_insert_id($link),time()+60*60*24*365);
  				}


  			header("Location: loggedinpage.php");
  		  }
  		}
  	} else
  	 {
  		$query="SELECT * FROM users WHERE email= '$email' ";
  		$result=mysqli_query($link,$query);
  		$row=mysqli_fetch_array($result);
  		if (array_key_exists("id", $row)) {
  			# code...
  			$hashedpassword=$_POST['password'];
  			if ($hashedpassword==$row['password']) {
  				# code...
  				$_SESSION['id']=$row['id'];

  				if($_POST['stayloggedin']=='1')
  				{
  					setcookie("id",$row['id'],time()+60*60*24*365);
  				}
  				header("Location: loggedinpage.php");
  			}
  			else {
  				echo "password does not match";
  			}
  		}
  	}
  	}
  }

?>
<?php include("header.php");?>
    <div class="container" id="homepagecontainer">
      
          <h1>Hello, world!</h1>

          <h1>Secret Diary</h1>
          <p><strong>Store your thoughts permanently and securely</strong></p>

          <div id="error"><?php echo $error; ?></div>
          <form method="post" id="signupform">

            <p>Interested? Sign up now</p>

            <fieldset class="form-group">
  
               <input class="form-control" type="email" name="email" placeholder="email">
            </fieldset>

            <fieldset class="form-group">
               <input class="form-control" type="password" name="password" placeholder="password">

            </fieldset>

            <fieldset class="form-group">
               <input  type="checkbox" name="stayloggedin" vlaue=1>
               Stay Logged in

             </fieldset>

             <fieldset class="form-group">
                <input type="hidden" name="signup" value="1">
                <input class="btn btn-success" type="submit" name="submit" value="signup">
            </fieldset>
            <p><a class="toggleforms">Log in</a></p>
        </form>

        <form method="post" id="signinform">
          <p>Log  in using username and password</p>

          <fieldset class="form-group">
              <input class="form-control" type="email" name="email" placeholder="email">
          </fieldset>

          <fieldset class="form-group">
              <input class="form-control" type="password" name="password" placeholder="password">
          </fieldset>

          <fieldset class="form-group">
              <input  type="checkbox" name="stayloggedin" vlaue=1>
              Stay Logged in
              <input type="hidden" name="signup" value="0">
          </fieldset>

          <fieldset class="form-group">
              <input class="btn btn-success" type="submit" name="submit" value="Log in">
          </fieldset>
          <p><a class="toggleforms">Sign Up</a></p>
        </form>

    </div>

   <?php include("footer.php"); ?>