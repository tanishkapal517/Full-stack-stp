<?php
session_start();
$msg = '';
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  include('../dbconfig/config.php');
  $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

  $qry = "SELECT * FROM users WHERE emailid='$email' AND password='$password' AND role='admin'";
  $result = mysqli_query($conn, $qry);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['admin_id'] = $row['user_id'];
    $_SESSION['admin_name'] = $row['name'];
    header("Location: dashboard.php");
    exit;
  } else {
    $msg = "Invalid email or password!";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Admin Login | Florify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body class="container-fluid">

  <div class="row" style="margin-top:50px;">
    <div class="col-sm-6 col-sm-offset-3">
      <h3 class="text-center">Admin Login</h3>
      <p class="text-danger text-center"><?php echo $msg; ?></p>

      <form method="POST">
        <div class="form-group">
          <label>Email:</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Password:</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
      </form>
    </div>
  </div>

</body>

</html>