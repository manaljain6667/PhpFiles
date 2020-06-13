<?php
session_start();
 if (isset($_POST["submit"])) {
        # code...
    $s=$_POST["string"];
    // form ki value refresh tabhi hogi jab submit button click hoga islie string value aur captcha compare ho pa raha hai
    // warna har war refresh hone pe nya dedega
    //$captcha=$_POST["Captcha"];
    if($_POST['Captcha'] == $s){
             //"correct captcha";
        }else{
            echo "Invalid captcha";
        }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Captcha</title>
</head>
<body>
	<form method="post">
		 <input type="text" name="string" value="<?php echo($_SESSION["code"])?>"><br>
        <img src="captchaimage.php"/><br>
        Type the given captcha:<input type="text" name="Captcha"><br>
        <input type="submit" name="submit" value="Check !">
	</form>
</body>
</html>

   

