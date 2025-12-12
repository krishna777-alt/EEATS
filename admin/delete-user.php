<?php
  
  include("connection/connect.php");

  $delete_id =  $_GET["id"];

  $sql = "DELETE FROM user_tb WHERE id='$delete_id'";
  $delete = mysqli_query($conn, $sql);

  if($delete == TRUE)
    {
        $_SESSION["delete"]="<div class='success'>User Deleted Successfully</div>";
        header("location:".$SITEURL."admin/users.php");
    }
   else
    {
        $_SESSION["delete"]="<div class='success'>Fail to Deleted User!</div>";
        header("location:".$SITEURL."admin/users.php");
    } 

?>