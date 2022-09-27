<?php 
    session_start();
    session_destroy();

    header("Location: ../view/login.html");
?>