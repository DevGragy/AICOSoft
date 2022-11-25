<?php
include "../config/config.php";
include "../functions/funcs.php";

date_default_timezone_set('America/Mexico_City');
$fechaHora = date('Y-m-d H:i:s');
$fechaHoraSegundos = strtotime($fechaHora);

$queryUserRol = "UPDATE users SET id_rol = 2, free_period = 0, last_payment = '$fechaHora' WHERE id = '$user_id'";
$setPremium = mysqli_query($conexion, $queryUserRol);
