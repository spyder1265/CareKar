<?php
session_start();
    include '../database/connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = md5($password);
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $query_run = mysqli_query($conn, $query);
    if(mysqli_num_rows($query_run) > 0){
        $row = mysqli_fetch_assoc($query_run);
        if($hashedPassword == $row['password']){
            echo '<script type="text/javascript">alert("Logged In '. strval($row['id']) .'")</script>';
            echo ' <script type="text/javascript"> sessionStorage.setItem("user_id", '. $row['id']. '); </script>';

            // header('location:home.php');
        } else {
            echo '<script type="text/javascript">alert("Invalid Credentials")</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("User does not exist")</script>';
    }

?>