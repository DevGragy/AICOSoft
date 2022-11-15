<?php
if (isset($_SESSION["username"])) {
    header("Location: ./dashboard.php");
}

if (isset($_POST['acceder'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
    $pass_hash = $row['password'];
    $verified_user = $row['active'];

    if (password_verify($password, $pass_hash)) {
        if ($verified_user == 2) {
            $_SESSION['id']       = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email']    = $row['email'];
            $_SESSION['id_rol']   = $row['id_rol'];
            $_SESSION['active']   = $row['active'];
            header("Location: ./dashboard.php");
        } else {
            $error1 = "Acceso Denegado - Cuenta no Verificada";
        }
    } else {
        $error2 = "Contraseña incorrectos.";
    }
}