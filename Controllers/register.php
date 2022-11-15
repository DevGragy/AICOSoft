<?php
if (isset($_SESSION["username"])) {
    header("Location: ./dashboard.php");
}

if (isset($_POST["registro"])) {
    include "../functions/funcs.php";

    $errors = array();

    $username = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpass'];
    $id_rol = 3;
    $activo = 1;

    if ($password == $confirmpass) {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $token = generateToken();
        $hashpass = password_hash($password, PASSWORD_BCRYPT);
        $result = mysqli_query($conexion, $query);

        if (!$result->num_rows > 0) {
            $newUser = "INSERT INTO users (username, email, password, token, active, id_rol) VALUES ('$username', '$email', '$hashpass', '$token', '$activo', '$id_rol')";
            $userAdded = mysqli_query($conexion, $newUser);

            if ($userAdded) {
                $_SESSION['id']       = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email']    = $row['email'];
                $_SESSION['id_rol']   = $row['id_rol'];
                $_SESSION['active']   = $row['active'];

                $url = 'http://' . $_SERVER['SERVER_NAME'] . '/aico/views/active.php?token=' . $token;
                $asunto = 'Activar Cuenta - AICO Soft';
                $cuerpo = "Hola, es un placer que quieras formar parte de nuestro equipo. <br/> <br/> Para dar de alta tu cuenta, es necesario que des clic en el siguiente enlace para poder ingresar a nuestro sistema. <a href='$url'>Activa tu Cuenta</a>";

                //PROBAR CON VERIFICAR EN PAGINA LUEGO ENVIAR EMAIL
                // if (sendEmail($email, $username, $asunto, $cuerpo)) {
                //     $send_email_modal = 'Sigues las instrucciones en tu email ' . $email . "<br/><a href='login.php'>Iniciar Sesion</a>";
                // } else {
                //     $errors[] = "Error al enviar el email";
                // }
                echo $url;
            } else {
                $errors[] = "¡Hay un error en la base de datos!";
            }
        } else {
            $errors[] = "¡Este correo ya fue utilizado! Por favor utiliza uno diferente.";
        }
    } else {
        $errors[] = "¡Las contraseñas no coinciden!";
    }
}