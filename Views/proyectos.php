<?php
include "../Config/config.php";
session_start();
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_SESSION["username"])) {

    $query = "SELECT id_project, project_name, id_user FROM projects WHERE id_user = $user_id";
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
        <h2>
            Mis Proyectos
        </h2>

        <table class="center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Proyecto</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td> <?php echo $row['id_project']; ?> </td>
                    <td> <?php echo $row['project_name']; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>
<?php require_once "../Views/includes/footer.php" ?>

<?php
} else {
    header("Location: ./login.php");
}
?>