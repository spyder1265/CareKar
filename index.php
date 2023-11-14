<?php
include 'core/init.php';

// Check if user is logged in
if(!LoggedIn()) {
    // User is not logged in, redirect to login page
    header('refresh:2; Location: ' . BASE_URL . 'login.php');
}else {
    header('refresh:2; Location: ' . BASE_URL . 'home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2; url=<?php echo BASE_URL; ?>home.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareKar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Assets/vendors/bootstrap-5.3.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-5">Loading...</h1>
            </div>
        </div>
    </div>
</body>
</html>
