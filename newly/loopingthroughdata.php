<?php

$dbname="new";   
$link=mysqli_connect("localhost","root","manaL@12345",$dbname);
 if(mysqli_connect_error()){
 	die ("Database not connected");
 }
    $text='hii';
    $query="select * from pets where text='".mysqli_real_escape_string($link,$text)."'";
    $result=mysqli_query($link,$query);
    if($result){

    	while($row=mysqli_fetch_array($result)){
    	print_r($row);}
    }

?>