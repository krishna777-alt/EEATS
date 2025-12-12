<?php 
include "admin/connection/connect.php";
include "partials/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Category Page</title>
  <link rel="stylesheet" href="css/category.css">
</head>
<body>
<?php
  
   
  // $sql1 = "SELECT *,category_tb.id,category_tb.title FROM menu_tb INNER JOIN category_tb ON menu_tb.category_id=category_tb.id
  //   WHERE category_tb.id='$cate_id'";

  if(isset($_GET["cate_id"]))
    {
       $cate_id = $_GET["cate_id"];
      $sql = "SELECT * FROM category_tb WHERE id='$cate_id'";
      $res=mysqli_query($conn,$sql);
      $row_arr = mysqli_fetch_array($res);
      $global_id = $cate_id;
      }
  elseif(isset($_GET["menu_id"]))
    {
      $menu_id = $_GET["menu_id"];
      $sql = "SELECT * FROM menu_tb WHERE id='$menu_id'";
      $res=mysqli_query($conn,$sql);
      $row_arr = mysqli_fetch_array($res);
      $global_id = $menu_id;
    }    

?>
  <!-- Hero Section -->
  <div class="category-hero">
    <div class="category-hero-img">
      <?php 
       if(isset($_GET["cate_id"]))
         {
          ?>
         <img src="<?php echo $SITEURL;?>uploads/category/<?php echo $row_arr["image"];?>" alt="Category Image">
          <?php
         }
       elseif(isset($_GET["menu_id"])) 
         {
          ?>
          <img src="<?php echo $SITEURL;?>uploads/menu/<?php echo $row_arr["image"];?>" alt="Category Image">
          <?php
         }  
      ?>
    </div>

    <div class="category-hero-text">
      <small>Collection</small>
      <h2>Top Celebrity <?php echo$row_arr["title"];?> Category Recipes</h2>
      <p>Get the scoop on favorite dishes and secret family recipes of famous performers, politicians and more.</p>
    </div>
  </div>

  <!-- Fan Favorites Section -->
  <h3 class="category-title">Fan Favorites</h3>
  <div class="category-grid">
     <?php
        $sql = "SELECT * FROM menu_tb WHERE category_id='$cate_id'";
        $res = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($res))
         {
           ?>
             <div class="category-card">
              <a href="<?php echo$SITEURL;?>food-detail.php?menu_id=<?php echo$row["id"];?>">
                <img src="<?php echo $SITEURL;?>uploads/menu/<?php echo $row["image"];?>" alt="Beef & Broccoli">
              </a>
              <div class="category-card-title"><?php echo $row["title"];?></div>
              <!-- <div class="category-card-actions">
                <a href="partials/add-to-cart.php?id=1" class="btn cart-btn">Add to Cart</a>
                <a href="partials/send-order.php?id=1" class="btn order-btn">Order</a>
              </div> -->
            </div>
           <?php
         }
     ?>    
    <!-- Category Card -->
    

    <!-- Another Category Card -->
    <!-- <div class="category-card">
      <a href="food-detail.php?id=2">
        <img src="images/menu/beef-noodles.jpg" alt="Grilled Chicken">
      </a>
      <div class="category-card-title">Grilled Chicken</div>
      <div class="category-card-actions">
        <a href="partials/add-to-cart.php?id=2" class="btn cart-btn">Add to Cart</a>
        <a href="partials/send-order.php?id=2" class="btn order-btn">Order</a>
      </div>
    </div> -->

    <!-- Add more category cards below if needed -->
<!-- <div class="category-card">
      <a href="food-detail.php?id=2">
        <img src="images/menu/beef-noodles.jpg" alt="Grilled Chicken">
      </a>
      <div class="category-card-title">Grilled Chicken</div>
      <div class="category-card-actions">
        <a href="partials/add-to-cart.php?id=2" class="btn cart-btn">Add to Cart</a>
        <a href="partials/send-order.php?id=2" class="btn order-btn">Order</a>
      </div>
    </div>

    <div class="category-card">
      <a href="food-detail.php?id=2">
        <img src="images/menu/beef-noodles.jpg" alt="Grilled Chicken">
      </a>
      <div class="category-card-title">Grilled Chicken</div>
      <div class="category-card-actions">
        <a href="partials/add-to-cart.php?id=2" class="btn cart-btn">Add to Cart</a>
        <a href="partials/send-order.php?id=2" class="btn order-btn">Order</a>
      </div>
    </div>

    <div class="category-card">
      <a href="food-detail.php?id=2">
        <img src="images/menu/beef-noodles.jpg" alt="Grilled Chicken">
      </a>
      <div class="category-card-title">Grilled Chicken</div>
      <div class="category-card-actions">
        <a href="partials/add-to-cart.php?id=2" class="btn cart-btn">Add to Cart</a>
        <a href="partials/send-order.php?id=2" class="btn order-btn">Order</a>
      </div>
    </div>

    <div class="category-card">
      <a href="food-detail.php?id=2">
        <img src="images/menu/beef-noodles.jpg" alt="Grilled Chicken">
      </a>
      <div class="category-card-title">Grilled Chicken</div>
      <div class="category-card-actions">
        <a href="partials/add-to-cart.php?id=2" class="btn cart-btn">Add to Cart</a>
        <a href="partials/send-order.php?id=2" class="btn order-btn">Order</a>
      </div>
    </div>

      <div class="category-card">
      <a href="food-detail.php?id=2">
        <img src="images/menu/beef-noodles.jpg" alt="Grilled Chicken">
      </a>
      <div class="category-card-title">Grilled Chicken</div>
      <div class="category-card-actions">
        <a href="partials/add-to-cart.php?id=2" class="btn cart-btn">Add to Cart</a>
        <a href="partials/send-order.php?id=2" class="btn order-btn">Order</a>
      </div>
    </div>

      <div class="category-card">
      <a href="food-detail.php?id=2">
        <img src="images/menu/beef-noodles.jpg" alt="Grilled Chicken">
      </a>
      <div class="category-card-title">Grilled Chicken</div>
      <div class="category-card-actions">
        <a href="partials/add-to-cart.php?id=2" class="btn cart-btn">Add to Cart</a>
        <a href="partials/send-order.php?id=2" class="btn order-btn">Order</a>
      </div>
    </div>

      <div class="category-card">
      <a href="food-detail.php?id=2">
        <img src="images/menu/beef-noodles.jpg" alt="Grilled Chicken">
      </a>
      <div class="category-card-title">Grilled Chicken</div>
      <div class="category-card-actions">
        <a href="partials/add-to-cart.php?id=2" class="btn cart-btn">Add to Cart</a>
        <a href="partials/send-order.php?id=2" class="btn order-btn">Order</a>
      </div> -->
    </div>
  </div>

  <!-- Footer -->

<?php include "partials/footer.php";?>
