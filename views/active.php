<?php

require "../config/config.php";
require "../functions/funcs.php";

if (isset($_GET['token'])) {
    $token   = $_GET['token'];

    $message = validateToken($token);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/bootstrap-modal.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <title>Confirmar Registro</title>
</head>

<body>
    <main class="container">
        <h1 class="center">
            <?php echo $message ?>
        </h1>
        <a href="login.php" target="_blank"> Inicio de Sesion</a>
    </main>
</body>

</html>