<?php
// Include DB and fetch food by ID (dummy example below)
include "admin/connection/connect.php";

$food = [
  'title' => 'Simple Oven-Baked Sea Bass',
  'image' => 'images/sea-bass.jpg',
  'rating' => 4.8,
  'ingredients' => [
    '1 lb sea bass (cleaned and scaled)',
    '3 garlic cloves, minced',
    '1 tbsp olive oil',
    '1 tbsp Italian seasoning',
    '2 tsp black pepper',
    '1 tsp salt',
    '2 lemon wedges',
    '1/3 cup white wine'
  ],
  'steps' => [
    'Preheat oven to 450°F.',
    'Mix garlic, olive oil, salt, and pepper.',
    'Place fish in a shallow dish, rub with mix.',
    'Optionally pour white wine over fish.',
    'Bake uncovered for 15 minutes.',
    'Garnish with lemon. Enjoy!'
  ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $food['title']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1100px;
      /* height: 100vh; */
      margin: 2rem auto;
      padding: 1rem;
      display: grid;
      grid-template-columns: 1fr;
    }

    .food-header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .food-header h1 {
      font-size: 2rem;
      margin: 0.2rem;
    }

    .food-header p {
      color: #777;
      margin: 0.2rem;
    }

    .food-image {
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .section {
      margin-top: 2rem;
    }

    .section h2 {
      font-size: 1.5rem;
      color: #333;
      margin-bottom: 1rem;
    }

    .un, ol {
      background: #fff;
      border-radius: 8px;
      padding: 1rem 1.5rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
    }

    .un li, ol li {
      margin-bottom: 0.6rem;
      color: #444;
    }

    .rating {
      font-size: 1.2rem;
      color: #e67e22;
    }

    .comments {
      margin-top: 2rem;
    }

    .comment-box {
      background: #fff;
      border-radius: 8px;
      padding: 1rem;
      margin-top: 1rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
    }

    .comment-box h4 {
      margin: 0 0 0.5rem 0;
    }

    .comment-box p {
      margin: 0;
      color: #555;
    }

    @media(max-width: 768px) {
      .container {
        padding: 1rem;
      }

      .food-header h1 {
        font-size: 1.5rem;
      }
    }
    /* ////////////////////////////// */
  
  .comment-form {
  display: flex;
  flex-direction: column;
  gap: 0.8rem;
  margin-top: 1.5rem;
  margin: 0 auto 2rem auto;
  width: 1200px;
}

.comment-form input,
.comment-form textarea {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-family: inherit;
  font-size: 1rem;
}

.comment-form button {
  align-self: flex-start;
  padding: 10px 20px;
  background-color: #3498db;
  color: white;
  border: none;
  border-radius: 6px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.comment-form button:hover {
  background-color: #2c80b4;
}

  </style>
</head>
<body>

  <div class="container">
    <div class="food-header">
      <h1><?= $food['title']; ?></h1>
      <p class="rating">⭐⭐⭐⭐⭐ (<?= $food['rating']; ?>/5)</p>
    </div>

    <!-- <img src="<?php echo $SITEURL;?>admin/images/menu/pizza1.jpg" alt="Food Image" class="food-image"> -->

    <div class="section">
      <h2>Ingredients</h2>
      <ul class="un">
        <?php foreach($food['ingredients'] as $ingredient): ?>
          <li><?= htmlspecialchars($ingredient); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="section">
      <h2>Directions</h2>
      <ol>
        <?php foreach($food['steps'] as $step): ?>
          <li><?= htmlspecialchars($step); ?></li>
        <?php endforeach; ?>
      </ol>
    </div>
    
    <div class="section comments">
      <h2>Comments</h2>
      <?php 
        if(isset($_SESSION["comment"]))
          {
            echo $_SESSION["comment"];
            unset($_SESSION["comment"]);
          }
      ?>
        <!-- Display existing comments -->
         <?php
                $id=$_GET["menu_id"];
                $comment_query = "SELECT * FROM comment_tb WHERE menu_id=$id ORDER BY id DESC";
                $comment_result = mysqli_query($conn, $comment_query);
                while ($comment = mysqli_fetch_array($comment_result)) 
                {
                 ?>
                  <div class="comment-box">
                    <h4><?php echo $comment["name"];?></h4>
                    <p><?php echo $comment["comment"];?></p>
                  </div>
                 <?php
                }
             ?>
     
      <div class="comment-box">
        <h4>Chris T.</h4>
        <p>I swapped sea bass with cod—still great flavor. Loved the lemon finish!
          
        </p>
      </div>
    </div>
  </div>

<?php if(isset($_SESSION["user_id"])) :?>  
      <div class="section comments">
        <!-- <h2>Comments</h2> -->


        <!-- Comment Form -->
        <form method="POST" class="comment-form">
          <!-- <input type="text" name="username" placeholder="Your name" required> -->
          <textarea name="comment" rows="4" placeholder="Leave a comment..." required></textarea>
          <button type="submit" name="submit">Post Comment</button>
        </form>
      </div>
<?php endif;?>      
<?php include "partials/you-also-like.php"?>
<?php include "partials/footer.php";?>
<?php
 $user_id = $_SESSION["user_id"];

 $user_sql = "SELECT * FROM user_tb WHERE id=$user_id";
 $user_result = mysqli_query($conn, $user_sql);

 $row = mysqli_fetch_array($user_result);

  if(isset($_POST["submit"]))
    {
      $user = $row["full_name"];
      $menu_id = $_GET["menu_id"];
      $comment = $_POST["comment"];

       $sql = "INSERT INTO comment_tb (menu_id,name,comment,user_id) VALUES('$menu_id','$user','$comment','$user_id')";
       
      $res = mysqli_query($conn,$sql);
      if($res == TRUE)
        {
          $_SESSION["comment"] = "<div class='success'>Your Comment Added</div>";
        }
      else
         {
           echo "Error";
         }  
    }
  
?>
