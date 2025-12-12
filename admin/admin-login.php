<?php include "connection/connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #1f4037, #99f2c8);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      background: white;
      padding: 2.5rem 2rem;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      max-width: 400px;
      width: 100%;
      animation: fadeIn 0.6s ease;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: #333;
    }

    .login-container form {
      display: flex;
      flex-direction: column;
    }

    .login-container label {
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #444;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      padding: 0.8rem;
      margin-bottom: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    .login-container input:focus {
      border-color: #28a745;
      outline: none;
    }

    .login-container button {
      padding: 0.8rem;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .login-container button:hover {
      background-color: #218838;
      transform: translateY(-2px);
    }

    .login-container .error {
      background-color: #f8d7da;
      color: #721c24;
      padding: 0.8rem;
      border-left: 4px solid #dc3545;
      border-radius: 8px;
      margin-bottom: 1rem;
      text-align: center;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Admin Login</h2>

  <?php
    // session_start();
    if (isset($_SESSION['login-error'])) {
      echo "<div class='error'>{$_SESSION['login-error']}</div>";
      unset($_SESSION['login-error']);
    }
  ?>

  <form action="" method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required placeholder="Enter your username">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required placeholder="Enter your password">

    <button name="submit" type="submit">Login</button>
  </form>
</div>

</body>
</html>
<?php
 if(isset($_POST["submit"])) 
  {
   echo $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM admin_tb WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn,$sql);
   
    $count = mysqli_num_rows($res);
    if($count == 1)
      {
         $row=mysqli_fetch_array($res);
         echo $row["id"];

        $_SESSION["login"] = "<div class='success'>Login Successful</div>";
        echo$_SESSION["admin"] = $username;
       echo $_SESSION["adm_id"]=$row["id"];
        header("location:".$SITEURL."admin/");
      } 
    else
      {
        $_SESSION["login"] = "<div class='error'>Login Failed! Incorrect username or password</div>";
        header("location:" . $SITEURL . "admin/login.php");
      }  
   }
?>