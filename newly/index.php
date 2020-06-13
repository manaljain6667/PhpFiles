<?php

 
mysqli_connect("localhost","root","manaL@12345");
 if(!mysqli_connect_error()){
 	echo "Database connected";
 }
 else
 	echo "errror";

?>