<?php include "../admin/connection/connect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipe Details</title>
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f5f5;
      /* padding: 2rem; */
      color: #333;

    }

    .container {
      max-width: 1000px;
      margin:2rem auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      overflow: hidden;
      padding: 2rem;
    }

    .recipe-header {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      margin-bottom: 2rem;
    }

    .recipe-header img {
      flex: 1 1 300px;
      max-width: 400px;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .recipe-info {
      flex: 2;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .recipe-info h1 {
      font-size: 2.2rem;
      margin-bottom: 1rem;
      color: #e67e22;
    }

    .recipe-info p {
      font-size: 1rem;
      line-height: 1.6;
      color: #555;
    }

    .tags {
      margin: 1rem 0;
    }

    .tags span {
      background-color: #f39c12;
      color: #fff;
      padding: 0.3rem 0.8rem;
      border-radius: 6px;
      margin-right: 0.5rem;
      font-size: 0.8rem;
      text-transform: uppercase;
    }

    .instructions {
      margin-top: 2rem;
    }

    .instructions h2 {
      font-size: 1.4rem;
      color: #333;
      margin-bottom: 1rem;
      border-bottom: 2px solid #e67e22;
      padding-bottom: 0.5rem;
    }

    .instructions p {
      white-space: pre-line;
      line-height: 1.8;
      color: #444;
    }

    .back-btn, .download-btn {
      display: inline-block;
      margin-top: 2rem;
      background-color: #e74c3c;
      color: #fff;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
      margin-right: 1rem;
    }

    .download-btn {
      background-color: #2ecc71;
    }

    .back-btn:hover {
      background-color: #c0392b;
    }

    .download-btn:hover {
      background-color: #27ae60;
    }
    /* /////////////////////////////////////////////////////////////////nav */
.rxp-nav {   
  width: 100%;
  background: #fff;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  padding: 1.8rem 2rem;
  font-family: 'Segoe UI', sans-serif;
}

.rxp-nav-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
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
/* /////////////////////////////////////////////////////////////////////////footer */
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
    <div class="rxp-logo">FoodXpress</div>
    <ul class="rxp-nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="recipe-download.php">Recipe</a></li>
      <li><a href="orders.php">Orders</a></li>
    </ul>
    <div class="rxp-nav-actions">
      <a href="user-login.php" class="rxp-btn">Login <span>👤➕</span></a>
      <a href="cart.php" class="rxp-btn">Cart <span>🛒</span></a>
    </div>
  </div>
</nav>

  <div class="container" id="recipe-detail">
    <!-- Recipe details will be loaded here -->
  </div>

  <script>
    async function loadRecipe() {
      const params = new URLSearchParams(window.location.search);
      const id = params.get("id");
      const res = await fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${id}`);
      const data = await res.json();
      const meal = data.meals[0];

      const recipeText = `Recipe: ${meal.strMeal}\nCategory: ${meal.strCategory}\nArea: ${meal.strArea}\n\nInstructions:\n${meal.strInstructions}`;
      const blob = new Blob([recipeText], { type: 'text/plain' });
      const downloadUrl = URL.createObjectURL(blob);

      const container = document.getElementById("recipe-detail");
      container.innerHTML = `
        <div class="recipe-header">
          <img src="${meal.strMealThumb}" alt="${meal.strMeal}">
          <div class="recipe-info">
            <h1>${meal.strMeal}</h1>
            <div class="tags">
              <span>${meal.strCategory}</span>
              <span>${meal.strArea}</span>
            </div>
            <p>${meal.strInstructions.slice(0, 150)}...</p>
          </div>
        </div>

        <div class="instructions">
          <h2>Instructions</h2>
          <p>${meal.strInstructions}</p>
        </div>

        <a href="<?php echo $SITEURL;?>recipe-download.php" class="back-btn">← Back to Recipes</a>
        <a href="${downloadUrl}" download="${meal.strMeal}.txt" class="download-btn">⬇️ Download Recipe</a>
      `;
    }

    loadRecipe();
  </script>
</body>
<footer class="rxp-footer">
  <div class="rxp-footer-container">
    <div class="rxp-footer-section">
      <h2 class="rxp-footer-logo">FoodXpress</h2>
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
      <p>Email: support@foodxpress.com</p>
      <p>Phone: +91 98765 43210</p>
      <div class="rxp-footer-socials">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
  </div>

  <div class="rxp-footer-bottom">
    <p>© 2025 FoodXpress. All rights reserved.</p>
  </div>
</footer>

</html>
