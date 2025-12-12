<?php
  include "../admin/connection/connect.php";

 $res_is = $_SESSION["restaurant_id"];
if(!isset($_SESSION["restaurant_id"]))
   {
     header("Location:".$SITEURL."restaruant/login.php");
   }
  // Sample data from session/database
  $restaurant = [
    "name" => "GreenBite Cafe",
    "email" => "greenbite@example.com",
    "phone" => "+1 555 123 4567",
    "location" => "123 Maple Street, NY",
    "description" => "Serving fresh, organic meals since 2015",
    "image" => "uploads/restaurants/greenbite-logo.png", // or default
  ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Restaurant Profile</title>
  <link rel="stylesheet" href="css/profile.css" />
  
</head>
<?php 
  

    // if(!isset($_SESSION["restaurant_name"]))
    // {
    //   header("location: " . $SITEURL . "login.php");
    // }
     $restaurant_id= $_SESSION["restaurant_id"];
    $sql = "SELECT * FROM restaruant_tb WHERE id = $restaurant_id";

   $res = mysqli_query($conn,$sql);

   $restaurant = mysqli_fetch_array($res);
  ?>
<body>
  <?php 
  include "includes/side-bar.php";
  session_start();
  ?>
 <div class="container">
  
  <div class="profile-header">
    <img src="../uploads/restaruant/<?php echo htmlspecialchars($restaurant['image']); ?>" alt="Restaurant Logo">
    <div>
      <h2><?php echo htmlspecialchars($restaurant['name']); ?></h2>
      <p><?php echo htmlspecialchars($restaurant['description']); ?></p>
    </div>
  </div>

  <div class="info-section">
    <h3>📋 Restaurant Information</h3>
    <div class="info-row">
      <div class="info-box">
        <label>Email</label>
        <p><?php echo htmlspecialchars($restaurant['email']); ?></p>
      </div>
      <div class="info-box">
        <label>Phone</label>
        <p><?php echo htmlspecialchars($restaurant['phone']); ?></p>
      </div>
      <div class="info-box">
        <label>Location</label>
        <p><?php echo htmlspecialchars($restaurant['location']); ?></p>
      </div>
    </div>
  </div>

  <a href="update-profile.php?res_id=<?php echo$restaurant_id;?>" class="edit-btn">✏️ Edit Profile</a>
</div>

</body>
</html>
