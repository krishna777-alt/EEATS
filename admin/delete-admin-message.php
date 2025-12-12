 <?php 
 include("connection/connect.php");
  $delete_id = $_GET["id"];

  $sql = "DELETE FROM contact_tb where id=$delete_id";
  $res = mysqli_query($conn, $sql);

  if($res == TRUE)
    {
        $_SESSION["deleted"] = "<div class='success'>Message Deleted</div>";
        header("location:".$SITEURL."admin/message.php");

    }
   else
     {
        $_SESSION["deleted"] = "<div class='success'>Error Occued while Deleteing Message!</div>";
        header("location:".$SITEURL."admin/message.php");

     } 
?>