<?php
//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_GET['url'])) {

    $url = $_GET['url'];
    $query = "SELECT * FROM projects WHERE url = '$url'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $project_name = $row['project_name'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $url = $_GET['url'];
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];

    $updateProject = "UPDATE projects SET project_name = '$project_name', description = '$description' WHERE url = '$url'";
    mysqli_query($conexion, $updateProject);

    $_SESSION['message'] = 'Proyecto Actualizado';
    $_SESSION['message_type'] = 'created';
    header("Location: mis-proyectos.php");
}