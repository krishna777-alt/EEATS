<?php
include "../admin/connection/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Successful</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9f9f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .success-page-wrapper {
      text-align: center;
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      max-width: 500px;
    }

    .success-page-wrapper h1 {
      color: #28a745;
      font-size: 36px;
      margin-bottom: 10px;
    }

    .success-page-wrapper p {
      font-size: 18px;
      color: #444;
      margin-bottom: 25px;
    }

    .success-img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      margin-bottom: 25px;
    }

    .go-to-menu-btn {
      background-color: #ff4d4f;
      color: white;
      padding: 14px 28px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.3s ease;
    }

    .go-to-menu-btn:hover {
      background-color: #e43e3f;
    }
  </style>
</head>
<body>

  <div class="success-page-wrapper">
    <h1>Order Placed!</h1>
    <p>Now you can order more of your favourite meals.</p>
    <img src="../images/order-food.png" alt="Order Success" class="success-img">
    <br>
    <a href="<?php echo $SITEURL;?>menu.php" class="go-to-menu-btn">Go to Menu</a>
  </div>

</body>
</html>



<?php
 $user_id = $_SESSION["user_id"];

  if(isset($_POST["submit"]))
    {

    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $account = $_POST["account"];
    $instructions = $_POST["instructions"];

    //  echo $sql = "INSERT INTO category_tb(title,image,status) VALUES('$full_name','$username','$email')";

        //  echo $sql = "INSERT INTO account_tb(fullname,username,email,user_id,phone_num)VALUES('$full_name','$username','$email',$user_id,'$phone')"; 

      $sql = "INSERT INTO order_form_tb(full_name,username,email,phone,street_address,city,state,zip_code,account,delivery_inst,user_id)
      VALUES('$full_name','$username','$email','$phone','$address','$city','$state',$zip,'$account','$instructions',$user_id)";

      $res = mysqli_query($conn,$sql);

      if($res == TRUE)
        {
         
          header("localhost:".$SITEURL."menu.php");
          $_SESSION["form-filled"] = "<div class='success'>Form Filled Successfully</div>";
          $_SESSION["user-filled"] =TRUE;
        }
      else
        {
           $_SESSION["form-filled"] = "<div class='error'>Form Filled Failed!</div>";
        }  
    } 
  else
    {
      echo "Faild to Send";
    }  

