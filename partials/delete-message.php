 <?php 
 include("../admin/connection/connect.php");
 echo $delete_id = $_GET["id"];
  echo$user_id = $_GET["user_id"];

//   $sql = "DELETE FROM contact_tb where id='$delete_id'";
//   $res = mysqli_query($conn, $sql);

//   if($res == TRUE)
//     {
//         $_SESSION["deleted"] = "<div class='success'>Message Deleted</div>";
//         header("location:".$SITEURL."user-accont.php?id=");

//     }
//    else
//      {
//         $_SESSION["deleted"] = "<div class='error'>Error Occued while Deleteing Message!</div>";
//         header("location:".$SITEURL."user-accont.php");

//      } 
?>