<?php
    include "../admin/connection/connect.php";

    $delete_cart_id =  $_GET["id"];

    $sql = "DELETE FROM cart_tb WHERE id=$delete_cart_id";
    $res = mysqli_query($conn, $sql);
    
    if($res == TRUE)
      {
        $_SESSION["delete_item"] = "<div class='success'>Item Removed</div>";
        header("location:".$SITEURL."cart.php");
      }
    else
      {
        $_SESSION["delete_item"] = "<div class='success'>Fail To Removed Item</div>";
      }  
?>