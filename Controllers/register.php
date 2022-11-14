<?php
if (isset($_SESSION["username"])) {
    header("Location: ./dashboard.php");
}

if (isset($_POST["registro"])) {
    $username = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpass'];
    $id_rol = 2;
    $activo = 0;

    if ($password == $confirmpass) {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $hashpass = password_hash($password, PASSWORD_BCRYPT);
        $result = mysqli_query($conexion, $query);

        if (!$result->num_rows > 0) {
            $newUser = "INSERT INTO users (username, email, password, id_rol) VALUES ('$username', '$email', '$hashpass', '$id_rol')";
            $userAdded = mysqli_query($conexion, $newUser);

            if ($userAdded) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id_rol'] = $row['id_rol'];
                header('Location: ./login.php');
                $username = "";
                $email = "";
                $_POST["password"] = "";
                $_POST["confirmpass"] = "";
            } else {
                $error1 = "¡Hay un error en la base de datos!";
            }
        } else {
            $error2 = "¡Este correo ya fue utilizado! Por favor utiliza uno diferente.";
        }
    } else {
        $error3 = "¡Las contraseñas no coinciden!";
    }
}