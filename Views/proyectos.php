<?php
include "../Config/config.php";
session_start();

//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];


if (isset($_SESSION["username"])) {

    $query = "SELECT * FROM projects WHERE id_user = $user_id";
    $resultado = mysqli_query($conexion, $query);
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
            <div class="project-card">
                <a class="pointer" href='proyectos.php?id=<?php echo $row['url']; ?>'>
                    <h3> <?php echo $row['project_name']; ?> </h3>
                    <h3> <?php echo $row['description']; ?> </h3>
                </a>
                <div class="project-actions">
                    <a class="pointer btn-submit" href="editar-proyecto.php?url=<?php echo $row['url']; ?>">Editar</a>
                    <a class="pointer btn-submit" href="borrar-proyecto.php?url=<?php echo $row['url']; ?>">Borrar</a>
                </div>
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