<?php include "../admin/connection/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Restaurant Account</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Segoe UI", sans-serif;
       background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
        url('../images/restruants/new-york-hottel.jpg') no-repeat center center fixed; 
      background-size: cover;
      height: 100vh;
      /* display: flex;
      justify-content: center;
      align-items: center; */
      width: 1000px;
      margin: 0 auto 0 auto;
    }

    .register-container {
      background-color: rgba(255, 255, 255, 0.96);
      padding: 35px 40px;
      border-radius: 12px;
      width: 800px;
      box-shadow: 0 5px 18px rgba(0,0,0,0.3);
    }

    .register-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2c3e50;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 6px;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"],
    input[type="time"],
    textarea {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
    }

    textarea {
      resize: vertical;
      min-height: 70px;
    }

    input[type="file"] {
      border: none;
      padding: 6px 0;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #27ae60;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px;
    }

    button:hover {
      background-color: #219150;
    }

    @media (max-width: 650px) {
      .register-container {
        width: 90%;
        padding: 25px;
      }
    }
  </style>
</head>
<body>
  <div class="register-container">
    <?php 
   if($_SESSION["new_restaruant"])
     {
        echo $_SESSION["new_restaruant"];
        unset($_SESSION["new_restaruant"]);
     } 
 ?>
    <h2>🍽️ Create Restaurant Account</h2>
    <form action="" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label>Restaurant Name</label>
        <input type="text" name="name" required>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" required>
      </div>

      <div class="form-group">
        <label>Phone</label>
        <input type="tel" name="phone" required>
      </div>

      <div class="form-group">
        <label>Address</label>
        <textarea name="address" required></textarea>
      </div>

      <div class="form-group">
        <label>Location (Google Maps link or short description)</label>
        <input type="text" name="location" required>
      </div>

      <div class="form-group">
        <label>Opening Time</label>
        <input type="time" name="open_time" required>
      </div>

      <div class="form-group">
        <label>Closing Time</label>
        <input type="time" name="close_time" required>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="status" required>
          <option value="Open">Open</option>
          <option value="Closed">Closed</option>
        </select>
      </div>

      <div class="form-group">
        <label>Upload Restaurant Image</label>
        <input type="file" name="image">
      </div>

      <button type="submit" name="submit">📥 Create Account</button>
    </form>
  </div>
<!-- <img src="../restaruant/login.php" alt=""> -->
</body>
</html>
<?php
  if(isset($_POST["submit"]))
    {
      $res_name   = $_POST["name"];
      $email      = $_POST["email"];
      $password   = md5($_POST["password"]);
      $phone      = $_POST["phone"];
      $address    = $_POST["address"];
      $location   = $_POST["location"];
      $open_time  = $_POST["open_time"];
      $close_time = $_POST["close_time"];
     
        if($_POST["status"]== "Open")
           {
             $status ="Open";
           }
        else
           {
            $status = "Close";
           } 
        
        if($_FILES["image"]["name"]=="")
          {
            $image_name = "No Image";
          }
        else
          {
           $images =$_FILES["image"];
        //    print_r($images);
           $image_name = $_FILES["image"]["name"];
           $temp_location = $_FILES["image"]["tmp_name"];

           $destination_path = "../uploads/restaruant/$image_name";

           $upload = move_uploaded_file($temp_location,$destination_path);
        //    if($upload == TRUE)
        //      {
        //         echo "Successfully image tranferd!";
        //      }
        //    else
        //      {
        //         echo "error";
        //      }   
          }  

        //   echo$sql = "INSERT INTO restaruant_tb (name,email,password,phone,address,location,open,close,status,image)
        //     VALUES('$res_name','email','password','phone','address','location','3:00','7:00','status','image_name')"; 
            $sql = "INSERT INTO restaruant_tb (name,email,password,phone,address,location,'open','close',status,image)
            VALUES('$res_name','$email','$password','$phone','$address','$location','$open_time','$close_time','$status','$image_name')"; 
          
          $res = mysqli_query($conn,$sql);

          if($res == TRUE)
            {
                
                
                $_SESSION["new_restaruant"] = "<div class='success'>New Account Created!
                Now you can login
                </div>";
                // header("location:".$SITEURL."index.php");
                header("Location:".$SITEURL."restaruant/login.php");
            }
          else
            {
                 $_SESSION["new_restaruant"] = "<div class='error'> Failed To Create Account!</div>";
            }  
    }
?>
