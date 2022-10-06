<?php 
    session_start();
    $username = $_SESSION["username"];
    $email = $_SESSION['email'];
    $rol = $_SESSION["id_rol"];

    if(isset($_SESSION["username"])) {
    require_once "../view/includes/header.php"
?>
<main class="text-center">
    <h2 class="my-5 display-4">
        <?php echo 'Bienvenid@ '.$username; ?>
    </h2>
</main>
<?php require_once "../view/includes/footer.php" ?>

<?php 
    } else {
        header("Location: ./login.php");
    }
?>