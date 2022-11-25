<?php
if (isset($_SESSION["username"])) {
    header("Location: ./dashboard.php");
}

if (isset($_POST["registro"])) {
    include "../functions/funcs.php";

    $errors      = array();

    $username    = $_POST['usuario'];
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    $confirmpass = $_POST['confirmpass'];
    $free_period = 1;
    $id_rol      = 2;
    $activo      = 2;
    $currentDate = date('Y-m-d', strtotime('+ 30 days'));

    if ($password == $confirmpass) {
        $query    = "SELECT * FROM users WHERE email = '$email'";
        $token    = generateToken();
        $hashpass = password_hash($password, PASSWORD_BCRYPT);
        $result   = mysqli_query($conexion, $query);

        if (!$result->num_rows > 0) {
            $newUser = "INSERT INTO users (username, email, password, token, active, free_period, last_payment, id_rol) VALUES ('$username', '$email', '$hashpass', '$token', '$activo', '$free_period', '$currentDate', '$id_rol')";
            $userAdded = mysqli_query($conexion, $newUser);

            if ($userAdded) {
                $url = 'http://' . $_SERVER['SERVER_NAME'] . '/aico/views/active.php?token=' . $token;
                $asunto = 'Activar Cuenta - AICO Soft';
                $cuerpo = "Hola, es un placer que quieras formar parte de nuestro equipo. <br/> <br/> Para dar de alta tu cuenta, es necesario que des clic en el siguiente enlace para poder ingresar a nuestro sistema. <a class='aqui' href='$url'>Activa tu Cuenta</a>";

                //sendEmail($email, $username, $asunto, $cuerpo);
                $send_email_modal = 'Cuenta creada';
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