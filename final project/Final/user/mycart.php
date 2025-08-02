<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Cart | Florify</title>
  <link rel="icon" type="image/png" href="../assets/images/me-favv.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/mycart.css" />
</head>

<body>
  <?php include 'includes/navbar-user.php'; ?>

  <div class="container">
    <div class="cart-container">

      <?php
      if (isset($_COOKIE['cart']) && $_COOKIE['cart'] != "") {
        include('../dbconfig/config.php');
        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

        $ids = explode(",", $_COOKIE['cart']);
        $ids = array_map('intval', $ids);
        $ids = array_unique($ids);
        $idList = implode(",", $ids);

        $qry = "SELECT * FROM products WHERE product_id IN ($idList)";
        $resultset = mysqli_query($conn, $qry);

        if (mysqli_num_rows($resultset) > 0) {
          echo "<div class='table-responsive'>";
          echo "<table class='cart-table table table-bordered'>";
          echo "<tr>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Remove</th>
                </tr>";
          $total = 0;

          while ($row = mysqli_fetch_array($resultset)) {
            $total += $row['product_price'];
            echo "<tr>
                    <td data-label='Product Image'><img src='../{$row['product_image']}'></td>
                    <td data-label='Product Name'>{$row['product_name']}</td>
                    <td data-label='Price'>₹{$row['product_price']}</td>
                    <td data-label='Remove'><a href='remove.php?pid={$row['product_id']}' class='glyphicon glyphicon-remove remove-btn'></a></td>
                  </tr>";
          }
          $_SESSION['total'] = $total;
          echo "</table>";
          echo "</div>";
          if (isset($_SESSION['name'])) {
            echo "<div class='cart-footer'>
            <div class='total-box'>Total: ₹" . $total . "</div>
            <a href='shipping.php' class='place-order-btn'>Place Order</a>
          </div>";
          } else {
            echo "<div class='cart-footer'>
            <div class='total-box'>Total: ₹" . $total . "</div>
            <a href='login.php' class='place-order-btn'>Place Order</a>
          </div>";
          }
        } else {
          echo "<div class='empty-cart'>Your Cart is Empty!</div>";
        }
      } else {
        echo "<div class='empty-cart'>Your Cart is Empty!</div>";
      }
      ?>
    </div>
  </div>
  <?php include 'includes/footer.php' ?>
</body>

</html>