<?php 
    $servidor = "localhost";
    // root
    $usuario = "u175573487_root";
    // 
    $password = "Aicosoft1";
    //aico
    $db = "u175573487_aico";
    $conexion = new mysqli($servidor, $usuario, $password, $db);

    if($conexion->connect_error){
        die("Conexion fallida ". $conexion->connect_error);
    }
?>