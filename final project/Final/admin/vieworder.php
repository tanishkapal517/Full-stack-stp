<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Users | Florify</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu"
    crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets/css/dashboard.css" />
</head>

<body>
  <?php include_once 'includes/navbar-admin.php' ?>
  <div class="container-fluid">
    <h2 class="head text-center">ALL ORDERS</h2>
  </div>
  <?php
  include('../dbconfig/config.php');
  $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
  $qry = "select * from orders";
  $resultset = mysqli_query($conn, $qry);
  if (mysqli_num_rows($resultset) > 0) {
    echo "<table class='table table-border'>";
    echo "<tr>";
    echo "<th>ORDER ID</th>";
    echo "<th>USER ID</th>";
    echo "<th>PRODUCT ID</th>";
    echo "<th>ADDRESS</th>";
    echo "<th>ORDER AMOUNT</th>";
    echo "<th>PAYMENT MODE</th>";
    echo "<th>ORDER STATUS</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($resultset)) {
      echo "<tr>";
      echo "<td>$row[0]</td>";
      echo "<td>$row[1]</td>";
      echo "<td>$row[2]</td>";
      echo "<td>$row[3]</td>";
      echo "<td>$row[4]</td>";
      echo "<td>$row[5]</td>";
      echo "<td>$row[6]</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "<h1 style='color: red;' class='text-center'>NO RECORD FOUND!</h1>";
  }
  mysqli_close($conn);
  ?>
</body>

</html>