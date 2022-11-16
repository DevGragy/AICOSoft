<?php
header('Access-Control-Allow-Origin: *');

use PHPMailer\PHPMailer\PHPMailer;

function errorsBlock($errors)
{
    if (count($errors) > 0) {
        echo "<div class='error'>";
        foreach ($errors as $error) {
            echo "* " . $error . "<br/>";
        }
        echo " </div>";
    }
}

function generateToken()
{
    $generate = md5(uniqid(mt_rand(), false));
    return $generate;
}

function sendEmail($email, $username, $asunto, $cuerpo)
{
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    $errors      = array();
    $mail = new PHPMailer(true);
    try {
        //Configuracion del Servidor
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = "contacto@devjaymx.com";
        $mail->Password   = "Pass123-";
        $mail->Port       = '587';

        //Recipientes
        $mail->setFrom('contacto@devjaymx.com', 'AICO Soft');
        $mail->addAddress($email, $username);

        //Contenido
        $mail->Subject    = $asunto;
        $mail->Body       = $cuerpo;
        $mail->isHTML(true);

        $mail->send();
        $errors[] = "Mensaje Enviado!";
    } catch (Exception $e) {
        $errors[] = "No se pudo enviar el email, error: " . $mail->ErrorInfo;
    }
}

function validateToken($token)
{
    include "../config/config.php";

    $is_active = "SELECT active FROM users WHERE token = '$token' LIMIT 1";
    $check_user = mysqli_query($conexion, $is_active);
    $row_user = mysqli_fetch_assoc($check_user);
    $user_active = $row_user['active'];

    if ($user_active == 2) {
        $msg = "Cuenta activada anteriormente";
    } else if ($user_active == 1) {
        activeUser($token);
        $msg = 'Cuenta Activada';
    }

    return $msg;
}

function activeUser($token)
{
    include "../config/config.php";
    $set_active = "UPDATE users SET active = 2 WHERE token = '$token'";
    $update_active = mysqli_query($conexion, $set_active);
}