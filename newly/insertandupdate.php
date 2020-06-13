<?php
$servername = "localhost";
$username = "root";
$password = "manaL@12345";
$dbname = "new";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $sql = "INSERT INTO pets(Name,Breed,Sex,DOB) VALUES('tommy','password','m','22-01-12')";
$sql="UPDATE pets SET Name='hhhgmailcom' where Name='tommy'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>