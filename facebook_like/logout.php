<?php
   session_start();
   
   $p=session_destroy();
   $_SESSION = array();
   if(p) {
      header("Location: login.php");
   }
?>