<?php 
    session_start();
    $username = $_SESSION["username"];

    if(isset($_SESSION["username"])) {
    require_once "../view/includes/header.php"
?>
<main>
    <h2 class="text-center">
        <?php echo 'Bienvenid@ '.$username; ?>
    </h2>


</main>
<?php require_once "../view/includes/footer.php" ?>

<?php 
    } else {
        header("Location: ./login.php");
    }
?>