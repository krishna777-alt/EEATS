<?php
include("connection/connect.php");

  $delete_id =  $_GET["id"];

  $sql = "DELETE FROM category_tb WHERE id='$delete_id'";
  $delete = mysqli_query($conn, $sql);

  if($delete == TRUE)
    {
        $_SESSION["delete"]="<div class='success'>Admin Deleted Successfully</div>";
        header("location:".$SITEURL."admin/categories.php");
    }
   else
    {
        $_SESSION["delete"]="<div class='success'>Fail to Deleted Admin!</div>";
        header("location:".$SITEURL."admin/categories.php");
    } 
?>