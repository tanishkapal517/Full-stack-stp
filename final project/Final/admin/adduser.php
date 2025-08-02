<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
$msg = "";
if (isset($_POST['add_user'])) {
  $name = $_POST['clientname'];
  $email = $_POST['clientemail'];
  $pwd = $_POST['password'];
  $phone = $_POST['phone'];
  $role = $_POST['role'];
  include('../dbconfig/config.php');
  $conn = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
  if ($conn == null) {
    $msg = "<h4><font color='red'>connection failure!!</font></h4>";
  } else {
    $qry = "insert into users(name, emailid, password, phoneno, role) values('$name' , '$email' , '$pwd' , '$phone' , '$role')";
    if (!mysqli_query($conn, $qry)) {
      die("Query Error: " . mysqli_error($conn));
    } else {
      if (mysqli_affected_rows($conn) > 0) {
        $msg = "<h4><font color='#5cb85c'>Account Created Successfully!!</font></h4>";
      } else {
        $msg = "<h4><font color='red'>No rows inserted!</font></h4>";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add User | Florify</title>
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
  <link rel="stylesheet" type="text/css" href="../assets/css/formclient.css" />
</head>

<body>
  <?php include 'includes/navbar-admin.php' ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4"></div>

      <div class="col-sm-5 cont">
        <?php echo $msg; ?>
        <h2 class="text-center hed">ADD NEW USER</h2>
        <form class="form-horizontal" method="POST" action="">
          <div class="form-group">
            <label class="control-label col-sm-2 name">Name</label>
            <div class="col-sm-9">
              <input
                type="text"
                name="clientname"
                value=""
                placeholder="Enter Your name"
                class="form-control place"
                required />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2 name">Email</label>
            <div class="col-sm-9">
              <input
                type="email"
                name="clientemail"
                value=""
                placeholder="Enter Your email"
                class="form-control place" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Password</label>
            <div class="col-sm-9">
              <input
                type="password"
                name="password"
                value=""
                placeholder="Enter Your Password"
                class="form-control"
                required />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Confirm Password</label>
            <div class="col-sm-9">
              <input
                type="password"
                name="conf-password"
                value=""
                placeholder="Confirm Your Password"
                class="form-control"
                required />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2 name">Phone</label>
            <div class="col-sm-9">
              <input
                type="tel"
                name="phone"
                value=""
                placeholder="Enter Your Phone no."
                class="form-control place" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Role</label>
            <div class="col-sm-9">
              <select name="role" style="color: grey;" class="form-control">
                <option></option>
                <option>Client</option>
                <option>Admin</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
              <input type="submit" name="add_user" class="btn btn-success btn-block bt" value="Add User" />
            </div>
            <div class="col-sm-4">
              <input type="reset" name="reset" class="btn btn-danger btn-block bt" value="Reset" />
            </div>
            <div class="col-sm-2"></div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>