<?php 
    session_start();
    $username = $_SESSION["username"];

    if(isset($_SESSION["username"])) {
    require_once "../view/includes/header.php"
?>

<h2>
    <?php echo 'Bienvenido '.$username; ?>
</h2>

<?php require_once "../view/includes/footer.php" ?>

<?php 
    }else {
        header("Location: ./login.php");
    }
?>