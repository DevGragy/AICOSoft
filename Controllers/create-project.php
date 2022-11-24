<?php
date_default_timezone_set('America/Mexico_City');

if (isset($_POST['crear-proyecto'])) {
    $project_name = $_POST['project-name'];
    $description = $_POST['description'];
    $url = md5(uniqid());
    $createdAt = date('Y-m-d');

    if ($project_name == '' && $description == '') {
        $_SESSION['message'] = 'Nombre y Descripcion obligatorios';
        $_SESSION['message_type'] = 'eliminated';
    }

    if ($project_name != '' && $description == '') {
        $_SESSION['message'] = 'Descripcion obligatoria';
        $_SESSION['message_type'] = 'eliminated';
    }

    if ($project_name == '' && $description != '') {
        $_SESSION['message'] = 'Nombre obligatorio';
        $_SESSION['message_type'] = 'eliminated';
    }

    if ($project_name != '' && $description != '') {
        $create_project = "INSERT INTO projects (project_name, description, created, url, id_user) VALUES ('$project_name', '$description', '$createdAt', '$url', '$user_id')";
        $project_created = mysqli_query($conexion, $create_project);

        $_SESSION['message'] = 'El proyecto "' . $project_name . '" ha sido creado. <br> Ingrese a "Mis Proyectos" para visualizar su proyecto.';


        if (!$project_created) {
            $_SESSION['message'] = 'No se pudo crear el proyecto';
        }
    }
}