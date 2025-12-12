<?php include "../../admin/connection/connect.php"; ?>
<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body, html {
  margin: 0;
  padding: 0;
}

  .rest-navbar {
    width: 90%;
    background-color: #2c3e50;
    margin: 0 auto 0 auto;
    padding: 15px 30px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  .rest-navbar .brand {
    font-size: 22px;
    font-weight: bold;
    color: #fff;
  }

  .rest-navbar ul {
    list-style: none;
    display: flex;
    gap: 25px;
    margin: 0;
    padding: 0;
  }

  .rest-navbar ul li a {
    color: #ecf0f1;
    text-decoration: none;
    font-size: 15px;
    transition: 0.3s ease;
  }

  .rest-navbar ul li a:hover {
    color: #1abc9c;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .rest-navbar {
      flex-direction: column;
      align-items: flex-start;
    }

    .rest-navbar ul {
      flex-direction: column;
      width: 100%;
      margin-top: 10px;
      gap: 15px;
    }

    .rest-navbar ul li a {
      padding-left: 10px;
    }
  }
</style>

<nav class="rest-navbar">
  <?php $res_name= $_SESSION["restaurant_name"];?>
  <div class="brand">🍽️ <?php echo $res_name;?></div>
  <ul>
    <li><a href="./index.php">🏠 Dashboard</a></li>
    <li><a href="./profile.php">👤 Profile</a></li>
    <li><a href="./manage-food.php">🍲 Manage Food</a></li>
    <li><a href="./delivery-person.php">🚚 Delivery Person</a></li>
    <li><a href="./orders.php">📦 Orders</a></li>
    <li><a href="./support.php">🆘 Support</a></li>
    <li><a href="./logout.php">🚪 Logout</a></li>
  </ul>
</nav>
