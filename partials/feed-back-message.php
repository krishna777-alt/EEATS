<?php
include "../admin/connection/connect.php";
echo "erfo";
  if(isset($_POST["send"]))
    {
      echo $user_id = $_SESSION["user_id"];
      echo$name = $_POST["name"];
      echo$email = $_POST["email"];
      echo$message = $_POST["message"];
      $view    = "unread";
      $replay  = "none";
      echo$sql = "INSERT INTO contact_tb (name,email,message,view,user_id,replay) VALUES('$name','$email','$message','$view','$user_id','$replay')";
      $res = mysqli_query($conn, $sql);

      if($res == TRUE)
         {
           
           $_SESSION["contact-added"] = "<div class='success'>Your Message sented</div>";
           header("location:".$SITEURL."user-accont.php?id=$user_id"); 
         }
      else
         {
            $_SESSION["contact-added"] = "<div class='success'>Error Occured! Message Failed to sent</div>";
            header("location:".$SITEURL."user-accont.php"); 
         }   
    }
   else
    {
        echo "Somthing wrong";
    } 
  
?>