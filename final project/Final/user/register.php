<?php
session_start();
$msg = "";
if (isset($_POST['btn_register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pwd = $_POST['password'];
  $phone = $_POST['phone'];
  include('../dbconfig/config.php');
  $conn = @mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
  if ($_POST['password'] !== $_POST['cnf-password']) {
  $msg = "<h4><font color='red'>Passwords do not match!</font></h4>";
} else {
  if ($conn == null) {
    $msg = "<h4><font color='red'>connection failure!!</font></h4>";
  } else {
    $qry = "insert into users(name, emailid, password, phoneno, role) values('$name' , '$email' , '$pwd' , '$phone' , 'Client')";
    mysqli_query($conn, $qry);
    if (mysqli_affected_rows($conn) > 0)
      $msg = "<h4><font color='#5cb85c'>Account Created Successfully!!</font></h4>";
    else
      $msg = "<h4><font color='red'>Error in creating account (try again)</font></h4>";mysqli_error($conn);
    mysqli_close($conn);
  }
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Florify</title>
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
  <link rel="stylesheet" type="text/css" href="../assets/css/formuser.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
</head>

<body class="container-fluid">
  <?php include 'includes/navbar-user.php' ?>
  <div class="row">
    <div class="col-sm-6">
      <img src="../assets/images/anniversary-bouque.jpg" class="img-responsive img-rounded cut-out">
    </div>
    <div class="col-sm-5">
      <?php echo $msg; ?>
      <div class="form-b">
        <h2>Create Account</h2>
        <form class="formm" method="POST" action="">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control size" placeholder="enter your name" required />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control size" placeholder="enter your email" required />
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="tel" name="phone" class="form-control size" placeholder="enter your phone" required />
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control size" placeholder="enter your password" required />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="cnf-password" class="form-control size" placeholder="confirm your password" required />
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" name="btn_register" value="Register" class="but text-center btn-block btn">
          </div>
        </form>
        <a href="login.php">
          <h5 class="text-center create">Already have an Account>Login</h5>
        </a>
        <h6 class="text-center policy">By creating account you are agreeing to our <b>Terms of Services</b> and <b>Policy Privacy</b></h6>
      </div>
    </div>
    <div class="col-sm-1"></div>
  </div>
  </div>
  <?php include 'includes/footer.php' ?>
</body>

</html>