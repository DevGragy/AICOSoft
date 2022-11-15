<?php
session_start();
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

if (isset($_SESSION["username"])) {
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
            Bienvenido <?php echo $username ?>
        </h2>

    </div>
</main>
<?php require_once "../views/includes/footer.php" ?>

<?php
} else {
    header("Location: ./login.php");
}
?>