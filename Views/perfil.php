<?php 
    session_start();
    $username = $_SESSION["username"];
    $email = $_SESSION['email'];
    $rol = $_SESSION["id_rol"];

    if(isset($_SESSION["username"])) {
    require_once "../view/includes/header.php"
?>
<main class="text-left">
    <div class="card-cont">
        <aside>
            <div class="perfil-usuario2 card-sty">
                <h3>Datos<br>Adicionales</h3>
                <hr>
                <label>Cosa 1</label>
                <hr>
                <label>Cosa 2</label>
                <hr>
                <label>Cosa 3</label>
                <hr class="sin-margen">
            </div>
            <div class="perfil-usuario2 card-sty">
                <h3>Datos<br>Adicionales</h3>
                <hr>
                <label>Cosa 1</label>
                <hr>
                <label>Cosa 2</label>
                <hr>
                <label>Cosa 3</label>
                <hr class="sin-margen">
            </div>
        </aside>
        <div class="card-sty">
            <form class="perfil-usuario">
                <h1 class="my-5 text-center">Perfil de Usuario</h1>
                <label class="label">Nombre de Usuario</label>
                <input class="input sin-borde" value="<?php echo $username; ?>" />

                <label class="label">Email</label>
                <input class="input sin-borde" type="email" required name="email" value="<?php echo $email; ?>" />
                
                <label class="label">Tipo de Usuario</label>
                <input class="input sin-borde" readonly value="<?php 
                if($rol == 1) {
                    echo "Administrador";
                } else if($rol == 2) {
                    echo "Cliente";
                } ?>" />
                <button class="btn-submit" name="guardar">
                    Guardar cambios.
                </button>
            </form>
        </div>
    </div>
</main>
<?php require_once "../view/includes/footer.php" ?>

<?php 
    } else {
        header("Location: ./login.php");
    }
?>