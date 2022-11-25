<?php
include "../config/config.php";
include "../functions/funcs.php";

#Fecha Actual y Zona Horaria
date_default_timezone_set('America/Mexico_City');
$fechaHora = date('Y-m-d H:i:s');
$fechaHoraSegundos = strtotime($fechaHora);

#Query a tabla users
$getLastLogged = "SELECT logged, free_period, id_rol FROM users WHERE id = 79";
$lastlogged = mysqli_query($conexion, $getLastLogged);
$userRow = mysqli_fetch_assoc($lastlogged);

#Obtenemos hora de registro y rol de usuario
$userLogged = $userRow['logged'];
$freeUserPeriod = $userRow['free_period'];
$userRol = $userRow['id_rol'];

#Convertimos fecha del usuario a str
$secondsCreated = strtotime($userLogged);

#Obtenemos los segundos desde la creacion hasta ahora
$segundosCreacionYActual = $fechaHoraSegundos - $secondsCreated . "<br>";
$int_seconds = (int) $segundosCreacionYActual;

#Validamos si llega a $maxTime
$freeDays = (3600 * 24) * 7;
$maxTime = $freeDays;

if ($userRol != 3 && $freeUserPeriod == 0) {
    echo "*Usuario Premium* Sin Periodo de Prueba" . "<br>";
}

if ($userRol == 3 && $freeUserPeriod == 0) {
    echo "*Usuario Gratis* Sin Periodo de Prueba" . "<br>";
}

if ($userRol == 3 && $freeUserPeriod == 1) {
    echo "*Usuario Gratis* Con Periodo de Prueba" . "<br>";
}

if ($userRol != 3 && $freeUserPeriod == 1) {
    echo "*Usuario Premium* Con Periodo de Prueba" . "<br>";

    if ($int_seconds >= $maxTime) {
        $queryUserRol = "UPDATE users SET id_rol = 3, free_period = 0 WHERE id = 79";
        $setFreeUser = mysqli_query($conexion, $queryUserRol);
    }
}

#Debug segundos restantes
// echo $int_seconds;
// echo "<br>";
// echo $maxTime;
// echo "<br>";
// echo (secToDaysHoursMinutes($int_seconds));
// echo "<br>";
// echo (secToDaysHoursMinutes($maxTime));