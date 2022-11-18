<?php
$getTotal = "SELECT COUNT(*) total FROM tasks 
    WHERE id_user = $user_id";
$result = mysqli_query($conexion, $getTotal);

