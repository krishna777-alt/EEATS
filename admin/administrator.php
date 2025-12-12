<?php 
include "connection/connect.php";

   if(!isset($_SESSION["admin"]))
    {
      header("location:".$SITEURL."admin/admin-login.php");
    }
     
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Manage Admin</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f8;
    }

    header {
      background-color: #2c3e50;
      color: #fff;
      padding: 1rem 2rem;
      font-size: 1.5rem;
    }

    .user-container {
      padding: 2rem;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .top-bar input {
      padding: 0.5rem 1rem;
      font-size: 1rem;
      border-radius: 6px;
      border: 1px solid #ccc;
      width: 250px;
    }

    .add-user-btn {
      background-color: #3498db;
      color: white;
      padding: 0.5rem 1.2rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1rem;
      text-decoration: none;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 1rem;
      text-align: left;
    }

    th {
      background-color: #f1f3f5;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: #fafafa;
    }

    .badge {
      padding: 0.3rem 0.6rem;
      border-radius: 10px;
      font-size: 0.85rem;
      font-weight: bold;
      display: inline-block;
    }

    .active {
      background-color: #d4edda;
      color: #155724;
    }

    .inactive {
      background-color: #f8d7da;
      color: #721c24;
    }

    .admin {
      background-color: #e0e7ff;
      color: #3b4cca;
    }

    .customer {
      background-color: #ffeeba;
      color: #856404;
    }
.action-buttons a {
  display: inline-block;
  padding: 0.4rem 0.8rem;
  margin-right: 0.4rem;
  border-radius: 6px;
  text-decoration: none;
  color: #fff;
  font-size: 0.85rem;
  transition: background 0.3s ease, transform 0.2s ease;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.edit-btn {
  background-color: #28a745;
}

.edit-btn:hover {
  background-color: #218838;
  transform: translateY(-1px);
}

.delete-btn {
  background-color: #dc3545;
}

.delete-btn:hover {
  background-color: #c82333;
  transform: translateY(-1px);
}

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead tr {
        display: none;
      }

      td {
        position: relative;
        padding-left: 50%;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        left: 1rem;
        font-weight: bold;
      }
    }
  </style>
</head>
<body>
<?php include "partials/header.php";
   include "connection/connect.php";
?>
<!-- <header>Admin Dashboard - Manage Users</header> -->
<div class="user-container">
  <div class="top-bar">
    <input type="text" id="searchUser" placeholder="Search admin...">
    <!-- <button class="add-user-btn">+ Add New Admin</button> -->
    <a class="add-user-btn" href="add-admin.php">+ Add New Admin</a>
  </div>
    <?php
       if(isset($_SESSION["stored"]))
         {
          echo $_SESSION["stored"];
          unset($_SESSION["stored"]);
         }
       if(isset($_SESSION["update"]))
         {
           echo $_SESSION["update"];
           unset($_SESSION["update"]);
         }  
        if(isset($_SESSION["delete"]))
          {
            echo $_SESSION["delete"];
            unset($_SESSION["delete"]);
          } 
    ?>
  <table>
    
    <thead>
      <tr>
        <th>Admin ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <?php
       $sql = "SELECT * FROM admin_tb";
       $res = mysqli_query($conn,$sql);
       if($res == TRUE)
         {
              $cout = mysqli_num_rows($res);
              if($cout > 0)
                {
                  $admin_id = 1;
                  while($row = mysqli_fetch_array($res))
                  {
                    $id   = $row["id"];
                    $full_name = $row["full_name"];
                    $username  = $row["username"];
                    $email  = $row["email"];
                    $role   = $row["role"];
                    $status = $row["status"];
                    ?>
                       
                    <tbody id="userTable">
                    <tr>
                      <td data-label="User ID"><?php echo $admin_id?></td>
                      <td data-label="Name"><?php echo $full_name?></td>
                      <td data-label="Username"><?php echo $username?></td>
                      <td data-label="Email"><?php echo $email?></td>
                      <td data-label="Role"><span class="badge admin"><?php echo $role?></span></td>
                      <td data-label="Status"><span class="badge active"><?php echo $status?></span></td>
                      <td data-label="Actions" class="action-buttons">         
                        <a href="<?php echo $SITEURL;?>admin/update-admin.php?id=<?php echo $id?>" class="edit-btn">Edit</a>
                        <a href="<?php echo $SITEURL;?>admin/delete-admin.php?id=<?php echo $id?>" class="delete-btn">Delete</a>
                      </td>
                    </tr>  
                    </tbody>
                    
                    <?php
                    $admin_id++;
                  }

                }
         }
    ?>
    
  </table>
</div>

<script>
  const searchInput = document.getElementById('searchUser');
  const rows = document.querySelectorAll('#userTable tr');

  searchInput.addEventListener('input', () => {
    const keyword = searchInput.value.toLowerCase();

    rows.forEach(row => {
      const name = row.cells[1].textContent.toLowerCase();
      const email = row.cells[2].textContent.toLowerCase();

      if (name.includes(keyword) || email.includes(keyword)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
</script>

</body>
</html>

