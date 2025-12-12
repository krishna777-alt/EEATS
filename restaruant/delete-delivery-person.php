<?php
include "../admin/connection/connect.php";

 $dele_id = $_GET["id"];

 $sql = "DELETE FROM delivery_person_tb WHERE id='$dele_id'";

 $res = mysqli_query($conn,$sql);

 if($res == TRUE)
     {
        $_SESSION["dele-person"]="<div class='success'>Delivery Person Deleted</div>";
        header("Location:http://localhost/project1/restaruant/delivery-person.php");
     }
  else
     {
        $_SESSION["dele-person"]="<div class='error'>Failed To Delete</div>";
        header("Location:http://localhost/project1/restaruant/delivery-person.php");
     }   
?>