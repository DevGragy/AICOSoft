<?php

use PHPMailer\PHPMailer\PHPMailer;

function errorsBlock($errors)
{
    if (count($errors) > 0) {
        echo "<div class='error'> <ul>";
        foreach ($errors as $error) {
            echo "* " . $error . "<br/>";
        }
        echo "</ul> </div>";
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

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';

    $mail->Username = "minigragy@gmail.com";
    $mail->Password = "";

    $mail->setFrom('minigragy@gmail.com', 'AICO Soft');
    $mail->addAddress($email, $username);

    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    $mail->isHTML(true);

    if ($mail->send())
        return true;
    else
        return false;
}