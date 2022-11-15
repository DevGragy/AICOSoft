<?php

use PHPMailer\PHPMailer\PHPMailer;

function generateToken()
{
    $generate = md5(uniqid(mt_rand(), false));
    return $generate;
}

function sendEmail($email, $username, $asunto, $cuerpo)
{
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.hosting.com';
    $mail->Port = '587';

    $mail->Username = "minigragy@gmail.com";
    $mail->Password = "EliGAR-97";

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