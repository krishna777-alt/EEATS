<!-- Add to the bottom of your current food-view-section -->

<!-- ✅ RECENTLY VIEWED SECTION -->
<section class="recently-viewed">
  <h2>Recently Viewed</h2>
  <div class="recent-items">
    <?php
      if (!isset($_SESSION["recently_viewed"])) {
        $_SESSION["recently_viewed"] = [];
      }

      // Add current item to the beginning
      $current_id = $food['id'];
      if (!in_array($current_id, $_SESSION["recently_viewed"])) {
        array_unshift($_SESSION["recently_viewed"], $current_id);
      }
      // Keep only last 5
      $_SESSION["recently_viewed"] = array_slice($_SESSION["recently_viewed"], 0, 5);

      foreach ($_SESSION["recently_viewed"] as $id) {
        if ($id == $current_id) continue;
        $res = mysqli_query($conn, "SELECT * FROM menu_tb WHERE id = $id");
        if ($item = mysqli_fetch_assoc($res)) {
    ?>
      <a href="food-detail.php?id=<?php echo $item['id']; ?>" class="recent-card fade-in">
        <img src="<?php echo $SITEURL;?>images/menu/<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
        <div class="title">🍽 <?php echo $item['title']; ?></div>
      </a>
    <?php }} ?>
  </div>
</section>

<style>
.recently-viewed {
  max-width: 1200px;
  margin: 4rem auto;
  padding: 1rem;
}
.recently-viewed h2 {
  font-size: 1.6rem;
  margin-bottom: 1rem;
  font-weight: bold;
  color: #444;
  text-align: center;
  animation: fadeInUp 0.6s ease-out;
}
.recent-items {
  display: flex;
  gap: 1rem;
  overflow-x: auto;
  padding-bottom: 1rem;
}
.recent-card {
  flex: 0 0 180px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  background: white;
  transition: transform 0.3s;
  text-decoration: none;
  color: #333;
}
.recent-card:hover {
  transform: scale(1.05);
}
.recent-card img {
  width: 100%;
  height: 120px;
  object-fit: cover;
}
.recent-card .title {
  padding: 0.7rem;
  font-weight: 500;
  text-align: center;
}

/* ✅ Animations */
.fade-in {
  animation: fadeIn 0.7s ease-in forwards;
  opacity: 0;
}
@keyframes fadeIn {
  to {
    opacity: 1;
  }
}
@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
