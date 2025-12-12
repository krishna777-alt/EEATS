<?php
include "../admin/connection/connect.php";

 echo $dele_id = $_GET["id"];

 $dele_sql = "DELETE FROM menu_tb WHERE id=$dele_id";
 $res = mysqli_query($conn,$dele_sql);

 if($res == TRUE)
   {
    echo "Deleted!";
     $_SESSION["delete-food"] ="<div class='success'>Food Deleted</div>";
     header("location:".$SITEURL."restaruant/manage-food.php");
   }
  else
   {
     $_SESSION["delete-food"] ="<div class='error'>Failed To Delete!</div>";
     header("location:".$SITEURL."restaruant/delete-food.php");
   } 
?>