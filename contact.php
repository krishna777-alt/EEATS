<?php 
      include "partials/header.php";
      if(!isset($_SESSION["user"]))
         {
           header("location:".$SITEURL."user-login.php");
         }
?>
<body>
<style>
.contact-section {
  padding: 4rem 2rem;
  background: #fff9f9;
  color: #333;
}
.contact-container {
  max-width: 800px;
  margin: auto;
  text-align: center;
}
.contact-container h2 {
  font-size: 2.5rem;
  color: #ff4d4d;
  margin-bottom: 0.5rem;
}
.contact-container p {
  margin-bottom: 2rem;
  color: #666;
}
#contact-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  align-items: center;
}
#contact-form input, #contact-form textarea {
  width: 100%;
  max-width: 600px;
  padding: 0.8rem;
  border-radius: 8px;
  border: 1px solid #ddd;
  font-size: 1rem;
}
#contact-form button {
  padding: 0.75rem 2rem;
  background: #ff4d4d;
  border: none;
  color: #fff;
  font-weight: bold;
  font-size: 1rem;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s ease;
}
#contact-form button:hover {
  background: #e63e3e;
}
.contact-info {
  margin-top: 2rem;
  text-align: left;
  padding: 1rem;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
  font-size: 0.95rem;
}
.contact-info p {
  margin: 0.5rem 0;
}
</style>
<section class="contact-section">
  <?php
    if(isset($_SESSION["contact-added"]))
      {
        echo $_SESSION["contact-added"];
        unset($_SESSION["contact-added"]);
      }
  ?>
  <div class="contact-container">
    <h2>Contact Us</h2>
    <p>We'd love to hear from you! Whether it's feedback, support, or a special request — just reach out. 🍽️</p>
    <form id="contact-form" method="POST">
      <input type="text" id="name" name="name" placeholder="Your Name" required>
      <input type="email" id="email" name="email" placeholder="Your Email" required>
      <textarea id="message" name="message" rows="5" placeholder="Your Message..."></textarea>
      <button name="submit" type="submit">Send Message</button>
     
    </form>
    <div class="contact-info">
      <p><strong>📍 Address:</strong> 123 Foodie Street, Flavor Town</p>
      <p><strong>📞 Phone:</strong> +91 98765 43210</p>
      <p><strong>✉️ Email:</strong> support@fooddash.com</p>
    </div>
  </div>
</section>
<script>
// document.getElementById('contact-form').addEventListener('submit', function(e) {
//   e.preventDefault();
//   const name = document.getElementById('name').value;
//   alert(`📩 Thank you, ${name}! Your message has been sent.`);
//   this.reset();
// });
</script>

</body>
<?php include "partials/footer.php";?>
<?php
  if(isset($_POST["submit"]))
    {
      $user_id = $_SESSION["user_id"];
      $name = $_POST["name"];
      $email = $_POST["email"];
      $message = $_POST["message"];
      $view    = "unread";
      $replay  = "none";
      $sql = "INSERT INTO contact_tb (name,email,message,view,user_id,replay) VALUES('$name','$email','$message','$view','$user_id','$replay')";
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