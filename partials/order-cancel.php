<?php
include "../admin/connection/connect.php";

$delet_id = $_GET["id"];

// $sql = "DELETE FROM order_tb WHERE id=$delet_id";
$update_order = "UPDATE order_tb SET status='Cancelled' WHERE id=$delet_id";
$res = mysqli_query($conn,$update_order);
// $res = mysqli_query($conn,$sql);

if($res == TRUE)
  {
    

    $_SESSION["order-cancel"] = "<div class='success'>Order Canceled</div>";
     header("location:".$SITEURL."orders.php");
  }
?>