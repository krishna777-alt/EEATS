<?php
include "connection/connect.php";
// session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: " . $SITEURL . "admin/admin-login.php");
}
 $upate_id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f8;
      padding: 2rem;
    }

    .edit-menu-container {
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

    img.preview {
      max-width: 200px;
      margin-bottom: 1rem;
      display: block;
      border-radius: 8px;
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

    .btn-update {
      background-color: #007bff;
    }

    .btn-update:hover {
      background-color: #0069d9;
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

<div class="edit-menu-container">
  <h2>Edit Menu Item</h2>

  <?php
  if (isset($_SESSION["updated_food"])) {
      echo $_SESSION["updated_food"];
      unset($_SESSION["updated_food"]);
  }
  ?>
  <?php
     $sql = "SELECT * FROM menu_tb WHERE id=$upate_id";
     $result = mysqli_query($conn, $sql);
     $data = mysqli_fetch_array($result);
  ?>
  <form method="POST" enctype="multipart/form-data">
    <label>Menu Name</label>
    <input type="text" name="title" required value="<?php echo $data['title'];?>">

    <label>Price (₹)</label>
    <input type="number" step="0.01" name="price" required value="<?= $data['price'] ?>">

    <label>Description</label>
    <textarea name="description"><?= htmlspecialchars($data['description']) ?></textarea>

     <label>Current Image</label>
      <img src="<?php echo $SITEURL;?>/images/menu/<?php echo $data['image'];?>" alt="Menu Image" class="preview"> 

    <label>New Image (optional)</label>
    <input type="file" name="image" value="<?php echo $data['image'];?>">

    <label>Category</label>
    <!-- <input type="text" name="category" value="<?php echo $data['category'];?>"> -->
    <select name="category">
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

    <label>Status</label>
    <select name="status">
      <option value="active" <?= ($data['status'] == 'active') ? 'selected' : '' ?>>Active</option>
      <option value="inactive" <?= ($data['status'] == 'inactive') ? 'selected' : '' ?>>Inactive</option>
    </select>

    <div class="form-actions">
      <button type="submit" name="submit" class="btn btn-update">Update</button>
      <a href="menu.php" class="btn btn-cancel">Cancel</a>
    </div>
  </form>
</div>

</body>
</html>

<?php
  if(isset($_POST["submit"]))
    {
     echo$title = $_POST["title"];
     echo$price = $_POST["price"];
     echo$description = $_POST["description"];
      if($_FILES["image"]["name"] == "")
        {
          echo$image = $data["image"];
        }
      else 
        {
          echo $image = $_FILES["image"]["name"];

          $temp_lcoation = $_FILES["image"]["tmp_name"];
          $destination_path ="../uploads/menu/$image";

          $upload = move_uploaded_file($temp_lcoation,$destination_path);

        }  
      
      if(!isset($_POST["category"]))
        {
          $category = $data["category_id"];
        }
      else
        {
         $category = $_POST["category"];
        }  
     
      $status = $_POST["status"];
      
      $update_sql = "UPDATE menu_tb SET title='$title',price='$price',image='$image',category_id='$category',status='$status',
      description='$description' WHERE id=$upate_id";
      $result2 = mysqli_query($conn, $update_sql);
      if($result2 == TRUE)
      {
            header("Location:http://localhost/project1/admin/menu.php");
          // echo "<script>window.location.herf='".$SITEURL."admin/menu.php';</script>";
          $_SESSION["updated_food"]="<div class='success'>Food Updated Successfully!</div>";
         }
       else
         {
         $_SESSION["updated_food"]="<div class='error'>Failed To Update!</div>";
         }  
    }
?>
