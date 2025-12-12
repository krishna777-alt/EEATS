<?php
 include "admin/connection/connect.php";
$user = $_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eeats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <!-- <link rel="stylesheet" href="css/cart.css"> -->
    <!-- <link rel="stylesheet" href="css/food-detail.css"> -->
</head>
<div class="toast-container" id="toast"></div>

<body>
    <header class="header container-size">
        <nav class="nav-bar">
           <div class="nav-logo footer-brand">
            <!-- <h2>eee<span style="color: black;">ats</span></h2> -->
             <!-- <img src="../images/organic-food_logo.png" alt="LOGO"> -->
            <h2>eeats</h2>
           </div>

            <ul class="nav-el item1">
                <li class="ele"><a href="./index.php">Home</a></li>
                <li class="ele"><a href="./menu.php">Menu</a></li>
                <li class="ele"><a href="./contact.php">Contact</a></li>
                <li class="ele"><a href="./recipe-download.php">Recipe</a></li>
                <li class="ele"><a href="./orders.php">Orders</a></li>
            </ul>

            <div class="item2">
                <div class="ele1">
                    <?php if(isset($_SESSION["user"])): ?>
                        <a href="<?php echo $SITEURL;?>user-accont.php?id=<?php echo $user;?>">👤 Account</a>
                       
                    <?php else: ?>
                        <a href="./user-login.php">Login</a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" width="30" height="30" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    <?php endif; ?>  
                    <!-- <a href="./user-login.php">Login</a> -->
                    
                </div>
                <div class="ele2">
                    <a href="./cart.php">Cart</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="30" height="30" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </div>
            </div>
        </nav>
    </header>