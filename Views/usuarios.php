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
        <p class="espacio-footer">Solo un usuario administrador puedo observar este panel.</p>
        <div class="vista-proyecto">
            <div class="contendor-tareas card-sty">
                <table class="">
                    <thead>
                        <tr>
                            <th class="columna">Usuarios</th>
                            <th class="columna">Email</th>
                            <th class="columna">Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                        <tr class="fila">
                            <td> <?php echo $row['username']; ?> </td>
                            <td> <?php echo $row['email']; ?> </td>
                            <td> 
                                <?php if ($row['id_rol'] == 1) {
                                            echo 'Administrador';
                                        } else {
                                            echo 'Cliente';
                                        } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once "../Views/includes/footer.php" ?>

<?php
} else {
    header("Location: ./login.php");
}
?>