
<?php  
  include "partials/header.php";
  
  if(!isset($_SESSION["user"])) {
    header("location:" . $SITEURL . "user-login.php");
  }

  if(isset($_SESSION["cart-added"]))
    {
      echo $_SESSION["cart-added"];
      unset($_SESSION["cart-added"]);
    }
  if(isset($_SESSION["order"]))
    {
       echo $_SESSION["order"];
      unset($_SESSION["order"]);
    }  
?>

<section class="menu-section">
  <div class="menu-header">
    <h2>Our Delicious Menu</h2>

    <form method="POST" id="sortForm">
      <input type="text" id="menu-search" name="search" placeholder="Search for food... 🍔🍕" />

      <select id="menu-sort" name="menu_sort" onchange="document.getElementById('sortForm').submit();">
        <option value="default">Sort By</option>
        <option value="low-high" <?php if(isset($_POST['menu_sort']) && $_POST['menu_sort'] == 'low-high') echo "selected"; ?>>Price: Low to High</option>
        <option value="high-low" <?php if(isset($_POST['menu_sort']) && $_POST['menu_sort'] == 'high-low') echo "selected"; ?>>Price: High to Low</option>
      </select>
    </form>

    <?php
      // Default sorting
      $sort_order = "";
      if (isset($_POST["menu_sort"])) {
        if ($_POST["menu_sort"] == "low-high") {
          $sort_order = "ORDER BY price ASC";
        } elseif ($_POST["menu_sort"] == "high-low") {
          $sort_order = "ORDER BY price DESC";
        }
      }

      $search_filter = "";
      if (isset($_POST["search"]) && $_POST["search"] != "") {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $search_filter = "WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
      }

      $sql = "SELECT * FROM menu_tb $search_filter $sort_order";
      $res = mysqli_query($conn, $sql);
    ?>
  </div>

  <div class="menu-categories">
    <button class="category-btn active" data-category="all">All</button>
    <?php
     $dis_sql = "SELECT * FROM category_tb";
     $r = mysqli_query($conn,$dis_sql);
     while($ro = mysqli_fetch_array($r))
       {
        ?>
        <button class="category-btn" data-category=<?php echo$ro["id"];?>><?php echo$ro["title"];?></button>
        <?php
       } 
    ?>
    <!-- <button class="category-btn" data-category=2>Desserts</button>
    <button class="category-btn" data-category=3>Pizza</button>
    <button class="category-btn" data-category=4>Drinks</button>
    <button class="category-btn" data-category=5>Healthy</button>
    <button class="category-btn" data-category=6>Noodles</button> -->
  </div>

  <div class="grid-tep-col-4" id="menuItems">
    <?php
      if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_array($res)) {
    ?>

<div class="menu-card" data-category="<?php echo $row['category_id']; ?>">
  <a href="food-detail.php?menu_id=<?php echo $row["id"];?>" style="text-decoration: none;">
  <img src="<?php echo $SITEURL;?>uploads/menu/<?php echo $row["image"];?>" alt="Food Image">
        <div class="menu-details">
          <h3><?php echo $row["title"];?></h3>
          <p><?php echo $row["description"];?></p>
        </a>
          <div class="price-cart">
            <span class="price">₹<?php echo $row["price"];?></span>

            <a href="<?php echo $SITEURL;?>partials/add-to-cart.php?id=<?php echo $row["id"];?>">
              <?php $_SESSION["HTTP_REFERER"]="menu.php";?>
              <button class="add-btn">Add to Cart</button>    
            </a>

                  <?php if (isset($_SESSION["user_id"])): ?>
                  <?php
                  $_SESSION["HTTP_REFERER"] = "menu.php";  // Save the referrer

                  $user_id = $_SESSION["user_id"];
                  $check_form_sql = "SELECT * FROM order_form_tb WHERE user_id = '$user_id'";
                  $check_form_res = mysqli_query($conn, $check_form_sql);
                  ?>

                  <?php if (mysqli_num_rows($check_form_res) > 0): ?>
                      <!-- User has already filled the form -->
                      <a href="<?= $SITEURL; ?>partials/send-order.php?id=<?= $row["id"]; ?>">
                          <button class="order-btn">Order Now</button>
                      </a>
                  <?php else: ?>
                      <!-- User has NOT filled the form -->
                      <a href="<?= $SITEURL; ?>order-form.php?id=<?= $user_id; ?>">
                          <button class="order-btn">Order Now</button>
                      </a>
                  <?php endif; ?>

              <?php else: ?>
                  <!-- User not logged in -->
                  <a href="<?= $SITEURL; ?>user-login.php">
                      <button class="order-btn">Login to Order</button>
                  </a>
              <?php endif; ?>
             
          </div>
        </div>
      </div>
    <?php
        }
      } else {
        echo "<p>No menu items found.</p>";
      }
    ?>
  </div>
</section>
<!-- <script src="js/menu.js"></script> -->
<script>
  // JS for category filtering
  document.querySelectorAll(".category-btn").forEach(button => {
    button.addEventListener("click", () => {
      const category = button.getAttribute("data-category");
      console.log(category);
      document.querySelectorAll(".menu-card").forEach(card => {
        if (category === "all" || card.getAttribute("data-category") === category) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });

      document.querySelectorAll(".category-btn").forEach(btn => btn.classList.remove("active"));
      button.classList.add("active");
    });
  });
</script>

<?php include "partials/footer.php"; ?>
<style>

  .price-cart {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.5rem;
  margin-top: 0.8rem;
}

.add-btn,
.order-btn {
  padding: 0.4rem 1rem;
  border: none;
  text-decoration: none;
  border-radius: 6px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  font-size: 0.95rem;
  transition: background-color 0.3s ease;
}

.add-btn {
  background-color: #ff6b00;
}

.add-btn:hover {
  background-color: #e65c00;
}

.order-btn {
  background-color: #28a745;
}

.order-btn:hover {
  background-color: #218838;
}

</style>