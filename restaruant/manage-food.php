<?php 
include "../admin/connection/connect.php";
include "includes/side-bar.php";

 if(!isset($_SESSION["restaurant_id"]))
    {
      header("location: " . $SITEURL . "restaruant/login.php");
    }
  $res_id = $_SESSION["restaurant_id"];
?>

<div class="manage-food-container">
  <?php 
    if($_SESSION["food-add"])
      {
        echo $_SESSION["food-add"];
        unset($_SESSION["food-add"]);
      }
    if($_SESSION["food_updated"])
      {
        echo $_SESSION["food_updated"];
        unset($_SESSION["food_updated"]);
      }  
    if($_SESSION["delete-food"])
      {
        echo $_SESSION["delete-food"];
        unset($_SESSION["delete-food"]);
      }  
  ?>
  <link rel="stylesheet" href="css/manage-food.css">
  <div class="food-header">
    <h2>🍽️ Manage Food</h2>
    <a href="<?php echo $SITEURL;?>restaruant/add-food.php?id=<?php echo $res_id;?>" class="add-food-btn">+ Add New Food</a>
  </div>

  <div class="food-table-wrapper">
    <table class="food-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Food Name</th>
          <th>Price</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example Row -->
           <?php 
           
              $sql ="SELECT * FROM menu_tb where res_id=$res_id";

              $res = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($res))
                 {
                  ?>
                     <tr>
                        <td><img src="../uploads/menu/<?php echo $row["image"];?>" alt="Burger"></td>
                        <td><?php echo $row["title"];?></td>
                        <td>$<?php echo $row["price"];?></td>
                        <td><span class="status available"><?php echo $row["status"];?></span></td>
                        <td>
                          <a href="<?php echo $SITEURL;?>restaruant/update-food.php?id=<?php echo $row["id"];?>" class="edit-btn">Edit</a>
                          <a href="<?php echo $SITEURL;?>restaruant/delete-food.php?id=<?php echo $row["id"];?>" class="delete-btn">Delete</a>
                        </td>
                      </tr>
                  <?php
                 }
           ?>
       
        <!-- More rows fetched dynamically -->
      </tbody>
    </table>
  </div>
</div>
