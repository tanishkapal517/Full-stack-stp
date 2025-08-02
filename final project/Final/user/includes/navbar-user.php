
<div class="fil">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8" style="padding-left: 0px; padding-right: 0px;">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#my_nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand florify" href="#">Florify By Tanu</a>
            </div>
            <div class="collapse navbar-collapse" id="my_nav">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Occasion <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="birthday.php">Birthday</a></li>
                    <li><a href="anniversary.php">Anniversary</a></li>
                  </ul>
                </li>
                <li><a href="contactus.php">Contact</a></li>
                <li><a href="mycart.php">My Cart</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php
                    if(isset($_SESSION['name']))
                      echo $_SESSION['name'];
                    else
                      echo "My Account";
                  ?>
                <span class="caret"></span></a>
                  <ul class="dropdown-menu men">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="vieworder.php">View Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="col-sm-2"></div>
    </div>
