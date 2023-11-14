<?php
include 'core/init.php';
include 'core/functions/uuid.php';

$step = 1;

$FirstName = $LastName = $Username = $Gender = $Email = $Phone = $Password = $hashedPassword = "";

if (LoggedIn()) {
  header('Location: ' . BASE_URL . 'home.php');
}

if (isset($_POST['login'])) {
  header('location:register.php');
}

if (isset($_GET['next'])) {
  $step++;
}

if (isset($_POST['back'])) {
  $step--;
}

if (isset($_POST['register'])) {
  $FirstName = $_GET['firstname'];
  $LastName = $_GET['lastname'];
  $Username = $_GET['username'];
  $Gender = $_GET['gender'];
  $Email = $_POST['email'];
  $Password = $_POST['password'];
  $Phone = $_POST['phone'];
  $hashedPassword = md5($Password);
  $uuid = generateUUID();
  $query = "INSERT INTO `users`(`id`,`firstname`, `lastname`, `email`, `password`, `username`, `phone`, `gender`) VALUES ('$uuid','$FirstName','$LastName','$Email','$hashedPassword','$Username','$Phone','$Gender')";
  $query_run = mysqli_query($conn, $query);
  if ($query_run) {
    // Login the user
    $query2 = "SELECT * FROM `users` WHERE `email` = '$Email'";
    $query_run2 = mysqli_query($conn, $query2);
    if (mysqli_num_rows($query_run2) > 0) {
      $row = mysqli_fetch_assoc($query_run2);
      if ($hashedPassword == $row['password']) {
        // Update last login time
        $login_time = date('Y-m-d H:i:s');
        $update_query = "UPDATE `users` SET `last_login` = '$login_time' WHERE `id` = '" . $row['id'] . "'";
        mysqli_query($conn, $update_query);
        // Set session variables
        $id = strval($row['id']);
        $_SESSION['user_id'] = $id;
        header('location:home.php');
      } else {
        echo '<script type="text/javascript">alert("Invalid Credentials")</script>';
      }
    }
  } else {
    echo '<script type="text/javascript">alert("User Not Registered")</script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carekar - Register</title>
  <link rel="stylesheet" href="./Assets/vendors/bootstrap-5.3.2-dist/css/bootstrap.css" />
  <link rel="stylesheet" href="./Assets/css/style.css">
  <script src="./Assets/js/fontawesome.js"></script>
  <script src="./Assets/vendors/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
  <style>
    /* Your CSS styles here */
  </style>
</head>

<body>
  <!-- Section: Design Block -->
  <section class="background-radial-gradient formelement overflow-hidden">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
      <div class="container-fluid">
        <a class="navbar-brand d-inline-flex align-items-center" href="#">
          <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        font-size: 1.5rem;
                        font-weight: bold;
                        color: #fff;">CareKar</span>
          <span class="mt-auto">.inc</span>
        </a>
        <div class="collapse">
          <ul class="navbar-nav navlist mb-0">
            <li class="nav-item mr-3">
              <a class="nav-link disabled" aria-current="page" href="#">Help</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">En</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Quality Driven <br />
            <span style="color: hsl(218, 81%, 75%)">Solutions for Success</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            Welcome to CareKar, Inc., where quality service meets your car's
            every need. Our dedicated team of skilled professionals is
            committed to providing top-notch car maintenance and repair
            services. With a focus on excellence and a passion for vehicles,
            we strive to keep your car in peak condition. Experience the
            difference with CareKar, Inc., where your car is our priority
          </p>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <form method="<?php echo ($step < 2) ? "get" : "post"; ?>">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <h1 class="my-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                  Register
                </h1>
                <?php
                switch ($step) {
                  case 1:
                    include './includes/Register_form/step1.php';
                    break;
                  case 2:
                    include './includes/Register_form/step2.php';
                    break;
                }
                ?>
                <!-- Submit button -->
                <button type="submit" name="<?php echo ($step < 2) ? "next" : "register"; ?>" class="btn btn-dark submit btn-block mb-4">
                  <?php echo ($step < 2) ? "Next" : "Register"; ?>
                </button>
                <!-- Register button -->
                <div class="text-center">
                  <p>OR</p>

                  <?php
                  if ($step <= 1) {
                    echo "<a href='login' class='btn btn-dark w-100 btn-floating mx-1'>Login</a>";
                  } else {
                    echo "<a href='register' class='btn btn-dark w-100 btn-floating mx-1'>Back</a>";
                  }
                  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</body>

</html>