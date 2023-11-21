<?php
include 'core/init.php';

$Error = "";

if (LoggedIn()) {
  header('Location: ' . BASE_URL . 'home.php');
}

if (isset($_POST['register'])) {
  header('location:register.php');
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashedPassword = md5($password);
  $query = "SELECT * FROM `users` WHERE `email` = '$email'";
  $query_run = mysqli_query($conn, $query);
  if (mysqli_num_rows($query_run) > 0) {
    $row = mysqli_fetch_assoc($query_run);
    if ($hashedPassword == $row['password']) {
      $id = strval($row['id']);
      $_SESSION['user_id'] = $id;
      header('location:home.php');
    } else {
      $Error = "Invalid Credentials";
    }
  } else {
    $Error = "User does not exist";
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carekar - Login</title>
  <link rel="stylesheet" href="./Assets/vendors/bootstrap-5.3.2-dist/css/bootstrap.css" />
  <script src="./Assets/js/fontawesome.js"></script>
  <script src="./Assets/vendors/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
  <style>
    .background-radial-gradient {
      background-color: hsl(0, 0%, 7%);
      min-height: 100vh;
    }

    body {
      scroll-behavior: smooth;
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
      animation: pulse 5s ease-in-out infinite;
    }

    @keyframes pulse {
      0% {
        transform: scale(0.9) rotate(0deg);
        opacity: 0.7;
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      }

      25% {
        transform: scale(1.1) rotate(90deg);
        opacity: 1;
        border-radius: 63% 37% 38% 62% / 67% 30% 70% 33%;
      }

      50% {
        transform: scale(0.9) rotate(180deg);
        opacity: 0.7;
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      }

      75% {
        transform: scale(1.1) rotate(270deg);
        opacity: 1;
        border-radius: 63% 37% 38% 62% / 67% 30% 70% 33%;
      }

      100% {
        transform: scale(0.9) rotate(360deg);
        opacity: 0.7;
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      }
    }

    .bg-glass {
      background-color: hsla(0, 0%, 0%, 0.564) !important;
      backdrop-filter: saturate(200%) blur(25px);
      color: #fff;
    }

    ::-webkit-scrollbar {
      width: 2px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #c0c0c0;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    .formelement button {
      width: 100%;
    }

    .formelement .submit {
      background: #ad1fff;
    }

    .formelement .submit:hover {
      background: #7006ad;
    }

    .navlist {
      list-style: none;
      display: inline;
      margin: 0;
      padding: 0;
    }

    @media (min-width: 992px) {
      .background-radial-gradient {
        max-height: 100vh;
      }
    }
  </style>
</head>

<body>
  <!-- Section: Design Block -->
  <section class="background-radial-gradient formelement">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
      <div class="container-fluid">
        <a class="navbar-brand d-inline-flex align-items-center" href="#">
          <span style="
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 1.5rem;
                font-weight: bold;
                color: #fff;
              ">CareKar</span>
          <span class="mt-auto">.inc</span>
        </a>
        <div class="">
          <ul class="navbar-nav navlist mb-0">
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
              <form method="post" action="#">
                <h1 class="my-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                  Login
                </h1>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Email address :</label>
                  <input type="email" id="form3Example3" class="form-control" placeholder="user@company.com" name="email" required />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" id="form3Example4" class="form-control" placeholder="**********" name="password" required />
                  <small id="passwordHelpblock" class="<?php echo($Error !== "") ? "text-danger " : ""; ?> mt-2">
                    <?php echo($Error !== "") ? $Error : ""; ?>
                  </small>
                </div>

                <!-- Submit button -->
                <div class="mt-5">
                  <button type="submit" class="btn btn-dark submit btn-block mb-4" name="login">
                    Login
                  </button>

                  <!-- Register button -->
                  <div class="text-center">
                    <p>OR</p>
                    <a href="register" class="btn btn-dark w-100 btn-floating mx-1">
                      Register
                    </a>
                  </div>
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
