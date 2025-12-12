<?php
// includeing database connection
include "../admin/connection/connect.php";
include('partials/header.php'); // optional header include
?>
<link rel="stylesheet" href="css/order.css">
<header class="nav-hed">
    <?php include "includes/side-bar.php";?>
</header>
<?php
 if($_SESSION["food-deliverd"])
   {
    echo $_SESSION["food-deliverd"];
    unset($_SESSION["food-deliverd"]);
   }
?>
<div class="orders-container">
  <h2>📦 Orders Management</h2>

  <div class="orders-table-wrapper">
    <table class="orders-table">
      <thead>
        <tr>
          <th>#Order ID</th>
          <th>Customer</th>
          <th>Items</th>
          <th>Total</th>
          <th>Status</th>
          <th>Ordered At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $res_id = $_SESSION["restaurant_id"];
        // Sample PHP code (replace with your database logic)
        $sql = "SELECT
         order_tb.id,
         order_tb.title,
        order_tb.price,
        order_tb.image,
        order_tb.date,
        order_tb.status,
        user_tb.full_name
        FROM order_tb INNER JOIN user_tb ON order_tb.user_id=user_tb.id";

        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
          $sn=1;
          
          while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
              <td>#<?php echo $sn++; ?></td>
              <td><?php echo htmlspecialchars($row['full_name']); ?></td>
              <td><?php echo htmlspecialchars($row['title']); ?></td>
              <td>$<?php echo number_format($row['price'], 2); ?></td>
              <td>
                <span class="status-badge <?php echo strtolower($row['status']); ?>">
                  <?php echo ucfirst($row['status']); ?>
                </span>
              </td>
              <td><?php echo date("M d, Y H:i", strtotime($row['order_time'])); ?></td>
              <td>
                <?php if($row["status"] == "Pending")
                    {
                      ?>
                    <a href="<?php echo$SITEURL;?>restaruant/customer-view.php?order_id=<?php echo $row['id']; ?>" class="view-btn">Deliver</a>
                      <?php
                    }
                  ?>
              </td>
            </tr>
            <?php
          }
        } else {
          echo '<tr><td colspan="7" style="text-align:center;">No orders found.</td></tr>';
          include "includes/empty-order.php";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
