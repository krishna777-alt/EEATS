<?php
include "connection/connect.php";
  $user_id=$_GET["id"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f5f7fa;
      color: #333;
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 1.5rem;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    h2 {
      margin-top: 2rem;
      margin-bottom: 1rem;
      border-bottom: 2px solid #007bff;
      display: inline-block;
      padding-bottom: 4px;
      color: #007bff;
    }

    .user-info, .user-orders, .user-cart, .user-comments {
      margin-bottom: 2rem;
    }

    .grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.2rem;
    }

    .info-box {
      background: #f1f4f8;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
    }

    .info-box label {
      font-weight: bold;
      display: block;
      margin-bottom: 0.3rem;
    }

    .info-box p {
      margin: 0;
      color: #555;
    }

    .card {
      background: #fff;
      padding: 1rem;
      border: 1px solid #ddd;
      border-radius: 10px;
      margin-bottom: 1rem;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
    }

    .card h4 {
      margin-bottom: 0.5rem;
      color: #444;
    }

    .card p {
      margin: 0.3rem 0;
      font-size: 0.95rem;
    }

    @media (max-width: 768px) {
      .grid-2 {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>User Profile Overview</h1>

    <!-- User Info -->
     <?php 
       $sql = "SELECT * FROM order_form_tb WHERE user_id=$user_id";
       $res = mysqli_query($conn, $sql);

       $row=mysqli_fetch_array($res);
     ?>
    <div class="user-info">
      <h2>👤 User Credentials</h2>
      <div class="grid-2">
        <div class="info-box">
          <label>User ID:</label>
          <p>#<?php echo $row["user_id"];?></p>
        </div>
        <div class="info-box">
          <label>Full Name:</label>
          <p><?php echo $row["full_name"];?></p>
        </div>
        <div class="info-box">
          <label>Email:</label>
          <p><?php echo $row["email"];?></p>
        </div>
        <div class="info-box">
          <label>Phone:</label>
          <p>+91 <?php echo $row["phone"];?></p>
        </div>
        <div class="info-box">
          <label>Address:</label>
          <p><?php echo $row["zip_code"];?></p>
           <p><?php echo $row["city"];?></p>
           <p><?php echo $row["street_address"];?></p>
           <p><?php echo $row["state"];?></p>
        </div>
        <div class="info-box">
          <label>Account Number/UPID:</label>
          <p><?php echo $row["account"];?></p>
        </div>
      </div>
    </div>

    <!-- Orders -->
    
    <div class="user-orders">
      <h2>📦 Orders</h2>
       <?php 
       $sql = "SELECT * FROM order_tb WHERE user_id=$user_id";
       $res = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($res);
       

       if($count>0)
         {
           while($row=mysqli_fetch_array($res))
             {

              ?>
                 <div class="card">
                  <h4>Order #<?php echo $row["id"];?></h4>
                  <p>Date: <?php echo $row["date"];?></p>
                  <p>Items:<?php echo $row["title"]; ?></p>
                  <p>Total: ₹<?php echo $row["price"]; ?></p>
                  <p>Status: <?php echo $row["status"]; ?></p>
                </div>
              
              <?php

             }
         }
     ?>
      
     
      <!-- <div class="card">
        <h4>Order #45650</h4>
        <p>Date: 2025-06-20</p>
        <p>Items: Burger, Fries</p>
        <p>Total: ₹299</p>
        <p>Status: Cancelled</p>
      </div>
    </div> -->

    <!-- Cart -->
    <div class="user-cart">
      <h2>🛒 Cart</h2>
      <?php
       $sql = "SELECT * FROM cart_tb WHERE user_id=$user_id";
       $res = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($res);
       

       if($count>0)
         {
           while($row=mysqli_fetch_array($res))
             {

              ?>
                 <div class="card">
                  <h4><?php echo $row["title"]; ?></h4>
                  <p>Quantity: <?php echo $row["quantity"]; ?></p>
                  <p>Price: ₹<?php echo $row["price"]; ?> x <?php echo $row["quantity"]; ?> = ₹<?php echo $row["subtotal"]; ?></p>
                </div>
              
              <?php

             }
         }
     ?>
     
      <!-- <div class="card">
        <h4>Cold Coffee</h4>
        <p>Quantity: 1</p>
        <p>Price: ₹120</p>
      </div>
    </div> -->

    <!-- Comments -->
    <div class="user-comments">
      <h2>💬 Comments</h2>
       <?php
      //  $sql = "SELECT * FROM comment_tb WHERE user_id=$user_id";
      $sql = "SELECT menu_tb.title,comment_tb.comment FROM menu_tb JOIN comment_tb ON menu_tb.id=comment_tb.menu_id";
       $res = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($res);
       
      //  $array = $row=mysqli_fetch_array($res);
      //   $menu_id = $row["menu_id"];
      //   $sql2 = "SELECT title FROM menu_tb WHERE id=$menu_id";
      //   $res2 = mysqli_query($conn, $sql2);
      //   $array2 = $row2=mysqli_fetch_array($res2);
      //   $menu_title = $array2["title"];
       if($count>0)
         {
           while($row=mysqli_fetch_array($res))
             {
                
              ?>
                 <div class="card">
                  <h4>On:<?php echo $row["title"];?></h4>
                  <p>"<?php echo $row["comment"];?>"</p>
                  <!-- <p><small>Posted on: 2025-06-15</small></p> -->
                </div>
              
              <?php

             }
         }
     ?>
      
      <div class="card">
        <h4>On: Burger</h4>
        <p>"Could use more sauce, otherwise great!"</p>
        <p><small>Posted on: 2025-06-10</small></p>
      </div>
    </div>
  </div>
</body>
</html>
