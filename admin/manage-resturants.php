<?php 
 include "connection/connect.php";
 include "partials/header.php";
?>

<style>
.amr-container {
  max-width: 1100px;
  margin: 40px auto;
  padding: 20px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  font-family: Arial, sans-serif;
}

.amr-title {
  text-align: center;
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
}

.amr-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

.amr-table th,
.amr-table td {
  padding: 12px;
  text-align: center;
  border-bottom: 1px solid #ddd;
}

.amr-table th {
  background: #f8f9fa;
  font-weight: bold;
}

.amr-table tr:hover {
  background: #f1f1f1;
}

.amr-logo {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
}

.amr-btn {
  padding: 6px 12px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
  margin: 0 3px;
  display: inline-block;
}

.amr-view-btn {
  background: #007bff;
  color: #fff;
}

.amr-view-btn:hover {
  background: #0069d9;
}

.amr-delete-btn {
  background: #dc3545;
  color: #fff;
}

.amr-delete-btn:hover {
  background: #c82333;
}

.amr-empty {
  text-align: center;
  color: #888;
  font-style: italic;
}
</style>

<div class="amr-container">
  <h2 class="amr-title">Manage Restaurants</h2>
  <?php
    if($_SESSION["rest_dele"])
       {
         echo$_SESSION["rest_dele"];
         unset($_SESSION["rest_dele"]);
       }
  ?>
  <table class="amr-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Logo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Location</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection/connect.php";

        $sql = "SELECT * FROM restaruant_tb";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0) {
          $sn =1;
          while($row = mysqli_fetch_assoc($res)) {
      ?>
      <tr>
        <td><?php echo $sn; ?></td>
        <td><img src="<?php echo$SITEURL;?>uploads/restaruant/<?php echo $row['image']; ?>" alt="Logo" class="amr-logo"></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['phone']); ?></td>
        <td><?php echo htmlspecialchars($row['location']); ?></td>
        <td>
          <a href="<?php echo$SITEURL;?>admin/view-restaurant.php?res_id=<?php echo $row['id']; ?>" class="amr-btn amr-view-btn">View</a>
          <a href="<?php echo$SITEURL;?>admin/delete-restaurant.php?id=<?php echo $row['id']; ?>" class="amr-btn amr-delete-btn" onclick="return confirm('Are you sure you want to delete this restaurant?');">Delete</a>
        </td>
      </tr>
      <?php
        $sn+=1;
          }
        } else {
          echo "<tr><td colspan='7' class='amr-empty'>No restaurants found.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</div>
