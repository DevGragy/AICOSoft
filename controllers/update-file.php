<?php
include "../config/config.php";
session_start();

#Datos de archivo a editar
$id_file = $_POST['id_file'];
$file_name = $_POST['file-name'];
$file = $_FILES['file-only'];
$file_date = date('Y-m-d');

#Datos de archivo original
$getfile = "SELECT * FROM files WHERE id_file = '$id_file'";
$result = mysqli_query($conexion, $getfile);
$files_name = mysqli_fetch_assoc($result);
$nombreA = $files_name['name'];

if (($file['size'] == 0  && $file_name == '') ||  ($file['size'] == 0  && $file_name == $nombreA)) {
    $_SESSION['message'] = 'El archivo no sufrio modificaciones';
    header("Location:" . $_SERVER['HTTP_REFERER']);
} else if (($file['size'] == 0  && $file_name != '') ||  ($file['size'] == 0  && $file_name != $nombreA)) {
    $update_file = "UPDATE files SET name = '$file_name' WHERE id_file = '$id_file'";
    $file_updated = mysqli_query($conexion, $update_file);

    $_SESSION['message'] = 'Nombre de archivo Actualizado: ' . $file_name;
    $_SESSION['message_type'] = 'created';
    header("Location: ../views/archivos.php");
}

$type = $file['type'];
$category = explode('.', $file['name'])[1];
$tmp_name = $file['tmp_name'];
$file_content = file_get_contents($tmp_name);
$BLOB_file = addslashes($file_content);

if (($file['size'] > 0  && $file_name == '') ||  ($file['size'] > 0  && $file_name == $nombreA)) {
    $update_file = "UPDATE files SET category = '$category', upload_date = '$file_date', file = '$BLOB_file', type = '$type' WHERE id_file = '$id_file'";
    $file_updated = mysqli_query($conexion, $update_file);

    $_SESSION['message'] = 'Archivo Actualizado';
    $_SESSION['message_type'] = 'created';
    header("Location: ../views/archivos.php");
}
if (($file['size'] > 0  && $file_name != '') ||  ($file['size'] > 0  && $file_name != $nombreA)) {
    $update_file = "UPDATE files SET name = '$file_name', category = '$category', upload_date = '$file_date', file = '$BLOB_file', type = '$type' WHERE id_file = '$id_file'";
    $file_updated = mysqli_query($conexion, $update_file);

    $_SESSION['message'] = 'Nombre y Archivo Actualizados';
    $_SESSION['message_type'] = 'created';
    header("Location: ../views/archivos.php");
}
