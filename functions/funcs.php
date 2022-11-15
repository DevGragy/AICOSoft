<?php

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

    $mail             = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host       = 'smtp.gmail.com';
    $mail->Port       = '587';

    $mail->Username   = "minigragy@gmail.com";
    $mail->Password   = "";

    $mail->setFrom('minigragy@gmail.com', 'AICO Soft');
    $mail->addAddress($email, $username);

    $mail->Subject    = $asunto;
    $mail->Body       = $cuerpo;
    $mail->isHTML(true);

    if ($mail->send())
        return true;
    else
        return false;
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