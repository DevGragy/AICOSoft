<?php
include "../Config/config.php";
session_start();

$id_task   = $_REQUEST['id_task'];
$task_name = $_REQUEST['task_name'];
$date_todo = $_REQUEST['date_todo'];
$done = isset($_POST['done']) ? 1 : 0;

if (isset($_POST['update'])) {
    $update = ("UPDATE tasks SET task_name = '$task_name', date_todo = '$date_todo', done = '$done' WHERE id_task = '$id_task'");
    $result_update = mysqli_query($conexion, $update);

    $_SESSION['message'] = 'Tarea Actualizada';
    $_SESSION['message_type'] = 'created';
    header("Location:" . $_SERVER['HTTP_REFERER']);
}