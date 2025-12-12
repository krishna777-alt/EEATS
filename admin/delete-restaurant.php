<?php
  include "connection/connect.php";

  $id = $_GET["id"];

  $dele_sql = "DELETE FROM restaruant_tb WHERE id='$id'";
  $res = mysqli_query($conn,$dele_sql);
  
  if($res == TRUE)
    {
        header("location:".$SITEURL."admin/manage-resturants.php");
        $_SESSION["rest_dele"] ="<div class='sucess'>Resturant Deleted</div>";
    } 
  else
    {
        header("location:".$SITEURL."admin/manage-resturants.php");
        $_SESSION["rest_dele"] ="<div class='error'>Failed To Deleted,Please Try Later!</div>";
    }  
?>