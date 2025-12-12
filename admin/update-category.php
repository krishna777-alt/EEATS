<?php
include "connection/connect.php";

$update_id =  $_GET["id"];

$sql = "SELECT * FROM category_tb WHERE id=$update_id";

$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Category</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 2rem;
    }
    .edit-container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }
    h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: #444;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 0.4rem;
    }
    input[type="text"],
    input[type="file"],
    select {
      width: 100%;
      padding: 0.7rem;
      margin-bottom: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .current-img {
      margin-bottom: 1rem;
    }
    .current-img img {
      max-width: 180px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .btn-group {
      display: flex;
      justify-content: space-between;
    }
    .btn {
      padding: 0.6rem 1.4rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      font-weight: 600;
      text-decoration: none;
      color: #fff;
      transition: 0.3s ease;
    }
    .btn-update {
      background: #007bff;
    }
    .btn-update:hover {
      background: #0056b3;
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

<div class="edit-container">
  <h2>Edit Category</h2>
   
  <?php if (isset($_SESSION['updated'])) {
    echo $_SESSION['updated'];
    unset($_SESSION['updated']);
  } ?>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
  <!-- <img src="" alt=""> -->
    <label for="title">Category Title</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($row['title']) ?>" required>

    <label>Current Image</label>
    <div class="current-img">
      <?php if ($row['image']): ?>
        <img src="<?php echo $SITEURL;?>uploads/category/<?php echo $row["image"];?>" alt="Current Image">
      <?php else: ?>
        <p>No image uploaded.</p>
      <?php endif; ?>
    </div>

    <label for="image">Upload New Image (optional)</label>
    <input type="file" name="image" id="image">

    <label for="status">Status</label>
    <select name="status" id="status">
      <option value="active" <?= $row['status'] == 'active' ? 'selected' : '' ?>>Active</option>
      <option value="inactive" <?= $row['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
    </select>

    <div class="btn-group">
      <button type="submit" name="submit" class="btn btn-update">Update</button>
      <a href="categories.php" class="btn btn-cancel">Cancel</a>
    </div>
  </form>
</div>

</body>
</html>
<?php 
  
  if(isset($_POST["submit"]))
    {
      $new_title = ucfirst($_POST["title"]);
      $new_image = $_FILES["image"];
      // print_r($new_image);

      if(!isset($_FILES["image"]["name"]))
        {
          $new_image_name = $row["image"];
        }
      else
        {
          $new_image_name = $_FILES["image"]["name"];
        }  
      $new_status   = $_POST["status"];

      $update_sql = "UPDATE category_tb SET title='$new_title',image='$new_image_name',status='$new_status' WHERE id=$update_id";
      $res = mysqli_query($conn, $update_sql);

      if($res == TRUE)
        {
          // echo "Updated Succefully!";
          $_SESSION["updated"] = "<div class='success'>Category Updated Successfully</div>";
          header("location:".$SITEURL."admin/categories.php");
        }
      else
        {
          $_SESSION["updated"] = "<div class='success'>Error Updateing Category!</div>";
          header("location:".$SITEURL."admin/update-category.php");
        }  
    }
  
?>