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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Manage Categories</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f1f3f5;
    }

    header {
      background-color: #343a40;
      color: #fff;
      padding: 1rem 2rem;
      font-size: 1.5rem;
    }

    .category-container {
      padding: 2rem;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 1.5rem;
      gap: 1rem;
    }

    .top-bar input {
      padding: 0.5rem 1rem;
      font-size: 1rem;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .add-category-btn {
      background-color: #007bff;
      color: white;
      padding: 0.5rem 1.2rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1rem;
      text-decoration: none;
    }

    .category-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 1.5rem;
    }

    .category-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: 0.3s;
    }

    .category-card:hover {
      transform: translateY(-4px);
    }

    .category-card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .category-content {
      padding: 1rem;
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
    }

    .category-title {
      font-size: 1.2rem;
      font-weight: 600;
      color: #333;
    }

    .status {
      padding: 0.3rem 0.6rem;
      border-radius: 10px;
      font-size: 0.85rem;
      width: fit-content;
      font-weight: bold;
    }

    .active {
      background-color: #d4edda;
      color: #155724;
    }

    .inactive {
      background-color: #f8d7da;
      color: #721c24;
    }

    .category-actions {
  margin-top: auto;
  display: flex;
  gap: 0.5rem;
  justify-content: flex-end;
}

.category-actions a {
  display: inline-block;
  padding: 0.4rem 0.8rem;
  font-size: 0.85rem;
  text-decoration: none;
  border-radius: 6px;
  cursor: pointer;
  color: white;
  font-weight: 500;
  transition: background 0.3s ease, transform 0.2s ease;
}

.category-actions .edit-link {
  background-color: #28a745;
}

.category-actions .edit-link:hover {
  background-color: #218838;
  transform: translateY(-1px);
}

.category-actions .delete-link {
  background-color: #dc3545;
}

.category-actions .delete-link:hover {
  background-color: #c82333;
  transform: translateY(-1px);
}


    .edit-btn {
      background-color: #28a745;
    }

    .delete-btn {
      background-color: #dc3545;
    }

    @media (max-width: 600px) {
      .top-bar {
        flex-direction: column;
        align-items: stretch;
      }
    }
  </style>
</head>
<body>

  <?php include "partials/header.php";?>
  <!-- <header>Admin Dashboard - Manage Categories</header> -->

  <div class="category-container">
    <div class="top-bar">
      <input type="text" id="searchCategory" placeholder="Search category...">
      <a href="add-categories.php" class="add-category-btn">+ Add New Category</a>
      <!-- <button class="add-category-btn">+ Add New Category</button> -->
    </div>
    <?php
       if(isset($_SESSION["add-category"]))
          {
            echo $_SESSION["add-category"];
            unset($_SESSION["add-category"]);
          }  
     
        if(isset($_SESSION["delete"]))
          {
            echo $_SESSION["delete"];
            unset($_SESSION["delete"]);
          }   
        if(isset($_SESSION["updated"]))
          {
            echo $_SESSION["updated"];
            unset($_SESSION["updated"]);
          }  
    ?>
    <div class="category-grid" id="categoryGrid">
      <!-- Example Category -->
       <?php
          $sql = "SELECT * FROM category_tb";
          $res = mysqli_query($conn, $sql);
         
          if($res == TRUE)
           {
              $count = mysqli_num_rows($res);

              if($count> 0)
                {
                  while($row = mysqli_fetch_array($res))
                    {
                      $id    = $row["id"];
                      $title = $row["title"];
                      $image = $row["image"];
                      $status = $row["status"];

                      
                    ?>
                    <div class="category-card">
                    <img src="<?php echo $SITEURL;?>uploads/category/<?php echo $image;?>" alt="Pizza">
                    
                    <div class="category-content">
                      <div class="category-title"><?php echo $title?></div>
                      <div class="status active"><?php echo $status?></div>
                      <div class="category-actions">
                        <a href="<?php echo $SITEURL;?>admin/update-category.php?id=<?php echo $id?>" class="edit-link">Edit</a>
                        <a href="delete-category.php?id=<?php echo $id;?>" class="delete-link">Delete</a>
                      </div>

                    </div>
                   </div>
                    
                    <?php
                    }
                }
           }  
      ?>
      

      <!-- <div class="category-card">
        <img src="../images/category/burger1.jpg" alt="Burger">
        <div class="category-content">
          <div class="category-title">Burgers</div>
          <div class="status inactive">Inactive</div>
          <div class="category-actions">
            
            <a href="" class="edit-btn">Edit</a>
            <a href="" class="delete-btn">Delete</a>
            
          </div>
        </div>
      </div> -->

      <!-- More categories dynamically -->
    </div>
  </div>

  <script>
    const searchCategory = document.getElementById('searchCategory');
    const categoryCards = document.querySelectorAll('.category-card');

    searchCategory.addEventListener('input', () => {
      const search = searchCategory.value.toLowerCase();

      categoryCards.forEach(card => {
        const title = card.querySelector('.category-title').innerText.toLowerCase();
        card.style.display = title.includes(search) ? 'block' : 'none';
      });
    });
  </script>

</body>
</html>
