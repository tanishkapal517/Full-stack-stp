<?php
  session_start();
?>
<?php
if (!isset($_GET['pid'])) {
  header("location:index.php");
  exit();
}

$pid = intval($_GET['pid']);
include('../dbconfig/config.php');
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
$qry = "SELECT * FROM products WHERE product_id=$pid";
$result = mysqli_query($conn, $qry);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $row['product_name']; ?> Description | Florify</title>
  <link rel="icon" type="image/png" href="../assets/images/me-favv.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

  <!-- Your existing styles -->
  <link rel="stylesheet" type="text/css" href="../assets/css/formuser.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/desc.css" />

  
</head>

<body>
  <div class="container-fluid">
    <?php include 'includes/navbar-user.php'; ?>

    <div class="container">
      <div class="row product-section">
        <div class="col-sm-5 product-image text-right">
          <img src="../<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="img-responsive pull-right" />
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5 product-details">
          <h2><?php echo $row['product_name']; ?></h2>
          <div class="product-price">₹<?php echo $row['product_price']; ?></div>
          <p class="product-description"><?php echo $row['product_description']; ?></p>
          <a href="cart.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-success">Add To Cart</a>
        </div>
      </div>
    </div>

    <?php include 'includes/footer.php'; ?>
  </div>
</body>
</html>
