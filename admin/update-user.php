<?php
include "connection/connect.php";


$id = $_GET['id'];
$query = "SELECT * FROM user_tb WHERE id = $id";
$result = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f7fa;
      margin: 0;
      padding: 2rem;
    }

    .edit-user-container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 1.8rem;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 0.4rem;
      margin-top: 1rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%;
      padding: 0.7rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      margin-top: 2rem;
    }

    .btn {
      padding: 0.6rem 1.4rem;
      font-size: 1rem;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      text-decoration: none;
      color: #fff;
      transition: 0.3s ease;
    }

    .btn-save {
      background: #007bff;
    }

    .btn-save:hover {
      background: #0069d9;
    }

    .btn-cancel {
      background: #6c757d;
    }

    .btn-cancel:hover {
      background: #5a6268;
    }

    .message.success {
      background: #d4edda;
      color: #155724;
      padding: 1rem;
      border-left: 6px solid #28a745;
      border-radius: 8px;
      margin-bottom: 1rem;
    }

    .message.error {
      background: #f8d7da;
      color: #721c24;
      padding: 1rem;
      border-left: 6px solid #dc3545;
      border-radius: 8px;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

<div class="edit-user-container">
  <h2>Edit User</h2>

  <?php
  if (isset($_SESSION['edit-user-msg'])) {
    echo $_SESSION['edit-user-msg'];
    unset($_SESSION['edit-user-msg']);
  }
  ?>

 <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">

    <label for="name">Full Name</label>
    <input type="text" name="full_name" id="name" value="<?= htmlspecialchars($user['full_name']) ?>">

    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']) ?>">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>">

    <label for="password">New Password <small>(Leave blank to keep unchanged)</small></label>
    <input type="password" name="password" id="password">

    <label for="status">Status</label>
    <select name="status" id="status">
      <option value="Active" <?= $user['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
      <option value="Inactive" <?= $user['status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
    </select>

    <div class="btn-group">
      <button type="submit" name="submit" class="btn btn-save">Update</button>
      <a href="users.php" class="btn btn-cancel">Cancel</a>
    </div>
</form>

</div>

</body>
</html>
<?php 

  if(isset($_POST["submit"]))
    {   
        
        $new_name     = $_POST["full_name"];
        $new_username = $_POST["username"];
        $new_email    = $_POST["email"];
        $new_password = md5($_POST["password"]);
        $new_status     = $_POST["status"]; 
        
        echo$update_sql = "UPDATE user_tb SET full_name='$new_name',username='$new_username',email='$new_email',password='$new_password',status='$new_status' WHERE id=$id";
        $res = mysqli_query($conn, $update_sql);
        echo "eded";
        if($res == TRUE)
          {
            echo "Updated Success";
            header("location:".$SITEURL."admin/users.php");
          }
        else
          {
            echo "Somthing error!";
          }  
    }
  else
    {
      echo "i am here";
    }  

?>