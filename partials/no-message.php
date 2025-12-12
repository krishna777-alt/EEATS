<style>
.no-msg-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 70vh;
  background: #f9f9f9;
  font-family: Arial, sans-serif;
}

.no-msg-box {
  text-align: center;
  padding: 40px;
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  max-width: 500px;
  width: 100%;
}

.no-msg-img {
  width: 180px;
  margin-bottom: 20px;
  opacity: 0.85;
}

.no-msg-title {
  font-size: 24px;
  color: #333;
  margin-bottom: 10px;
}

.no-msg-text {
  font-size: 15px;
  color: #666;
  margin-bottom: 20px;
  line-height: 1.6;
}

.no-msg-btn {
  display: inline-block;
  padding: 10px 20px;
  background: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 8px;
  transition: 0.3s;
}

.no-msg-btn:hover {
  background: #0056b3;
}
</style>


<div class="no-msg-container class="tab-content">
  <div class="no-msg-box">
    <img src="<?php echo$SITEURL;?>images/no-message.png" alt="No Messages" class="no-msg-img">
    <h2 class="no-msg-title">No Messages Yet</h2>
    <p class="no-msg-text">
      You currently don’t have any new messages.  
      Check back later or start a conversation.
    </p>
    <!-- <a href="dashboard.php" class="no-msg-btn">Go Back to Dashboard</a> -->
  </div>
</div>
