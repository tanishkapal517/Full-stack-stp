<?php
  session_start();
  if(!isset($_SESSION['name'])){
    header("location:index.html");
  }
?>
<?php
  $msg = "";
  if(isset($_POST['submit'])){
    $name = $_POST['add_name'];
    $email = $_POST['add_email'];
    $no = $_POST['add_phone'];
    $pin = $_POST['pincode'];
    $add = $_POST['add_address'];
    $address = "$name, $add, $pin, $email, $no";
    $payment = $_POST['payment'];
    include('../dbconfig/config.php');
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
    $qry = "INSERT INTO orders(user_id, product_id, address, order_amount, payment_mode, order_status) VALUES ('{$_SESSION['uid']}', '{$_COOKIE['cart']}', '$address', '{$_SESSION['total']}', '$payment', 'Pending')";
    mysqli_query($conn, $qry);
    if(mysqli_affected_rows($conn)>0)
      $msg = "<h3 class='text-success text-center'>Order placed successfully!!</h3>";
    else
      $msg = "<h3 class='text-danger text-center'>Error in placing order. Try Again !!</h3>";
    mysqli_close($conn);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shipping Address | Florify</title>
  <link rel="icon" type="image/png" href="../assets/images/me-favv.png" />
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
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Matangi:wght@300..900&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/css/shipping.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
</head>

<body>
  <?php include 'includes/navbar-user.php' ?>
  <div class="container-fluid">
    <div class="row form-row">
      <div class="col-sm-12 cont">
        <h2 class="text-center headin">SHIPPING ADDRESS</h2>
        <form class="form-horizontal" method="POST">
          <div class="form-group">
            <label class="control-label col-sm-2">Name</label>
            <div class="col-sm-9">
              <input
                type="text"
                name="add_name"
                value=""
                placeholder="Enter Your Name"
                class="form-control place" 
                required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Email</label>
            <div class="col-sm-9">
              <input
                type="email"
                name="add_email"
                value=""
                placeholder="Enter Your email"
                class="form-control place" 
                required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Phone</label>
            <div class="col-sm-9">
              <input
                type="tel"
                name="add_phone"
                value=""
                placeholder="Enter Your Phone no."
                class="form-control place" 
                required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Address</label>
            <div class="col-sm-9">
              <textarea name="add_address" class="form-control" rows="6" cols="46" placeholder="Enter Your Address" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Pincode</label>
            <div class="col-sm-9">
              <input
                type="number"
                name="pincode"
                value=""
                placeholder="Enter Your Pincode"
                class="form-control" 
                required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Payment Method</label>
            <div class="col-sm-9">
              <select name="payment" style="color: grey;" class="form-control" required>
                <option></option>
                <option>Cash On Delivery</option>
                <option>Online Payment</option>
              </select>
            </div>
          </div>
          <div class="row btn-row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <input type="submit" name="submit" class="btn btn-success btn-block" value="Place Order" />
            </div>
            <div class="col-sm-4"></div>
          </div>
          <?php echo "$msg"; ?>
        </form>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php' ?>
  </div>

</body>

</html>