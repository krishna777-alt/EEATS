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
  <title>Admin - Manage Users </title>
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

    /* .action-buttons {
  display: flex;
  gap: 0.4rem;
} */

.action-buttons {
  display: flex;
  gap: 0.4rem;
}

.action-buttons a {
  display: inline-block;
  padding: 0.4rem 0.8rem;
  font-size: 0.85rem;
  border-radius: 6px;
  cursor: pointer;
  color: white;
  text-decoration: none;
  font-weight: 500;
  transition: background 0.3s ease, transform 0.2s ease;
}

.action-buttons .edit {
  background-color: #28a745;
}

.action-buttons .edit:hover {
  background-color: #218838;
  transform: translateY(-1px);
}

.action-buttons .delete {
  background-color: #dc3545;
}

.action-buttons .delete:hover {
  background-color: #c82333;
  transform: translateY(-1px);
}

.view {
  background-color: #007bff; /* Bootstrap Blue */
  color: #fff;
  padding: 6px 14px;
  border-radius: 6px;
  font-size: 0.9rem;
  text-decoration: none;
  font-weight: 500;
  display: inline-block;
  transition: background-color 0.3s ease;
}

.view:hover {
  background-color: #0056b3;
}


    .edit-btn {
      background-color: #28a745;
    }

    .delete-btn {
      background-color: #dc3545;
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

<?php include "partials/header.php";?>
<!-- <header>Admin Dashboard - Manage Users</header> -->

<div class="user-container">
  <div class="top-bar">
    <input type="text" id="searchUser" placeholder="Search user...">
    <!-- <a class="add-user-btn" href="add-admin.php">+ Add New Users</a> -->
    <!-- <button class="add-user-btn">+ Add New User</button> -->
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
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <!-- <th>Role</th> -->
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="userTable">
      <?php 
          $sql = "SELECT * FROM user_tb";
          $res = mysqli_query($conn, $sql);

          if($res == true)
            {
              $count = mysqli_num_rows($res);
              if($count>0)
                {
                  $user_id=1;
                  while($row = mysqli_fetch_array($res))
                    {
                      ?>
                      <tr>
                      <td data-label="User ID"><?php echo $user_id;?></td>
                      <td data-label="Name"><?php echo $row["full_name"];?></td>
                      <td data-label="Email"><?php echo $row["email"];?></td>
                      <!-- <td data-label="Role"><span class="badge admin">Admin</span></td> -->
                      <td data-label="Status"><span class="badge active"><?php echo $row["status"];?></span></td>
                      <td class="action-buttons">
                        <a href="<?php echo $SITEURL;?>admin/user-view.php?id=<?php echo $row["id"];?>" class="view">View</a>
                        <a href="<?php echo $SITEURL;?>admin/update-user.php?id=<?php echo $row["id"];?>" class="edit">Edit</a>
                        <a href="<?php echo $SITEURL;?>admin/delete-user.php?id=<?php echo $row["id"];?>" class="delete">Delete</a>
                    </td>
           
                    </tr>
                      
                      <?php
                      $user_id++;
                    }
                }
            }
        ?>
    </tbody>
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
