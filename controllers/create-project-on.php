<?php
if (isset($_POST['crear-proyecto'])) {
    $project_name = $_POST['project-name'];
    $description = $_POST['description'];
    $url = md5(uniqid());

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
        $create_project = "INSERT INTO projects (project_name, description, url, id_user) VALUES ('$project_name', '$description', '$url', '$user_id')";
        $project_created = mysqli_query($conexion, $create_project);

        header("Location:" . $_SERVER['HTTP_REFERER']);

        if (!$project_created) {
            $_SESSION['message'] = 'No se pudo crear el proyecto';
        }
    }
}