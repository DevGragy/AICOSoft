<?php
session_start();

$user_id  = $_SESSION["id"];
$username = $_SESSION["username"];
$email    = $_SESSION['email'];
$rol      = $_SESSION["id_rol"];
$verified = $_SESSION['active'];

include "./includes/header.php";

if (!empty($_GET['paymentID']) && !empty($_GET['payerID']) && !empty($_GET['token']) && !empty($_GET['pid'])) {
    $paymentID = $_GET['paymentID'];
    $payerID   = $_GET['payerID'];
    $token     = $_GET['token'];
    $pid       = $_GET['pid'];

    include "../controllers/subscribed.php";
?>
<main class="main">
    <div class="topbar">
        <?php include "./includes/menu-movil.php" ?>
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
        <div class="card-sty suscrito-aico transform-dash mtb-20">
            <strong>Felicidades!</strong> Estas suscrito a AICO Soft, para ver los cambios en tu cuenta, cierra e inicia
            sesion nuevamente.
        </div>
        <div class="card-sty dash-one-card text-initial ">
            <div class="dash-card ">
                <strong>Pago-Id: </strong> <?php echo $paymentID; ?>
            </div>
            <div class="dash-card ">
                <strong>Cliente-Id: </strong><?php echo $payerID; ?>
            </div>
            <div class="dash-card ">
                <strong>Producto-Id: </strong><?php echo $pid; ?>
            </div>
        </div>
        <div class="card-sty dash-one-card ">
            <div class="dash-card ">
                * No olvides sacar una captura de pantalla de tu recibo para cualquier duda y/o aclaracion *
            </div>
        </div>
    </div>
</main>
<?php require_once "../views/includes/footer.php"; ?>

<?php
} else {
    header('Location: dashboard.php');
}
?>