<?php
include "../config/config.php";
include "../controllers/read-task.php";
               
$getTotal = "SELECT COUNT(*) total FROM tasks 
    WHERE id_user = '$user_id' AND id_project = '$id_project'";
$result = mysqli_query($conexion, $getTotal);

$totalTareas = mysqli_fetch_assoc($result);

$cadenaTotal = implode(";" , $totalTareas);


$getTaskDone = "SELECT COUNT(*) total FROM tasks 
    WHERE done = 1 AND id_project = '$id_project'";

$res_done = mysqli_query($conexion, $getTaskDone);
$totalDone = mysqli_fetch_assoc($res_done);
$int_done = implode(";" , $totalDone);


$getTaskUndone = "SELECT COUNT(*) total FROM tasks 
    WHERE done = 0 AND id_project = '$id_project'";

$res_undone = mysqli_query($conexion, $getTaskUndone);
$totalUndone = mysqli_fetch_assoc($res_undone);
$int_undone = implode(";" , $totalUndone);
