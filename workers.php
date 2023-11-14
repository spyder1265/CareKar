<?php
include 'core/init.php';

$user = GetUser($_SESSION['user_id']);


if (!LoggedIn()) {
    header('Location: ' . BASE_URL . 'login');
}

if (isset($_POST['logout'])) {
    LogOut();
}

if (isset($_POST['delete'])) {
    if (isset($_POST['W_id'])) {
        // Delete customer code here
        $WId = $_POST['W_id'];
        $query = "DELETE FROM `users` WHERE `id` = '$WId'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            // Delete successful, you can show a success message
        } else {
            // Delete failed, you can show an error message
        }
    } else {
        echo "Error: Worker ID not set.";
    }
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    $query = "UPDATE `users` SET ";

    // Check each field and append it to the query if not null or empty
    if (!empty($firstName)) {
        $query .= "`firstname` = '$firstName', ";
    }
    if (!empty($lastName)) {
        $query .= "`lastname` = '$lastName', ";
    }
    if (!empty($username)) {
        $query .= "`username` = '$username', ";
    }
    if (!empty($email)) {
        $query .= "`email` = '$email', ";
    }
    if (!empty($phone)) {
        $query .= "`phone` = '$phone', ";
    }
    if (!empty($status)) {
        $query .= "`status` = '$status', ";
    }

    // Remove the trailing comma and add the WHERE condition
    $query = rtrim($query, ', ');
    $query .= " WHERE `id` = '$id'";

    // Execute the SQL query to update the worker's information
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // Update successful, display a success message
    } else {
        // Update failed, display an error message
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CareKar - workers</title>
    <link rel="stylesheet" href="./Assets/css/style.css" />
    <link rel="stylesheet" href="./Assets/vendors/bootstrap-5.3.2-dist/css/bootstrap.css" />
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
                        <a class="btn w-100 btn-dark" href="home">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                        <a class="btn w-100 btn-dark active">
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
                            <a class="nav-link active" aria-current="page" href="workers">Workers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customers">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobs">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <form action="" method="POST">
                                <button type="submit" class="nav-link" name="logout">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content bg-glass-white overflow-y-scroll">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <h3 class="text-center">Workers</h3>
                            </div>
                        </div>
                    </div>


                                        <!-- update Modal -->
                    <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content bg-gray">
                                <div class="card-body formelement px-4 py-5 px-md-5">
                                    <form method="post">
                                        <h3 class="my-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                                            Update Worker
                                        </h3>
                                        <?php
                                        include './includes/workers/editWorkers.php';
                                        ?>
                                        <!-- Submit button -->
                                        <button type="submit" name="update" class="btn btn-dark submit btn-block mb-4">
                                            Update Worker
                                        </button>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- delete Modal -->
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalChoice">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content bg-gray rounded-3 shadow">
                                <form method="post" action="#">
                                    <?php include './includes/workers/deleteWorker.php'; ?>
                                    <div class="modal-footer flex-nowrap p-0">
                                        <button type="submit" name="delete" class="btn btn-lg btn-link text-danger fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end"><strong>Yes, Delete</strong></button>
                                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">No thanks</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive-sm mt-4 rounded-2 bg-glass" style="position: relative; top: 0; left: 0; right: 0; z-index: 100;">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="table-dark bg-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Last_Login</th>
                                    <?php
                                    if ($user['role'] === "admin") {
                                        echo ("<th>Actions</th>");
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody class="table-dark text-white">

                                <?php

                                $sql = "SELECT * FROM users";
                                $result = mysqli_query($conn, $sql);
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }

                                foreach ($data as $row) {


                                    $status = $row['status'];

                                    $badgeClass = '';

                                    switch ($status) {
                                        case 'unverified':
                                            $badgeClass = 'badge-info bg-danger';
                                            break;
                                        case 'verified':
                                            $badgeClass = 'badge-success bg-success';
                                            break;
                                        default:
                                            $badgeClass = 'badge-secondary bg-secondary';
                                            break;
                                    }
                                    $status = str_replace('_', ' ', $status);
                                    $lastlogin = date("F j Y g:i A", strtotime($row["last_login"]));

                                    echo "<tr>
                                        <td><p class='fw-normal mb-1 w-75'>" . $row['id'] . "</p></td>
                                        <td><div class='d-flex align-items-center'>
                                        <img
                                            src='" . $row['profile_img'] . "'
                                            alt=''
                                            style='width: 45px; height: 45px'
                                            class='rounded-circle'
                                        />
                                        <div class='ms-3'>
                                            <p class='fw-bold mb-1'>" . $row['firstname'] . " " . $row['lastname'] . "</p>
                                            <p class='mb-0'>" . $row['email'] . "</p>
                                        </div>
                                        </div></td>
                                        <td>
                                            <p class='fw-normal mb-1'>" . $row['username'] . "</p>
                                        </td>
                                                                                <td><span class='badge $badgeClass rounded-pill d-inline'>$status</span></td>
                                        <td>" . $row['role'] . "</td>"
                                        . "<td><div class='d-flex align-items-center'>
                                        <i class='fas fa-calendar-alt me-2'></i>
                                        <p class='mb-0'>" . $lastlogin. "</p>
                                        </div></td>
                                        ";
                                    if ($user['role'] === "admin") {
                                        echo ("                                        
                                            <td>

                                                                                        <button type='button' class='btn btn-link btn-sm btn-rounded' data-bs-toggle='modal' data-bs-target='#update_modal' data-bs-whatever='" . $row['id'] . "' >
                                                Edit
                                            </button>


                                            <button type='button' class='btn btn-link text-danger btn-sm btn-rounded' data-bs-toggle='modal' data-bs-target='#modalChoice' data-bs-whatever='" . $row['id'] . "'>
                                                Delete
                                            </button>
                                        </td>");
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

        <script src="./Assets/vendors/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
        <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
        <script>
            const navbarToggler = document.querySelector(".navbar-toggler");
            const navbarMenu = document.querySelector(".navbar-menu");

            navbarToggler.addEventListener("click", () => {
                navbarMenu.classList.toggle("show");
            });

                        const exampleModal = new bootstrap.Modal(document.getElementById('update_modal'));
            if (exampleModal) {
                exampleModal._element.addEventListener('show.bs.modal', event => {
                    // Button that triggered the modal
                    const button = event.relatedTarget;
                    // Extract info from data-bs-* attributes
                    const recipient = button.getAttribute('data-bs-whatever');
                    // If necessary, you could initiate an Ajax request here
                    // and then do the updating in a callback.

                    // Update the modal's content.
                    const modalTitle = exampleModal._element.querySelector('.modal-title');
                    const modalBodyInput = exampleModal._element.querySelector('input[name="id"]');

                    if (modalBodyInput) {
                        modalBodyInput.value = recipient; // Set the input value
                    }
                });
            }

            const modalChoice = new bootstrap.Modal(document.getElementById('modalChoice'));
            if (modalChoice) {
                modalChoice._element.addEventListener('show.bs.modal', event => {
                    // Button that triggered the modal
                    const button = event.relatedTarget;
                    // Extract info from data-bs-* attributes
                    const recipient = button.getAttribute('data-bs-whatever');
                    // If necessary, you could initiate an Ajax request here
                    // and then do the updating in a callback.

                    // Update the modal's content.
                    const modalTitle = modalChoice._element.querySelector('.modal-title');
                    const modalBodyInput = modalChoice._element.querySelector('input[id="id"]');

                    if (modalBodyInput) {
                        modalBodyInput.value = recipient; // Set the input value
                    }
                });
            }
        </script>
</body>

</html>