
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant Dashboard</title>
  <link rel="stylesheet" href="css/index.css" />
  
</head>
<body>
  <header>
    <?php 
    include "../admin/connection/connect.php";
    include "includes/side-bar.php";
    
  if(!isset($_SESSION["restaurant_name"]))
    {
      header("location: " . $SITEURL . "<restaruant/login.php");
    }


    if($_SESSION["login"])
      {
        echo $_SESSION["login"];
        unset($_SESSION["login"]);
      }
      $res_id =$_SESSION["restaurant_id"];
    ?>
  </header>
  <div class="main-content">
    <div class="dashboard-header">
      <h1>Welcome, <?php echo $_SESSION["restaurant_name"]; ?> 👋</h1>
      <p>Here is your dashboard overview</p>
      <br>
    </div>
    <?php
      $sql_orders = "SELECT COUNT(*) AS total_orders FROM order_tb where res_id='$res_id'";
      $order_res = mysqli_query($conn,$sql_orders);
      $order_row = mysqli_fetch_array($order_res);

      $sql_order = "SELECT COUNT(*) AS total_pending,SUM(PRICE) AS total_price FROM order_tb WHERE status='Pending'";
      $order = mysqli_query($conn,$sql_order);
      $order_rows = mysqli_fetch_array($order);

      $sql_menu = "SELECT COUNT(*) AS total_menu FROM menu_tb WHERE res_id='$res_id'";
      $menu =  mysqli_query($conn,$sql_menu);
      $menu_rows = mysqli_fetch_array($menu);
    ?>
    <div class="dashboard-cards">
      <div class="card">
        <h3>Total Orders</h3>
        <p><?php echo $order_row["total_orders"];?></p>
      </div>
      <div class="card">
        <h3>Revenue</h3>
        <p>$<?php echo $order_rows["total_price"];?></p>
      </div>
      <div class="card">
        <h3>Menu Items</h3>
        <p><?php echo $menu_rows["total_menu"];?></p>
      </div>
      <div class="card">
        <h3>Pending Orders</h3>
        <p><?php echo $order_rows["total_pending"];?></p>
      </div>
    </div>
  </div>
</body>
</html>
