<?php
include "../config/config.php";
$get_files = "SELECT * FROM files WHERE id_user = '$user_id'";
$files = mysqli_query($conexion, $get_files);
