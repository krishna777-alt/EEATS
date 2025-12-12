<?php 
 include "connection/connect.php";
  session_start();
  session_destroy();

  header("location:".$SITEURL."admin/admin-login.php");
?>