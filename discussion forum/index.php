<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "manaL@12345";
$dbname = "discussion_forum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$user=$_SESSION["user"];
if($user==NULL){
  header('Location: login.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Discussion forum</title>
	
</head>
<body>
     
     <h1 style="font-size: 60px; text-align: center; color: blue; " >Discussion forum</h1>
       <h2 style="text-align: center;">Welcome! <?php echo $_SESSION["user"]; ?> To the forum</h2><hr>

        <?php

       if (isset($_POST["ques"]))
        {

           $question=mysqli_real_escape_string($conn,$_POST['question']);
            $query="SELECT username from disussion WHERE questions='$question'";
            $result=mysqli_query($conn,$query);
          if (mysqli_num_rows($result)==0) 
          {
       	   $sql="INSERT INTO disussion(username,questions) VALUES('$user','$question')";
       	   if ($conn->query($sql) === TRUE)
       	   {
       	   	   $last_id = mysqli_insert_id($conn);
       	   	   $sql1="UPDATE disussion SET q_id='$last_id' where questions='$question'";
       	   	   $conn->query($sql1);
       	   }else 
       	   {
             echo "Error: " . $sql . "<br>" . $conn->error;
           }
          }

        }

     ?>

       <?php

         $sql="SELECT * FROM disussion";
          $result =mysqli_query($conn,$sql);
          $i_d="";
          while ($row = mysqli_fetch_array($result))
           {
           	 
          	 if ($row['answers']==NULL)
          	 {

              $i_d=$row['id'];
          	 	echo "<h1>Question</h1>";
          	 	echo "<h2>".$i_d.".".$row['questions']."</h2>";
             
	          	  $q="SELECT * FROM disussion where q_id='$i_d'";
	          	  $res=mysqli_query($conn,$q);
                  echo "<h2>Answers</h2>";
                  $c=0;
                  $i=1;
	          	   while($row = mysqli_fetch_array($res))
	          	   {
                  if($row['questions']==NULL)
	          	   	{
	          	  	echo "<h3>".$i.".  ".$row['answers']."</h3>";
                  $i++;
                  $c++;
	          	    }
	          	   }
                 if($c==0){
                    echo "No answers yet!";
                  }
              ?>
         <form method="post" action="index.php">
          <input type="text" name="answer">
          <input type="hidden" name="hid" value="<?php echo($i_d) ?>"><br>
          <input type="submit" name="an" value="submit Your answer">
        </form> 
           <?php 
           }  
        }
          if(isset($_POST["an"]))
               {
              
               $hid=mysqli_real_escape_string($conn,$_POST['hid']);
               $ans=mysqli_real_escape_string($conn,$_POST['answer']);
                  
                     $qy="SELECT username from disussion WHERE answers='$ans'";
                     $rt=mysqli_query($conn,$qy);
                     if (mysqli_num_rows($rt)==0&&$ans!='')
                      {
                     $sq="INSERT INTO disussion(username,answers,q_id) VALUES('$user','$ans','$hid')";
                     $resu=$conn->query($sq);
                     header('Location: index.php');
                      }
                 
              }
             
             

       ?>

    <!-- question section -->
   
   <h2>Post your question</h2>
   <form method="get">
   	<input type="text" name="question">
   	<input type="submit" name="ques" value="post">
   </form>
     


    <hr>
<a href="logout.php">Log Out</a>
</body>
</html>
