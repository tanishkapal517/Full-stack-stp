<?php
session_start();
$msg = '';
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  include('../dbconfig/config.php');
  $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
  $qry = "SELECT * FROM users WHERE emailid='$email' AND password='$password' AND role='client'";
  $resultset = mysqli_query($conn, $qry);
  if (mysqli_num_rows($resultset) > 0) {
    $row = mysqli_fetch_array($resultset);
    $_SESSION['uid'] = $row[0];
    $_SESSION['name'] = $row[1];
    header("location:index.php");
  } else {
    $msg = "Invalid email or password!!";
  }
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Florify</title>
  <link rel="icon" type="image/png" href="../assets/images/me-favv.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/formuser.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css" />

  </style>
</head>

<body class="container-fluid">

  <?php include 'includes/navbar-user.php'; ?>
  <div class="container page-content">
    <div class="row">
      <div class="col-xs-12 col-sm-6 text-center">
        <img src="../assets/images/birthday-bouquet.jpg" class="img-responsive img-rounded cut-out">
      </div>
      <div class="col-xs-12 col-sm-6 pull-left text-left">
        <div class="form-b">
          <h3 class="text-center text-danger"><?php echo $msg; ?></h3>
          <h2>Login into Your Account</h2>

          <form class="formm" method="POST">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control size" placeholder="Enter your email" required />
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control size" placeholder="Enter your password" required />
            </div>

            <div class="form-group">
              <label><input type="checkbox"> Remember Me</label>
            </div>

            <div class="form-group">
              <input type="submit" name="login" value="Login" class="but text-center btn-block btn">
            </div>
          </form>
          <a href="register.php">
            <h5 class="text-center create">Don't have an account? Create Account</h5>
          </a>
          <h6 class="text-center policy">
            By creating an account you are agreeing to our <b>Terms of Services</b> and <b>Privacy Policy</b>
          </h6>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <?php include 'includes/footer.php'; ?>
  </footer>

</body>
</html>
