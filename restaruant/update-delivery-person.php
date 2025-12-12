<?php include "../admin/connection/connect.php";?>
<style>
.udp-container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
}

.udp-title {
    text-align: center;
    margin-bottom: 20px;
    font-size: 22px;
    color: #333;
}

.udp-form-group {
    margin-bottom: 15px;
}

.udp-form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 6px;
}

.udp-form-group input[type="text"],
.udp-form-group input[type="file"],
.udp-form-group input[type="email"],
.udp-form-group input[type="address"] {
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.udp-photo-preview {
    margin-bottom: 10px;
}

.udp-photo-preview img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ddd;
}

.udp-form-actions {
    text-align: center;
    margin-top: 20px;
}

.udp-update-btn {
    background: #28a745;
    color: white;
    border: none;
    padding: 10px 14px;
    border-radius: 6px;
    cursor: pointer;
}

.udp-update-btn:hover {
    background: #218838;
}

.udp-cancel-btn {
    margin-left: 10px;
    background: #6c757d;
    color: white;
    text-decoration: none;
    padding: 10px 14px;
    border-radius: 6px;
}

.udp-cancel-btn:hover {
    background: #5a6268;
}
</style>

<div class="udp-container">
    <?php
      if($_SESSION["person_updated"])
         {
            echo$_SESSION["person_updated"];
            unset($_SESSION["person_updated"]);
         }
    ?>
    <h2 class="udp-title">Update Delivery Person</h2>
    <?php
    $delivery_id = $_GET["id"];

    $sql = "SELECT * FROM delivery_person_tb WHERE id='$delivery_id'";
    $res = mysqli_query($conn,$sql);
    
    $deliveryPerson = mysqli_fetch_array($res);
         
    ?>
    <form action="" method="POST" enctype="multipart/form-data" class="udp-form">
        <!-- Hidden ID Field -->
        <input type="hidden" name="delivery_person_id" value="<?php echo $deliveryPerson['id']; ?>">

        <!-- Name -->
        <div class="udp-form-group">
            <label for="udp-name">Full Name</label>
            <input type="text" id="udp-name" name="name" value="<?php echo $deliveryPerson['full_name']; ?>" required>
        </div>

        <!-- Phone -->
        <div class="udp-form-group">
            <label for="udp-phone">Phone Number</label>
            <input type="text" id="udp-phone" name="phone" value="<?php echo $deliveryPerson['phone']; ?>" required>
        </div>

        <!-- Vehicle Info -->
        <div class="udp-form-group">
            <label for="udp-vehicle">Vehicle Info</label>
            <input type="text" id="udp-vehicle" name="vehicle" value="<?php echo $deliveryPerson['vehicle']; ?>" required>
        </div>

         <div class="udp-form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $deliveryPerson['email']; ?>">
        </div>

        <div class="udp-form-group">
            <label>Home Address</label>
            <input type="address" name="address" value="<?php echo $deliveryPerson['address']; ?>">
         </div>
        <!-- Profile Photo -->
        <!-- <div class="udp-form-group">
            <label for="udp-photo">Profile Photo</label>
            <div class="udp-photo-preview">
                <img src="uploads/<?php echo $deliveryPerson['photo']; ?>" alt="Current Photo">
            </div>
            <input type="file" id="udp-photo" name="photo" accept="image/*">
        </div> -->

        <!-- Submit -->
        <div class="udp-form-actions">
            <button type="submit" name="submit" class="udp-update-btn">Update Delivery Person</button>
            <a href="delivery-person.php" class="udp-cancel-btn">Cancel</a>
        </div>
    </form>
</div>

<?php 

 if(isset($_POST["submit"]))
    {
      $new_name    = $_POST["name"];
      $new_phone   = $_POST["phone"];
      $new_vehicle = $_POST["vehicle"];
      $new_email   = $_POST["email"];
      $new_address   = $_POST["address"]; 

      $update_sql = "UPDATE delivery_person_tb SET
       full_name='$new_name',phone='$new_phone',vehicle='$new_vehicle',email='$new_email',address='$new_address' WHERE id='$delivery_id'";
    $res =mysqli_query($conn,$update_sql);
       if($res == TRUE)
         {
           $_SESSION["person_updated"] = "<div class='success'>Delivery Person Updated</div>";
           header("Location: " . $SITEURL . " restaruant/delivery-person.php");
         }
        else
          {
            $_SESSION["person_updated"] = "<div class='error'>Failed TO Update Delivery Person, Please Try Again Later!</div>";
          }    
    } 

?>
