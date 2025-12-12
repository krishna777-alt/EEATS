<?php
include "../admin/connection/connect.php";

echo $order_id = $_GET["order_id"];

$sql = "UPDATE order_tb SET status='Delivered' WHERE id='$order_id'";
$res = mysqli_query($conn,$sql);

if($res == TRUE)
  {
    $_SESSION["food-deliverd"]="<div class='success'>Item Delivered</div>";
    header("Location:".$SITEURL."restaruant/orders.php");
  }   
 else
  {
    $_SESSION["food-deliverd"]="<div class='error'>Failed to Delivere Item!</div>";
    header("Location:".$SITEURL."restaruant/orders.php");
  }    
?>