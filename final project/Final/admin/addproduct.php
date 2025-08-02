<?php
$msg = "";
if (isset($_POST['add_product'])) {
  $name = $_POST['product-name'];
  $type = $_POST['product-type'];
  $price = $_POST['product-price'];
  $desc = $_POST['product-description'];
  include('../dbconfig/config.php');
  $conn = @mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
  $image_source = $_FILES['product-image']['tmp_name'];
  $image_dest = $_SERVER['DOCUMENT_ROOT'] . "/florify/uploads/" . $_FILES['product-image']['name'];

  if (move_uploaded_file($image_source, $image_dest)) {
    $image_path = "uploads/" . $_FILES['product-image']['name'];

    $conn = mysqli_connect("localhost", "root", "", "florifydb");
    if ($conn == null) {
      $msg = "<h4><font color='red'>Connection failure!!</font></h4>";
    } else {
      $qry = "INSERT INTO products(product_name, product_image, product_description, product_price, product_type) VALUES('$name', '$image_path', '$desc', '$price', '$type')";
      mysqli_query($conn, $qry);

      if (mysqli_affected_rows($conn) > 0) {
        $msg = "<h4><font color='#5cb85c'>Product added successfully!</font></h4>";
      } else {
        $msg = "<h4><font color='red'>Error in adding product (try again)</font></h4>";
      }
      mysqli_close($conn);
    }
  } else {
    $msg = "<h4><font color='red'>Failed to upload image!</font></h4>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Product | Florify</title>
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
        <h2 class="text-center hed">ADD NEW PRODUCT</h2>
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-sm-3">Product Name</label>
            <div class="col-sm-9">
              <input
                type="text"
                name="product-name"
                value=""
                placeholder="enter product name"
                class="form-control place" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Product Type</label>
            <div class="col-sm-9">
              <select name="product-type" style="color: grey;" class="form-control">
                <option></option>
                <option>Birthday</option>
                <option>Anniversary</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Product Price</label>
            <div class="col-sm-9">
              <input
                type="number"
                name="product-price"
                value=""
                placeholder="enter product price"
                class="form-control place" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Product Description</label>
            <div class="col-sm-9">
              <textarea name="product-description" rows="4" cols="54" style="color: grey;"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Product Image</label>
            <div class="col-sm-9">
              <input
                type="file"
                name="product-image"
                value=""
                placeholder="no file chosen"
                class="form-control place" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
              <input type="submit" name="add_product" class="btn btn-success btn-block bt" value="submit" />
            </div>
            <div class="col-sm-4">
              <input type="reset" name="reset" class="btn btn-danger btn-block bt" value="reset" />
            </div>
            <div class="col-sm-2"></div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>