<?php
   include "connection/connect.php";

   if(!isset($_SESSION["admin"]))
    {
      header("location:".$SITEURL."admin/admin-login.php");
    }
     
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Category</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f8;
      margin: 0;
      padding: 2rem;
    }

    .add-category-container {
      max-width: 600px;
      margin: 2rem auto;
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }

    .add-category-container h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: #333;
    }

    form label {
      font-weight: 600;
      margin-bottom: 0.5rem;
      display: block;
      color: #444;
    }

    form input[type="text"],
    form input[type="file"],
    form select {
      width: 100%;
      padding: 0.7rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      margin-bottom: 1.2rem;
    }

    form input[type="file"] {
      padding: 0.4rem;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      gap: 1rem;
    }

    .btn {
      padding: 0.6rem 1.2rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
      text-decoration: none;
      color: #fff;
      text-align: center;
    }

    .btn-add {
      background-color: #28a745;
    }

    .btn-add:hover {
      background-color: #218838;
    }

    .btn-cancel {
      background-color: #6c757d;
    }

    .btn-cancel:hover {
      background-color: #5a6268;
    }

    .message {
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
      text-align: center;
      font-weight: 500;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      border-left: 5px solid #28a745;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
      border-left: 5px solid #dc3545;
    }
  </style>
</head>
<body>

<div class="add-category-container">
  <h2>Add New Category</h2>


  <form action="" method="POST" enctype="multipart/form-data">
    <?php
      if(isset($_SESSION["add-category"]))
         {
            echo $_SESSION['add-category'];
            unset($_SESSION['add-category']);
         }
    ?>
    <label for="title">Category Title</label>
    <input type="text" id="title" name="title" placeholder="e.g., Pizza, Drinks, Desserts" required>

    <label for="image">Category Image (optional)</label>
    <input type="file"  name="file">

    <label for="status">Status</label>
    <select id="status" name="status">
      <option value="active" selected>Active</option>
      <option value="inactive">Inactive</option>
    </select>

    <div class="form-actions">
      <button name="submit" type="submit" class="btn btn-add">Add Category</button>
      <a href="categories.php" class="btn btn-cancel">Cancel</a>
    </div>
  </form>
</div>
<!-- <img src= alt=""> -->
</body>
</html>
<?php
//   echo "i am here";
    if(isset($_POST["submit"]))
      {
          $title = ucfirst($_POST["title"]);
          if(isset($_POST["status"]))
              {
                $status = $_POST["status"];
              }
          else
              {
                $status = "No";
              }  
            // print_r($_FILES["image"]);
            if(!isset($_FILES["file"]["name"]))
                {
                  
                  $image_name ="none";
                }
                else 
                {
                  print_r($_FILES["file"]);
                   $image_name = $_FILES["file"]["name"];

                  $temp_lcoation = $_FILES["file"]["tmp_name"];
                  $destination_path = "../uploads/category/$image_name";

                  $upload = move_uploaded_file($temp_lcoation,$destination_path);

                }   
                
          $sql ="INSERT INTO category_tb (title,image,status) VALUES('$title','$image_name','$status')";
          $result = mysqli_query($conn,$sql);
          if($result == TRUE)
            {

                $_SESSION["add-category"] = "<div class='success'>Category Added Successfully</div>";
                //goback to manage category page
                header("location:".$SITEURL."admin/categories.php");
            }   
          else
            {
                $_SESSION["add-category"] = "<div class='error'>Failed to Added Category!</div>";
                //goback to manage category page
                header("location:".$SITEURL."admin/add-categories.php");
            }     
      }

?>
