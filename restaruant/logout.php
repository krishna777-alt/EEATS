<?php
  include "../admin/connection/connect.php";
  session_destroy();

  header("location:".$SITEURL."restaruant/login.php");

?>