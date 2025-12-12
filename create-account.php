<?php include "admin/connection/connect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Account</title>
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

    .bg {
      background: url('https://images.unsplash.com/photo-1551218808-94e220e084d2') no-repeat center center/cover;
      position: fixed;
      width: 100%;
      height: 100%;
      filter: blur(5px);
      z-index: -1;
    }

    .register-container {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .register-card {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 2.5rem;
      border-radius: 16px;
      width: 100%;
      max-width: 450px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .register-card h2 {
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
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.7rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
    }

    .btn-register {
      width: 100%;
      padding: 0.8rem;
      background: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .btn-register:hover {
      background: #218838;
    }

    .login-link {
      text-align: center;
      margin-top: 1rem;
    }

    .login-link a {
      color: #fff;
      text-decoration: underline;
      font-size: 0.95rem;
    }

    @media (max-width: 480px) {
      .register-card {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>
<body>

<div class="bg"></div>

<div class="register-container">
  <form action="" method="POST" class="register-card">
    <h2>Create Account</h2>
     <?php
       if($_SESSION["created"])
         {
           echo $_SESSION["created"];
           unset($_SESSION["created"]);
         }
     ?>
    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" name="full_name" id="name" required />
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required />
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required />
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required />
    </div>

    <button type="submit" name="submit" class="btn-register">Create Account</button>

    <div class="login-link">
      <p>Already have an account? <a href="user-login.php">Login here</a></p>
    </div>
  </form>
</div>

</body>
</html>
<?php
  
  if(isset($_POST["submit"]))
     {
        $full_name = $_POST["full_name"];
        $email     = $_POST["email"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $status   = "Active";
        $image ="no profile";

        $sql = "INSERT INTO user_tb(full_name,username,email,password,status,image) VALUES('$full_name','$username','$email','$password','$status','$image')";
        $res = mysqli_query($conn, $sql);

        if($res == TRUE)
           {
             $_SESSION["created"] = "<div class='success'>Account Created Successful,Now U Can Login</div>";
             header("location:".$SITEURL."user-login.php");
             $_SESSION["user"] = $username;
           }
        else
           {
             $_SESSION["created"] = "<div class='error'>Failed To Create Acccount!</div>";
             header("location:".$SITEURL."create-account.php");
           }   
     }
 
?>