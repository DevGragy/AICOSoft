<?php
include "../Config/config.php";
session_start();

//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_GET['url'])) {

    $url = $_GET['url'];
    $query = "DELETE FROM projects WHERE url = '$url'";
    $result = mysqli_query($conexion, $query);

    if (!$result) {
        //$message = "Proyecto eliminado";
        die("Query fallida");
    }

    $_SESSION["message"] = 'Proyecto eliminado';
    $_SESSION['message_type'] = 'eliminated';
    header("Location: ../Views/mis-proyectos.php");
}