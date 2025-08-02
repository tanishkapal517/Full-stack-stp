<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/images/me-favv.png" />
  <title>Home | Florify By Tanu</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/index.css" />
  <link rel="stylesheet" href="../assets/css/global.css" />
</head>

<body class="container-fluid">
  <?php include 'includes/navbar-user.php' ?>
  <div class="row">
    <div class="col-sm-12">
      <h1 class="wlcm">WELCOME to Florify</h1>
      <p class="wlcm-p">Discover our premium collection of fresh, hand-picked flower arrangements delivered straight to your loved ones' doorstep.</p>
    </div>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 text-center" style="padding-right: 5px;">
        <a href="birthday.php"><button type="button" class="bt">Shop Now</button></a>
        <a href="anniversary.php"><button type="button" class="bt">View Products</button></a>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</div>
  <div class="row card-sec">
    <div class="col-sm-12">
      <h3 class="top-ct">TOP CATEGORIES</h3>
      <div class="row">
        <div class="col-sm-1"></div>
        <a href="birthday.php" class="cards">
          <div class="col-sm-5 occ-car">
            <div class="row">
              <div class="col-sm-4 slide" style="padding: 7px 0px 7px 7px;">
                <img src="../assets/images/anniversary-bouque.jpg" alt="bouquet" class="img-responsive img-rounded">
              </div>
              <div class="col-sm-8">
                <h2 class="cat">Birthday</h2>
                <p class="card-info">Bright and cheerful arrangements to celebrate another year of joy</p>
                <div class="lists">
                  <ul>
                    <li>&nbsp;Carnations</li>
                    <li>&nbsp;Gerbera Dasies</li>
                    <li>&nbsp;Tulips</li>
                  </ul>
                </div>
                <button type="button" class="btn btn-block btn-oc">Shop Birthday Flowers</button>
              </div>
            </div>
          </div>
        </a>
        <a href="anniversary.php" class="cards">
          <div class="col-sm-5 occ-car">
            <div class="row">
              <div class="col-sm-4 slide" style="padding: 7px 0px 7px 7px;">
                <img src="../assets/images/birthday-bouquet.jpg" alt="bouquet" class="img-responsive img-rounded">
              </div>
              <div class="col-sm-8">
                <h2 class="cat">Anniversary</h2>
                <p class="card-info">Romantic arrangements to express your endless love and devotion</p>
                <div class="lists">
                  <ul>
                    <li>&nbsp;Roses</li>
                    <li>&nbsp;Hydrangeas</li>
                    <li>&nbsp;Iris</li>
                  </ul>
                </div>
                <button type="button" class="btn btn-block btn-oc">Shop Anniversary Flowers</button>
              </div>
            </div>
          </div>
        </a>
        <div class="col-sm-1"></div>
      </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>

</html>