<?php
include "../config/config.php";
session_start();

//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_SESSION["username"])) {

    include "../controllers/read-project.php";
    include "../controllers/create-project.php";
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

        <!-- Alerta de proyecto creado -->
        <?php if (isset($_SESSION['message'])) { ?>
        <p class="created" id="alert">
            <span class="close-alert" id="close-alert">&times;</span>
            <?= $_SESSION['message'] ?>
        </p>
        <?php unset($_SESSION['message']);
            } ?>

        <div class="card-sty">
            <form action="" method="POST" class="contenedor-dash">
                <h2 class="titulo-reg">
                    Crear Proyecto
                </h2>
                <input class="input-round" type="text" name="project-name" id="projectName"
                    placeholder="Nombre del Proyecto" required>
                <input class="input-round" type="text" name="description" id="projectDes"
                    placeholder="Descripcion del Proyecto" required maxlength="255">
                <button class="btn-submit" name="crear-proyecto" onclick="validatedProjects()">Crear proyecto</button>
            </form>
        </div>

        <!-- Alerta de proyecto editado -->
        <?php if (isset($_SESSION['message'])) { ?>
        <p class="<?= $_SESSION['message_type'] ?>" id="alert">
            <span class="close-alert" id="close-alert">&times;</span>
            <?= $_SESSION['message'] ?>
        </p>
        <?php unset($_SESSION['message']);
            } ?>
 
        <h2 class="pad-top">
            Mis Proyectos
        </h2>

        <div class=" projects-cards">
            <?php while ($row = $resultado->fetch_assoc()) { ?>
            <div>
                <a class="pointer project-card" href="proyecto.php?url=<?php echo $row['url']; ?>">
                    <h3> <?php echo $row['project_name']; ?> </h3>
                    <h4> <?php echo $row['description']; ?> </h4>
                    <p class="fecha">Fecha de Creacion: <?php echo $row['created'] ?> </p>

                    <a class="btn-editar" href="editar-proyecto.php?url=<?php echo $row['url']; ?>">Editar</a>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php require_once "../views/includes/footer.php" ?>

<?php
} else {
    header("Location: ./login.php");
}
?>