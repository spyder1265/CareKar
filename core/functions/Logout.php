<?php

function LogOut(){
    include './LoggedIn.php';

    if(!LoggedIn()){
        header('Location: ' . BASE_URL . 'login');
    } else {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
    }
    
}

?>