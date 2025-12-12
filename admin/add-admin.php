<?php include "connection/connect.php";?>
<style>
.add-admin-container {
  max-width: 600px;
  margin: 3rem auto;
  background: #fff;
  padding: 2rem 2.5rem;
  box-shadow: 0 0 15px rgba(0,0,0,0.05);
  border-radius: 10px;
  font-family: 'Segoe UI', sans-serif;
}
.add-admin-container h2 {
  margin-bottom: 1.5rem;
  color: #333;
  text-align: center;
}
.admin-form .form-group {
  margin-bottom: 1.2rem;
}
.admin-form label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 600;
  color: #444;
}
.admin-form input,
.admin-form select {
  width: 100%;
  padding: 0.7rem;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
}
.admin-form input:focus,
.admin-form select:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0,123,255,0.2);
}
.submit-btn {
  width: 100%;
  padding: 0.8rem;
  background: #007bff;
  border: none;
  color: white;
  border-radius: 6px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s ease;
}
.submit-btn:hover {
  background: #0056b3;
}
.success{
  color: red;
}
</style>

<div class="add-admin-container">
  <h2>Add New Admin</h2>
  <form class="admin-form" method="POST" action="">
    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" name="name" required placeholder="Enter full name">
    </div>
    <div class="form-group">
      <label for="name">Username</label>
      <input type="text" name="username" required placeholder="Enter username">
    </div>
    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" name="email" required placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" required placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="role">Role</label>
      <select id="role" name="role" required>
        <option value="Admin">Admin</option>
        <option value="Manager">Manager</option>
        <!-- <option value="Customer">Customer</option> -->
      </select>
    </div>
    <div class="form-group">
      <!-- <button type="submit" class="submit-btn">Add Admin</button> -->
      <input type="submit" name="submit" class="submit-btn" title="Add Admin" placeholder="Submit">
    </div>
  </form>
</div>

<?php

if(isset($_POST["submit"]))
  {

   $full_name =  $_POST["name"];
   $username  =  $_POST["username"];
   $email     =  $_POST["email"];
   $password  =  md5($_POST["password"]);
   $role      =  $_POST["role"];
  //  $status    =  $_POST[""];
   
   $sql = "INSERT INTO admin_tb(full_name,username,email,password,role,status) VALUES('$full_name','$username','$email','$password','$role','active')";
   $res = mysqli_query($conn,$sql); 

   if($res == TRUE)
      {
        $_SESSION["stored"] = "<div class='success'>Admin Added Successfully</div>";
        header("location:".$SITEURL."/admin/administrator.php");
      }
    else
      {
       $_SESSION["stored"] = "<div class='error'>Fail To Added Admin</div>";
        header("location:".$SITEURL."/admin/add-admin.php");
      }  
  }
?> 
