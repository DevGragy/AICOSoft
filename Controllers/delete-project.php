<?php
include "../Config/config.php";
session_start();

//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_GET['id_project'])) {
    $id_project = $_GET['id_project'];
    $query = "DELETE FROM projects WHERE id_project = '$id_project' AND id_user = '$user_id'";
    echo $query;
    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Query fallida");
    }

    $_SESSION["message"] = 'El proyecto fue eliminado';
    $_SESSION['message_type'] = 'eliminated';
    header("Location: ../Views/mis-proyectos.php");
}