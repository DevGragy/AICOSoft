<?php
session_start();
$username = $_SESSION["username"];
$email    = $_SESSION['email'];
$rol      = $_SESSION["id_rol"];
$verified = $_SESSION['active'];

if (!isset($_SESSION["username"]) || $verified != 2) {
    header("Location: ./login.php");
}

require_once "../views/includes/header.php";
?>
<main class="main">
    <div class="topbar">
        <?php include "./includes/menu-movil.php"?>
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
    <div class="tabcontainer card-cont">

        <div class="contenedor-archivos">
            <div class="subir-archivos">
                <form class="perfil-usuario card-sty">
                    <h2 class="center">Perfil de Usuario</h2>
                    <p class="m-y-20">Aqui podras ver tu informacion de Usuario</p>
                    <label class="label">Nombre de Usuario</label>
                    <input class="input-space sin-borde" readonly value="<?php echo $username; ?>" />

                    <label class="label">Email</label>
                    <input class="input-space sin-borde" readonly type="email" name="email"
                        value="<?php echo $email; ?>" />

                    <label class="label">Tipo de Usuario</label>
                    <input class="input-space sin-borde" readonly value="<?php switch ($rol) {
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
                                                                            ?>" />
                </form>
            </div>
        </div>
    </div>
</main>
<?php require_once "../views/includes/footer.php"; ?>