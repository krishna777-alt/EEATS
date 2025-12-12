<?php 
include "connection/connect.php";
// session_start(); // Added session_start() which was missing

if(!isset($_SESSION["admin"])) {
    header("location:".$SITEURL."admin/admin-login.php");
    exit(); // Added exit to prevent further execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Admin Record</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 3rem auto;
      background: #fff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 1.5rem;
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    form label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #444;
    }

    form input[type="text"],
    form input[type="email"],
    form input[type="password"],
    form input[type="number"],
    form select,
    form textarea {
      width: 100%;
      padding: 0.6rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    form input:focus,
    form select:focus,
    form textarea:focus {
      border-color: #007bff;
      outline: none;
    }

    .password-toggle {
      display: flex;
      align-items: center;
      margin-top: 0.5rem;
    }

    .password-toggle input {
      margin-right: 0.5rem;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      margin-top: 1.5rem;
    }

    .btn {
      padding: 0.6rem 1.4rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-save {
      background-color: #007bff;
      color: #fff;
    }

    .btn-save:hover {
      background-color: #0069d9;
      transform: translateY(-1px);
    }

    .btn-cancel {
      background-color: #6c757d;
      color: #fff;
      text-decoration: none;
      text-align: center;
      line-height: 1.5;
    }

    .btn-cancel:hover {
      background-color: #5a6268;
      transform: translateY(-1px);
    }

    .error-message {
      color: #dc3545;
      font-size: 0.9rem;
      margin-top: -0.8rem;
      margin-bottom: 1rem;
    }

    @media (max-width: 600px) {
      .btn-group {
        flex-direction: column;
        gap: 0.8rem;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Edit Admin Record</h2>
  <form action="" method="POST">
    <?php 
    $edit_id = $_GET["id"] ?? 0; // Added null coalescing operator for safety
    $sql = "SELECT * FROM admin_tb WHERE id='$edit_id'";
    $result = mysqli_query($conn, $sql);
    
    if(!$result || mysqli_num_rows($result) == 0) {
        die("Admin record not found."); // Handle case when record doesn't exist
    }
    
    $row = mysqli_fetch_assoc($result); // Changed to fetch_assoc for clarity
    ?>
    
    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['full_name']); ?>" required>
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
    </div>

    <div class="form-group">
      <label for="password">New Password (leave blank to keep current)</label>
      <input type="password" id="password" name="password">
      <div class="password-toggle">
        <input type="checkbox" id="show-password" onclick="togglePassword()">
        <label for="show-password">Show Password</label>
      </div>
    </div>

    <div class="form-group">
      <label for="role">Role</label>
      <select id="role" name="role">
        <option value="admin" <?php echo ($row['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
        <option value="manager" <?php echo ($row['role'] == 'manager') ? 'selected' : ''; ?>>Manager</option>
      </select>
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select id="status" name="status">
        <option value="active" <?php echo ($row['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
        <option value="inactive" <?php echo ($row['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
      </select>
    </div>

    <div class="btn-group">
      <button type="submit" name="submit" class="btn btn-save">Save Changes</button>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <a href="<?php echo $SITEURL; ?>admin/administrator.php" class="btn btn-cancel">Cancel</a>
    </div>
  </form>
</div>

<script>
function togglePassword() {
  var passwordInput = document.getElementById("password");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
</script>

</body>
</html>

<?php
if(isset($_POST["submit"])) {
    $id = $_POST["id"];
    $full_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $password = $_POST["password"];

    // Build the update query
    $updateFields = "full_name='$full_name', username='$username', email='$email', role='$role', status='$status'";
    
    // Only update password if a new one was provided
    if(!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $updateFields .= ", password='$hashed_password'";
    }

    $sql2 = "UPDATE admin_tb SET $updateFields WHERE id=$id";
    $result2 = mysqli_query($conn, $sql2);
    
    if($result2) {
        $_SESSION["update"] = "<div class='success'>✅ Admin Updated Successfully!</div>";
    } else {
        $_SESSION["error"] = "<div class='error'>❌ Failed to update admin: " . mysqli_error($conn) . "</div>";
    }
    
    header("location:".$SITEURL."admin/administrator.php");
    exit();
}
?>