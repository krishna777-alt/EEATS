<?php
 include "../admin/connection/connect.php";
 $user_id = $_SESSION["user_id"];

  if(isset($_POST["update"]))
    {       
        $profile = $_FILES["file"]["name"];
        $temp_name = $_FILES["file"]["tmp_name"];
        
        $target_folder = "../uploads/profile/".$profile;

        if($_FILES["file"]["error"] ===0)
          {
            $upload = move_uploaded_file($temp_name,$target_folder);

            if($upload == TRUE)
              {
                echo "Uploaded Successfully!";
                $update_profile_query = "UPDATE user_tb SET image='$profile' WHERE id='$user_id'";
                $res = mysqli_query($conn,$update_profile_query);

                if($res == TRUE)
                  {
                    header("location:".$SITEURL."partials/user-update.php");
                  }
                else
                  {
                    $_SESSION["uploaded-Error"] ="<div class='error'>Failed To Update Profile!</div>";
                    header("location:".$SITEURL."partials/user-update.php");
                  }  
              }
            else
             {
                echo "Failed!";
             }  
          }
        print_r($profile);
    }
 ?>
