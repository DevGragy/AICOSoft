<?php 
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $db = "aico";
    $conexion = new mysqli($servidor, $usuario, $password, $db);

    if($conexion->connect_error){
        die("Conexion fallida ". $conexion->connect_error);
    } else {
        //Eliminar else, solo es un debug.
        echo "Conexion a ".$db;
    }
?>