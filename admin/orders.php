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
  <title>Admin - Orders</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f6f8fa;
      color: #333;
    }

    header {
      background: #202842;
      color: white;
      padding: 1rem 2rem;
      font-size: 1.5rem;
    }

    .orders-container {
      padding: 2rem;
    }

    .search-bar {
      margin-bottom: 1rem;
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .search-bar input,
    .search-bar select {
      padding: 0.5rem 1rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    th {
      background-color: #f1f3f5;
      font-weight: 600;
    }

    .status {
      padding: 0.4rem 0.8rem;
      border-radius: 12px;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .pending {
      background: #fff3cd;
      color: #856404;
    }

    .delivered {
      background: #d4edda;
      color: #155724;
    }

    .cancelled {
      background: #f8d7da;
      color: #721c24;
    }

    .actions button {
      padding: 0.4rem 0.8rem;
      margin-right: 0.5rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      background: #007bff;
      color: white;
      font-size: 0.9rem;
    }

    .actions button:hover {
      background: #0056b3;
    }

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead {
        display: none;
      }

      td {
        position: relative;
        padding-left: 50%;
        border: none;
        border-bottom: 1px solid #eee;
      }

      td::before {
        position: absolute;
        top: 1rem;
        left: 1rem;
        width: 40%;
        white-space: nowrap;
        font-weight: bold;
        color: #666;
      }

      td:nth-of-type(1)::before { content: "Order ID"; }
      td:nth-of-type(2)::before { content: "Customer"; }
      td:nth-of-type(3)::before { content: "Items"; }
      td:nth-of-type(4)::before { content: "Total"; }
      td:nth-of-type(5)::before { content: "Status"; }
      td:nth-of-type(6)::before { content: "Actions"; }
    }
  </style>
</head>
<body>

 <?php include "partials/header.php";?>
  <!-- <header>Admin Dashboard - Orders</header> -->

  <div class="orders-container">
    <div class="search-bar">
      <input type="text" id="searchName" placeholder="Search by customer...">
      <select id="statusFilter">
        <option value="">All Status</option>
        <option value="Pending">Pending</option>
        <option value="Delivered">Delivered</option>
        <option value="Cancelled">Cancelled</option>
      </select>
    </div>

    <table id="ordersTable">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Customer</th>
          <th>Items</th>
          <th>Total</th>
          <th>Status</th>
          <!-- <th>Actions</th> -->
        </tr>
      </thead>
      <tbody>
        <!-- Sample Orders -->
         <?php 
           $sql = "SELECT user_tb.full_name,order_tb.id,order_tb.title,order_tb.price,order_tb.status FROM order_tb JOIN user_tb ON order_tb.user_id=user_tb.id";
           $res = mysqli_query($conn, $sql);
           $count = mysqli_num_rows($res);
           if($count>0)
             {
               while($row = mysqli_fetch_assoc($res))
                  {
                    ?>
                    <tr>
                      <td>#<?php echo $row["id"];?></td>
                      <td><?php echo $row["full_name"];?></td>
                      <td><?php echo $row["title"];?></td>
                      <td>₹<?php echo $row["price"];?></td>
                      <td><span class="status pending"><?php echo $row["status"];?></span></td>
                      <td class="actions">
                        <!-- <button>View</button> -->
                        <!-- <button>Update</button> -->
                      </td>
                    </tr>
                    <?php
                  }
             }
         ?>
        
        <!-- <tr>
          <td>#1002</td>
          <td>Riya Sharma</td>
          <td>Burger, Fries</td>
          <td>₹249</td>
          <td><span class="status delivered">Delivered</span></td>
          <td class="actions">
            <button>View</button>
            <button>Update</button>
          </td>
        </tr>
        <tr>
          <td>#1003</td>
          <td>Aman Verma</td>
          <td>Paneer Wrap</td>
          <td>₹199</td>
          <td><span class="status cancelled">Cancelled</span></td>
          <td class="actions">
            <button>View</button>
            <button>Update</button>
          </td>
        </tr> -->
      </tbody>
    </table>
  </div>

  <script>
    const searchInput = document.getElementById('searchName');
    const statusFilter = document.getElementById('statusFilter');
    const table = document.getElementById('ordersTable');
    const rows = table.querySelectorAll('tbody tr');

    function filterOrders() {
      const search = searchInput.value.toLowerCase();
      const status = statusFilter.value;

      rows.forEach(row => {
        const customer = row.cells[1].innerText.toLowerCase();
        const orderStatus = row.cells[4].innerText;

        const matchCustomer = customer.includes(search);
        const matchStatus = status === "" || orderStatus === status;

        row.style.display = matchCustomer && matchStatus ? "" : "none";
      });
    }

    searchInput.addEventListener('input', filterOrders);
    statusFilter.addEventListener('change', filterOrders);
  </script>

</body>
</html>
