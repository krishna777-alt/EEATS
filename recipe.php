<?php
   include "admin/connection/connect.php";
   include "partials/header.php";
?>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
      color: #222;
    }

    .main-wrapper {
      max-width: 900px;
      margin: auto;
      padding: 2rem 1rem;
    }

    .page-header h4 {
      font-size: 0.9rem;
      text-transform: uppercase;
      color: #6d2077;
      letter-spacing: 0.5px;
      margin-bottom: 0.4rem;
    }

    .page-header h1 {
      font-size: 2.2rem;
      margin-bottom: 0.5rem;
    }

    .page-header p {
      color: #555;
      margin-bottom: 1rem;
    }

    .social-links {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .social-links a {
      background-color: #e0e0e0;
      color: #333;
      padding: 0.6rem;
      border-radius: 50%;
      display: inline-block;
      text-decoration: none;
      font-size: 1rem;
    }

    .dish-item {
      margin-bottom: 2rem;
      background-color: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

   .dish-item img {
        width: 100%;
        height: 200px; /* Adjust this value to your preferred height */
        object-fit: cover;
        display: block;
    }
    

    .dish-details {
      padding: 1rem 1.2rem;
    }

    .dish-details span {
      display: block;
      font-size: 0.8rem;
      text-transform: uppercase;
      color: #888;
      margin-bottom: 0.4rem;
      letter-spacing: 1px;
    }

    .dish-details h3 {
      font-size: 1.3rem;
      margin: 0.4rem 0;
      color: #222;
    }

    .dish-details p {
      color: #555;
      font-size: 0.95rem;
      line-height: 1.4;
    }

    .divider {
      height: 4px;
      width: 60px;
      background-color: #00bcd4;
      margin-top: 1rem;
    }

    @media (max-width: 600px) {
      .dish-details h3 {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>

  <div class="main-wrapper">
    <header class="page-header">
      <?php
        $sql = "SELECT COUNT(category_id) AS total FROM menu_tb WHERE category_id='6'";
        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($res);  

      ?>
      <h4>Part of Comfort Food: Family Favorites</h4>
      <h1><?php echo $row["total"];?> Best Mac & Noodels Recipes</h1>
      <p>Cheesy and oh so satisfying, mac and cheese can do no wrong. Transport yourself back to childhood with one of these classic or kicked-up options.</p>

      <div class="social-links">
        <a href="#"><strong>P</strong></a>
        <a href="#"><strong>f</strong></a>
        <a href="#"><strong>@</strong></a>
      </div>
    </header>
     <?php
$sql = "SELECT * FROM menu_tb WHERE category_id='6'";
$res = mysqli_query($conn, $sql);

if (!$res) {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
} else {
    $count = mysqli_num_rows($res);
    
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            
            $imagePath = $SITEURL . 'images/menu/' . $row['image'];
            ?>
            <a style="text-decoration: none; color: inherit;" href="menu-display.php?cate_id=<?php echo $row["category_id"];?>"> 
              <div class="dish-item">
                <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                <div class="dish-details">
                  <span>Recipe</span>
                  <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                  <p><?php echo htmlspecialchars($row['description']); ?></p>
                  <div class="divider"></div>
                </div>
              </div>
            </a>
            <?php
        }
    } else {
        echo "<p>No noodle recipes found.</p>";
    }
}
?>
   

    <!-- <div class="dish-item">
      <img src="images/mac-cheese2.jpg" alt="Southern Macaroni & Cheese">
      <div class="dish-details">
        <span>Recipe</span>
        <h3>Southern Macaroni & Cheese</h3>
        <p>"This was very good! We loved the crunchy topping, and it made a great side with our meatloaf." – Derf</p>
        <div class="divider"></div>
      </div>
    </div> -->

    <!-- Add more recipe cards as needed -->

  </div>

  <?php
    include "partials/footer.php";
  ?> 