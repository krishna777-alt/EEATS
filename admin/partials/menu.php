<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: #f4f6f8;
      color: #333;
    }

    .admin-container {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 250px;
      background: #24292e;
      color: #fff;
      padding: 2rem 1rem;
      display: flex;
      flex-direction: column;
    }

    .sidebar h2 {
      margin-bottom: 2rem;
      font-size: 1.4rem;
      text-align: center;
    }

    .sidebar a {
      color: #ccc;
      text-decoration: none;
      padding: 0.8rem 1rem;
      border-radius: 6px;
      transition: 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background: #0366d6;
      color: white;
    }

    .main-content {
      flex: 1;
      padding: 2rem;
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .dashboard-header h1 {
      font-size: 2rem;
      color: #24292e;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
    }

    .card {
      background: white;
      padding: 1.5rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      transition: 0.3s ease;
    }

    .card:hover {
      transform: translateY(-3px);
    }

    .card h3 {
      font-size: 1.2rem;
      color: #0366d6;
    }

    .card p {
      font-size: 2rem;
      font-weight: bold;
      margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
      .admin-container {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        flex-direction: row;
        overflow-x: auto;
        white-space: nowrap;
        padding: 1rem;
      }

      .sidebar a {
        display: inline-block;
        margin-right: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="admin-container">
    <div class="sidebar">
      <h2>Admin Panel</h2>
      <a href="#" class="active">Dashboard</a>
      <a href="administrator.php">Administrator</a>
      <a href="order.php">Orders</a>
      <a href="menu.php">Menu</a>
      <a href="categories.php">Categories</a>
      <a href="users.php">Users</a>
      <a href="message.php">Messages</a>
      
    </div>