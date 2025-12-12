<div class="message-actions">
                      <!-- <a href="<?php echo$SITEURL;?>partials/delete-user-message.php?id=<?php echo$row["id"];?>"> -->
                        <!-- <button class="delete-btn">Delete</button> -->
                      <!-- <//a> -->
                    </div>

<?php include "admin/connection/connect.php";?>
🍔 Burgers

1. Bacon Burger – A juicy beef patty topped with crispy bacon, melted cheese, fresh lettuce, and tangy sauces, all wrapped in a soft sesame bun.


2. Beef Burger – A classic favorite with a thick grilled beef patty, crunchy veggies, pickles, and a smoky BBQ mayo blend.


3. Burger2 – A modern twist on the traditional burger – double patty, double cheese, and double the taste!


4. Butter Burger – Rich, buttery beef flavor grilled to perfection, oozing with creamy cheese and savory toppings.


5. Cheese Burger – Simple and satisfying – a golden toasted bun stuffed with melty cheese over a juicy patty.


6. Chicken Burger – Crispy or grilled chicken breast, layered with lettuce, tomato, and zesty garlic aioli.


7. Lamp Burger (Assumed typo of Lamb Burger) – Tender lamb patty seasoned with herbs and spices, paired with a tangy yogurt or mint chutney.


8. Turkey Burger – A lean and tasty option featuring a grilled turkey patty with fresh greens and mustard mayo.


9. Veggie Burger – Packed with wholesome veggies, grains, and a hint of spice – perfect for vegetarians!


10. Hero1 – A signature special burger loaded with premium ingredients – this one steals the spotlight!




---

🍕 Pizzas

1. Cheese Pizza – A gooey layer of mozzarella cheese spread over a rich tomato base, baked to golden perfection.


2. Chocolet Pizza (Assumed typo of Chocolate Pizza) – A dessert pizza made with chocolate spread, topped with marshmallows or nuts – sweet and indulgent.


3. Egg Pizza – A savory pizza topped with soft-cooked egg, cheese, and spiced veggies – a breakfast lover’s dream.


4. Pepperony Pizza (Assumed typo of Pepperoni Pizza) – Classic pepperoni slices with melty cheese on a crispy crust – a timeless favorite.


5. Pizza1 – A traditional mixed pizza with assorted toppings – think olives, onions, capsicum, and jalapeños.


6. Tomato Pizza – A fresh and tangy delight with sliced tomatoes, herbs, and cheese on a thin crust.


This sophisticated (yet easy!) mac and cheese is a fantastic way to eat your greens. It's perfect for leftover kale — just be sure the leaves are totally dry before adding them to the mix.

---

🍹 Drinks & Desserts

1. Chockolet Milkshake1 (Assumed typo of Chocolate Milkshake) – A thick and creamy milkshake made with rich chocolate ice cream and topped with whipped cream.


2. Making-food1 / Making-food2 – These likely show behind-the-scenes or preparation shots – great for storytelling in your UI (like “Made Fresh Daily” or “Crafted with Love”).

<style>
  .food-view-section {
  padding: 3rem 1rem;
  background-color: #f8f9fa;
  font-family: 'Segoe UI', sans-serif;
}

.food-view-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  background: #fff;
  border-radius: 12px;
  padding: 2rem;
  box-shadow: 0 10px 25px rgba(0,0,0,0.07);
}

.food-image {
  flex: 1 1 400px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.food-image img{
  max-width: 400px;
  height: 400px;
  border-radius: 12px;
  /* box-shadow: 0 4px 20px rgba(0,0,0,0.1); */
}

.food-info {
  flex: 1 1 500px;
  display: flex;
  flex-direction: column;
  gap: 1.2rem;
}

.food-info h1 {
  font-size: 2.5rem;
  color: #222;
  margin-bottom: 0.5rem;
}

.food-info .price {
  font-size: 1.8rem;
  color: #28a745;
  font-weight: 600;
}

.food-info .description {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
}

.rating {
  font-size: 1.1rem;
  color: #ffc107;
}

.quantity-wrapper {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.quantity-wrapper label {
  font-weight: 600;
}

.qty-box {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  border: 1px solid #ccc;
  padding: 0.3rem 0.8rem;
  border-radius: 8px;
  background: #f2f2f2;
}

.qty-btn {
  padding: 0.4rem 0.8rem;
  font-size: 1.2rem;
  border: none;
  background: #e0e0e0;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.3s;
}

.qty-btn:hover {
  background: #ccc;
}

#qty-count {
  font-size: 1.2rem;
  min-width: 24px;
  text-align: center;
}

/* .add-to-cart {
  margin-top: 1rem;
  padding: 0.9rem 1.5rem;
  font-size: 1.1rem;
  background: #28a745;
  color: #fff;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  font-weight: 600;
  transition: background 0.3s ease;
} */
/* .add-to-cart {
  display: inline-block;
  padding: 12px 20px;
  background-color: #27ae60;
  color: white;
  font-weight: 600;
  border-radius: 8px;
  text-decoration: none;
  transition: background-color 0.3s ease;
  font-size: 1rem;
  margin-top: 1rem;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.add-to-cart:hover {
  background-color: #219150;
}

.add-to-cart:hover {
  background: #218838;
} */
.action-buttons {
  display: flex;
  gap: 1rem;
  margin-top: 1.5rem;
  flex-wrap: wrap;
}

.action-buttons a {
  display: inline-block;
  padding: 12px 20px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 1rem;
  text-align: center;
  text-decoration: none;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
  transition: background-color 0.3s ease;
}

.add-to-cart {
  background-color: #27ae60;
  color: white;
}

.add-to-cart:hover {
  background-color: #1e944f;
}

.order-now {
  background-color: #2980b9;
  color: white;
}

.order-now:hover {
  background-color: #21618c;
}

/* Responsive */
@media (max-width: 768px) {
  .food-view-container {
    flex-direction: column;
  }

  .food-info h1 {
    font-size: 2rem;
  }
}

</style>
<?php include "partials/header.php";
//  echo $_GET["id"];
echo $_SESSION["REQUEST_URL"];
$user = $_SESSION["user_id"];
?>

 <?php 
    $food_id = $_GET["id"];

    $sql = "SELECT * FROM menu_tb WHERE id=$food_id";
    $res = mysqli_query($conn, $sql);
    $food = mysqli_fetch_array($res);
 ?>
<section class="food-view-section">
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
  <div class="food-view-container">
    <div class="food-image">
      <img src="images/menu/<?php echo $food["image"];?>" alt="Cheese Burst Pizza">
    </div>
    <div class="food-info">
      <h1><?php echo $food["title"];?></h1>
      <p class="price">₹<?php echo $food["price"];?></p>
      <p class="description">
        A delicious cheese-loaded pizza with a crispy crust and rich tomato base. Topped with mozzarella, cheddar, and a hint of oregano.
      </p>
      <div class="rating">
        <span>⭐️⭐️⭐️⭐️☆</span>
        <span>(4.2/5)</span>
      </div>
      <div class="quantity-wrapper">
        <label>Quantity:</label>
        <div class="qty-box">
          <button class="qty-btn" id="decrease">−</button>
          <span id="qty-count">1</span>
          <button class="qty-btn" id="increase">+</button>
        </div>
      </div>
      <br><br><br>
      <!-- <a href="order-now.php?id=<?= $food['id']; ?>" class="add-to-cart">🛒 Add to Cart</a> -->
      <div class="action-buttons">
        <?php if (isset($_SESSION["user_id"])): ?>
            <?php $_SESSION["HTTP_REFERER"] = $_SERVER["REQUEST_URI"]; ?>
            <a href="partials/add-to-cart.php?id=<?= $food['id']; ?>" class="add-to-cart">🛒 Add to Cart</a>

            <?php
            $user_id = $_SESSION["user_id"];
            $form_sql = "SELECT * FROM order_form_tb WHERE user_id='$user_id'";
            $form_res = mysqli_query($conn, $form_sql);
            if (mysqli_num_rows($form_res) > 0):
            ?>
                <a href="partials/send-order.php?id=<?= $food['id']; ?>" class="order-now">🧾 Order Now</a>
            <?php else: ?>
                <a href="partials/fill-form.php?id=<?= $user_id; ?>" class="order-now">🧾 Order Now</a>
            <?php endif; ?>

        <?php else: ?>
            <a href="user-login.php" class="order-now">🧾 Login to order</a>
        <?php endif; ?>
      </div>

    </div>        
  </div>
</section>
<?php include "item-details.php";?>
<script src="js/food-details.js"></script>

<script>
  let count = 1;
const countDisplay = document.getElementById("qty-count");

document.getElementById("increase").onclick = () => {
  count++;
  countDisplay.textContent = count;
};

document.getElementById("decrease").onclick = () => {
  if (count > 1) {
    count--;
    countDisplay.textContent = count;
  }
};

</script>



<section class="food-view-section">
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
  <div class="food-view-container">
    <div class="food-image">
      <img src="images/menu/<?php echo $food["image"];?>" alt="Cheese Burst Pizza">
    </div>
    <div class="food-info">
      <h1><?php echo $food["title"];?></h1>
      <p class="price">₹<?php echo $food["price"];?></p>
      <p class="description">
        A delicious cheese-loaded pizza with a crispy crust and rich tomato base. Topped with mozzarella, cheddar, and a hint of oregano.
      </p>
      <div class="rating">
        <span>⭐️⭐️⭐️⭐️☆</span>
        <span>(4.2/5)</span>
      </div>
      <div class="quantity-wrapper">
        <label>Quantity:</label>
         <!-- <a style="text-decoration: none; color: inherit;" href="partials/add-to-cart.php?id=<?php echo $food["id"];?>"> -->
          <div class="qty-box">
          <button class="qty-btn" id="decrease">−</button>
          <span id="qty-count">1</span>
          <button class="qty-btn" id="increase">+</button>
        </div>
         <!-- </a> -->
      </div>
      <br><br><br>
      <!-- <a href="order-now.php?id=<?= $food['id']; ?>" class="add-to-cart">🛒 Add to Cart</a> -->
      <div class="action-buttons">
        <?php if (isset($_SESSION["user_id"])): ?>
            <?php $_SESSION["HTTP_REFERER"] = $_SERVER["REQUEST_URI"]; ?>
            <a href="partials/add-to-cart.php?id=<?= $food['id']; ?>" class="add-to-cart">🛒 Add to Cart</a>

            <?php
            $user_id = $_SESSION["user_id"];
            $form_sql = "SELECT * FROM order_form_tb WHERE user_id='$user_id'";
            $form_res = mysqli_query($conn, $form_sql);
            if (mysqli_num_rows($form_res) > 0):
            ?>
                <a href="partials/send-order.php?id=<?= $food['id']; ?>" class="order-now">🧾 Order Now</a>
            <?php else: ?>
                <a href="partials/fill-form.php?id=<?= $user_id; ?>" class="order-now">🧾 Order Now</a>
            <?php endif; ?>

        <?php else: ?>
            <a href="user-login.php" class="order-now">🧾 Login to order</a>
        <?php endif; ?>
      </div>

    </div>        
  </div>
</section>

<!-- ///////////////////////////////////////////////////FILL THE FORM//////////////////////// -->
 <?php 
include "../admin/connection/connect.php";
?>

<style>
    .delivery-form-section {
    background: #fefefe;
    padding: 2rem;
    font-family: 'Segoe UI', sans-serif;
    /* background-image: url("../images/hero-healthy-food.jpg"); */
    background-size:cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    
  }

  .delivery-form-container {
    max-width: 700px;
    background: #fff;
    margin: auto;
    padding: 2rem 2.5rem;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.05);
  }

  .delivery-form-container h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    color: #333;
  }

  .form-group {
    margin-bottom: 1.2rem;
  }

  label {
    display: block;
    margin-bottom: 0.4rem;
    font-weight: 600;
    color: #444;
  }

  input[type="text"],
  input[type="tel"],
  input[type="email"],
  textarea {
    width: 100%;
    padding: 0.7rem;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem;
  }

  textarea {
    resize: vertical;
  }

  .form-row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .form-row .form-group {
    flex: 1;
    min-width: 30%;
  }

  .place-order-btn {
    display: block;
    width: 100%;
    padding: 0.8rem;
    background-color: #28a745;
    color: #fff;
    border: none;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 1rem;
    transition: background 0.3s ease;
  }

  .place-order-btn:hover {
    background-color: #218838;
  }

  @media(max-width: 600px) {
    .form-row {
      flex-direction: column;
    }
  }
</style>
<?php
  if(isset($_SESSION["form-filled"]))
   {
    echo $_SESSION["form-filled"];
    unset($_SESSION["form-filled"]);
   }
?>
<section class="delivery-form-section">
  <div class="delivery-form-container">
    <h2>📦 Delivery Information</h2>
     <?php
      //  $id = $_SESSION["user_id"];
      // $user_sql = "SELECT * FROM user_tb WHERE id=$id";
      //  $res = mysqli_query($conn, $user_sql);

      //  if($res == TRUE)
      //    {
          
      //      $row = mysqli_fetch_array($res);
      //    }
       
     ?>
    <form action="" method="POST">
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="full_name" required>
      </div>
      <div class="form-group">
        <label for="username">username</label>
        <input type="text" id="fullname" name="username" required>
      </div>
      

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
      </div>
      <div class="form-group">
        <label for="address">Street Address</label>
        <input type="text" id="address" name="address" required>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" id="city" name="city" required>
        </div>

        <div class="form-group">
          <label for="state">State</label>
          <input type="text" id="state" name="state" required>
        </div>

        <div class="form-group">
          <label for="zip">Zip Code</label>
          <input type="text" id="zip" name="zip" required>
        </div>
      </div>

      <div class="form-group">
        <label for="account">UPI ID / Account Number</label>
        <input type="text" id="account" name="account" placeholder="e.g., yourname@upi" required>
      </div>

      <div class="form-group">
        <label for="instructions">Delivery Instructions (optional)</label>
        <textarea id="instructions" name="instructions" rows="3" placeholder="Landmark, call before arriving, etc."></textarea>
      </div>

      <button type="submit" name="submit" class="place-order-btn">Place Order</button>
    </form>
  </div>
</section>
<?php
if (isset($_POST['submit'])) {
   
    $full_name       = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $username        = mysqli_real_escape_string($conn, $_POST["username"]);
    $email           = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone           =  $_POST["phone"];
    $street_address  = mysqli_real_escape_string($conn, $_POST["address"]);
    $city            = mysqli_real_escape_string($conn, $_POST["city"]);
    $state           = mysqli_real_escape_string($conn, $_POST["state"]);
    $zip_code        = mysqli_real_escape_string($conn, $_POST["zip"]);
    $account         = mysqli_real_escape_string($conn, $_POST["account"]);
    $delivery_inst   = mysqli_real_escape_string($conn, $_POST["instructions"]);

  
    echo $user_id = $_SESSION["user_id"];


   echo $sqloo = "INSERT INTO order_form_tb (full_name,username,email,phone,street_address,city,state,zip_code,account,delivery_inst,user_id) VALUES
      ('$full_name','$username','$email',$phone,'$street_address','$city','$state',$zip_code,'$account','$delivery_inst','$user_id')";

    $res = mysqli_query($conn, $sqloo);

    if ($res === TRUE) {
        $_SESSION["form-filled"] = "<div class='success'>Form Filled Successfully</div>";
        
        $_SESSION["user-filled"] =TRUE;
        // Redirect to previous page
        header("Location: ".$SITEURL."menu.php");
        echo "success";
        exit();
    } else {
        echo "<div class='error'>Failed to insert data: " . mysqli_error($conn) . "</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Account - FoodXpress</title>
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/user-account.css"/>
</head>
<body>
  <div class="user-account-container">
    <h1 class="user-account-welcome">👋 Welcome, Krishnan!</h1>

    <section class="user-account-section profile-info">
      <h2>👤 Profile Info</h2>
      <p><strong>Name:</strong> Krishnan</p>
      <p><strong>Email:</strong> krish@example.com</p>
      <p><strong>Phone:</strong> +91 98765 43210</p>
      <p><strong>Address:</strong> 123 Street Name, Kochi, Kerala</p>
    </section>

    <section class="user-account-section edit-profile">
      <h2>✏️ Edit Profile</h2>
      <button>Edit Profile</button>
    </section>

    <section class="user-account-section change-password">
      <h2>🔒 Change Password</h2>
      <button>Change Password</button>
    </section>

    <section class="user-account-section order-history">
      <h2>🧾 Order History</h2>
      <ul>
        <li>Order #12345 - Completed - 10 July 2025</li>
        <li>Order #12321 - Cancelled - 05 July 2025</li>
      </ul>
    </section>

    <section class="user-account-section ongoing-orders">
      <h2>🛍️ Ongoing Orders</h2>
      <p>No ongoing orders</p>
    </section>

    <section class="user-account-section saved-addresses">
      <h2>📬 Saved Addresses</h2>
      <ul>
        <li>123 Street, Kochi <button>Edit</button> <button>Delete</button></li>
      </ul>
      <button>Add New Address</button>
    </section>

    <section class="user-account-section favorites">
      <h2>❤️ Favorites</h2>
      <ul>
        <li>Paneer Butter Masala</li>
        <li>Veg Biryani</li>
      </ul>
    </section>

    <section class="user-account-section invoice-download">
      <h2>🧾 Download Invoice</h2>
      <button>Download Invoice PDF</button>
    </section>

    <section class="user-account-section payment-methods">
      <h2>💳 Payment Methods</h2>
      <p>No saved payment methods.</p>
    </section>

    <section class="user-account-section support">
      <h2>🧑‍💼 Support</h2>
      <a href="contact.html">Contact Support</a>
    </section>

    <section class="user-account-section logout">
      <button class="logout-btn">🚪 Logout</button>
    </section>
  </div>
</body>
</html>
<?php echo $_SESSION["user"];?>


 <link rel="stylesheet" href="css/category.css">
<?php
  include "admin/connection/connect.php";
  include "partials/header.php";

 echo $cat_hero = $_GET["id"];
  
  $hero_sql = "SELECT * FROM menu_tb WHERE category_id=$cat_hero";
  
  $res_hero = mysqli_query($conn, $hero_sql);

  $hero = mysqli_fetch_array($res_hero);
  $hero_image = $hero["image"];
  $hero_cate = $hero["category"];
  $_SESSION["category-title"];
?>
  
</head>
<body>

  <div class="category-hero">
  <div class="category-hero-img">
    <img src="<?php echo $SITEURL;?>uploads/menu/<?php echo $hero_image;?>" alt="Category Image">
  </div>
  <?php 
  $fav_sql = "SELECT *,category_tb.title FROM menu_tb INNER JOIN category_tb ON menu_tb.category_id=category_tb.id";
  //  WHERE category LIKE '%".$hero_cate."%'";
  $fav = mysqli_query($conn, $fav_sql);
  $row4 = mysqli_fetch_array($fav);
    if(isset($_SESSION["order"]))
      {
        echo $_SESSION["order"];
        unset($_SESSION["order"]);
      }
  ?>
  <div class="category-hero-text">
    <small>Collection</small>
    <h2>Top Celebrity <?php echo $row4["title"];?> Recipes</h2>
    <p>Get the scoop on favorite dishes and secret family recipes of famous performers, politicians and more.</p>
  </div>
  </div>


    <!-- Fan Favorites Section -->
    <h3 class="category-title">Fan Favorites</h3>
    <div class="category-grid">
       <?php
           $menu_id = $_GET["id"];
           $menu_sql = "SELECT * FROM menu_tb WHERE id=$menu_id";
           $res_menu = mysqli_query($conn, $menu_sql);
           $menu = mysqli_fetch_array($res_menu);
           $user_id = $_SESSION["user_id"]; 
           $related_food =  $menu["category"];
           $menu_title = $menu["title"];
           
           $sql2 = "SELECT * FROM menu_tb WHERE category LIKE '%".$related_food."%'";
           $result2 = mysqli_query($conn, $sql2);
            if($result2 == TRUE)
              {
                
               while($dis = mysqli_fetch_array($result2))
                   {
                      
                      ?>
                      <div class="category-card">
                        <a href="<?php echo $SITEURL;?>food-detail.php?id=<?php echo $dis["id"];?>">
                        <img src="<?php echo $SITEURL;?>images/menu/<?php echo $dis["image"];?>" alt="Beef & Broccoli">
                        </a>
                          <div class="category-card-title"><?php echo $dis["title"];?></div>
                          
                          <div class="category-card-actions">
                            <?php $_SESSION["HTTP_REFERER"]="menu.php";
                              
                            ?>
                            <?php if(isset($_SESSION["user_id"])) :?>
                                <a href="<?php echo $SITEURL;?>partials/add-to-cart.php?id=<?php echo $dis["id"];?>" class="btn cart-btn">Add to Cart</a>
                                <?php if(!isset($_SESSION["user-filled"])) :?>
                                   <a href="<?php echo $SITEURL;?>order-form.php?id=<?php echo $user_id;?>" class="btn order-btn">Order</a>
                                  <?php else :?>   
                                    <a href="<?php echo $SITEURL;?>partials/send-order.php?id=<?php echo $dis["id"];?>" class="btn order-btn">Order</a>
                                  <?php endif?>  
                            <?php else :?>    
                              <a href="<?php echo $SITEURL;?>user-login.php" class="btn order-btn">Login to Order</a>
                            <?php endif;?>  
                          </div>
                        </div>
                        
                      <?php
                   }
              }

        ?>

    </div>
  <!-- </div> -->
<!-- /////////////////////////////////////////////////////////////////////////////// -->
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
<?php include "partials/footer.php";?>
<!--\ -->