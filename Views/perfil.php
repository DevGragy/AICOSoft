<?php
session_start();
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];
$verified = $_SESSION['active'];

if (isset($_SESSION["username"]) && $verified == 2) {
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
    <div class="tabcontainer card-cont">

        <div class="card-sty">
            <form class="perfil-usuario">
                <h2 class="center">Perfil de Usuario</h1>
                    <label class="label">Nombre de Usuario</label>
                    <input class="input-space sin-borde" readonly value="<?php echo $username; ?>" />

                    <label class="label">Email</label>
                    <input class="input-space sin-borde" readonly type="email" required name="email"
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
</main>
<?php require_once "../views/includes/footer.php" ?>

<?php
} else {
    header("Location: ./login.php");
}
?>