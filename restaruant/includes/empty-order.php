<style>
    .order-empty-container {
  padding: 60px 20px;
  background: #f1f4f8;
  display: flex;
  justify-content: center;
  align-items: center;
}

.order-empty-wrapper {
  text-align: center;
  max-width: 600px;
  background: #ffffff;
  padding: 40px 30px;
  border-radius: 14px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
}

.order-empty-title {
  font-size: 30px;
  font-weight: 700;
  color: #222;
  margin-bottom: 18px;
}

.order-empty-img {
  width: 160px;
  margin: 20px 0;
  opacity: 0.85;
}

.order-empty-text {
  font-size: 17px;
  color: #444;
  margin-bottom: 22px;
}

.order-empty-btn {
  display: inline-block;
  padding: 12px 26px;
  font-size: 15px;
  font-weight: 600;
  background-color: #ff6600;
  color: #fff;
  border-radius: 6px;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.order-empty-btn:hover {
  background-color: #e55c00;
}

</style>


<section class="order-empty-container">
  <div class="order-empty-wrapper">
    <!-- <h2 class="order-empty-title">Your Orders 📦</h2> -->
    
    <img src="../images/empty-order.png" alt="No Orders" class="order-empty-img" />

    <!-- <p class="order-empty-text">You haven’t placed any orders yet. Let’s fix that with something tasty!</p> -->
    
    <!-- <a href="<?php echo $SITEURL;?>menu.php" class="order-empty-btn">Order Now</a> -->
  </div>
</section>
