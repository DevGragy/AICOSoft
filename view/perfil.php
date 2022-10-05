<?php 
    session_start();
    $username = $_SESSION["username"];
    $email = $_SESSION['email'];
    $rol = $_SESSION["id_rol"];

    if(isset($_SESSION["username"])) {
    require_once "../view/includes/header.php"
?>
<main class="text-center">
    <h1 class="my-5 ">Perfil del Usuario</h1>
    <h3 class="my-4">
        <?php echo 'Nombre de Usuario: '.$username; ?>
    </h3>

    <h3 class="my-4">
        <?php if($rol == 1) {
            echo "Tipo de usuario: Administrador";
        } else if($rol == 2) {
            echo "Tipo de usuario: Cliente";
        } ?>
    </h3>

    <h3 class="my-4">
        <?php echo "Email: ".$email; ?>
    </h3>


</main>
<?php require_once "../view/includes/footer.php" ?>

<?php 
    } else {
        header("Location: ./login.php");
    }
?>