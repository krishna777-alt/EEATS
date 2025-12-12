<?php include "../admin/connection/connect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Restaurant Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>

  <div class="login-container">
    <?php 
    echo $_SESSION["restaurant_id"];
    if($_SESSION["new_restaruant"])
      {
          echo $_SESSION["new_restaruant"];
          unset($_SESSION["new_restaruant"]);
      } 
    
    if($_SESSION["login"])
      {
        echo $_SESSION["login"];
        unset($_SESSION["login"]);
      }
  ?>
    <h2>🍽️ Restaurant Login</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>

      <button name="submit" type="submit">🔐 Login</button>
    </form>

    <div class="bottom-text">
      No account? <a href="create-accont.php">Create one</a>
    </div>
  </div>

</body>
</html>
<?php

// session_start(); // REQUIRED to use $_SESSION

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    // NOTE: Your table name was misspelled before as "restaruant_tb"
    $sql = "SELECT * FROM restaruant_tb WHERE email='$email' AND password='$password'";
    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);

        // Set session variables
        $_SESSION["login"] = "<div class='success'>Login Successfully</div>";
        $_SESSION["restaurant_id"] = $row["id"]; // Fixed: named better

        // Optional: store name or other info
        $_SESSION["restaurant_name"] = $row["name"];

        // Redirect
        header("Location: " . $SITEURL . "restaruant/index.php");
        exit;
    } else {
        $_SESSION["login"] = "<div class='error'>Login Failed! Invalid credentials.</div>";
        header("Location: " . $SITEURL . "restaruant/login.php"); // Redirect back to login
        exit;
    }
}
?>
