<?php
if (isset($_POST['crear-proyecto'])) {
    $project_name = $_POST['project-name'];
    $description = $_POST['description'];
    $url = md5(uniqid());

    $create_project = "INSERT INTO projects (project_name, description, url, id_user) VALUES ('$project_name', '$description', '$url', '$user_id')";
    $project_created = mysqli_query($conexion, $create_project);

    echo $create_project;
    if (!$project_created) {
        $_SESSION['message'] = 'No se pudo crear el proyecto';
    }

    $_SESSION['message'] = 'El proyecto "' . $project_name . '" ha sido creado. <br> Ingrese a "Mis Proyectos" para visualizar su proyecto.';
}