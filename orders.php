<link rel="stylesheet" href="css/orders.css">
<?php include
 "partials/header.php";
 if(!isset($_SESSION["user"]))
         {
           header("location:".$SITEURL."user-login.php");
         }
  if(isset($_SESSION["order-cancel"]))
    {
      echo $_SESSION["order-cancel"];
      unset($_SESSION["order-cancel"]);
    }       
 ?>

<section class="order-section">
  <div class="order-container">
    <h1 class="order-title">My Orders 📦</h1>
     <?php 
        $user_id = $_SESSION["user_id"];

          $order_sql = "SELECT * FROM order_tb WHERE user_id=$user_id AND status='Pending'";
          $order_result = mysqli_query($conn, $order_sql);
         
          $count = mysqli_num_rows($order_result);
          if($count>0)
            {

              while($order_row = mysqli_fetch_array($order_result))
                {
                  $date = date("d M Y h:i A",strtotime($row["date"]));
                  ?>
                    <div class="order-card">
                    <div class="order-header">
                  
                      <span class="order-id">Order #<?php echo $order_row["menu_id"];?></span>
                      <span class="order-status delivered"><?php echo $order_row["status"];?></span>
                       <a href="<?php echo $SITEURL;?>partials/order-cancel.php?id=<?php echo $order_row['id'];?>"
                        class="cancel-btn" onclick="return confirm('Are you sure you want to cancel this order?');">Cancel</a>
                    </div>
                    <div class="order-body">
                      <img src="images/menu/<?php echo $order_row["image"];?>" alt="Pizza" class="order-img">
                      <div class="order-details">
                        <h2><?php echo $order_row["title"];?></h2>
                        <!-- <p>Qty: 2</p> -->
                        <!-- <p>Price: ₹<?php echo $order_row["price"];?></p> -->
                        <p class="order-time">Ordered on:<?php echo $date;?></p>
                      </div>
                    </div>
                  </div>
                  <?php
                }
            }
            else
             {
              include "partials/empty-order.php";
             }
              ?>
          

  </div>
</section>
<!-- <div class="order-card">
      <div class="order-header">
        <span class="order-id">Order #12346</span>
        <span class="order-status pending">Pending</span>
      </div>
      <div class="order-body">
        <img src="images/category/burger1.jpg" alt="Burger" class="order-img">
        <div class="order-details">
          <h2>Veg Supreme Burger</h2>
          <p>Qty: 1</p>
          <p>Price: ₹199</p>
          <p class="order-time">Ordered on: 15 June 2025, 1:22 PM</p>
        </div>
      </div>
    </div> -->
