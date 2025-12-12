<?php include "../admin/connection/connect.php"; ?>
<style>
    .add-food-container {
  max-width: 700px;
  background-color: #fff;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
  margin: 30px auto;
}

.add-food-container h2 {
  font-size: 28px;
  color: #2c3e50;
  margin-bottom: 20px;
  text-align: center;
}

.add-food-form .form-group {
  margin-bottom: 18px;
}

.add-food-form label {
  display: block;
  font-weight: 600;
  margin-bottom: 8px;
  color: #34495e;
}
 body {
  background-image: url('../images/hero-healthy-food.jpg'); /* Replace with your image path */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  font-family: "Segoe UI", sans-serif;
}
body {
  position: relative;
  font-family: "Segoe UI", sans-serif;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  color: #fff;
}

/* Background image layer */
body::before {
  content: "";
  background-image: linear-gradient(rgba(20, 20, 20, 0.6), rgba(20, 20, 20, 0.6)), url('../images/hero-healthy-food.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  filter: brightness(0.9) blur(1px);
  animation: fadeInBg 2s ease-in-out forwards;
}

/* Optional animation */
@keyframes fadeInBg {
  0% {
    opacity: 0;
    transform: scale(1.02);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

.add-food-form input[type="text"],
.add-food-form input[type="number"],
.add-food-form input[type="file"],
.add-food-form select,
.add-food-form textarea {
  width: 100%;
  padding: 10px;
  border: 1.2px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
}

.add-food-form textarea {
  resize: vertical;
}

.submit-btn {
  width: 100%;
  padding: 12px;
  background-color: #1abc9c;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 18px;
  cursor: pointer;
  transition: background 0.3s;
}

.submit-btn:hover {
  background-color: #16a085;
}
.fl{
  display: flex;
  flex-direction: column;
  justify-content:space-between;

  gap: 2rem;
}
</style>
<div class="add-food-container">
  <?php 
    if($_SESSION["food-add"])
      {
        echo $_SESSION["food-add"];
        unset($_SESSION["food-add"]);
      }
  ?>
  <h2>➕ Add New Food Item</h2>
  <form action="" method="POST" enctype="multipart/form-data" class="add-food-form">
    <div class="form-group">
      <label for="title">🍽️ Food Name:</label>
      <input type="text" name="title" id="title" placeholder="Enter food name" required>
    </div>

    <div class="form-group">
      <label for="description">📝 Description:</label>
      <textarea name="description" id="description" placeholder="Enter food description" rows="4" required></textarea>
    </div>

    <div class="form-group">
      <label for="price">💰 Price (₹):</label>
      <input type="number" name="price" id="price" step="0.01" required>
    </div>

    <div class="form-group">
      <label for="category">📂 Category:</label>
      <select name="category_id" id="category" required>
        <option value="">Select a category</option>
        <?php
        $sql = "SELECT * FROM category_tb";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
          // echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</option>";
          ?>
           <option value="<?php echo $row["id"];?>"><?php echo $row["title"];?></option>
          <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="price">Status:</label>
      <!-- <input type="text" name="status" id="price" step="0.01" required> -->
       <select name="status" id="">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
       </select>
    </div>

    <div class="form-group">
      <label for="image">📸 Upload Image:</label>
      <input type="file" name="image" id="image" >
    </div>

    <div class="fl">
      <button type="submit" name="submit" class="submit-btn">➕ Add Food</button>
      <!-- <a href="<?php echo $SITEURL;?>restaruant/manage-food.php">
        <button type="" name="cancel" class="submit-bt">Cancel</button>
      </a> -->
    </div>
  </form>
</div>
<?php
   $res_id = $_GET["id"];

  if(isset($_POST["submit"]))
    {
      $title = $_POST["title"];
      $price   = $_POST["price"];      
      $description = $_POST["description"];
      $category_id = $_POST["category_id"];

      if(!isset($_POST["status"]))
        {
          $status ="Active";
        }
      else
        {

          $status = $_POST["status"];     
        }  
      // echo$ 
      if(!isset($_FILES["image"]["name"]))
        {
          $image_name ="NO IMAGE";
        }
      else
        {
          $image_name = $_FILES["image"]["name"];

          $temp_location = $_FILES["image"]["tmp_name"];
          $destination_path = "../uploads/menu/$image_name";
          
          $upload = move_uploaded_file($temp_location , $destination_path);

        }  
      $sql2 = "INSERT INTO menu_tb(title,price,image,status,description,category_id,res_id) VALUES
      ('$title','$price','$image_name','$status','$description','$category_id','$res_id')";

      $res2 = mysqli_query($conn,$sql2);

      if($res2 == TRUE)
        {
          $_SESSION["food-add"]="<div class='success'>Food Added Successfully!</div>";
          header("location:".$SITEURL."restaruant/manage-food.php");
        }
      else
        {
          $_SESSION["food-add"]="<div class='error'>Failed To Add Food!</div>";
        }  
    }
  // elseif(isset($_POST["cancel"]))
  //   {
  //     header("location:".$SITEURL."restaruant/manage-food.php");
  //   }  
 
?>