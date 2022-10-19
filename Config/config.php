<?php 
    //servidor = "localhost";
    //$usuario = "u175573487_root";
    //$password = "Aicosoft1";
    //$db = "u175573487_aico";

    $servidor = "localhost";
    $usuario = "admin";
    $password = "root";
    $db = "aico";
    $conexion = new mysqli($servidor, $usuario, $password, $db);

    if($conexion->connect_error){
        die("Conexion fallida ". $conexion->connect_error);
    }
?>