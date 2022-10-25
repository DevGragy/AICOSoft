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
        <h3> <?php echo $row ['project_name']; ?> </h3>
        <h4> <?php echo $row ['description']; ?> </h4>
    </div>

    <div class="project-actions">

        <button class="btn-eliminar eliminar_proyecto" id="eliminar-pr">Eliminar proyecto</button>
    </div>
        <!-- The Modal -->
        <div class="modal" id="modal-eliminar">
        <div class="modal-content">
            <span class="close" id="close">&times;</span>
            <div class="borrar-proyecto">
                <h3>¿Desea eliminar el proyecto "
                    <?php echo $row ['project_name'];?> " ?
                </h3>
                <hr>
                <p>Al confirmar, el proyecto seleccionado se eliminará de manera permanente.</p>
                <div>
                    <button class="btn-cancelar" id="btn-cancelar">Cancelar</button>
                    <a class="btn-eliminar" href="borrar-proyecto.php?url=<?php echo $row['url']; ?>">Sí,
                        Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include("../Views/includes/footer.php") ?>