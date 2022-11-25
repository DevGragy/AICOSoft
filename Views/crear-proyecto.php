<?php
include "../config/config.php";
session_start();

$user_id  = $_SESSION["id"];
$username = $_SESSION["username"];
$email    = $_SESSION['email'];
$rol      = $_SESSION["id_rol"];
$verified = $_SESSION['active'];
$free     = $_SESSION['free'];

if (!isset($_SESSION["username"]) && $verified != 2) {
    header("Location: ./login.php");
}

if ($rol == 3 && $free == 0) {
    header("Location: ./dashboard.php");
}

include "../controllers/create-project.php";
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
        <!-- Alerta de proyecto creado -->
        <?php if (isset($_SESSION['message'])) { ?>
        <p class="<?= $_SESSION['message_type'] ?>" id="alert">
            <span class="close-alert" id="close-alert">&times;</span>
            <?= $_SESSION['message'] ?>
        </p>
        <?php unset($_SESSION['message']);
        } ?>

        <div class="contenedor-archivos">
            <div class="subir-archivos">
                <form action="" method="POST" class="contenedor-dash card-sty">
                    <h2 class="titulo-reg">
                        Crear Proyecto
                    </h2>
                    <p>Ingresa un nombre y una descripcion para crear un proyecto.</p>
                    <input class="input-round" type="text" name="project-name" id="projectName"
                        placeholder="Nombre del Proyecto">
                    <input class="input-round" type="text" name="description" id="projectDes"
                        placeholder="Descripcion del Proyecto" maxlength="255">
                    <button class="btn-submit" name="crear-proyecto">Crear
                        proyecto</button>
                </form>
            </div>
        </div>
    </div>

</main>
<?php require_once "../views/includes/footer.php" ?>