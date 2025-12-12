<?php
 include "partials/header.php";
  // $menu_id=$_GET["menu_id"];
if(!isset($_SESSION["user_id"]))
  {
    header("Location:" . $SITEURL . "user-login.php");
  }
 $cat_id = $_GET["cate_id"];
?>

  
  <link rel="stylesheet" href="css/menu-display.css" />

<body class="menu-page-body">

  <header class="menu-hero">
    <div class="menu-hero-overlay">
      <h1 class="menu-title">🍽️ Dinner</h1>
    </div>
  </header>

  <main class="menu-container">
    <div class="menu-grid">
      <!-- Menu Card Item -->
       <?php 
         $sql = "SELECT * FROM menu_tb WHERE category_id='$cat_id'";
         $res = mysqli_query($conn,$sql);
         
         while($row = mysqli_fetch_array($res))
           {
            ?>
                <div class="menu-card">
                    <a href="<?php echo$SITEURL;?>food-detail.php?menu_id=<?php echo$row["id"];?>">
                        <img src="<?php echo$SITEURL;?>uploads/menu/<?php echo$row["image"];?>" alt="Spicy Potato" class="menu-img"/>
                    </a>
                    <h2 class="menu-item-title"><?php echo$row["title"];?></h2>
                    <p class="menu-desc">chilli / pepper / potato / salt</p>
                    <!-- <span class="menu-tag vegetarian">vegetarian</span> -->
                    <p class="menu-price">$<?php echo$row["price"];?></p>

                    <!-- <a style="display: flex; align-items: center; justify-content: center; text-decoration: none;" href="<?php echo$SITEURL;?>partials/add-to-cart.php?id=<?php echo$row["id"];?>">
                      <button class="menu-add-btn">ADD TO CART</button>
                    </a> -->
                </div>

            <?php
           }
       ?>
      
      <!-- <div class="menu-card">
        <img src="images/menu/burger2.jpg" alt="Pasta" class="menu-img"/>
        <h2 class="menu-item-title">Pasta</h2>
        <p class="menu-desc">cheese / salt / spaghetti / tomato</p>
        <p class="menu-price">$15.00</p>
        <button class="menu-add-btn">ADD TO CART</button>
      </div>

      <div class="menu-card">
        <img src="images/menu/chinees-noodles2.jpg" alt="Garlic Bread" class="menu-img"/>
        <h2 class="menu-item-title">Garlic bread</h2>
        <p class="menu-desc">cheese / salt / tomato</p>
        <span class="menu-tag vegetarian">vegetarian</span>
        <p class="menu-price">$12.00</p>
        <button class="menu-add-btn">ADD TO CART</button>
      </div>

      <div class="menu-card">
        <img src="images/nachos.jpg" alt="Italian Nachos" class="menu-img"/>
        <h2 class="menu-item-title">Italian nachos</h2>
        <p class="menu-desc">cheese / garlic / salt / tomato</p>
        <span class="menu-tag new">new</span>
        <p class="menu-price">$23.00</p>
        <button class="menu-add-btn">ADD TO CART</button>
      </div>

      <div class="menu-card">
        <img src="images/tomato-soup.jpg" alt="Tomato Soup" class="menu-img"/>
        <h2 class="menu-item-title">Tomato soup</h2>
        <p class="menu-desc">garlic / pepper / tomato</p>
        <span class="menu-tag popular">popular</span>
        <span class="menu-tag vegetarian">vegetarian</span>
        <p class="menu-price">$16.00</p>
        <button class="menu-add-btn">ADD TO CART</button>
      </div>

      <div class="menu-card">
        <img src="images/grilled-salmon.jpg" alt="Grilled Salmon" class="menu-img"/>
        <h2 class="menu-item-title">Grilled salmon</h2>
        <p class="menu-desc">cucumber / garlic / lemon / lettuce / salmon</p>
        <span class="menu-tag hot">hot</span>
        <p class="menu-price">$20.00</p>
        <button class="menu-add-btn">ADD TO CART</button>
      </div>

       <div class="menu-card">
        <img src="images/menu/beef-burger.jpg" alt="Spicy Potato" class="menu-img"/>
        <h2 class="menu-item-title">Spicy potato</h2>
        <p class="menu-desc">chilli / pepper / potato / salt</p>
        <span class="menu-tag vegetarian">vegetarian</span>
        <p class="menu-price">$12.00</p>
        <button class="menu-add-btn">ADD TO CART</button>
      </div>

       <div class="menu-card">
        <img src="images/menu/beef-burger.jpg" alt="Spicy Potato" class="menu-img"/>
        <h2 class="menu-item-title">Spicy potato</h2>
        <p class="menu-desc">chilli / pepper / potato / salt</p>
        <span class="menu-tag vegetarian">vegetarian</span>
        <p class="menu-price">$12.00</p>
        <button class="menu-add-btn">ADD TO CART</button>
      </div>

       <div class="menu-card">
        <img src="images/menu/beef-burger.jpg" alt="Spicy Potato" class="menu-img"/>
        <h2 class="menu-item-title">Spicy potato</h2>
        <p class="menu-desc">chilli / pepper / potato / salt</p>
        <span class="menu-tag vegetarian">vegetarian</span>
        <p class="menu-price">$12.00</p>
        <button class="menu-add-btn">ADD TO CART</button>
      </div> -->
    </div> 
  </main>

<?php include "partials/footer.php";?>