<?php include "partials/header.php";
       
      //  if(!isset($_SESSION["user"]))
      //    {
      //      header("location:".$SITEURL."user-login.php");
      //    }
       if($_SESSION["login"])
         {
           echo $_SESSION["login"];
           unset($_SESSION["login"]);
         }
      $user= $_SESSION["user_id"];  
        
?>
    <main>  
        <section class="hero-section ">
            <div class="hero">
                <h1 class="hero-title">order your favourite food here</h1>
                <p class="hero-dis">
                    Craving something delicious? Whether it’s cheesy pizza, spicy noodels,
                     or a refreshing smoothie, we bring your favorite meals straight to your doorstep—hot,
                      fresh, and full of flavor. Discover a world of taste,
                     handpicked from top-rated kitchens near you. Satisfy your hunger with just one click!
                </p>
                <a href="<?php $SITEURL;?>menu.php" class="hero-btn">order now</a>
            </div>
        </section>
 
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<section class="featured-recipes-section">
  <h2 class="featured-title">Simple & Delicious Vegan Recipes</h2>
  <div class="recipe-card-container">
    <?php 
       $seql = "SELECT * FROM menu_tb WHERE category_id=1";
       $r = mysqli_query($conn,$seql);
       
       $c = mysqli_num_rows($r);
       if($c>0)
         {

           while($fetch = mysqli_fetch_array($r))
              {
               
                ?>
                  <a style="text-decoration: none; color: inherit;" href="<?php echo $SITEURL;?>category.php?id=<?php echo $fetch["id"];?>">
                   <div class="recipe-card">
                      <img src="<?php echo $SITEURL?>uploads/menu/<?php echo $fetch["image"];?>" alt="Vegan Chili">
                      <div class="label">butter</div>
                      <h3 class="recipe-name"><?php echo $fetch["title"];?></h3>
                    </div>
                  </a>
                <?php
              }
         }
             
    ?>
   

    <!-- <div class="recipe-card">
      <img src="images/recipes/mushroom.jpg" alt="Mushroom Stroganoff">
      <div class="label">One Pot</div>
      <h3 class="recipe-name">Vegan Mushroom Stroganoff (One Pot)</h3>
      <div class="stars">⭐⭐⭐⭐⭐</div>
    </div> -->

    <!-- <div class="recipe-card">
      <img src="images/recipes/coconut.jpg" alt="Coconut Curry">
      <div class="label">Main Dishes</div>
      <h3 class="recipe-name">Creamy Coconut & Red Lentil Curry</h3>
    </div> -->

  </div>
</section>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<section class="featured-dishes">
  <?php
      if(isset($_SESSION["cart-added"]))
          {
            echo $_SESSION["cart-added"];
            unset($_SESSION["cart-added"]);
          }
      if($_SESSION["order"])
         {
          echo $_SESSION["order"];
          unset($_SESSION["order"]);
         }      
  ?>
  <h2 class="section-title">🍽️ Popular Today</h2>
  <div class="dish-grid">
    <?php 
      $sql = "SELECT * FROM menu_tb";
      $res = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($res))
         {
          ?>

            <div class="dish-card">
                <a style="text-decoration: none; color: inherit;" href="food-detail.php?id=<?php echo $row["id"];?>">
                <img src="<?php echo $SITEURL;?>images/menu/<?php echo $row["image"];?>" alt="Pizza">
                <h3><?php echo $row["title"];?></h3>
                <p class="price">₹<?php echo $row["price"];?></p>

                  <!-- <button name="cart" class="add-btn">Add to Cart</button> -->
                  <?php if(isset($_SESSION["user_id"])): ?>

                          <a href="<?php echo $SITEURL;?>partials/add-to-cart.php?id=<?php echo $row["id"];?>">
                      <button class="add-btn">Add to Cart</button>
                      <?php $_SESSION["HTTP_REFERER"]="index.php";?>
                      </a>              
                          
                  
                <?php else: ?>
                     <a href="<?php echo $SITEURL;?>user-login.php">
                      <?php $_SESSION["HTTP_REFERER"]="index.php";?>
                      <button class="order-btn">Login to order</button>    
                    </a>
                  <?php endif;?>  

                  <!-- <a href="order-now.php?id=123" class="order-btn">Order Now</a> -->
                  <!-- <div class="action-buttons">
                      <a href="add-to-cart.php?id=123" class="add-btn">Add to Cart</a>
                  </div> -->
                    </a>
              </div>
          
          <?php
         }
    ?>
    
  </div>
</section>
 <section>
   <div class="mac-container">
     <div class="mac-image">
      <a href="<?php echo $SITEURL;?>recipe.php">
        <img src="images/menu/mashroom-noodles.jpg" alt="Mac & Cheese" />
        </a>
    </div>
   <div class="mac-content">
    <span>Collection</span>
    <h1>Irresistible Noodle Recipes From Around the World</h1>
    <p>
        Noodles are the ultimate comfort food, beloved across cultures for their versatility and satisfying texture. 
        From silky Italian pasta to springy Asian noodles, this collection showcases global varieties that can be 
        healthy when made with whole grains, fresh vegetables, and lean proteins. Discover quick weeknight dinners, 
        hearty soups, and light salads that prove noodles can be both delicious and nutritious.
    </p>
</div>
  </div>
 </section>
 <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
 <section class="our-services-section">
  <div class="services-header">
    <h2><span class="bar"></span> Our Services</h2>
    <p class="intro-text">
      Discover how we make your food experience better — from seamless table bookings to lightning-fast delivery at your doorstep.
    </p>
  </div>

  <div class="services-content">
    <div class="service-box box-left">
      <div class="icon">
        <img src="images/table-picnic.png" alt="Table Booking">
      </div>
      <div class="text">
        <h4>advanced table<br>booking</h4>
        <p>Reserve your favorite table online in seconds, hassle-free and fast.</p>
      </div>
    </div>

    <div class="service-box box-left">
      <div class="text">
        <h4>Food for Free<br>24/7</h4>
        <p>Enjoy surprise giveaways and exclusive food offers round the clock.</p>
      </div>
      <div class="icon">
        <img src="images/holding-hand-dinner.png" alt="Food">
      </div>
    </div>

    <div class="service-box box-right large">
      <div class="icon">
        <img src="images/delivery-man.png" alt="Delivery">
      </div>
      <div class="text">
        <h4>free home delivery<br>at your door steps</h4>
        <p>Get your delicious meals delivered hot and fresh to your home without any extra charges.</p>
      </div>
    </div>
  </div>
</section>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
 <section class="fan-favorites">
    <div class="section-header">
        <h2 class="section-title">Fan Favorites</h2>
        <a href="<?php echo $SITEURL;?>menu.php" class="view-all">View All</a>
    </div>
    
    <div class="items-grid">
        <!-- Row 1 -->
          <?php
           $food_sql = "SELECT * FROM menu_tb WHERE category='desserts'";
           $food = mysqli_query($conn, $food_sql);
           while($row = mysqli_fetch_array($food))
             {
                ?>
           <a style="text-decoration: none; color: inherit;" href="category.php?id=<?php echo $row["id"];?>"> 
               <div class="food-item">
                  <img src="<?php echo $SITEURL;?>images/menu/<?php echo $row["image"];?>" alt="Pineapple juice" class="food-image">
                  <div class="food-info">
                      <h3 class="food-name">Pineapple Juice</h3>
                      <p class="food-desc">Sweet, tart, and tropical - full of flavor and nutrients, served chilled.</p>
                  </div>
                </div>
              </a> 
             <?php
           }
         ?>  
       
    </div>
</section>

<style>
   
</style>

    </main>
    <div class="toast-copy-container" id="copy-toast"></div>

    <script src="js/script.js"></script>

<?php include "partials/footer.php";?>


<!-- 
<section class="special-offers">
  <h2 class="section-title">🔥 Special Offers Just for You</h2>
  <div class="offer-container">
    <div class="offer-card">
      <h3>Flat ₹50 OFF</h3>
      <p>On all orders above ₹299</p>
      <span class="offer-code">Use Code: <strong>EAT50</strong></span>
    </div>

    <div class="offer-card">
      <h3>Free Drink</h3>
      <p>With any Pizza</p>
      <span class="offer-code">Use Code: <strong>FREEDRINK</strong></span>
    </div>

    <div class="offer-card">
      <h3>Buy 1 Get 1</h3>
      <p>On all Burgers</p>
      <span class="offer-code">Use Code: <strong>BOGO</strong></span>
    </div>

    <div class="offer-card">
      <h3>20% OFF</h3>
      <p>For new users only</p>
      <span class="offer-code">Use Code: <strong>WELCOME20</strong></span>
    </div>
  </div>
</section> -->

        