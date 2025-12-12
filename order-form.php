<?php 
include "admin/connection/connect.php";

 $user_id =$_GET["id"];
?>

<style>
body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  /* background: url('images/hero-healthy-food.jpg') no-repeat left center; */
  background-size: cover;
  /* background-color:rgba(245, 245, 245, 0.49); */
  background-color: #f5f5f5;
  height: 100vh;
  /* overflow: hidden; */
}

.fill-form-section {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: rgba(255, 255, 255, 0.9);
}

.form-wrapper {
  display: flex;
  max-width: 1350px;
  width: 100%;
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* .form-left {
  flex: 1;
  background: rgba(0, 0, 0, 0.91);
  color: white;
  background: url('images/person-eating.jpg') no-repeat center center;
  background-color:rgb(164, 102, 102);
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 2rem;
} */
/* .form-left {
  flex: 1;
  
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 2rem;
} */


.form-left {
  flex: 1;
  position: relative;
  background: url('images/person-eating.jpg') no-repeat center center;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  padding: 2rem;
}

.form-left::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.6); /* dark overlay */
  z-index: 1;
}

.welcome-text {
  position: relative;
  z-index: 2;
  max-width: 80%;
  text-align: center;
}

.welcome-text h2 {
  font-size: 2rem;
  margin-bottom: 1rem;
  color: #fff;
}

.welcome-text p {
  font-size: 1rem;
  line-height: 1.5;
  color: #eee;
}

/* //////////////////////////////////////////// */
.welcome-text {
  max-width: 80%;
}

.welcome-text h2 {
  font-size: 2rem;
  margin-bottom: 1rem;
}

.welcome-text p {
  font-size: 1rem;
  line-height: 1.5;
}

.form-right {
  flex: 1;
  padding: 2rem;
  overflow-y: auto;
  max-height: 90vh;
}

.form-group,
.form-row {
  margin-bottom: 1rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 600;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 0.6rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
}

.form-row {
  display: flex;
  gap: 1rem;
}

.place-order-btn {
  background-color: #e53935;
  color: white;
  border: none;
  padding: 0.9rem 2rem;
  font-size: 1rem;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.place-order-btn:hover {
  background-color: #c62828;
}

@media (max-width: 768px) {
  .form-wrapper {
    flex-direction: column;
  }
  .form-left {
    display: none;
  }
}
</style>
 <?php 
    if(isset($_SESSION["form-filled"]))
      {
        echo $_SESSION["form-filled"];
        unset($_SESSION["form-filled"]);
      }
  ?>

<section class="fill-form-section">
  <div class="form-wrapper">
    <div class="form-left">
      <div class="welcome-text">
        <h2>Welcome Back!</h2>
        <p>Complete your order by entering delivery and payment details below. Every dish is a story – make yours delicious!</p>
      </div>
    </div>

    <div class="form-right">
      <form action="partials/fill-form.php" method="POST">

        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" name="full_name" required>
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="text" id="phone" name="phone" required>
        </div>

        <div class="form-group">
          <label for="address">Street Address</label>
          <input type="text" id="address" name="address" required>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" required>
          </div>

          <div class="form-group">
            <label for="state">State</label>
            <input type="text" id="state" name="state" required>
          </div>

          <div class="form-group">
            <label for="zip">Zip Code</label>
            <input type="text" id="zip" name="zip" required>
          </div>
        </div>

        <div class="form-group">
          <label for="account">UPI ID / Account Number</label>
          <input type="text" id="account" name="account" placeholder="e.g., yourname@upi" required>
        </div>

        <div class="form-group">
          <label for="instructions">Delivery Instructions (optional)</label>
          <textarea id="instructions" name="instructions" rows="3" placeholder="Landmark, call before arriving, etc."></textarea>
        </div>
          <button type="submit" name="submit" class="place-order-btn">Place Order</button>
        
      </form>
    </div>
  </div>
</section>



 <!-- echo $sql = "INSERT INTO order_form_tb(full_name,username,email,phone,street_address,city,state,zip_code,account,delivery_inst,user_id)
      VALUES('$full_name','$username','$email','$phone','$address','$city','$state','$zip','$account','$instructions','$user_id')"; -->
<?php
// ('$full_name','$username','$email','$phone','$address','$city','$state','$zip','$account','$instructions','$user_id')
// if (isset($_POST["submit"])) {
//     // Check if user ID was passed in URL
//     if (!isset($_GET["id"]) || empty($_GET["id"])) {
//         echo "<div class='error'>User ID is missing.</div>";
//         exit;
//     }

//     $user_id = mysqli_real_escape_string($conn, $_GET["id"]);

//     // Sanitize form inputs
//     $full_name       = mysqli_real_escape_string($conn, $_POST["full_name"]);
//     $username        = mysqli_real_escape_string($conn, $_POST["username"]);
//     $email           = mysqli_real_escape_string($conn, $_POST["email"]);
//     $phone           = mysqli_real_escape_string($conn, $_POST["phone"]);
//     $street_address  = mysqli_real_escape_string($conn, $_POST["address"]);
//     $city            = mysqli_real_escape_string($conn, $_POST["city"]);
//     $state           = mysqli_real_escape_string($conn, $_POST["state"]);
//     $zip_code        = mysqli_real_escape_string($conn, $_POST["zip"]);
//     $account         = mysqli_real_escape_string($conn, $_POST["account"]);
//     $delivery_inst   = mysqli_real_escape_string($conn, $_POST["instructions"]);

//     // Insert query
//     $sql = "INSERT INTO order_form_tb (
//                 full_name, username, email, phone, 
//                 street_address, city, state, zip_code, 
//                 account, delivery_inst, user_id
//             ) VALUES (
//                 '$full_name', '$username', '$email', '$phone',
//                 '$street_address', '$city', '$state', '$zip_code',
//                 '$account', '$delivery_inst', '$user_id'
//             )";

//     $result = mysqli_query($conn, $sql);

//     if ($result === TRUE) {
//         echo "<div class='success'>Order placed successfully!</div>";
//         // You can redirect here if needed: header("Location: success.php");
//     } else {
//         echo "<div class='error'>Failed to place order: " . mysqli_error($conn) . "</div>";
//     }
// }
?>

