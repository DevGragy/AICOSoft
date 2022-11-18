<?php
include "../config/config.php";
session_start();
$username = $_SESSION["username"];
$email    = $_SESSION['email'];
$rol      = $_SESSION["id_rol"];
$verified = $_SESSION['active'];

if (!isset($_SESSION["username"]) && $verified != 2 || $rol != 1) {
    header("Location: ./login.php");
}

$query = "SELECT username, email, active, id_rol FROM users";
$resultado = mysqli_query($conexion, $query);

require_once "../views/includes/header.php"
?>
<main class="main">
    <div class="topbar">
        <!--User img-->
        <div class="mail">
            <div class="user">
                <img src="../public/img/undraw_profile_1.svg">
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
        <div class="contenedor-usuario">
            <div class="contendor-tareas card-sty">
                <table class="">
                    <thead>
                        <tr>
                            <th class="columna">Usuarios</th>
                            <th class="columna">Email</th>
                            <th class="columna">Rol</th>
                            <th class="columna">Verificado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                        <tr class="fila center">
                            <td> <?php echo $row['username']; ?> </td>
                            <td> <?php echo $row['email']; ?> </td>
                            <td>
                                <?php switch ($row['id_rol']) {
                                        case 1:
                                            echo 'Administrador';
                                            break;
                                        case 2:
                                            echo 'Usuario de Pago';
                                            break;
                                        case 3:
                                            echo 'Usuario gratis';
                                            break;
                                        default:
                                            echo 'Usuario gratis';
                                            break;
                                    }
                                    ?>
                            </td>
                            <td>
                                <?php if ($row['active'] == 2) {
                                        echo 'Si';
                                    } else {
                                        echo 'No';
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
<?php require_once "../views/includes/footer.php"; ?>