<?php

session_start();
if (array_key_exists("id",$_COOKIE)) {
	# code...
	$_SESSION['id']=$_COOKIE['id'];
}

if (array_key_exists("id", $_SESSION)) {
	# code...
	echo "<p>Logged in <a href='index.php?logout=1'>Log Out</a></p>";
} else {
	header("Location: index.php");
}
   include("header.php");
?>
   <div class="container-fluid">

   	<textarea id="diary" class="form-control"></textarea>

   </div>
   <?php

   include("footer.php");
  ?>