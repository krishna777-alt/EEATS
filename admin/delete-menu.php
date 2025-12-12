<?php
include "connection/connect.php";

echo $delete_id =  $_GET["id"];

 $sql = "DELETE FROM menu_tb WHERE id=$delete_id";
 $res = mysqli_query($conn, $sql);

 if($res == TRUE)
   {
    $_SESSION["delete"]="<div class='success'>Menu Deleted</div>";
     header("lcoation:".$SITEURL."admin/menu.php");
   }
   else
    {
        $_SESSION["delete"]="<div class='success'>Error while Deleteing Menu!</div>";
        header("lcoation:".$SITEURL."admin/menu.php");
    }
?>