<?php
   include "connection/connect.php";

   if(!isset($_SESSION["admin"]))
    {
      header("location:".$SITEURL."admin/admin-login.php");
    }
     
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Messages</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f4f6f8;
    }

    header {
      background: #34495e;
      color: #fff;
      padding: 1rem 2rem;
      font-size: 1.4rem;
    }

    .message-container {
      padding: 2rem;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .top-bar input {
      padding: 0.5rem 1rem;
      font-size: 1rem;
      border-radius: 6px;
      border: 1px solid #ccc;
      width: 260px;
    }

    .message-card {
      background: white;
      padding: 1.2rem;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-bottom: 1rem;
      transition: all 0.2s ease-in-out;
    }

    .message-card:hover {
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transform: translateY(-2px);
    }

    .message-header {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .message-sender {
      font-weight: 600;
      font-size: 1.1rem;
      color: #2c3e50;
    }

    .message-email {
      font-size: 0.9rem;
      color: #888;
    }

    .message-snippet {
      margin: 0.7rem 0;
      color: #555;
    }

    .message-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 0.7rem;
    }

    .message-status {
      font-size: 0.85rem;
      font-weight: 600;
      border-radius: 6px;
      padding: 0.3rem 0.6rem;
      background-color: #e9ecef;
      color: #555;
    }

    .message-actions a {
  display: inline-block;
  padding: 0.4rem 0.9rem;
  font-size: 0.85rem;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  color: white;
  text-decoration: none;
  transition: background 0.3s ease, transform 0.2s ease;
}
.message-actions a:hover {
  transform: translateY(-1px);
  opacity: 0.9;
}

/* Optional: Add button types */
.message-actions .reply-btn {
  background-color: #007bff;
}
.message-actions .reply-btn:hover {
  background-color: #0069d9;
}

.message-actions .delete-btn {
  background-color: #dc3545;
}
.message-actions .delete-btn:hover {
  background-color: #c82333;
}


    .view-btn {
      background: #3498db;
    }

    .reply-btn {
      background: #28a745;
    }

    .delete-btn {
      background: #e74c3c;
    }

    @media (max-width: 768px) {
      .message-footer {
        flex-direction: column;
        align-items: flex-start;
      }
    }
  </style>
</head>
<body>

<?php include "partials/header.php";?>
<!-- <header>Admin Dashboard - Messages</header> -->
<?php
  if($_SESSION['reply-msg'])
    {
      echo $_SESSION['reply-msg'];
      unset($_SESSION['reply-msg']);
    }
?>
<div class="message-container">
  
  <div class="top-bar">
    <input type="text" id="messageSearch" placeholder="Search by name or email...">
  </div>
  <?php
    if(isset($_SESSION["deleted"]))
      {
        echo $_SESSION["deleted"];
        unset($_SESSION["deleted"]);
      }
  ?>
   <?php
     $sql = "SELECT * FROM contact_tb";
     $res = mysqli_query($conn, $sql);
     if($res == TRUE)
       {
          $count = mysqli_num_rows($res);
          while($row = mysqli_fetch_array($res))
            {
              
              ?>
               <div class="message-card">
                <div class="message-header">
                  <div class="message-sender"><?php echo $row["name"];?></div>
                  <div class="message-email"><?php echo $row["email"];?></div>
                </div>
                <div class="message-snippet">
                 <?php echo $row["message"];?>
                </div>
                <div class="message-footer">
                  <span class="message-status"><?php echo $row["view"];?></span>
                 <div class="message-actions">
                  <a href="<?php echo $SITEURL;?>admin/message-replay.php?id=<?php echo $row["id"];?>" class="reply-btn">Reply</a>
                  <a href="<?php echo $SITEURL;?>admin/delete-admin-message.php?id=<?php echo $row["id"];?>" class="delete-btn">Delete</a>
                </div>

                </div>
              </div>
              
              <?php
            }
       }
   ?>
  <!-- Sample Message Card -->
 

  <!-- <div class="message-card">
    <div class="message-header">
      <div class="message-sender">Rahul Kumar</div>
      <div class="message-email">rahulk@gmail.com</div>
    </div>
    <div class="message-snippet">
      Loved your spicy paneer wrap! Keep up the good work. Will definitely order again. 😊
    </div>
    <div class="message-footer">
      <span class="message-status">Replied</span>
      <div class="message-actions">
        <button class="view-btn">View</button>
        <button class="reply-btn">Reply</button>
        <button class="delete-btn">Delete</button>
      </div>
    </div>
  </div>
</div> -->

<script>
  const searchBox = document.getElementById('messageSearch');
  const messages = document.querySelectorAll('.message-card');

  searchBox.addEventListener('input', () => {
    const value = searchBox.value.toLowerCase();
    messages.forEach(card => {
      const name = card.querySelector('.message-sender').innerText.toLowerCase();
      const email = card.querySelector('.message-email').innerText.toLowerCase();
      card.style.display = (name.includes(value) || email.includes(value)) ? 'block' : 'none';
    });
  });
</script>

</body>
</html>
<?php
  echo $_POST["id"];
?>