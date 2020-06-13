<?php
$dbname="secretdiary";   
         $link=mysqli_connect("localhost","root","manaL@12345",$dbname);
          if(mysqli_connect_error())
         {
 	        die ("Database not connected");
         }
  	?>