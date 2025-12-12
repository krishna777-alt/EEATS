<?php
   include "connection/connect.php";

   if(!isset($_SESSION["admin"]))
    {
      header("location:".$SITEURL."admin/admin-login.php");
    }
    
    $categories = [];
    $res = mysqli_query($conn, "SELECT id, title FROM category_tb WHERE status='active'");
    if ($res) {
        while ($row = mysqli_fetch_assoc($res))
         {
            $categories[] = $row;
        }
}
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Manage Menu</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f8f9fa;
    }

    header {
      background-color: #343a40;
      color: #fff;
      padding: 1rem 2rem;
      font-size: 1.5rem;
    }

    .menu-container {
      padding: 2rem;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
    }

    .top-bar input,
    .top-bar select {
      padding: 0.5rem 1rem;
      font-size: 1rem;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .add-btn {
      background-color: #28a745;
      color: white;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1rem;
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 1.5rem;
    }

    .food-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: transform 0.2s ease;
    }

    .food-card:hover {
      transform: translateY(-5px);
    }

    .food-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .food-content {
      padding: 1rem;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .food-title {
      font-size: 1.2rem;
      font-weight: bold;
      color: #333;
    }

    .food-price {
      color: #28a745;
      font-size: 1rem;
      font-weight: 600;
    }

    .food-category {
      font-size: 0.9rem;
      color: #666;
    }

    .status {
      font-size: 0.85rem;
      font-weight: bold;
      padding: 0.3rem 0.6rem;
      border-radius: 10px;
      width: fit-content;
    }

    .active {
      background: #d4edda;
      color: #155724;
    }

    .inactive {
      background: #f8d7da;
      color: #721c24;
    }

    .food-actions {
      margin-top: auto;
      display: flex;
      gap: 0.5rem;
      justify-content: flex-end;
    }
/* /////////////////////////////////////////////////// */
.food-actions .add-btn a {
  display: inline-block;
  padding: 0.4rem 0.8rem;
  font-size: 0.85rem;
  border-radius: 6px;
  cursor: pointer;
  color: white;
  text-decoration: none;
  transition: background 0.3s ease, transform 0.2s ease;
}

/* Specific classes for edit and delete buttons */
.food-actions .edit-link {
  background-color: #28a745;
}

.food-actions .edit-link:hover {
  background-color: #218838;
  transform: translateY(-1px);
}

.food-actions .delete-link {
  background-color: #dc3545;
}

.food-actions .delete-link:hover {
  background-color: #c82333;
  transform: translateY(-1px);
}
a{
  text-decoration: none;
}
/* ---- */
.edit-btn {
  display: inline-block;
  background-color: #28a745;
  color: white;
  padding: 0.45rem 0.9rem;
  font-size: 0.85rem;
  font-weight: 500;
  border-radius: 6px;
  text-decoration: none;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.2s ease;
}

.edit-btn:hover {
  background-color: #218838;
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}
/* ////////// */
.delete-btn {
  display: inline-block;
  background-color: #dc3545;
  color: white;
  padding: 0.45rem 0.9rem;
  font-size: 0.85rem;
  font-weight: 500;
  border-radius: 6px;
  text-decoration: none;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.2s ease;
}

.delete-btn:hover {
  background-color: #c82333;
  transform: translateY(-1px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

/* ///////////////////////////////////////////// */
    .food-actions button {
      padding: 0.4rem 0.8rem;
      font-size: 0.85rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      color: white;
    }

    .edit-btn {
      background: #007bff;
    }

    .delete-btn {
      background: #dc3545;
    }

    @media (max-width: 600px) {
      .top-bar {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
      }
    }
  </style>
</head>
<body>

  <?php
   include "partials/header.php";
   session_start(); 
   ?>
  <!-- <header>Admin Dashboard - Manage Menu</header> -->

  <div class="menu-container">
    <div class="top-bar">
      <input type="text" id="searchFood" placeholder="Search food...">
      <!-- <select id="categoryFilter">
        <option value="">All Categories</option>
        <option value="Pizza">Pizza</option>
        <option value="Burgers">Burger</option>
        <option value="Desserts">Desserts</option>
       
      </select> -->
      <?php
        if (isset($_SESSION["add-menu-msg"]))
           {
            echo $_SESSION["add-menu-msg"];
            unset($_SESSION["add-menu-msg"]);
          }
        if(isset($_SESSION['edit-menu-msg']))
          {
            echo $_SESSION['edit-menu-msg'];
            unset($_SESSION['edit-menu-msg']);
          }  
        if(isset($_SESSION["delete"]))
          {
            echo $_SESSION["delete"];
            unset($_SESSION["delete"]);
          }  
       $_SESSION["adm_id"];   
  ?>
      <!-- <button class="add-btn">+ Add New Food</button> -->
      <a href="<?php echo $SITEURL;?>admin/add-menu.php" class="add-btn">+ Add New Food</a>
    </div>
     
    <div class="menu-grid" id="menuGrid">
      <!-- Example Food Item -->
      <?php
       $sql ="SELECT * FROM menu_tb";
       $result = mysqli_query($conn, $sql);

       if($result == TRUE)
         {
           $count = mysqli_num_rows($result);
           if($count>0)
             {
               while($row = mysqli_fetch_assoc($result))
                {
                  ?>
                   <div class="food-card">
                  <img src="<?php echo $SITEURL;?>images/menu/<?php echo $row["image"];?>" alt="Pizza">
                  <div class="food-content">
                    <div class="food-title"><?php echo $row["title"];?></div>
                    <div class="food-price"><?php echo $row["price"];?></div>
                    <div class="food-category"><?php echo $row["category"];?></div>
                    <div class="status active"><?php echo $row["status"];?></div>
                    <div class="food-actions">
                      <!-- <button class="edit-btn">Edit</button>
                      <a href="update-menu.php" class="edit-btn">Edit</a> -->
                      <a href="<?php echo $SITEURL;?>admin/update-menu.php?id=<?php echo $row["id"];?>" class="edit-btn">✏️ Edit</a>

                      <!-- <button name="delete" class="delete-btn">Delete</button> -->
                      <a href="<?php echo $SITEURL;?>admin/delete-menu.php?id=<?php echo $row["id"];?>" class="delete-btn">Delete</a>
                    </div>
                  </div>
                </div>
                <?php
                }
             }
         }
     ?>
      

    </div>
  </div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById('searchFood');
    const categoryFilter = document.getElementById('categoryFilter');//Pizza
    const cards = document.querySelectorAll('.food-card');

    function filterMenu() {
      const searchValue = searchInput.value.toLowerCase();
      const selectedCategory = categoryFilter.value.toLowerCase();//pizza

      cards.forEach(card => {
        const title = card.querySelector('.food-title').innerText.toLowerCase();
        const category = card.querySelector('.food-category').innerText.toLowerCase();//pizza

        const matchesSearch = title.includes(searchValue);
        const matchesCategory = selectedCategory === "" || category === selectedCategory;

        if (matchesSearch || matchesCategory) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    }

    // Attach event listeners
    searchInput.addEventListener('input', filterMenu);
    categoryFilter.addEventListener('change', filterMenu);
  });
</script>


</body>
</html>
