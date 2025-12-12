<?php include "admin/connection/connect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
    }

    /* Background with slight blur overlay */
    .bg {
      background: url('images/making-food1.jpg') no-repeat center center/cover;
      position: fixed;
      width: 100%;
      height: 100%;
      filter: blur(5px);
      z-index: -1;
    }

    .login-container {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 2.5rem;
      border-radius: 16px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .login-card h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #fff;
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    label {
      display: block;
      margin-bottom: 0.4rem;
      color: #fff;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.7rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
    }

    .btn-login {
      width: 100%;
      padding: 0.8rem;
      background: #ff4d4d;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .btn-login:hover {
      background: #e84343;
    }

    .create-account {
      text-align: center;
      margin-top: 1rem;
    }

    .create-account a {
      color: #fff;
      text-decoration: underline;
      font-size: 0.95rem;
    }

    @media (max-width: 480px) {
      .login-card {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>
<body>

<div class="bg"></div>

<div class="login-container">
  <form action="" method="POST" class="login-card">
    <h2>User Login</h2>
      <?php
       if($_SESSION["created"])
         {
          echo $_SESSION["created"];
          unset($_SESSION["created"]);
         }
       if($_SESSION["login"])
         {
           echo $_SESSION["login"];
           unset($_SESSION["login"]);
         }
     ?>
    <div class="form-group">
      <label for="username">Username or Email</label>
      <input type="text" name="username" id="username" required />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required />
    </div>

    <button type="submit" name="submit" class="btn-login">Login</button>

    <div class="create-account">
      <p>First time here? <a href="create-account.php">Create an Account</a></p>
    </div>
  </form>
</div>

</body>
</html>
<?php
 if(isset($_POST["submit"]))
 {
   $username = $_POST["username"]; 
   $password = md5($_POST["password"]);
   
   echo "".$username."".$password."";

   $sql = "SELECT * FROM user_tb WHERE username='$username' AND password='$password'";
   $res = mysqli_query($conn, $sql);

   $user_array=mysqli_fetch_array($res);

   $count = mysqli_num_rows($res);
   
   if($count == 1)
     {
        $_SESSION["login"] = "<div class='success'>Login Successful</div>";
        $_SESSION["user"] = $username;
        $_SESSION["user_id"] =$user_array["id"];
        header("location:".$SITEURL."index.php");
     }
     else
      {
        $_SESSION["login"] = "<div class='error'>Login Failed!</div>";
        header("location:".$SITEURL."user-login.php");        
      }   
}
?>