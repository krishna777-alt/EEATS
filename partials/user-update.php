<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f2f5f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 2rem;
    }

    .edit-profile-container {
      background: #fff;
      padding: 2.5rem;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 600px;
    }

    .edit-profile-container h2 {
      font-size: 1.8rem;
      color: #333;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .profile-photo-preview {
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .profile-photo-preview img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    .update-photo-btn {
      display: inline-block;
      margin-top: 0.7rem;
      padding: 0.5rem 1.2rem;
      font-size: 0.95rem;
      background: #2196f3;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;

      text-decoration: none;
    }

    .update-photo-btn:hover {
      background: #1e88e5;
    }

    .edit-profile-form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .edit-profile-form label {
      font-weight: 600;
      margin-bottom: 0.3rem;
      display: block;
      color: #444;
    }

    .edit-profile-form input {
      padding: 0.8rem;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 1rem;
      width: 100%;
    }

    .edit-profile-form input:focus {
      border-color: #4caf50;
      outline: none;
    }

    .edit-profile-form input[type="file"] {
      padding: 0.4rem;
    }

    .edit-profile-form button[type="submit"] {
      background: #4caf50;
      color: #fff;
      padding: 0.9rem;
      font-size: 1rem;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 1rem;
      transition: background 0.3s;
    }

    .edit-profile-form button[type="submit"]:hover {
      background: #43a047;
    }
/* ////////////////////////////////////////////////////////Cancel */
.edit-profile-form a {
      background:#e53923;
      color: #fff;
      padding: 0.9rem;
      font-size: 1rem;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 1rem;
      transition: background 0.3s;
      text-decoration: none;
    }

    .edit-profile-form a:hover {
      background:#d92e2e;
    }
    @media (max-width: 500px) {
      .edit-profile-container {
        padding: 1.8rem;
      }
    }
  .wr{
    display: flex;
    flex-direction: column;
  }  
  </style>
</head>
<?php 
  session_start();
  include "../admin/connection/connect.php";

  $person_id = $_GET["id"];
  $sql = "SELECT * FROM user_tb WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $person_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <style>
    /* Add your styling here */
    .edit-profile-container {
      max-width: 600px;
      margin: auto;
      padding: 2rem;
      font-family: Arial;
    }
    .edit-profile-container label {
      display: block;
      margin-top: 1rem;
    }
    .edit-profile-container input {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.25rem;
    }
    .update-photo-btn, .edit-profile-container button {
      margin-top: 1rem;
      padding: 0.6rem 1.2rem;
    }
    .profile-photo-preview {
      margin-bottom: 2rem;
      text-align: center;
    }
    .profile-photo-preview img {
      width: 150px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<div class="edit-profile-container">
  <!-- <h2>Edit Profile</h2> -->

  <?php 
    if (isset($_SESSION["uploaded-Error"])) {
      echo "<p style='color:red'>" . $_SESSION["uploaded-Error"] . "</p>";
      unset($_SESSION["uploaded-Error"]);
    }
  ?>

  <div class="profile-photo-preview">
    <form action="user-profile.php" method="POST" enctype="multipart/form-data">
     <?php 
        if($row["image"] =="" || $row["image"] =="no profile")
          {
            ?>
            <img src="../images/user.png" alt="Current Profile Picture" id="current-profile-pic" />
            <?php
          }
        else
          {
            ?>
              <img src="../uploads/profile/<?php echo $row["image"];?>" alt="Current Profile Picture" id="current-profile-pic" />
            <?php
          }  
     ?>
     
      <br />
      <div class="wr">
        <input class="update-photo-btn" type="file" name="file">
        <button name="update" class="update-photo-btn">Update Profile Photo</button>
      </div>
    </form>
  </div>

  <form class="edit-profile-form" action="" method="POST" enctype="multipart/form-data">
    <label for="full-name">Full Name</label>
    <input type="text" id="full-name" name="full_name" placeholder="<?php echo htmlspecialchars($row["full_name"]); ?>" />

    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="<?php echo htmlspecialchars($row["username"]); ?>" />

    <label for="new-password">New Password</label>
    <input type="password" id="new-password" name="new_password" placeholder="••••••••" />

    <label for="confirm-password">Confirm Password</label>
    <input type="password" id="confirm-password" name="confirm_password" placeholder="••••••••" />

    <button type="submit" name="submit">Update Profile</button>
  </form>
  <a style="text-decoration: none;" class="edit-profile-form" href="<?php echo $SITEURL;?>user-accont.php?id=<?php echo $person_id;?>">
      <button style="background-color: #e53923;" type="cancel" name="cancel">Back</button>
    </a>
</div>

<?php
if (isset($_POST["submit"])) {
  // Use existing values if fields are left blank
  $full_name = !empty($_POST["full_name"]) ? mysqli_real_escape_string($conn, $_POST["full_name"]) : $row["full_name"];
  $username  = !empty($_POST["username"]) ? mysqli_real_escape_string($conn, $_POST["username"]) : $row["username"];

  // Handle password update if provided
  $new_password = $row["password"]; // Default to existing password

  if (!empty($_POST["new_password"]) && !empty($_POST["confirm_password"])) {
    if ($_POST["new_password"] === $_POST["confirm_password"]) {
      $new_password = md5($_POST["confirm_password"]); 
    } else {
      echo "<p style='color:red'>Passwords do not match.</p>";
      exit;
    }
  }

  // Perform update query
  $update_query = "UPDATE user_tb SET full_name = ?, username = ?, password = ? WHERE id = ?";
  $stmt = mysqli_prepare($conn, $update_query);
  mysqli_stmt_bind_param($stmt, "sssi", $full_name, $username, $new_password, $person_id);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    // echo "<p style='color:green'>Profile updated successfully!</p>";
    $_SESSION["profile-updated"]="<div class='success'>Profile Successfully Updated!</div>";
    header("location:".$SITEURL."user-account.php?id=".$person_id);
    
    
  } else {
    echo "<div class='error'>Failed to update profile.</div>";
  }
}

?>


</body>
</html>
