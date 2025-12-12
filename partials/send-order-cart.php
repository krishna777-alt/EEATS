<?php
include "../admin/connection/connect.php";

if(!isset($_SESSION["HTTP_REFERER"]))
  {
    $_SESSION["HTTP_REFERER"] = $_SERVER["HTTP_REFERER"];
  }

//   echo $_SESSION["restaurant_id"];
echo $menu_id = $_GET["food_id"];
echo$user_id = $_SESSION["user_id"];

 $menu_sql = "SELECT * FROM menu_tb WHERE id=$menu_id";
 $menu_result = mysqli_query($conn, $menu_sql);
 if($menu_result == TRUE)
   {
     $orderd_items = mysqli_fetch_array($menu_result);
     
     $title = $orderd_items["title"];
     $price = $orderd_items["price"];
     $image = $orderd_items["image"];
     $status = "Pending";
    //  echo$res_id =$_SESSION["restaurant_id"];
    echo $res_id =$orderd_items["res_id"];
     echo$sql = "INSERT INTO order_tb (title,price,image,status,menu_id,user_id,res_id)
      VALUES('$title',$price,'$image','$status','$menu_id','$user_id','$res_id')";
     $res = mysqli_query($conn, $sql);

     if($res == TRUE)
       {
      echo  $previous_page = $_SESSION["HTTP_REFERER"];
         $_SESSION["order"] = "<div class='success'>Food Orderd</div>";
         
         if($previous_page == "menu.php" || $previous_page == "index.php")
          {
            header("location:".$SITEURL.$previous_page);
          }
          else
            {
              
              // echo"eee";
            // header("location:".$previous_page);
            header("location:".$SITEURL."menu.php");
          } 
       }
       else
        {
            echo $prev_page;
        }
    }

?>