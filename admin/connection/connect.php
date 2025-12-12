<?php
   $host = "localhost";
   $user = "fooduser";
   $pass =  "root";
   $db   =  "food_order_db";

   $conn = mysqli_connect($host, $user, $pass, $db);
   if(!$conn)
    {
      die("Could not connect!". mysqli_connect_error());
    }
    session_start();
    $SITEURL="http://localhost/project1/";
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      
      .success {
        background-color: #d4edda;
        color: #155724;
        padding: 1rem 1.5rem;
        border-left: 6px solid #28a745;
        border-radius: 8px;
        margin: 1rem auto;
        max-width: 600px;
      font-size: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      position: relative;
      animation: slideFade 0.6s ease forwards;
    }
    .error {
      background-color: #f8d7da;
      color: #721c24;
      padding: 1rem 1.5rem;
      border-left: 6px solid #dc3545;
      border-radius: 8px;
      margin: 1rem auto;
      max-width: 600px;
      font-size: 1rem;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  position: relative;
  animation: slideFade 0.6s ease forwards;
}

@keyframes slideFade {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>
<!-- </head>
</html> -->