<style>
 .cart-empty-container {
  padding: 60px 20px;
  background: linear-gradient(to bottom, #f8fafc, #eef2f4);
  display: flex;
  justify-content: center;
  align-items: center;
}

.cart-empty-wrapper {
  text-align: center;
  max-width: 600px;
  background: #fff;
  padding: 40px 30px;
  border-radius: 12px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.cart-empty-title {
  font-size: 32px;
  font-weight: 700;
  color: #333;
  margin-bottom: 20px;
}

.cart-empty-img {
  width: 180px;
  margin: 20px 0;
  opacity: 0.8;
}

.cart-empty-text {
  font-size: 18px;
  color: #555;
  margin-bottom: 25px;
}

.cart-empty-btn {
  display: inline-block;
  padding: 12px 28px;
  font-size: 16px;
  font-weight: 500;
  background-color: #ff4c4c;
  color: #fff;
  border-radius: 8px;
  text-decoration: none;
  transition: background 0.3s;
}

.cart-empty-btn:hover {
  background-color: #e03d3d;
}
   
</style>    

<section class="cart-empty-container">
  <div class="cart-empty-wrapper">
    <!-- <h2 class="cart-empty-title">Your Cart 🛒</h2>
     -->
    <img src="images/empty-cart.png" alt="Empty Cart" class="cart-empty-img" />

    <p class="cart-empty-text">Looks like you haven’t added anything yet. Start exploring our delicious meals now!</p>
    
    <a href="menu.php" class="cart-empty-btn">Browse Menu</a>
  </div>
</section>
