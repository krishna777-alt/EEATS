<?php
  include "admin/connection/connect.php";
  session_destroy();

  header("location:".$SITEURL."user-login.php");

?>