<?php
include "../admin/connection/connect.php";

// Get food ID from URL
$id = $_GET['id'];
$user_id = $_SESSION["restaurant_id"];
$sql = "SELECT * FROM menu_tb WHERE id=$id";
$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Food</title>
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      padding: 50px;
      background-color: #f7f7f7;
    }

    .form-container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-container h2 {
      margin-bottom: 20px;
      font-size: 28px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-weight: 500;
      margin-bottom: 6px;
    }

    input[type="text"], input[type="number"], textarea, select {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .form-group img {
      width: 120px;
      margin-top: 10px;
      border-radius: 8px;
    }

    a,button {
      padding: 12px 25px;
      border: none;
      border-radius: 6px;
      background-color: #27ae60;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
      text-decoration: none;
    }

    a,button:hover {
      background-color: #219150;
    }
  .alin{
    display: flex;
    justify-content: space-between;
  }  
  </style>
</head>
<body>

  <div class="form-container">
    <?php
      if($_SESSION["food_updated"])
        {
          echo $_SESSION["food_updated"];
          unset($_SESSION["food_updated"]);
        }
    ?>
    <h2>✏️ Edit Food</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea name="description" rows="4"><?php echo htmlspecialchars($row['description']); ?></textarea>
      </div>

      <div class="form-group">
        <label>Price ($)</label>
        <input type="number" name="price" step="0.01" value="<?php echo $row['price']; ?>" required>
      </div>

      <div class="form-group">
        <label>Current Image</label><br>
        <?php if (!empty($row['image'])): ?>
          <img src="<?php echo $SITEURL;?>uploads/menu/<?php echo $row['image']; ?>" alt="Food Image">
        <?php else: ?>
          <p>No image uploaded</p>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label>New Image (optional)</label>
        <input type="file" name="image">
      </div>

      <div class="form-group">
        <label>Category</label>
        <select name="category_id" id="category" required>
         <?php 
            $sql3 = "SELECT * FROM category_tb";
            $res3 = mysqli_query($conn, $sql3);

            $row3 = mysqli_fetch_array($res3);
         ?> 
        <option value="<?php echo $row3["id"];?>"><?php echo $row3["title"];?></option>
        <?php
        
        while ($row2 = mysqli_fetch_assoc($res3)) {
          // echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</option>";
          ?>
           <option value="<?php echo $row2["id"];?>"><?php echo $row2["title"];?></option>
          <?php
        }
        ?>
      </select>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="status">
          <option value="Active" <?php if ($row['status'] == 'Active') echo 'selected'; ?>>Active</option>
          <option value="Inactive" <?php if ($row['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
        </select>
      </div>

      <div class="alin">
        <button name="update" type="submit">✅ Update Food</button>
        <!-- <button name="cancel" type="cancel"> Cancel</button>  -->
        <a type="cancel" href="<?php echo$SITEURL;?>restaruant/manage-food.php">Back</a>
      </div>
    </form>
  </div>

</body>
</html>
<?php
  if(isset($_POST["update"]))
     {
       if(!isset($_POST["title"]))
       {
         $title = $row["title"];
        }
        else
        {
          $title = $_POST["title"];
          }  
        $description = $_POST["description"];
        $price       = $_POST["price"];

        $category_id = $_POST["category_id"];

        if(!isset($_POST["status"]))
          {
            $status = $row["status"];
          }
        else
          {
            $status = $_POST["status"];
          }  
        if($_FILES["image"]["name"]=="")
          {
            $image_name=$row["image"]; 
          }
        else
          {
            $image_name = $_FILES["image"]["name"];

            $temp_location = $_FILES["image"]["tmp_name"];
            $destination_path = "../uploads/menu/$image_name";

            $upload = move_uploaded_file($temp_location,$destination_path);

          } 
          
        $update_sql = "UPDATE menu_tb SET
         title='$title',price='$price',image='$image_name',status='$status',description='$description',
         category_id='$category_id',res_id='$user_id' WHERE id='$id'"; 
        
        $result = mysqli_query($conn,$update_sql);

        if($result == TRUE)
          {
             $_SESSION["food_updated"]="<div class='success'>Successfully Updated</div>";
             header("Location:".$SITEURL."restaruant/manage-food.php");
          }
        else
          {
           $_SESSION["food_updated"]="<div class='error'>Failed To Update Food!</div>";
          }  
      }
  // elseif(isset($_POST["cancel"]))
  //    {
      
  //       header("Location: " . $SITEURL . "restaruant/manage-food.php");
        
  //    }   

?>