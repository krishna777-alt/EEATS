
<?php 
include "../admin/connection/connect.php";

if(!isset($_SESSION["restaurant_name"]))
    {
      header("location: " . $SITEURL . "restaruant/login.php");
    }

?>
<style>
    .support-container {
  max-width: 900px;
  margin: 40px auto;
  padding: 30px;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 0 10px rgba(0,0,0,0.05);
}

.support-container h2 {
  font-size: 28px;
  margin-bottom: 10px;
  color: #333;
}

.support-desc {
  font-size: 16px;
  margin-bottom: 30px;
  color: #555;
}

.support-content {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
}

.support-info-box,
.support-form-box {
  flex: 1 1 45%;
  background: #fafafa;
  padding: 25px;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0,0,0,0.03);
}

.support-info-box h3,
.support-form-box h3 {
  margin-bottom: 15px;
  color: #222;
}

.support-info-box p {
  font-size: 15px;
  margin-bottom: 10px;
}

.support-info-box a {
  color: #1976D2;
  text-decoration: none;
}

.support-form input,
.support-form textarea {
  width: 100%;
  padding: 12px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 14px;
}

.support-form textarea {
  resize: vertical;
}

.submit-btn {
  background-color: #1976D2;
  color: white;
  border: none;
  padding: 12px 18px;
  font-size: 15px;
  border-radius: 8px;
  cursor: pointer;
}

.submit-btn:hover {
  background-color: #145CBF;
}
@media (max-width: 768px) {
  .support-content {
    flex-direction: column;
  }

  .support-info-box,
  .support-form-box {
    flex: 1 1 100%;
  }
}

</style>
<header>
    <?php include "includes/side-bar.php";?>
</header>
<div class="support-container">
 <?php 
   if($_SESSION["contact-added"])
     {
       echo $_SESSION["contact-added"];
       unset($_SESSION["contact-added"]);
     }
 ?>
  <h2>🧑‍💼 Help & Support</h2>
  <p class="support-desc">Need help with something? Contact us or send a message — we’re here to help you.</p>

  <div class="support-content">
    <!-- Contact Info -->
    <div class="support-info-box">
      <h3>📞 Contact Information</h3>
      <p><strong>Email:</strong> <a href="mailto:support@yourrestaurant.com">support@yourrestaurant.com</a></p>
      <p><strong>Phone:</strong> +1 (234) 567-8901</p>
      <p><strong>Working Hours:</strong> Mon – Fri, 9 AM – 6 PM</p>
      <p><strong>Address:</strong> 123 Food Street, Flavortown, USA</p>
    </div>

    <!-- Contact Form -->
    <div class="support-form-box">
      <h3>📩 Send a Message</h3>
      <form action="#" method="post" class="support-form">
        <input type="text" name="name" placeholder="Your Name" required />
        <input type="email" name="email" placeholder="Your Email" required />
        <textarea name="message" rows="5" placeholder="Your Message..." required></textarea>
        <button type="submit" name="submit" class="submit-btn">Send Message</button>
      </form>
    </div>
  </div>
</div>

<?php
 $res_id = $_SESSION["restaurant_id"];
  if(isset($_POST["submit"]))
    {
      $user_id = $_SESSION["user_id"];
      $name = $_POST["name"];
      $email = $_POST["email"];
      $message = $_POST["message"];
      $view    = "unread";
      $replay  = "none";
      $sql = "INSERT INTO contact_tb (name,email,message,view,user_id,replay) VALUES('$name','$email','$message','$view','$res_id','$replay')";
      $res = mysqli_query($conn, $sql);

      if($res == TRUE)
         {
           
           $_SESSION["contact-added"] = "<div class='success'>Your Message sented</div>";

         }
      else
         {
            $_SESSION["contact-added"] = "<div class='success'>Error Occured! Message Failed to sent</div>";
         }   
    }
  
?>