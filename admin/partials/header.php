<!-- Admin Navbar -->
 <?php include "../connection/connect.php";
//  echo mysqli_error($conn);
 ?>
<nav class="admin-navbar">
  <div class="logo">Admin Panel</div>
  <ul class="nav-items">
    <li><a href="./index.php" class="active">Dashboard</a></li>
    <li><a href="./administrator.php">Administrators</a></li>
    <li><a href="./users.php">Users</a></li>
    <li><a href="./manage-resturants.php">Resturants</a></li>
    <li><a href="./categories.php">Categories</a></li>
    <li><a href="./orders.php">Orders</a></li>
    <li><a href="./menu.php">Menu</a></li>
    <li><a href="./message.php">Messages</a></li>
    <li><a href="./admin-logout.php">Logout</a></li>
  </ul>
</nav>

<style>
body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
}

.admin-navbar {
  background-color: #1f2a40;
  padding: 1rem 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #ffffff;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.admin-navbar .logo {
  font-size: 1.3rem;
  font-weight: bold;
  color: #ffffff;
}

.nav-items {
  list-style: none;
  display: flex;
  gap: 1.5rem;
  margin: 0;
  padding: 0;
}

.nav-items li {
  margin: 0;
}

.nav-items a {
  color: #cbd5e0;
  text-decoration: none;
  font-size: 1rem;
  padding: 0.5rem 0.75rem;
  border-radius: 5px;
  transition: 0.3s ease;
}

.nav-items a:hover,
.nav-items a.active {
  background-color: #007bff;
  color: #fff;
}
</style>
