<?php
session_start();
include "../admin/connection/connect.php";

// Example: Fetch restaurant details (replace '1' with logged-in restaurant ID)
$restaurant_id = $_GET["res_id"];
$sql = "SELECT * FROM restaruant_tb WHERE id = $restaurant_id";
$res = mysqli_query($conn, $sql);
$restaurant = mysqli_fetch_assoc($res);

// Update logic

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Restaurant Profile</title>
   <link rel="stylesheet" href="css/update-profile.css">
</head>
<body>
<div class="container">
    <h2>Edit Restaurant Profile</h2>
    <!-- #region -->
     <?php 
       if(isset($_SESSION["failed"]))
         {
            echo$_SESSION["failed"];
            unset($_SESSION["failed"]);
         }
     ?>

    <!-- Edit Profile -->
    <div class="card">
         <form method="POST" enctype="multipart/form-data" class="profile-photo-section">
            <img id="profileImage" src="../uploads/restaruant/<?php echo$restaurant["image"];?>" alt="Profile Photo">
            <input type="file" name="update_image" id="imageUpload">
            <button name="upload" class="upload-btn">Change Photo</button>
         </form>

        <form method="POST">
            <label>Restaurant Name</label>
            <input type="text" name="name" value="<?php echo $restaurant['name']; ?>" required>

            <!-- <label>Description</label>
            <textarea name="description" rows="3"><?php echo $restaurant['description']; ?></textarea> -->

            <label>Address</label>
            <input type="text" name="address" value="<?php echo $restaurant['address']; ?>" required>

            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo $restaurant['phone']; ?>" required>

            <button type="submit" name="update_profile">Update Profile</button>
        </form>

    </div>

    <!-- Change Email -->
    <div class="card">
        <h3>Change Email</h3>
        <form method="POST">
            <label>New Email</label>
            <input type="email" name="new_email" value="<?php echo $restaurant['email']; ?>" required>
            <button type="submit" name="change_email">Update Email</button>
        </form>
    </div>

    <!-- Change Password -->
    <div class="card">
        <h3>Change Password</h3>
        <form method="POST">
            <label>Current Password</label>
            <input type="password" name="current_password" required>

            <label>New Password</label>
            <input type="password" name="new_password" required>

            <button type="submit" name="change_password">Update Password</button>
        </form>
    </div>
</div>
<!-- <img src="" alt=""> -->
</body>
</html>
<?php

 if (isset($_POST['upload'])) {
    $image_name = $_FILES['update_image']["name"];
    
    $destination_path = "../uploads/restaruant/$image_name";
    $temp_lcoation = $_FILES["update_image"]["tmp_name"];
    
    $upload = move_uploaded_file($temp_lcoation,$destination_path);
    
    if($upload == TRUE)
      {
        
         echo$update_sql = "UPDATE restaruant_tb SET image='$image_name' WHERE id='$restaurant_id'";
        $s=mysqli_query($conn, $update_sql);
        if($s==TRUE)
        {
            header("Location:" . $SITEURL . "restaruant/profile.php");
        }   
        exit;
      }   
    else
      {
        $_SESSION["failed"] ="<div class='error'>Failed to Update Profile
          try again later
        </div>";
      }     
   
 }

if(isset($_POST["update_profile"]))
  {
    echo$res_name = $_POST["name"];
    echo$address  = $_POST["address"];
    echo$phone    = $_POST["phone"];

    $sql = "UPDATE restaruant_tb SET name='$res_name',address='$address',phone='$phone' WHERE id='$restaurant_id'";
    $r = mysqli_query($conn,$sql);
    if($r == TRUE)
      {
         header("Location:" . $SITEURL . "restaruant/profile.php");
      }   
  }   

if (isset($_POST['change_email'])) {
    $new_email = $_POST['new_email'];
   echo $update_email_sql = "UPDATE restaruant_tb SET email='$new_email' WHERE id='$restaurant_id'";
    mysqli_query($conn, $update_email_sql);
    header("Location:" . $SITEURL . "restaruant/profile.php");
    exit;
}

if (isset($_POST['change_password'])) {
    $current_pass = md5($_POST['current_password']);
    $new_pass = md5($_POST['new_password']);

    $check_pass_sql = "SELECT * FROM restaruant_tb WHERE id='$restaurant_id' AND password='$current_pass'";
    $check_res = mysqli_query($conn, $check_pass_sql);

    if (mysqli_num_rows($check_res) > 0) {
        $update_pass_sql = "UPDATE restaruant_tb SET password='$new_pass' WHERE id='$restaurant_id'";
        mysqli_query($conn, $update_pass_sql);
        header("Location:" . $SITEURL . "restaruant/profile.php");
    } else {
        $error = "Current password is incorrect!";
    }
}
?>
<script>
document.getElementById('imageUpload').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
