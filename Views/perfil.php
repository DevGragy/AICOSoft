<?php 
    session_start();
    $username = $_SESSION["username"];
    $email = $_SESSION['email'];
    $rol = $_SESSION["id_rol"];

    if(isset($_SESSION["username"])) {
    require_once "../Views/includes/header.php"
?>
<main class="main">
    <div class="topbar">
        <!--User img-->
        <div class="mail">
            <div class="user">
                <img src="../Public/img/undraw_profile_1.svg">
            </div>
            <label>
                <?php echo $email ?>
            </label>
        </div>
    </div>
    <hr class="linea">
    <div class="tabcontainer card-cont">

        <div class="card-sty">
            <form class="perfil-usuario">
                <h2 class="my-5 text-center">Perfil de Usuario</h1>
                <label class="label">Nombre de Usuario</label>
                <input class="input-space sin-borde" readonly  value="<?php echo $username; ?>" />

                <label class="label">Email</label>
                <input class="input-space sin-borde" readonly type="email" required name="email" value="<?php echo $email; ?>" />
                
                <label class="label">Tipo de Usuario</label>
                <input class="input-space sin-borde" readonly value="<?php 
                if($rol == 1) {
                    echo "Administrador";
                } else if($rol == 2) {
                    echo "Cliente";
                } ?>" />
            </form>
        </div>
        <div class="perfil-usuario2 card-sty">
                <h2>Mis Proyectos</h2>
                <hr class="linea-azul">
                <label>Proyecto 1</label>
                <hr class="linea-azul">
                <label>Proyecto 2</label>
                <hr class="linea-azul">
                <label>Proyecto 3</label>
                <hr class="sin-margen linea-azul">
            </div>
    </div>
</main>
<?php require_once "../Views/includes/footer.php" ?>

<?php 
    } else {
        header("Location: ./login.php");
    }
?>