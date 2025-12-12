<?php
include "connection/connect.php";

if (isset($_GET['res_id'])) {
    $id = intval($_GET['res_id']);
    $sql = "SELECT * FROM restaruant_tb WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
    } else {
        die("Restaurant not found.");
    }
} else {
    die("Invalid Request.");
}
?>

<style>
.vr-container {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  font-family: Arial, sans-serif;
}

.vr-title {
  text-align: center;
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
}

.vr-card {
  display: flex;
  gap: 20px;
  align-items: flex-start;
}

.vr-image img {
  width: 140px;
  height: 140px;
  border-radius: 12px;
  object-fit: cover;
  border: 2px solid #eee;
}

.vr-info p {
  margin: 8px 0;
  font-size: 15px;
  color: #444;
}

.vr-info strong {
  color: #111;
}

.vr-active {
  color: green;
  font-weight: bold;
}

.vr-inactive {
  color: red;
  font-weight: bold;
}

.vr-actions {
  margin-top: 20px;
  text-align: center;
}

.vr-btn {
  padding: 8px 16px;
  border-radius: 6px;
  text-decoration: none;
  margin: 0 5px;
  font-size: 14px;
}
.vr-edit-btn {
  background: #ffc107;
  color: #fff;
}

.vr-edit-btn:hover {
  background: #e0a800;
}

.vr-back-btn {
  background: #007bff;
  color: #fff;
}

.vr-back-btn:hover {
  background: #0069d9;
}

.vr-delete-btn {
  background: #dc3545;
  color: #fff;
}

.vr-delete-btn:hover {
  background: #c82333;
}
</style>

<div class="vr-container">
  <h2 class="vr-title">Restaurant Details</h2>

  <div class="vr-card">
    <div class="vr-image">
      <img src="<?php echo$SITEURL;?>uploads/restaruant/<?php echo $row['image']; ?>" alt="Restaurant Logo">
    </div>

    <div class="vr-info">
      <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
      <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
      <p><strong>Password:</strong> <?php echo htmlspecialchars($row['password']); ?></p>
      <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></p>
      <p><strong>Address:</strong> <?php echo htmlspecialchars($row['address']); ?></p>
      <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
      <p><strong>Opening Time:</strong> <?php echo htmlspecialchars($row['open']); ?></p>
      <p><strong>Closing Time:</strong> <?php echo htmlspecialchars($row['close']); ?></p>
      <p><strong>Status:</strong> 
        <?php echo ($row['status'] == 1) ? "<span class='vr-active'>Active</span>" : "<span class='vr-inactive'>Inactive</span>"; ?>
      </p>
    </div>
  </div>

  <div class="vr-actions">
    <a href="<?php echo$SITEURL;?>admin/manage-resturants.php" class="vr-btn vr-back-btn">Back</a>
     <a href="update-restaurant.php?id=<?php echo $row['id']; ?>" class="vr-btn vr-edit-btn">Edit</a>
    <a href="delete-restaurant.php?id=<?php echo $row['id']; ?>" class="vr-btn vr-delete-btn" onclick="return confirm('Are you sure you want to delete this restaurant?');">Delete</a>
  </div>
</div>

