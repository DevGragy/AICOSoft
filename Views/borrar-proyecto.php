<?php
include "../Config/config.php";

if (isset($_GET['url'])) {

    $url = $_GET['url'];
    $query = "DELETE FROM projects WHERE url = '$url'";
    $result = mysqli_query($conexion, $query);

    if (!$result) {
        //$message = "Proyecto eliminado";
        die("Query fallida");
    }

    $_SESSION["message"] = 'Proyecto eliminado';
    header("Location: proyectos.php");
}