<?php
//Ver Proyecto
$query = "SELECT * FROM projects WHERE id_user = $user_id";
$resultado = mysqli_query($conexion, $query);

