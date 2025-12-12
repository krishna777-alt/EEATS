<?php 
include "../admin/connection/connect.php";
include "includes/side-bar.php";
?>

<link rel="stylesheet" href="css/delivery-person.css">
<div class="delivery-person-management">
    <?php 
        if($_SESSION["added"])
            {
            echo $_SESSION["added"];
            unset($_SESSION["added"]); 
            }
        if($_SESSION["person_updated"])
            {
                echo$_SESSION["person_updated"];
                unset($_SESSION["person_updated"]);
            } 
        if($_SESSION["dele-person"])
            {
                echo $_SESSION["dele-person"];
                unset($_SESSION["dele-person"]);
            }         

    ?>
    <h2>Delivery Person Management</h2>

    <!-- Add Delivery Person -->
    <div class="dp-section">
        <h3>Add Delivery Person</h3>
        <form class="dp-form" actions="" method="POST">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter full name">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Enter phone number">
            </div>
            <div class="form-group">
                <label>Vehicle Info</label>
                <input type="text" name="vehicle" placeholder="e.g., Bike, Car">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="example@gmail.com">
            </div>

            <div class="form-group">
                <label>Home Address</label>
                <input type="address" name="address" placeholder="placename.po">
            </div>
            <button type="submit" name="submit" class="add-btn">Add Delivery Person</button>
        </form>
    </div>

    <!-- View & Manage Delivery Persons -->
    <div class="dp-section">
        <h3>View / Manage Delivery Persons</h3>
       
        <table class="dp-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Vehicle</th>
                    <th>Email</th>
                    <th>Home Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Data Row -->
                <?php 
                    $sql2 = "SELECT * FROM delivery_person_tb";

                    $res2 = mysqli_query($conn,$sql2);
                    $sn=1;
                    while($row = mysqli_fetch_array($res2))
                        {
                            ?>
                            <tr>
                                <td><?php echo $sn;?></td>
                                    <td><?php echo $row["full_name"];?></td>
                                    <td><?php echo $row["phone"];?></td>
                                    <td><?php echo $row["vehicle"];?></td>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php echo $row["address"];?></td>
                                    <td>
                                   <div class="fle-btn">
                                       <a href="<?php echo $SITEURL;?>restaruant/update-delivery-person.php?id=<?php echo$row["id"];?>">
                                           <button class="update-btn">Update</button>
                                       </a>
                                       <br>
                                       <a href="<?php echo $SITEURL;?>restaruant/delete-delivery-person.php?id=<?php echo$row["id"];?>">
                                           <button class="delete-btn">Delete</button>
                                       </a>
                                   </div>     
                                </td>
                            </tr>
                            <?php
                            $sn++;
                        } 
                ?>
                
                <!-- <tr>
                    <td>2</td>
                    <td>Aman Singh</td>
                    <td>9123456780</td>
                    <td>Scooter</td>
                    <td>efef</td>
                    <td>fdscdc</td>
                    <td>
                        <button class="update-btn">Update</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<?php

  if(isset($_POST["submit"]))
     {
        $full_name = $_POST["name"];
        $phone     = $_POST["phone"];
        $vehicle   = $_POST["vehicle"];
        $email     = $_POST["email"];
        $address   = $_POST["address"];
        $res_id    = $_SESSION["restaurant_id"];

       echo $sql = "INSERT INTO delivery_person_tb (full_name,phone,vehicle,email,address,res_id) 
        VALUES('$full_name','$phone','$vehicle','$email','$address','$res_id')";

        $res = mysqli_query($conn,$sql);
        if($res == TRUE)
          {
             $_SESSION["added"] = "<div class='success'>Delivery Person Added</div>";
          }   
     }
?>