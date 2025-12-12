<?php 
include "connection/connect.php";
// session_start();
 
 if(!isset($_SESSION["admin"]))
 {
  header("location:".$SITEURL."admin/admin-login.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: #f4f6f8;
      color: #333;
    }

    .admin-container {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 250px;
      background: #24292e;
      color: #fff;
      padding: 2rem 1rem;
      display: flex;
      flex-direction: column;
    }

    .sidebar h2 {
      margin-bottom: 2rem;
      font-size: 1.4rem;
      text-align: center;
    }

    .sidebar a {
      color: #ccc;
      text-decoration: none;
      padding: 0.8rem 1rem;
      border-radius: 6px;
      transition: 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background: #0366d6;
      color: white;
    }

    .main-content {
      flex: 1;
      padding: 2rem;
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .dashboard-header h1 {
      font-size: 2rem;
      color: #24292e;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
    }

    .card {
      background: white;
      padding: 1.5rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      transition: 0.3s ease;
    }

    .card:hover {
      transform: translateY(-3px);
    }

    .card h3 {
      font-size: 1.2rem;
      color: #0366d6;
    }

    .card p {
      font-size: 2rem;
      font-weight: bold;
      margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
      .admin-container {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        flex-direction: row;
        overflow-x: auto;
        white-space: nowrap;
        padding: 1rem;
      }

      .sidebar a {
        display: inline-block;
        margin-right: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="admin-container">
    <div class="sidebar">
      <h2>Admin Panel</h2>
      <a href="index.php" class="active">Dashboard</a>
      <a href="administrator.php">Administrator</a>
      <a href="users.php">Users</a>
      <a href="./manage-resturants.php">Resturants</a>
      <a href="categories.php">Categories</a>
      <a href="orders.php">Orders</a>
      <a href="menu.php">Menu</a>
      <a href="message.php">Messages</a>
      <a href="admin-logout.php">Logout</a>
    </div>
    <div class="main-content">
      <div class="dashboard-header">
        <h1>Dashboard Overview</h1>
        <button onclick="refreshData()" style="padding: 0.6rem 1rem; background: #0366d6; color: white; border: none; border-radius: 6px; cursor: pointer;">🔄 Refresh</button>
      </div>
      <?php 
      // ///////////////////////////////////ORDERS///////////////////////////
        $sql_orders = "SELECT COUNT(*) AS total_orders FROM order_tb";
        $order_res = mysqli_query($conn,$sql_orders);

        $order_row = mysqli_fetch_array($order_res);
       // ///////////////////////////////////USERS/////////////////////////// 
        $sql_users = "SELECT COUNT(*) AS total_users FROM user_tb";
        $res_users = mysqli_query($conn,$sql_users);

        $row_users = mysqli_fetch_array($res_users);
       // ///////////////////////////////////MESSAGES///////////////////////////
        $sql_message = "SELECT COUNT(*) AS total_messages FROM contact_tb";
        $res_message = mysqli_query($conn,$sql_message);

        $row_message = mysqli_fetch_array($res_message);
       // ////////////////////////////////////REVENUE//////////////////////////
         $sql_order = "SELECT SUM(PRICE) AS total_price FROM order_tb WHERE status='Pending'";
        $order = mysqli_query($conn,$sql_order);

        $order_rows = mysqli_fetch_array($order);
      ?>
      <div class="card-grid">
        <div class="card">
          <h3>Total Orders</h3>
          <p><?php echo $order_row["total_orders"];?></p>
        </div>
        <div class="card">
          <h3>Active Users</h3>
          <p><?php echo $row_users["total_users"];?></p>
        </div>
        <div class="card">
          <h3>New Messages</h3>
          <p><?php echo $row_message["total_messages"];?></p>
        </div>
        <div class="card">
          <h3>Revenue</h3>
          <p>₹<?php echo $order_rows["total_price"];?></p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function refreshData() {
      alert("Refreshing dashboard data...");
      // You can hook this to fetch updated data from backend
    }
  </script>
</body>
</html>
