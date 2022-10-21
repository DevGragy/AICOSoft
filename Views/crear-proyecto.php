<?php
include "../Config/config.php";
session_start();

$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_SESSION["username"])) {

    if (isset($_POST['crear-proyecto'])) {
        $project_name = $_POST['project-name'];
        $description = $_POST['description'];
        $url = md5(uniqid());

        $createProject = "INSERT INTO projects (project_name, description, url, id_user) VALUES ('$project_name', '$description', '$url', '$user_id')";
        $project_created = mysqli_query($conexion, $createProject);

        if (!$project_created) {
            $_SESSION['message'] = 'No se pudo crear el proyecto';
        }

        $_SESSION['message'] = 'Proyecto ' . $project_name . ' creado. Ingrese a la pestaña Proyectos para visualizar su proyecto.';
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
        <!-- Alerta de proyecto creado -->
        <?php if (isset($_SESSION['message'])) { ?>
        <p class="created">
            <?= $_SESSION['message'] ?>
        </p>
        <?php unset($_SESSION['message']);
            } ?>


        <form action="" method="POST" class="contenedor-dash">
            <h2 class="titulo-reg">
                Crear Proyecto
            </h2>
            <input class="input-round" type="text" name="project-name" id="projectName"
                placeholder="Nombre del Proyecto" required>
            <input class="input-round" type="text" name="description" id="projectDes"
                placeholder="Descripcion del Proyecto" required maxlength="30">
            <button class="btn-submit" name="crear-proyecto" onclick="validatedProjects()">Crear proyecto</button>
        </form>
    </div>

</main>
<?php require_once "../Views/includes/footer.php" ?>

<?php
} else {
    header("Location: ./login.php");
}
?>