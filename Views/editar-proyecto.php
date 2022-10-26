<?php
include "../Config/config.php";
session_start();

if (isset($_SESSION['username'])) {
    include "../Controllers/update-project.php";
    include("../Views/includes/header.php")
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

<?php
} else {
    header("Location: ./login.php");
}
?>