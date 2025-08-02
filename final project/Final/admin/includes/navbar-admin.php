<div class="container-fluid">
  <h2 class="head text-center">Admin Panel</h2>
</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#my_nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand brand">Florify</a>
    </div>
    <div class="collapse navbar-collapse" id="my_nav">
      <ul class="nav navbar-nav">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<span class="caret"></span></a>
          <ul class="dropdown-menu drpmn">
            <li><a href="adduser.php">Add new user</a></li>
            <li><a href="viewuser.php">View all user</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span></a>
          <ul class="dropdown-menu drpmn">
            <li><a href="addproduct.php">Add new product</a></li>
            <li><a href="viewproduct.php">View all product</a></li>
          </ul>
        </li>
        <li><a href="vieworder.php">Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>