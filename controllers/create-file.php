<?php
date_default_timezone_set('America/Mexico_City');

if (isset($_POST['create-file'])) {
    $file_name = $_POST['file-name'];
    $file_only = $_FILES['file-only'];
    $file_date = date('Y-m-d');

    $type = $file_only['type'];
    $category = explode('.', $file_only['name'])[1];

    $tmp_name = $file_only['tmp_name'];
    $file_content = file_get_contents($tmp_name);
    $BLOB_file = addslashes($file_content);

    $create_file = "INSERT INTO files (name, category, upload_date, file, type, id_user) VALUES ('$file_name', '$category', '$file_date', '$BLOB_file', '$type', '$user_id')";
    $file_created = mysqli_query($conexion, $create_file);

    if (!$file_created) {
        $_SESSION['message'] = 'No se pudo subir el archivo';
    }

    header('Location: archivos.php');
    $_SESSION['message'] = 'Archivo Subido';
    $_SESSION['message_type'] = 'created';
}