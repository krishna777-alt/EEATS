<?php
include "connection/connect.php";
// session_start();

$message_id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reply Message</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f8;
      margin: 0;
      padding: 2rem;
    }

    .reply-container {
      max-width: 700px;
      margin: 2rem auto;
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }

    .reply-container h2 {
      margin-bottom: 1.5rem;
      color: #333;
    }

    .msg-details {
      background-color: #f1f1f1;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1.5rem;
      line-height: 1.5;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 0.5rem;
    }

    textarea {
      width: 100%;
      height: 150px;
      border-radius: 8px;
      border: 1px solid #ccc;
      padding: 1rem;
      font-size: 1rem;
      resize: vertical;
      margin-bottom: 1.5rem;
    }

    .btn {
      padding: 0.6rem 1.4rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      color: white;
      background-color: #007bff;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background-color: #0069d9;
    }
    .btn-can {
      padding: 0.6rem 1.4rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      color: white;
      background-color: #dc3545;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .btn-can:hover {
      background-color:rgb(255, 131, 143);
    }

    .message {
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
      text-align: center;
      font-weight: 500;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      border-left: 5px solid #28a745;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
      border-left: 5px solid #dc3545;
    }
    .space{
      display: flex;
      justify-content: space-between; 
    }
  </style>
</head>
<body>

<div class="reply-container">
  <h2>Reply to Message</h2>

  <?php
    if(isset($_SESSION['reply-msg'])) {
        echo $_SESSION['reply-msg'];
        unset($_SESSION['reply-msg']);
    }

    // if ($message) {
    //     echo "
    //     <div class='msg-details'>
    //         <strong>Name:</strong> {$message['name']}<br>
    //         <strong>Email:</strong> {$message['email']}<br>
    //         <strong>Message:</strong><br>{$message['message']}
    //     </div>
    //     ";
    // }
  ?>

    <form action="" method="POST">
      <label for="reply">Your Reply</label>
      <textarea name="reply" id="reply" required placeholder="Type your reply here..."></textarea>
      <div class="space">
        <input type="submit" name="send" class="btn" value="Send Reply">
        <!-- <button class="btn-can">Cancel</button> -->
        <a class="btn-can" href="<?php $SITEURL;?>message.php">Cancel</a>
      </div>
    </form>
  
</div>

</body>
</html>

<?php
if (isset($_POST['send'])) {
    $reply = mysqli_real_escape_string($conn, $_POST['reply']);

    // Simulate sending reply or save to DB
    $query = "UPDATE contact_tb SET view='readed',replay='$reply' WHERE id=$message_id";
    $res = mysqli_query($conn, $query);

    if ($res) {
        $_SESSION['reply-msg'] = "<div class='success'>✅ Reply sent successfully!</div>";
        header("location:".$SITEURL."admin/message.php");
    } else {
        $_SESSION['reply-msg'] = "<div class='error'>❌ Failed to send reply!</div>";
    }
}
?>
