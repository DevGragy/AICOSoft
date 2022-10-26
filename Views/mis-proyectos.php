<?php
include "../Config/config.php";
session_start();

//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];


if (isset($_SESSION["username"])) {

    include "../Controllers/read-project.php";
    require_once "../Views/includes/header.php"
?>
<main class="main">
    <div class="topbar">
        <!--User img-->
        <div class="mail">
            <div class="user">
                <img src="../Public/img/undraw_profile_1.svg">
            </div>
            <label>
                <?php echo $email ?>
            </label>
        </div>
    </div>
    <div class="tabcontainer center">
        <?php if (isset($_SESSION['message'])) { ?>
        <p class="<?= $_SESSION['message_type'] ?>">
            <?= $_SESSION['message'] ?>
        </p>
        <?php unset($_SESSION['message']);
            } ?>

        <h2>
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
<?php require_once "../Views/includes/footer.php" ?>

<?php
} else {
    header("Location: ./login.php");
}
?>