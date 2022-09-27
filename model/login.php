<?php 
    include('../controller/config.php');
    session_start();

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $query = "SELECT * FROM users WHERE EMAIL = '$email' AND PASSWORD = '$password'";
    $result = $conexion->query($query);

    $row = $result->fetch_assoc();

    if($row['email'] == $email && $row['password'] == $password) {
        $_SESSION["email"] = $email;
        header("Location: ../public/dashboard.php");
    } else {
        header("Location: ../view/login.html");    
    }
        
?>