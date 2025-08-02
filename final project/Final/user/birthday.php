<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Birthday | Florify</title>
  <link rel="icon" type="image/png" href="../assets/images/me-favv.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/css/occasion.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css" />

</head>

<body class="container-fluid">
  <?php include 'includes/navbar-user.php'; ?>

  <h1 class="section-title">🎂 Birthday Collection</h1>

  <?php
  include('../dbconfig/config.php');
  $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
  $qry = "SELECT * FROM products WHERE product_type='Birthday'";
  $resultset = mysqli_query($conn, $qry);
  
  if (mysqli_num_rows($resultset) > 0) {
    $count = 0;
    while ($row = mysqli_fetch_assoc($resultset)) {
      if ($count == 0) {
        echo "<div class='row'>";
      }

      echo "<div class='col-sm-3'>";
      echo "<a href='desc.php?pid=$row[product_id]'>";
      echo "<div class='thumbnail text-center'>";
      echo "<img src='../{$row['product_image']}' alt='{$row['product_name']}' class='img-responsive' />";
      echo "<div class='caption'>";
      echo "<h4>{$row['product_name']}</h4>";
      echo "<p>&#8377;{$row['product_price']}</p>";
      echo "</div>";
      echo "</div>";
      echo "</a>";
      echo "</div>";

      $count++;

      if ($count == 4) {
        echo "</div>";
        $count = 0;
      }
    }
    if ($count != 0) {
      echo "</div>";
    }
  } else {
    echo "<h2 class='text-center text-danger'>No Product Found !!!</h2>";
  }

  mysqli_close($conn);
  ?>
  <?php include 'includes/footer.php' ?>
</body>

</html>