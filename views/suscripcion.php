<?php
session_start();
include "../config/paypal.php";

$username = $_SESSION["username"];
$email    = $_SESSION['email'];
$rol      = $_SESSION["id_rol"];
$verified = $_SESSION['active'];

#Paypal
$productName  = "Prueba";
$currency     = "MXN";
$productPrice = 100;
$productId    = 1;
$orderNumber  = 10;

if (!isset($_SESSION["username"]) || $verified != 2) {
    header("Location: ./login.php");
}

require_once "../views/includes/header.php";
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

        <h2 class="mb-20">Suscripcion AICOSoft</h2>
        <div class="card-sty price-card ">
            <div class="dash-card flex-col ">
                <div>
                    <h3 class="mb-20">Suscripcion Mensual</h3>
                    <h2 class="mb-20 price"> $<?php echo $productPrice; ?> MXN</h2>
                    <p class="mb-20">Paga tu suscripcion y obten los siguientes beneficios:</p>
                </div>
                <ul class="lista mtb-20 italic">
                    <li class="mb-20">Creacion de proyectos</li>
                    <li class="mb-20">ToDo List</li>
                    <li class="mb-20">Subida de archivos</li>
                    <li class="mb-20">Visualizacion de archivos</li>
                </ul>
                <?php if ($rol != 1) {
                    include '../controllers/paypalCheckout.php';
                }  ?>
            </div>
        </div>
    </div>
</main>
<?php require_once "../views/includes/footer.php"; ?>