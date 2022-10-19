<?php
include "../Config/config.php";
session_start();
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

$created = "";
$error1 = "";

if (isset($_SESSION["username"])) {

    if (isset($_POST['crear-proyecto'])) {
        $project_name = $_POST['project-name'];
        $url = md5(uniqid());

        $createProject = "INSERT INTO projects (project_name, url, id_user) VALUES ('$project_name', '$url', '$user_id')";
        $project_created = mysqli_query($conexion, $createProject);

        if ($project_created) {
            $created = "Proyecto " . $project_name . " creado satisfactoriamente.";
        } else {
            $error1 = "No se pudo crear el proyecto.";
        }
    }

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
        <?php if ($created) { ?>
        <p class="created">
            <?php echo $created; ?>
            Haga clic <a class="pointer" href="proyectos.php">aqui</a> para ver su nuevo proyecto.
        </p>
        <?php } ?>

        <form action="" method="POST">
            <h2>
                Crear Proyecto
            </h2>
            <input type="text" name="project-name" placeholder="Nombre del Proyecto" required">
            <!-- <input type="text" name="description" placeholder="Descripcion del Proyecto" required> -->
            <button name="crear-proyecto">Crear proyecto</button>
        </form>
    </div>

</main>
<?php require_once "../Views/includes/footer.php" ?>

<?php
} else {
    header("Location: ./login.php");
}
?>