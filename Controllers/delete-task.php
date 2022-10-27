<?php
include "../Config/config.php";
session_start();

$id_task   = $_REQUEST['id_task'];

if (isset($_POST['delete'])) {
    $delete_task = ("DELETE FROM tasks WHERE id_task = '$id_task'");
    $result_delete = mysqli_query($conexion, $delete_task);

    $_SESSION['message'] = 'Tarea eliminada';
    $_SESSION['message_type'] = 'eliminated';
    header("Location:" . $_SERVER['HTTP_REFERER']);
}