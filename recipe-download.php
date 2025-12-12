<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipe Explorer</title>
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
  <?php
include "admin/connection/connect.php";

  echo$user_id = $_SESSION["user_id"];
?>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #fdfdfd;
      /* padding: 2rem; */
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 2rem;
      color: #d35400;
    }

    .search-bar {
      text-align: center;
      margin-bottom: 2rem;
      position: relative;
      max-width: 400px;
      margin-inline: auto;
    }

    .search-bar input {
      width: 100%;
      padding: 0.75rem 1.25rem;
      font-size: 1rem;
      border: 2px solid #ddd;
      border-radius: 30px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    .search-bar input:focus {
      outline: none;
      border-color: #e67e22;
      box-shadow: 0 0 10px rgba(230, 126, 34, 0.4);
    }

    .recipes-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .recipe-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .recipe-card:hover {
      transform: translateY(-8px);
    }

    .recipe-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .recipe-content {
      padding: 1rem;
    }

    .recipe-content h2 {
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
      color: #333;
    }

    .recipe-content p {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 1rem;
    }

    .download-btn {
      display: inline-block;
      padding: 0.6rem 1.2rem;
      background-color: #27ae60;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .download-btn:hover {
      background-color: #1e8449;
    }
    /* /////////////////////////////////////////////////////////////////////nav */
     .rxp-nav {
  width: 100%;
  background: #fff;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  padding: 1.8rem 2rem;
  font-family: 'Segoe UI', sans-serif;
  margin-bottom: 2rem;
}

.rxp-nav-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  /* margin-bottom: 2rem; */
}

.rxp-logo {
  font-size: 1.8rem;
  font-weight: bold;
  color: #f44336;
}

.rxp-nav-links {
  list-style: none;
  display: flex;
  gap: 2rem;
}

.rxp-nav-links li a {
  text-decoration: none;
  font-weight: 600;
  color: #333;
  transition: color 0.3s;
}

.rxp-nav-links li a:hover {
  color: #f44336;
}

.rxp-nav-actions {
  display: flex;
  gap: 1rem;
}

.rxp-btn {
  background-color: #fff;
  border-radius: 12px;
  padding: 0.5rem 1.2rem;
  font-weight: 600;
  text-decoration: none;
  color: #333;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transition: box-shadow 0.3s, color 0.3s;
}

.rxp-btn span {
  margin-left: 0.5rem;
  color: #f44336;
}

.rxp-btn:hover {
  color: #f44336;
  box-shadow: 0 4px 16px rgba(0,0,0,0.1);
}
/* /////////////////////////////////////////////////////////////////footer */
.rxp-footer {
  background-color: #111;
  color: #ddd;
  padding: 3rem 1rem 1rem;
  font-family: 'Segoe UI', sans-serif;
  margin-top: 2rem;
}

.rxp-footer-container {
  display: flex;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
  justify-content: space-between;
  gap: 2rem;
}

.rxp-footer-section {
  flex: 1 1 250px;
}

.rxp-footer-logo {
  color: #f44336;
  font-size: 1.8rem;
  font-weight: bold;
}

.rxp-footer-desc {
  margin-top: 0.5rem;
  font-size: 0.95rem;
  color: #ccc;
}

.rxp-footer-heading {
  font-weight: bold;
  margin-bottom: 1rem;
  color: #fff;
}

.rxp-footer-links {
  list-style: none;
  padding: 0;
}

.rxp-footer-links li {
  margin-bottom: 0.5rem;
}

.rxp-footer-links a {
  color: #ccc;
  text-decoration: none;
  transition: color 0.3s;
}

.rxp-footer-links a:hover {
  color: #f44336;
}

.rxp-footer-socials a {
  margin-right: 1rem;
  color: #ccc;
  font-size: 1.2rem;
  transition: color 0.3s;
}

.rxp-footer-socials a:hover {
  color: #f44336;
}

.rxp-footer-bottom {
  border-top: 1px solid #333;
  text-align: center;
  margin-top: 2rem;
  padding-top: 1rem;
  color: #777;
  font-size: 0.9rem;
}

  </style>
</head>
<body>

   <nav class="rxp-nav">
  <div class="rxp-nav-container">
    <div class="rxp-logo">eeats</div>
    <ul class="rxp-nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="recipe-download.php">Recipe</a></li>
      <li><a href="orders.php">Orders</a></li>
    </ul>
    <div class="rxp-nav-actions">
      <a href="user-accont.php?id=<?php echo$user_id;?>" class="rxp-btn"><span>👤</span>Account</a>
      <a href="cart.php" class="rxp-btn">Cart <span>🛒</span></a>
    </div>
  </div>
</nav>

  <h1>🍽️ Explore Recipes</h1>

  <div class="search-bar">
    <input type="text" id="searchInput" placeholder="🔍 Search your favorite dish...">
  </div>

  <div class="recipes-container" id="recipe-list">
    <!-- Recipes will load here -->
  </div>

  <script>
    const recipeList = document.getElementById('recipe-list');
    const searchInput = document.getElementById('searchInput');

    async function fetchRecipes(query = '') {
      try {
        const res = await fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${query}`);
        const data = await res.json();
        renderRecipes(data.meals || []);
      } catch (error) {
        recipeList.innerHTML = '<p>Error loading recipes.</p>';
      }
    }

    function renderRecipes(recipes) {
      if (recipes.length === 0) {
        recipeList.innerHTML = '<p>No recipes found.</p>';
        return;
      }

      recipeList.innerHTML = recipes.map(meal => `
      <div class="recipe-card" onclick="window.location.href='recipe-explorer.php?id=${meal.idMeal}'" style="cursor:pointer;">
  <img src="${meal.strMealThumb}" alt="${meal.strMeal}">
  <div class="recipe-content">
    <h2>${meal.strMeal}</h2>
    <p>${meal.strCategory} | ${meal.strArea}</p>
    <a class="download-btn" href="data:text/plain;charset=utf-8,${encodeURIComponent(meal.strInstructions)}" download="${meal.strMeal}.txt" onclick="event.stopPropagation();">Download Recipe</a>
  </div>
</div>

      `).join('');
    }

    searchInput.addEventListener("input", function(e) {
      const query = e.target.value;
      fetchRecipes(query);
    });

    fetchRecipes(); // Initial load
  </script>
</body>
<footer class="rxp-footer">
  <div class="rxp-footer-container">
    <div class="rxp-footer-section">
      <h2 class="rxp-footer-logo">eeats</h2>
      <p class="rxp-footer-desc">Delicious meals. Fast delivery. Right to your door.</p>
    </div>

    <div class="rxp-footer-section">
      <h3 class="rxp-footer-heading">Quick Links</h3>
      <ul class="rxp-footer-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Menu</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>

    <div class="rxp-footer-section">
      <h3 class="rxp-footer-heading">Contact Us</h3>
      <p>Email: support@eeats.com</p>
      <p>Phone: +91 98765 43210</p>
      <div class="rxp-footer-socials">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
  </div>

  <div class="rxp-footer-bottom">
    <p>© 2025 eeats. All rights reserved.</p>
  </div>
</footer>

</html>

