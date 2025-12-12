<?php 
include "partials/header.php";
 if(!isset($_SESSION["user"]))
         {
           header("location:".$SITEURL."user-login.php");
         }
?>
<style>
  .cart-section {
    padding: 2rem;
    background: linear-gradient(to right, #f8f9fa, #e9ecef);
    font-family: 'Segoe UI', sans-serif;
  }

  .cart-section h2 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 2rem;
    color: #333;
  }

  .cart-container {
    max-width: 1000px;
    margin: auto;
    background-color: #fff;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  }

  .cart-item-box {
    margin-bottom: 2rem;
    border-bottom: 1px solid #ddd;
    padding-bottom: 1.5rem;
  }

  .cart-item {
    display: flex;
    gap: 1.5rem;
    align-items: flex-start;
  }

  .cart-img {
    width: 140px;
    height: 140px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  }

  .cart-details {
    flex: 1;
  }

  .cart-details h3 {
    margin: 0;
    font-size: 1.4rem;
    font-weight: 600;
    color: #222;
  }

  .price {
    font-size: 1.2rem;
    color: #28a745;
    margin: 0.4rem 0 1rem;
    font-weight: bold;
  }

  .quantity-control {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
  }

  .qty-form button {
    padding: 0.4rem 0.9rem;
    font-size: 1.1rem;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }

  .qty-form button:hover {
    background-color: #e0e0e0;
  }

  .quantity {
    margin: 0 0.8rem;
    font-weight: bold;
    font-size: 1.1rem;
  }

  .remove-form {
    margin-bottom: 1rem;
  }

  .remove-btn {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 0.45rem 1rem;
    border-radius: 6px;
    font-size: 0.95rem;
    cursor: pointer;
  }

  .remove-btn:hover {
    background-color: #c82333;
  }

  .price-summary {
    background-color: #f8f9fa;
    border-radius: 6px;
    padding: 1rem;
    margin-top: 1rem;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
  }

  .price-summary p {
    margin: 0.3rem 0;
    font-size: 0.95rem;
    color: #444;
  }

  .price-summary strong {
    font-size: 1.1rem;
    color: #000;
  }

  .checkout-btn,
  .order-btn {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.7rem 1.4rem;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .checkout-btn {
    background-color: #28a745;
    color: #fff;
    border: none;
  }

  .checkout-btn:hover {
    background-color: #218838;
  }

  .order-btn {
    background-color: #ff6f00;
    color: #fff;
  }

  .order-btn:hover {
    background-color: #e65c00;
  }

  @media (max-width: 768px) {
    .cart-item {
      flex-direction: column;
      align-items: center;
    }

    .cart-img {
      width: 100%;
      height: auto;
    }
  }
</style>


<?php
session_start();
include("config/constants.php");
include("config/connection.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: " . $SITEURL . "user-login.php");
    exit();
}

$id = $_SESSION["user_id"];
// echo$food_id=$_SESSION["menu_food_id"];
if (isset($_SESSION["show-form"])) 
  {
    echo $_SESSION["show-form"];
    unset($_SESSION["show-form"]);
  }
if(isset($_SESSION["delete_item"]))
  {
    echo $_SESSION["delete_item"];
    unset($_SESSION["delete_item"]);
  }  
?>

<section class="cart-section">
  <h2>Your Cart 🛒</h2>
  <div class="cart-container">
    <?php
      $id = $_SESSION["user_id"];
      $cart_sql = "SELECT * FROM cart_tb WHERE user_id = $id";
      $result = mysqli_query($conn, $cart_sql);
     
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $title = htmlspecialchars($row['title']);
          $price = (float)$row['price'];
          $qty   = (int)$row['quantity'];
          $image = htmlspecialchars($row['image']);
          $subtotal = $price * $qty;
          $total = $subtotal + $delivery_charge;
          $cart_id = $row["id"];
          $delivery_charge = $row["delivery"];

    ?>
    <div class="cart-item-box">
      <div class="cart-item">
          <a style="text-decoration: none; color: inherit;" href="food-detail.php?id=<?php echo $row["menu_id"];?>">
            <img src="images/menu/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="cart-img">
          </a>
       
        <div class="cart-details">
          <h3><?php echo $title; ?></h3>
          <p class="price">₹<?php echo number_format($price, 2); ?></p>

          <div class="quantity-control">
            <form action="partials/update-cart.php" method="POST" class="qty-form">
              <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="action" value="decrease" class="decrease">−</button>
              <span class="quantity"><?php echo $qty; ?></span>
              <button type="submit" name="action" value="increase" class="increase">+</button>
            </form>
          </div>

          <div class="remove-form">
            <a href="<?php echo $SITEURL;?>partials/delete-cart-item.php?id=<?php echo $cart_id;?>">
              <button type="submit" class="remove-btn">Remove</button>
            </a>
        </div>

          <div class="price-summary">
            <p>Subtotal: ₹<?php echo number_format($subtotal, 2); ?></p>
            <p>Delivery: ₹<?php echo number_format($delivery_charge, 2); ?></p>
            <p><strong>Total: ₹<?php echo number_format($total, 2); ?></strong></p>
          </div>

          <?php
            $form_sql = "SELECT * FROM order_form_tb WHERE user_id=$id";
            $form_res = mysqli_query($conn, $form_sql);
            if (mysqli_num_rows($form_res) > 0) {
               ?>
                 <a href="<?php echo $SITEURL;?>partials/send-order-cart.php?food_id=<?php echo $row['menu_id'];?>">
                  <?php $_SESSION["HTTP_REFERER"]="menu.php";?>
                  <button class="order-btn">Order Now</button>    
                </a>
               <?php
            } else {
              echo '<a href="'.$SITEURL.'order-form.php?id='.$id.'" class="order-btn">Proceed to Checkout</a>';
            }
          ?>
        </div>
      </div>
    </div>
    <?php
        }
      } else {
        include "partials/empty-cart.php";
      }
    ?>
  </div>
</section>


<!-- /////////////////////////////////////////////////////////////////////////////////fill form -->

<script src="js/cart.js"></script>
</body>
<?php include "partials/footer.php";?>