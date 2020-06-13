<?php

session_start();
// $_SESSION['username']="manal";

echo $_SESSION['username'];

?>
<?php
// to change a session variable, just overwrite it 
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);
?>