<?php
include './core/init.php';

$user = GetUser($_SESSION['user_id']);

if (!LoggedIn()) {
  header('Location: ' . BASE_URL . 'login');
}

if (isset($_POST['logout'])) {
  LogOut();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CareKar - home</title>
  <link rel="stylesheet" href="./Assets/css/style.css" />
  <link rel="stylesheet" href="./Assets/vendors/bootstrap-5.3.2-dist/css/bootstrap.css" />
  <!-- <link rel="stylesheet" href="./Assets/css/fontawesome.css" /> -->
</head>

<body class="background-radial-gradient overflow-hidden">
  <div class="position-relative main overflow-hidden">
    <div id="radius-shape-1" class="position-absolute rounded-circle margin-left shadow-5-strong"></div>
    <div id="radius-shape-2" class="position-absolute margin-right shadow-5-strong"></div>
    <div class="overflow-hidden">
      <!-- sidebar -->
      <nav class="sidebar bg-glass2">
        <div class="d-flex w-100 flex-column gap-4">
          <div class="sidebar-user d-flex flex-column w-100 justify-content-center align-items-center gap-2">
            <div class="sidebar-header__title d-inline-flex align-items-baseline gap-1">
              <h3>CareKar</h3>
              <span class="mt-2">.inc</span>
            </div>
            <div class="mt-3 w-100 d-flex flex-column align-items-center">
              <img src="<?php echo  $user['profile_img']  ?>" alt="" class="rounded-circle" width="100" height="100" />
              <div class="text-center mt-3">
                <h6 class="text-center"><?php echo $user['firstname'] . " " . $user['lastname'] ?></h6>
                <span class="text-center">@<?php echo $user['username'] ?></span>
                <p class="text-center w-100"><?php echo $user['email'] ?></p>
              </div>
            </div>
          </div>

          <div class="sidebar-menu d-flex flex-column justify-content-between align-items-center gap-3">
            <a class="btn w-100 btn-dark active">
              <i class="fas fa-home"></i>
              <span>Home</span>
            </a>
            <a class="btn w-100 btn-dark" href="workers.php">
              <i class="fas fa-user-shield"></i>
              <span>Workers</span>
            </a>
            <a class="btn w-100 btn-dark" href="customers">
              <i class="fas fa-users"></i>
              <span>Customers</span>
            </a>
            <a class="btn w-100 btn-dark" href="jobs">
              <i class="fas fa-briefcase"></i>
              <span>Jobs</span>
            </a>
          </div>
        </div>
        <div>
          <form action="#" method="POST">
            <div class="sidebar-menu d-flex flex-column justify-content-between align-items-center gap-3">
              <button type="submit" class="btn w-100 btn-dark" name="logout">
                <i class="fas fa-arrow-left"></i>
                <span>Logout</span>
              </button>
            </div>
          </form>
        </div>
      </nav>

      <nav class="navbar bg-glass navbar-dark d-md-none">
        <div class="container-fluid">
          <a href="#" class="navbar-brand">CareKar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse px-3 order-1" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="workers">Workers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="customers">customers</a>
            </li>
            <li class="nav-item">
              <form action="" method="POST">
                <button type="submit" class="nav-link" name="logout">
                  <i class="fas fa-arrow-left"></i>
                  <span>Logout</span>
                </button>
              </form>
          </ul>
        </div>
      </nav>

      <div class="main-content bg-glass-white overflow-y-scroll">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="card bg-dark text-bg-dark">
                <div class="card-body">
                  <h5 class="card-title">Workers</h5>
                  <p class="card-text">View and manage your Workers.</p>
                  <a href="workers" class="btn btn-dark buttonTheme">Go to Workers</a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-dark text-bg-dark">
                <div class="card-body">
                  <h5 class="card-title">Customers</h5>
                  <p class="card-text">View and manage your Customers.</p>
                  <a href="customers" class="btn btn-dark buttonTheme">Go to Customers</a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-dark text-bg-dark">
                <div class="card-body">
                  <h5 class="card-title">Jobs</h5>
                  <p class="card-text">View and manage your Jobs.</p>
                  <a href="jobs" class="btn btn-dark buttonTheme">Go to Jobs</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="./Assets/vendors/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
    <!-- <script src="./Assets/js/fontawesome.js"></script> -->
    <!-- fontawesome web cdn js -->
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script>
      const navbarToggler = document.querySelector(".navbar-toggler");
      const navbarMenu = document.querySelector(".navbar-menu");

      navbarToggler.addEventListener("click", () => {
        navbarMenu.classList.toggle("show");
      });
    </script>
</body>

</html>