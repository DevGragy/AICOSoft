<?php
include "../config/config.php";

date_default_timezone_set('America/Mexico_City');

$getLastLogged = "SELECT last_payment, id_rol FROM users WHERE id = '$user_id'";
$lastlogged = mysqli_query($conexion, $getLastLogged);
$userRow = mysqli_fetch_assoc($lastlogged);

$userLastPay = $userRow['last_payment'];
$userRol = $userRow['id_rol'];

$nextPay = date('Y-m-d H:i:s', strtotime($userLastPay . "+1 minutes"));
$currentDate = date('Y-m-d H:i:s');

$intnextpay = strtotime($nextPay);
$intcurrentdate = strtotime($currentDate);

if ($rol == 2 || $rol == 3) {
    if ($intnextpay <= $intcurrentdate) {
        $queryUserRol = "UPDATE users SET id_rol = 3 WHERE id = '$user_id'";
        $setFree = mysqli_query($conexion, $queryUserRol);
    }
}

$actualiza = 'Actualiza tu pago para seguir utilizando AICOSoft';