<?php
include "../config/config.php";
session_start();

$id_file = $_REQUEST['id_file'];

if (isset($_POST['delete'])) {
    $delete_file = "DELETE FROM files WHERE id_file = '$id_file'";
    $done_delete = mysqli_query($conexion, $delete_file);

    $_SESSION['message'] = 'Archivo eliminado';
    $_SESSION['message_type'] = 'eliminated';
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
