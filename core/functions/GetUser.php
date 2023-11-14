<?php

function GetUser($id = ""){
    include './core/database/connection.php';
    if($id == ""){
        $id = $_SESSION['user_id'];
    }
    $sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        // user exists
        $user = mysqli_fetch_assoc($result);
        return $user;
    } else {
        return false;
    }
}

?>