<style>
    
  .you-may-like-section {
    padding: 2rem;
    background: #f8f9fa;
    font-family: 'Segoe UI', sans-serif;
  }

  .you-may-like-section h2 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 2rem;
    color: #333;
  }

  .like-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    max-width: 1200px;
    margin: auto;
  }

  .like-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.05);
    padding: 1rem;
    text-align: center;
    transition: transform 0.3s ease;
  }

  .like-card:hover {
    transform: translateY(-5px);
  }

  .like-card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 0.8rem;
  }

  .like-card h3 {
    font-size: 1.1rem;
    color: #222;
    margin-bottom: 0.4rem;
  }

  .like-card p {
    color: #28a745;
    font-weight: bold;
    margin-bottom: 0.8rem;
  }

  .order-btn {
    display: inline-block;
    padding: 0.5rem 1rem;
    background: #ff5722;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: background 0.3s ease;
  }

  .order-btn:hover {
    background: #e64a19;
  }

  @media (max-width: 600px) {
    .like-grid {
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    }
  }
</style>


<section class="you-may-like-section">
  <h2>You May Also Like 🍽️</h2>
  <div class="like-grid">
    <!-- Item Card -->
     <?php
        $id = $_GET["menu_id"];
         
        $sql_str = "SELECT * FROM menu_tb WHERE id=$id";
        $cheak = mysqli_query($conn, $sql_str);
        $row = mysqli_fetch_array($cheak);
  
        $related_food =  $row["category_id"];

        $sql_menu = "SELECT * FROM menu_tb WHERE category_id='$related_food'";
        $menu = mysqli_query($conn, $sql_menu);
        
        while($rows = mysqli_fetch_array($menu))
          {
            
            ?>
             <div class="like-card">
              <a href="food-detail.php?menu_id=<?php echo $rows["id"];?>">
                <img src="images/menu/<?php echo $rows["image"];?>" alt="Pizza">
              </a>
              <h3><?php echo $rows["title"];?></h3>
              <p>₹<?php echo $rows["price"];?></p>
             
            </div>
            
            <?php
          }
      ?>

    <!-- <div class="like-card">
      <img src="images/menu/burger1.jpg" alt="Burger">
      <h3>Spicy Chicken Burger</h3>
      <p>₹199</p>
      <a href="food-details.php?id=2" class="order-btn">Order Now</a>
    </div>

    <div class="like-card">
      <img src="images/menu/dessert1.jpg" alt="Dessert">
      <h3>Chocolate Lava Cake</h3>
      <p>₹149</p>
      <a href="food-details.php?id=3" class="order-btn">Order Now</a>
    </div>

    <div class="like-card">
      <img src="images/menu/drink1.jpg" alt="Drink">
      <h3>Choco Frappe</h3>
      <p>₹120</p>
      <a href="food-details.php?id=4" class="order-btn">Order Now</a>
    </div> -->

    <!-- Repeat as needed for up to 16 items -->
  </div>
</section>
