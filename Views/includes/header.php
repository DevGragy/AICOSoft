<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript' src='//code.jquery.com/jquery-1.11.0.js'></script>
    <link rel="stylesheet" href="../Public/css/bootstrap-modal.css">

    <script src="../Public/js/bootstrap-modal.js"></script>
    <link rel="stylesheet" href="../Public/css/main.css">
    <link rel="icon" href="">
    <title>
        <?php if ($_SESSION['id_rol'] == 1) {
                echo "Admin Dashboard";
            } else {
                echo "Dashboard";
            }
         ?>
                

    </title>
    
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li class="btn-menu">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                </li>
                <hr class="linea2">
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">AICOSoft</span>
                    </a>
                </li>
                <li>
                    <a href="perfil.php">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Perfil</span>
                    </a>
                </li>
                <?php if ($_SESSION['id_rol'] == 1) : ?>
                <li>
                    <a href="usuarios.php">
                        <span class="icon">
                        <ion-icon name="people-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Usuarios</span>
                    </a>
                </li>
                <?php endif; ?>
                <hr class="linea3">
                <li>
                    <a href="mis-proyectos.php">
                        <span class="icon">
                            <ion-icon name="briefcase-outline"></ion-icon>
                        </span>
                        <span class="title">Mis<br> Proyectos</span>
                    </a>
                </li>
                <li>
                    <a href="crear-proyecto.php">
                        <span class="icon">
                            <ion-icon name="hammer-outline"></ion-icon>
                        </span>
                        <span class="title">Crear <br> Proyecto</span>
                    </a>
                </li>
                <li>
                    <a href="archivos.php">
                        <span class="icon">
                            <ion-icon name="file-tray-full-outline"></ion-icon>
                        </span>
                        <span class="title">Archivos</span>
                    </a>
                </li>
                <hr class="linea4">
                <li>
                    <a href="../Controllers/logout.php">
                        <span class="icon">
                            <ion-icon name="power-outline"></ion-icon>
                        </span>
                        <span class="title">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>