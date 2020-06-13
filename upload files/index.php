
    
    
<!DOCTYPE html>
<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
       
        $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
        $name = basename($_FILES["fileToUpload"]["name"]);

        move_uploaded_file($tmp_name, "$target_dir/$name");

    if($check !== false) 
    {
        // echo "File is an image - " . $check["mime"] . ".";
         echo "$name";
        echo "$tmp_name";

        $uploadOk = 1;
    } else
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
   
}
?>