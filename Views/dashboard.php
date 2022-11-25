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
include "../controllers/unsubscribe.php";
include "../functions/funcs.php";
require_once "../views/includes/header.php"
?>
<main class="main">
    <div class="topbar">

        <?php include "./includes/menu-movil.php" ?>

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
        <div class="card-sty created transform-dash mtb-20">
            AICO Soft te da la bienvenida a tu dashboard, permitenos mostrarte lo que puedes hacer
            con nosotros.
        </div>
        <div class="grid-cards">
            <div class="card-sty dash-card">
                Puedes acceder a la pestana <a href="./mis-proyectos.php" class="aqui">Mis Proyectos</a> y comenzar a
                crear proyectos
                como en Asana o Trello.
            </div>
            <div class="card-sty dash-card">
                Puedes acceder a la pestana <a href="./archivos.php" class="aqui">Archivos</a> y comenzar a tus subir
                archivos
                personales como si fuera tu propio Dropbox.
            </div>
        </div>
        <div class="card-sty dash-one-card ">
            <div class="dash-card ">
                <?php
                if ($rol == 2) {
                    echo "Tu suscripcion vence el: " . $nextPay;
                } else if ($rol == 3) {
                    echo $actualiza."<a class='aqui' href='./suscripcion.php'>Activa tu Cuenta</a>";
                } else if ($rol == 1) {
                    echo "Eres admin";
                } ?>
            </div>
        </div>
        <div>
            <h3 class="margin-bottom tasks-dash">Consulta el progreso de tus proyectos</h3>

            <?php while ($row = $resultado->fetch_assoc()) { ?>
            <div class="card-sty termo-space">
                <div class="flex-col space-around">
                    <h3 class="titulo-reg">
                        Tareas de
                        <?php echo $row['project_name']; ?>
                    </h3>
                    <?php $id_project = $row['id_project'];
                        include "../controllers/count-tasks.php"; ?>
                    <div class="flex-col">
                        En proceso:
                        <p id="proceso" class="tasks-dash"> <?php echo $int_undone; ?> </p>
                        Concluidas:
                        <p id="concluida" class="tasks-dash"> <?php echo $int_done; ?> </p>
                        Totales:
                        <p id="totales" class="tasks-dash fw-700"><?php echo $cadenaTotal; ?> </p>
                    </div>
                </div>
                <div>
                    <h3 class="titulo-reg">
                        Progreso
                    </h3>
                    <div class="loader"></div>
                    <div class="inner">
                        <div id="number">
                            <p id="concluida"><?php echo $progress . "%"; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php require_once "../views/includes/footer.php"; ?>