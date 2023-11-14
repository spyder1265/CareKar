<?php

function LoggedIn() {
include './core/database/connection.php';

    // Check if user is logged in
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // check if user exists in database
        $sql = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            // user exists
           return true;
        } else {
            return false;
        }
    } else {
        // User is not logged in, redirect to login page
        return false;
    }
}

?>