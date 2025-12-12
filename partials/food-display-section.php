<!-- ✅ MODERN FOOD DETAILS PAGE (INSPIRED BY IMAGE) -->
<section class="modern-food-section">
    <?php 
       if($_SESSION["cart-added"])
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
  <div class="modern-food-container">
    <div class="modern-food-left">
      <img src="uploads/menu/<?php echo $food["image"];?>" alt="Food Image" class="modern-food-img">
    </div>

    <div class="modern-food-right">
      <h1 class="food-name"><?php echo $food["title"];?></h1>
      <p class="food-subtitle">with Garlic Crostinis</p>
      <div class="food-rating">
        <span>⭐⭐⭐⭐☆</span>
        <span class="review-count">(29)</span>
      </div>
      <p class="food-desc">
         <?php echo $food["description"];?>   
      </p>

      <div class="food-tags">
        <span class="tag">Non Vegetarian</span>
        <span class="tag">American</span>
        <span class="tag">Main Course</span>
      </div>

      <div class="food-price-section">
        <div class="food-price"><?php echo $food["price"];?></div>

        <!-- <div class="quantity-select"> 
          <label for="quantity">Quantity:</label>
          <div class="quantity-box">
          
              <button class="qty-btn" name="action" id="minus">−</button>
              <span id="qty-val">1</span>
              <button class="qty-btn" name="action" id="plus">+</button>
            
          </div> 
        </div> -->
      </div>

     <script>
        let quantity = 1;
        const qtyVal = document.getElementById("qty-val");

        document.getElementById("plus").onclick = () => {
          quantity++;
          qtyVal.textContent = quantity;
        };

        document.getElementById("minus").onclick = () => {
          if (quantity > 1) {
            quantity--;
            qtyVal.textContent = quantity;
          }
        };
        
    </script>

      
      <?php if (isset($_SESSION["user_id"])): ?>
        <?php $_SESSION["HTTP_REFERER"] = $_SERVER["REQUEST_URI"]; ?>
           <!-- <button class="add-to-cart-btn">🛒 Add to Cart</button> -->
           <a href="partials/add-to-cart.php?id=<?php echo $food_id;?>" class="add-to-cart-btn">Add to Cart</a>
           <!-- <button class="order-btn_">🧾 Order Now</button> -->
            <?php
            $user_id = $_SESSION["user_id"];
            $form_sql = "SELECT * FROM order_form_tb WHERE user_id='$user'";
            $form_res = mysqli_query($conn, $form_sql);
            if (mysqli_num_rows($form_res) > 0):
            ?>
               <a href="partials/send-order.php?id=<?php echo $food_id;?>" class="order-btn_">Order Now </a>
            <?php else: ?>
                <a href="<?php echo $SITEURL;?>order-form.php?id=<?php echo $user;?>" class="order-btn_">Order Now </a>
            <?php endif; ?>

        <?php else: ?>
            <a href="user-login.php" class="proceed-btn">🔐 Proceed to Login</a>
        <?php endif; ?>
    </div>
  </div>
</section>

 <link rel="stylesheet" href="css/recently-viewed.css">
<section class="recently-viewed">
  <h2>Recently Viewed</h2>
  <div class="recent-items">
    <?php
      if (!isset($_SESSION["recently_viewed"])) {
        $_SESSION["recently_viewed"] = [];
      }

      // Add current item to the beginning
      $current_id = $food['id'];
      if (!in_array($current_id, $_SESSION["recently_viewed"])) {
        array_unshift($_SESSION["recently_viewed"], $current_id);
      }
      // Keep only last 5
      $_SESSION["recently_viewed"] = array_slice($_SESSION["recently_viewed"], 0, 7);

      foreach ($_SESSION["recently_viewed"] as $id) {
        if ($id == $current_id) continue;
        $res = mysqli_query($conn, "SELECT * FROM menu_tb WHERE id = $id");
        if ($item = mysqli_fetch_assoc($res)) {
    ?>
      <a href="food-detail.php?menu_id=<?php echo $item['id']; ?>" class="recent-card fade-in">
        <img src="<?php echo $SITEURL;?>images/menu/<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
        <div class="title">🍽 <?php echo $item['title']; ?></div>
      </a>
    <?php }} ?>
  </div>
</section>
<style>
.modern-food-section {
  padding: 4rem 2rem;
  background: #fff;
  font-family: 'Segoe UI', sans-serif;
}

.modern-food-container {
  display: grid;
  /* flex-wrap: wrap; */
  gap: 3rem;
  max-width: 1200px;
  margin: 0 auto;
  align-items: flex-start;
  grid-template-columns: 1fr 1fr;
}

.modern-food-left {
  flex: 1;
  text-align: center;
}

.modern-food-img {
  max-width: 500px;
  border-radius: 12px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}

.modern-food-right {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.food-name {
  font-size: 2rem;
  font-weight: 700;
  color: #222;
}

.food-subtitle {
  font-size: 1rem;
  color: #888;
}

.food-rating span {
  font-size: 1.2rem;
  color: #ffc107;
}

.review-count {
  font-size: 0.95rem;
  color: #666;
  margin-left: 8px;
}

.food-desc {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
}

.food-tags {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.tag {
  background: #f0f0f0;
  color: #555;
  font-size: 0.85rem;
  padding: 5px 10px;
  border-radius: 6px;
}

.food-price-section {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 1rem;
  margin-top: 1rem;
}

.food-price {
  font-size: 1.5rem;
  font-weight: bold;
  color: #2c2c2c;
}

.quantity-select {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.quantity-select label {
  font-weight: 600;
}

.quantity-box {
  display: flex;
  align-items: center;
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 0.3rem 1rem;
  background: #f9f9f9;
}

.qty-btn {
  background: none;
  border: none;
  font-size: 1.4rem;
  font-weight: bold;
  color: #333;
  cursor: pointer;
  padding: 0 0.5rem;
}

#qty-val {
  min-width: 24px;
  text-align: center;
  font-size: 1.1rem;
}

.add-to-cart-btn,
.proceed-btn {
  background-color: #800040;
  color: #fff;
  border: none;
  padding: 0.9rem 2rem;
  font-size: 1rem;
  border-radius: 8px;
  margin-top: 1rem;
  cursor: pointer;
  text-align: center;
  display: inline-block;
  text-decoration: none;
  transition: background 0.3s ease;
}

/* .order-btn_ {
  background-color: #4a90e2;
} */

.proceed-btn {
  background-color: #999;
}

.add-to-cart-btn:hover {
  background-color: #660033;
}

/* .order-btn_:hover {
  background-color: #3b7dc1;
} */

.proceed-btn:hover {
  background-color: #777;
}

@media (max-width: 768px) {
  .modern-food-container {
    flex-direction: column;
  }

  .food-price-section {
    flex-direction: column;
    align-items: flex-start;
  }
}
.order-btn_ {
  background-color: #4a90e2;
  color: #fff;
  border: none;
  padding: 0.9rem 2rem;
  font-size: 1rem;
  border-radius: 8px;
  margin-top: 1rem;
  cursor: pointer;
  display: inline-block;
  text-align: center;
  text-decoration: none;
  transition: background 0.3s ease;
}

.order-btn:hover {
  background-color: #3b7dc1;
}

</style>

