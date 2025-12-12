<style>
  .account-container {
  display: flex;
  min-height: 100vh;
  font-family: 'Segoe UI', sans-serif;
  background: #f5f5f5;
}

.account-sidebar {
  width: 250px;
  background: #292929;
  color: white;
  padding: 2rem 1rem;
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.account-avatar {
  text-align: center;
}

.account-avatar img {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 1rem;
}

.account-edit-btn {
  background: #4caf50;
  color: white;
  padding: 0.4rem 1rem;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 0.9rem;
}

.account-nav {
  list-style: none;
  padding: 0;
  margin: 0;
}

.account-nav li {
  padding: 0.8rem 1rem;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 5px;
}

.account-nav li:hover,
.account-nav li.active {
  background: #444;
}

.account-content {
  flex: 1;
  padding: 3rem;
  background: white;
}

.tab-content {
  display: none;
}

.tab-content.active {
  display: block;
}
/* //////////////////////////////////////////////////////////////////////PROFILE */
/* .profile-info-card {
  background: #fff;
  padding: 2rem;
  border-radius: 12px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  font-family: 'Segoe UI', sans-serif;
  color: #333;
  max-width: 600px;
  margin: auto;
}

.profile-info-card h2 {
  font-size: 1.8rem;
  margin-bottom: 1.5rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #2c3e50;
}

.profile-details {
  display: flex;
  flex-direction: column;
  gap: 1.2rem;
}

.profile-row {
  display: flex;
  justify-content: space-between;
  padding: 1rem 1.2rem;
  border: 1px solid #e3e3e3;
  border-radius: 8px;
  background-color: #f9f9f9;
}

.label {
  font-weight: 600;
  color: #555;
}

.value {
  color: #111;
} */
.profile-card {
  max-width: 900px;
  margin: auto;
  background: #fff;
  padding: 2rem;
  border-radius: 16px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
}

.profile-header {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.profile-header img {
  width: 100px;
  height: 100px;
  border-radius: 100%;
  object-fit: cover;
  border: 4px solid #f1f1f1;
}

.profile-header h2 {
  font-size: 1.8rem;
  margin: 0;
  color: #333;
}

.user-role {
  font-size: 1rem;
  color: #777;
}

.join-date {
  font-size: 0.95rem;
  color: #999;
}

.profile-info-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.2rem 2rem;
}

.profile-info-item {
  background: #f9f9f9;
  padding: 1rem;
  border-radius: 8px;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.03);
}

.profile-info-item span {
  font-weight: 600;
  color: #444;
  display: block;
  margin-bottom: 0.4rem;
}

.profile-info-item p {
  margin: 0;
  color: #222;
  font-size: 1rem;
}

/* ////////////////////////////////////////////////////////////////////////////////////////////////////////Contect And support/// */
.support-container {
  padding: 2rem;
  font-family: 'Segoe UI', sans-serif;
  color: #333;
}

.support-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  margin-bottom: 2rem;
}

.support-info, .support-form {
  flex: 1 1 300px;
  background: #f9f9f9;
  padding: 1.5rem;
  border-radius: 10px;
  box-shadow: 0 0 8px rgba(0,0,0,0.05);
}

.support-form input,
.support-form textarea {
  width: 100%;
  padding: 0.75rem;
  margin-bottom: 1rem;
  border-radius: 6px;
  border: 1px solid #ccc;
}

.support-form button {
  background: #007bff;
  color: white;
  padding: 0.7rem 1.5rem;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}

.support-form button:hover {
  background: #0056b3;
}

.support-faq {
  margin-top: 2rem;
}

.faq-item {
  margin-bottom: 1.5rem;
}

.faq-item h4 {
  margin-bottom: 0.5rem;
  color: #007bff;
}
/* .support-info {
  background: #f8f9fb;
  border-radius: 16px;
  padding: 1.8rem 2rem;
  max-width: 500px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  transition: all 0.3s ease;
} */

.support-info h3 {
  font-size: 1.5rem;
  color: #222;
  margin-bottom: 1rem;
  font-weight: 600;
}

.support-info p {
  font-size: 1rem;
  color: #555;
  margin: 0.5rem 0;
}

.support-info a {
  color: #007bff;
  text-decoration: none;
  font-weight: 500;
}

.support-info a:hover {
  text-decoration: underline;
}

</style>
<?php
  include "admin/connection/connect.php"; //  this is included for $conn
  // include "partials/header.php";
  
  $_SESSION["user"];

  if(!isset($_SESSION["user"])) {
    header("Location:" . $SITEURL . "user-login.php");
  }
?>

<?php 
  if (isset($_GET["id"])) {
    $user_id = intval($_GET["id"]); // Sanitize input
    
    // Use mysqli_real_escape_string or prepared statements properly
    $user_query = "SELECT * FROM user_tb WHERE id = ?";
    $stmt = mysqli_prepare($conn, $user_query);

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "i", $user_id);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($res);
    } else {
      echo "Failed to prepare statement.";
      exit;
    }
  } else {
    echo "User ID not provided.";
    exit;
  }

  if($_SESSION["profile-updated"])
    {
      echo $_SESSION["profile-updated"];
      unset($_SESSION["profile-updated"]);
    }
?>

<div class="account-container">
  <aside class="account-sidebar">
    <div class="account-avatar">
      <?php if ($row["image"] === "no profile" || empty($row["image"])): ?>
        <img src="images/user.png" alt="User Avatar" />
      <?php else: ?>
        <img src="uploads/profile/<?php echo htmlspecialchars($row["image"]); ?>" alt="User Avatar" />
      <?php endif; ?>
      
      <h3><?php echo htmlspecialchars($row["full_name"]); ?></h3>
      <br>
      <a href="<?php echo $SITEURL; ?>partials/user-update.php?id=<?php echo $user_id; ?>" style="text-decoration: none; color: inherit;">
        <button class="account-edit-btn">Edit Profile</button>
      </a>
    </div>

    <ul class="account-nav">
      <li data-tab="profile">👤 Profile</li>
      <li data-tab="support">🧑‍💼 Support</li>
      <li data-tab="message">📩 message</li>
      <li data-tab="logout">
        <a href="user-logout.php" style="text-decoration: none; color: inherit;">🚪 Logout</a>
      </li>
    </ul>
  </aside>

<main class="account-content">
  <?php 
    if($_SESSION["contact-added"])
      {
        echo $_SESSION["contact-added"];
        unset($_SESSION["contact-added"]);
      }
  ?>
<div id="profile" class="tab-content active">
  <div class="profile-card">
    <div class="profile-header">
      <?php if ($row["image"] === "no profile" || empty($row["image"])): ?>
        <img src="images/user.png" alt="User Avatar" />
      <?php else: ?>
        <img src="uploads/profile/<?php echo htmlspecialchars($row["image"]); ?>" alt="User Avatar" />
      <?php endif; ?>
      <!-- <img src="<?php $SITEURL;?>uploads/profile/<?php echo $row['image'] ?: 'default-user.png'; ?>" alt="Profile Picture"> -->
      <div>
        <h2><?php echo htmlspecialchars($row["full_name"]); ?></h2>
        <p class="user-role">@<?php echo htmlspecialchars($row["username"]); ?></p>
        <p class="join-date">Joined on: <?php echo date("F j, Y", strtotime($row["date_created"] ?? "now")); ?></p>
      </div>
    </div>

    <div class="profile-info-grid">
      <div class="profile-info-item">
        <span>📛 Full Name:</span>
        <p><?php echo htmlspecialchars($row["full_name"]); ?></p>
      </div>
      <div class="profile-info-item">
        <span>📧 Email:</span>
        <p><?php echo htmlspecialchars($row["email"]); ?></p>
      </div>
      <div class="profile-info-item">
        <span>👤 Username:</span>
        <p><?php echo htmlspecialchars($row["username"]); ?></p>
      </div>
      <div class="profile-info-item">
        <span>📱 Phone:</span>
        <p><?php echo htmlspecialchars($row["phone"] ?? "Not Provided"); ?></p>
      </div>
      <div class="profile-info-item">
        <span>📍 Address:</span>
        <p><?php echo htmlspecialchars($row["address"] ?? "Not Provided"); ?></p>
      </div>
      <div class="profile-row">
        <div class="profile-field">
          <span class="field-label">📍 Address:</span>
          <span class="field-value">Not Provided</span>
        </div>
      </div>
      <a href="partials/user-update.php?id=<?php echo$row["id"]?>">
        <button class="update-btn">Update</button>
      </a>
    </div>
  </div>
</div>


<div id="support" class="tab-content">
  <div class="support-container">
    <h2>🧑‍💼 Help & Support</h2>
    
    <div class="support-grid">
      <!-- Contact Info -->
      <div class="support-info">
        <h3>📞 Contact Information</h3>
        <p>Email: <a style="text-decoration: none; color:#292929" href="mailto:support@example.com">support@eeats.com</a></p>
        <p>Phone: +1 234 567 8901</p>
        <p>Working Hours: Mon - Fri, 9AM - 6PM</p>
      </div>

      <!-- Contact Form -->
      <div class="support-form">
        <h3>📩 Send Us a Message</h3>
        <form action="partials/feed-back-message.php" method="POST">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <textarea name="message" rows="5" placeholder="Your Message..." required></textarea>
          <button type="submit" name="send">Send Message</button>
        </form>
      </div>
    </div>

    <!-- FAQ Section -->
    <div class="support-faq">
      <h3>❓ Frequently Asked Questions</h3>
      <div class="faq-item">
        <h4>How can I reset my password?</h4>
        <p>You can reset your password from the "Edit Profile" section. Click on "Change Password" and follow the steps.</p>
      </div>
      <div class="faq-item">
        <h4>Where can I see my orders?</h4>
        <p>Go to the "Orders" tab in your dashboard to view current and past orders.</p>
      </div>
      <div class="faq-item">
        <h4>How do I contact customer care?</h4>
        <p>You can email us or fill out the form above — our team will respond within 24 hours.</p>
      </div>
    </div>
  </div>
</div>
    
  <div>
    <div id="message" class="tab-content">
      
      <?php
          $sql = "SELECT replay FROM contact_tb WHERE user_id='$user_id'";
          $res = mysqli_query($conn, $sql);
          
          if($res == TRUE)
            {
              $count = mysqli_num_rows($res);
              if($count>0)
                { 
                  while($row = mysqli_fetch_assoc($res))
                    {
                      
                      ?>
                    
                    <div class="message-card">
                  <div class="message-header">
                    <div class="message-sender">Message from eeats</div>
                  </div>  
                  <div class="message-snippet">
                    <?php echo$row["replay"];?>
                  </div>
                </div>
                  
                <?php
                      }
                        }
                          else 
                          {
                            include("partials/no-message.php");
                          }  
                      }
                    
                    ?> 
            </div> 
          </div>
            <!-- Loved your spicy paneer wrap! Keep up the good work. Will definitely order again. 😊 -->
     
  </main>
</div>

<script src="js/user-accont.js"></script>

<?php 
// include "partials/footer.php"; 
?>
<style>
/* Message Card Styles */
.message-card {
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.08);
  padding: 18px 22px;
  margin: 18px 0;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.message-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(0,0,0,0.12);
}

/* Header */
.message-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 12px;
}

.message-sender {
  font-weight: 600;
  font-size: 16px;
  color: #333;
}

.message-time {
  font-size: 13px;
  color: #888;
}

/* Snippet */
.message-snippet {
  font-size: 15px;
  color: #555;
  line-height: 1.6;
  margin-bottom: 15px;
}

/* Footer / Actions */
.message-footer {
  display: flex;
  justify-content: flex-end;
}

.message-actions button {
  padding: 8px 14px;
  border: none;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
  margin-left: 10px;
  transition: background 0.3s;
}

.reply-btn {
  background: #007bff;
  color: #fff;
}

.reply-btn:hover {
  background: #0056b3;
}

.delete-btn {
  background: #dc3545;
  color: #fff;
}

.delete-btn:hover {
  background: #a71d2a;
}
</style>

<!-- <div class="profile-row">
  <div class="profile-field">
    <span class="field-label">📍 Address:</span>
    <span class="field-value">Not Provided</span>
  </div>
  <button class="update-btn">Update</button>
</div> -->

<style>
/* Profile Row with Button */
.profile-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #f8f8f8;
  padding: 12px 16px;
  border-radius: 8px;
  margin-top: 12px;
}p

.profile-field {
  display: flex;
  flex-direction: column;
}

.field-label {
  font-weight: 600;
  margin-bottom: 3px;
  color: #444;
}

.field-value {
  font-size: 14px;
  color: #777;
}

/* Update Button */
.update-btn {
  background: #007bff;
  color: #fff;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.update-btn:hover {
  background: #0056b3;
}
</style>
