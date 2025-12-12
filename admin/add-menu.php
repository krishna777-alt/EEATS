<?php
include "connection/connect.php";


if (!isset($_SESSION["admin"])) {
    header("Location:".$SITEURL."admin/admin-login.php");
   
}
 $admin_id =$_SESSION["adm_id"];
// Fetch categories
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Menu Item</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f8;
      padding: 2rem;
    }

    .add-menu-container {
      max-width: 650px;
      margin: auto;
      background: #fff;
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
    }

    h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #444;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea,
    input[type="file"] {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 1.4rem;
      font-size: 1rem;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      gap: 1rem;
    }

    .btn {
      padding: 0.6rem 1.3rem;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      color: white;
      font-size: 1rem;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .btn-submit {
      background-color: #28a745;
    }

    .btn-submit:hover {
      background-color: #218838;
    }

    .btn-cancel {
      background-color: #6c757d;
    }

    .btn-cancel:hover {
      background-color: #5a6268;
    }

    .message.success {
      background: #d4edda;
      color: #155724;
      border-left: 5px solid #28a745;
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 8px;
    }

    .message.error {
      background: #f8d7da;
      color: #721c24;
      border-left: 5px solid #dc3545;
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<div class="add-menu-container">
  <h2>Add New Menu Item</h2>

  <?php
  if (isset($_SESSION["add-menu-msg"])) {
      echo $_SESSION["add-menu-msg"];
      unset($_SESSION["add-menu-msg"]);
  }
  ?>

  <form action="" method="POST" enctype="multipart/form-data">
    <label for="title">Menu Name</label>
    <input type="text" id="title" name="title" required placeholder="e.g. Cheese Burst Pizza">

    <label for="price">Price (₹)</label>
    <input type="number" step="0.01" id="price" name="price" required placeholder="e.g. 299">

    <label for="description">Description</label>
    <textarea id="description" name="description" required placeholder="Brief about the item..."></textarea>

    <label for="image">Image</label>
    <input type="file" name="image">
    
    <label for="category">Category</label>
    <!-- <input type="text" name="category"> -->
    <select name="category" required>
      <option value="">Select Category</option>
      <?php
        $sql = "SELECT * FROM category_tb WHERE status='active'";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
          // echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</option>";
          ?>
           <option value="<?php echo $row["id"];?>"><?php echo $row["title"];?></option>
          <?php
        }
        ?>
    </select>
   
    <label for="status">Status</label>
    <select name="status" required>
      <option value="active">Active</option>
      <option value="inactive">Inactive</option>
    </select>

    <div class="form-actions">
      <button type="submit" name="submit" class="btn btn-submit">Add Menu</button>
      <a href="menu.php" class="btn btn-cancel">Cancel</a>
    </div>
  </form>
</div>

</body>
</html>

<?php
if (isset($_POST["submit"])) {
    $title = mysqli_real_escape_string($conn, ucfirst($_POST["title"]));
    $price = $_POST["price"];
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $category =$_POST["category"];
    $status = ucfirst($_POST["status"]);
    // $image  = $_FILES["image"];

    if(!isset($_FILES["image"]["name"]))
       {
          $image_name ="NO IMAGE";
       }
    else
       {
         $image_name = $_FILES["image"]["name"];
         $temp_lcoation = $_FILES["image"]["tmp_name"];
         $destination_path = "../uploads/menu/.$image_name";

         $upload = move_uploaded_file($temp_lcoation,$destination_path);

       }   

    $sql = "INSERT INTO menu_tb (title, price, image,status,description,category_id,admin_id) 
          VALUES ('$title', '$price', '$image_name', '$status','$description','$category','$admin_id')";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        $_SESSION["add-menu-msg"] = "<div class='message success'>✅ Menu item added successfully!</div>";
        header("location:".$SITEURL."admin/menu.php");
        
    } else {
        $_SESSION["add-menu-msg"] = "<div class='message error'>❌ Failed to add menu item.</div>";
    }
}
?>
