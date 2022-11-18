<?php
include "../config/config.php";

$id = $_GET['id'];

$get_files = "SELECT * FROM files WHERE id_file = '$id'";
$files_data = mysqli_query($conexion, $get_files);
$row_files = mysqli_fetch_assoc($files_data);

$tipo = $row_files['type'];
$categoria = $row_files['category'];
$nombre = $row_files['name'];
$archivo  = $row_files['file'];
$valor_tipo = "Content-type:$tipo";
$valor = "Content-Disposition:inline,filename=$nombre.$categoria";
header($valor_tipo);
header($valor);
echo $archivo;
