<?php
session_start();
if (!isset($_SESSION['name'])) {
  header("location:index.html");
}
include('../dbconfig/config.php');
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

$qry = "SELECT * FROM orders WHERE user_id='{$_SESSION['uid']}' ORDER BY order_id DESC";
$resultset = mysqli_query($conn, $qry);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Orders | Florify</title>
  <link rel="icon" type="image/png" href="../assets/images/me-favv.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
  <style>
    body {
      background-color: #121212;
      color: white;
    }

    .orders-container {
      margin-top: 30px;
      background: #1e1e1e;
      padding: 20px;
      border-radius: 10px;
      width: 100%;
    }

    .orders-container h2 {
      text-align: center;
      color: #ff4d88;
      margin-bottom: 20px;
    }

    .orders-table th {
      background-color: #ff4d88;
      color: white;
      text-align: center;
    }

    .orders-table td {
      text-align: center;
      vertical-align: middle;
    }

    .empty-orders {
      text-align: center;
      color: #aaa;
      margin-top: 20px;
      font-size: 18px;
    }
  </style>
</head>

<body class="container-fluid">
  <?php include 'includes/navbar-user.php'; ?>
  <div class="orders-container">
    <div class="row">
      <div class="col-sm-12">
        <h2>My Orders</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <?php
        if (mysqli_num_rows($resultset) > 0) {
          echo "<div class='table-responsive'>"; // ✅ Add this wrapper
          echo "<table class='table table-bordered orders-table'>";
          echo "<tr>
          <th>Order ID</th>
          <th>Products</th>
          <th>Address</th>
          <th>Amount</th>
          <th>Payment</th>
          <th>Status</th>
        </tr>";

          while ($row = mysqli_fetch_array($resultset)) {
            $productIDs = explode(",", $row['product_id']);
            $names = "";
            foreach ($productIDs as $id) {
              $prodqry = "SELECT product_name FROM products WHERE product_id='$id'";
              $prodres = mysqli_query($conn, $prodqry);
              if ($prodrow = mysqli_fetch_array($prodres)) {
                $names .= $prodrow['product_name'] . ", ";
              }
            }
            $names = rtrim($names, ", ");

            echo "<tr>
            <td>#{$row['order_id']}</td>
            <td>$names</td>
            <td>{$row['address']}</td>
            <td>₹{$row['order_amount']}</td>
            <td>{$row['payment_mode']}</td>
            <td>{$row['order_status']}</td>
          </tr>";
          }

          echo "</table>";
          echo "</div>";
        } else {
          echo "<div class='empty-orders'>You have not placed any orders yet!</div>";
        }
        ?>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <?php include 'includes/footer.php'; ?>
    </div>
  </div>
</body>

</html>