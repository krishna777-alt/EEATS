<?php
include "../admin/connection/connect.php";

if(!isset($_SESSION["HTTP_REFERER"]))
  {
    $_SESSION["HTTP_REFERER"] = $_SERVER["HTTP_REFERER"];
  }

 $cart_id =  $_GET["id"];
 $_SESSION["menu_food_id"]=$cart_id; 
 $sql_menu = "SELECT * FROM menu_tb where id=$cart_id";
 $res = mysqli_query($conn, $sql_menu);

  $row = mysqli_fetch_array($res); 

  $title = $row["title"];
  $image = $row["image"];
  echo $price = $row["price"];
  $quantity = 2;
  
  $subtotal = $price * $quantity;
  $delivery = 40;

  echo $user_id =$_SESSION["user_id"];
  $sql_cart = "INSERT INTO cart_tb (title,image,price,quantity,subtotal,delivery,user_id,menu_id) VALUES('$title','$image','$price','$quantity','$subtotal','$delivery','$user_id','$cart_id')";
  $res2 = mysqli_query($conn, $sql_cart);

  if($res2 == TRUE)
    {  
       echo $previous_page = $_SESSION["HTTP_REFERER"];
        $_SESSION["cart-added"]="<div class='success'>Food Added To Cart</div>";
        if($previous_page == "menu.php" || $previous_page == "index.php")
          {
            header("location:".$SITEURL.$previous_page);
          }
         else
          {

            // header("location:".$previous_page);
            header("location:".$SITEURL."menu.php");
          } 
    } 
    else
    {
        echo $previous_page;
    }
?>

