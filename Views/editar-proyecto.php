<?php
include "../Config/config.php";
session_start();

//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_GET['url'])) {

    $url = $_GET['url'];
    $query = "SELECT * FROM projects WHERE url = '$url'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $project_name = $row['project_name'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $url = $_GET['url'];
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];

    $updateProject = "UPDATE projects SET project_name = '$project_name', description = '$description' WHERE url = '$url'";
    mysqli_query($conexion, $updateProject);

    $_SESSION['message'] = 'Proyecto Actualizado';
    $_SESSION['message_type'] = 'created';
    header("Location: proyectos.php");
}
?>

<?php include("../Views/includes/header.php") ?>
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

        <form action="editar-proyecto.php?url=<?php echo $_GET['url']; ?>" method="POST" class="contenedor-dash">
            <input class="input-round" type="text" name="project_name" id="projectName" placeholder="Editar Nombre"
                required value="<?php echo $project_name; ?>">
            <input class="input-round" type="text" name="description" id="projectDes" placeholder="Editar Descripcion"
                required maxlength="255" value="<?php echo $description; ?>">
            <button class="btn-submit" name="update" onclick="validatedProjects()">Editar Proyecto</button>
        </form>
    </div>

</main>

<?php include("../Views/includes/footer.php") ?>