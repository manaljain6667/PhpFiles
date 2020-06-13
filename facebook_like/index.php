<?php
session_start();  
 
$conn=new mysqli("localhost","root","manaL@12345","facebook_like");

if($conn->connect_error){
	die("connection failed :".$conn->connect_error);
}
if($_SESSION["user"]==""||$_SESSION["user"]==null){
  header("Location:login.php");
}
else
{
     $email=$_SESSION["user"];

     $sql="SELECT id from user where email='$email'";
     $result = mysqli_query($conn, $sql); 
     // if ($conn->query($sql) === TRUE)
     // {
      $row=mysqli_fetch_array($result);
      $_SESSION['user_id'] = $row["id"];
      
    //  } else
    // {
    //       echo "Error: " . $sql . "<br>" . $conn->error;
    //   }
     $query = "SELECT articles.id, articles.title,  
      COUNT(article_likes.id) as likes,  
      GROUP_CONCAT(user.name separator '|') as liked  
      FROM  
      articles  
      LEFT JOIN article_likes  
      ON article_likes.article = articles.id  
      LEFT JOIN user  
      ON article_likes.user = user.id  
      GROUP BY articles.id ";

      error_reporting(E_ERROR | E_PARSE);

     $result = mysqli_query($conn, $query); 
     while($row=mysqli_fetch_array($result))
     {
     	echo "<h2>".$row['title']."</h2>";
     	echo '<a href="index.php?type=article&id='.$row["id"].'">Like</a> ';
     	echo "<p>".$row['likes']." people liked this post</p>";
     	if(count($row['liked']))
     	{
     		$liked=explode("|", $row['liked']);
     		echo "<ul>";
     		foreach ($liked as $like)
     		 {
     		     echo "<li>".$like."</li>";
     		}
     		echo "</ul>";
     	}
      echo ' <a href="index.php?type=article_comment&id='.$row["id"].'">Comment Here</a>';
      $idi=$row["id"];
      $sq="SELECT comment from comment where article_id='$idi'";
      $rt=mysqli_query($conn,$sq);
      while($row=mysqli_fetch_array($rt))
      {
        if ($row["comment"]!=null) 
        {
          echo "<p>".$row["comment"]."</p>";
        }
      }
     }
      
      if(isset($_GET["type"], $_GET["id"]))  
      {  
        $type = $_GET["type"];  
        $id = (int)$_GET["id"];  
        if($type == "article")  
        {  
             $query = "  
             INSERT INTO article_likes (user, article)  
             SELECT {$_SESSION['user_id']}, {$id} FROM articles   
                  WHERE EXISTS(  
                       SELECT id FROM articles WHERE id = {$id}) AND  
                       NOT EXISTS(  
                            SELECT id FROM article_likes WHERE user = {$_SESSION['user_id']} AND article = {$id})  
                            LIMIT 1  
             ";  
             mysqli_query($conn, $query);
        } 
      }  
      if($type == "article_comment")
      {
        ?>
        
        <?php

        $com=mysqli_real_escape_string($conn,$_POST["comment"]);
        $sql="SELECT comment from comment where comment='$com'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0)
        {
          $id=(int)$_GET["id"];
          $sql="INSERT into comment (article_id,comment) values('$id','$com')";
          mysqli_query($conn,$sql);
        }
      } 

    if (isset($_POST["post"]))
    {
      # code...
      $article=mysqli_real_escape_string($conn,$_POST["article"]);
      $sql="INSERT into articles(title) values ('$article')";
      mysqli_query($conn, $sql);
    }
  }

 ?>   
 <h3>Post Your Article</h3>
 <form method="post">
   <textarea name="article" placeholder="post here" rows="5" cols="50"></textarea>
   <input type="submit" name="post" value="post">
 </form> 
 <p>Comment</p> 
 <form method="post" >
          <input type="text" name="comment" id="comment">
          <input type="submit" name="submit">
        </form> 
 <hr>
 <a href="logout.php">Log Out</a>

