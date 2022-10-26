<?php
include "../Config/config.php";
session_start();
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_SESSION["username"]) && $rol == 1) {

    $query = "SELECT username, email, id_rol FROM users";
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
            Tabla de Usuarios Registrados
        </h2>
        <p>Solo un usuario administrador puedo observar este panel.</p>
        <table class="">
            <thead>
                <tr>
                    <th>Usuarios</th>
                    <th>Email</th>
                    <th>Id_Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td> <?php echo $row['username']; ?> </td>
                    <td> <?php echo $row['email']; ?> </td>
                    <td> <?php echo $row['id_rol']; ?> </td>
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