<?php
include "../config/config.php";
session_start();

//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email    = $_SESSION['email'];
$rol      = $_SESSION["id_rol"];
$verified = $_SESSION['active'];
if (!isset($_SESSION["username"]) && $verified != 2) {
    header("Location: ./login.php");
}
include "../controllers/read-project.php";
include "../controllers/count-tasks.php";
require_once "../views/includes/header.php"
?>
<main class="main">
    <div class="topbar">
        <!--User img-->
        <div class="mail">
            <div class="user">
                <img src="../public/img/undraw_profile_1.svg">
            </div>
            <label>
                <?php echo $email ?>
            </label>
        </div>
    </div>
    <div class="tabcontainer center">
        <h2>
            Bienvenido <?php echo $username ?>
        </h2>
        <p class="margin-bottom">Este es el progreso de tus proyectos</p>

        <?php while ($row = $resultado->fetch_assoc()) { ?>
        <div class="card-sty termo-space">
            <div>
                <h2 class="titulo-reg">
                    <?php echo $row['project_name']; ?>
                </h2>

                <p>Tareas totales: </p>
                <p>Tareas pendientes: 5</p>
                <p>Tareas terminadas: 7</p>
            </div>
            <div>
                <h2 class="titulo-reg">
                    Progreso
                </h2>
                <!--Barra de progreso-->
                <div class="progress-box">
                    <div class="outer">
                        <div class="inner">
                            <div id="number">

                            </div>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                        <defs>
                            <linearGradient id="GradientColor">
                                <stop offset="0%" stop-color="#e91e63" />
                                <stop offset="100%" stop-color="#673ab7" />
                            </linearGradient>
                        </defs>
                        <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</main>
<?php require_once "../views/includes/footer.php"; ?>