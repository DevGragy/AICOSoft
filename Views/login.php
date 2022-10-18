<?php 
    include "../Config/config.php";
    session_start();
    error_reporting(0);

    if(isset($_SESSION["username"])){
        header("Location: ./dashboard.php");
    }

    if(isset($_POST['acceder'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $pass_hash = $row['password'];


        if(password_verify($password, $pass_hash)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id_rol'] = $row['id_rol'];
            header("Location: ./dashboard.php");
        } else {
            $error1 = "Correo o contraseña incorrectos.";
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Public/css/main.css" />
    <title>Login | AICOSoft</title>
</head>

<body>
    <div class="top-header">
        <div class="top-header-space">
            <div style="justify-content: space-between">
                <a><img src="../Public/img/phone-ico.png" alt="Teléfono contacto" class="icono-top-header" /><a
                        href="https://wa.me/5215562533082" target="_blank" class="icono">+52 55 6253
                        3082&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></a>
                <a><img src="../Public/img/envelope-ico.png" alt="Correo contacto"
                        class="icono-top-header" /><a>comunicacion@gpoaico.com.mx</a></a>
            </div>
            <div>
                <a href="https://www.facebook.com/AICOgpo" target="_blank">
                    <img src="../Public/img/fb-ico.png" alt="Facebook" class="icono" />
                </a>
                <a href="https://wa.me/5215562533082" target="_blank">
                    <img src="../Public/img/wa-ico.png" alt="WhatsApp" class="icono" />
                </a>
                <a href="https://www.linkedin.com/company/aico-accountants" target="_blank">
                    <img src="../Public/img/li-ico.png" alt="LinkedIn" class="icono" />
                </a>
            </div>
        </div>
    </div>
    <header>
        <a href="#">
            <img src="https://gpoaico.com.mx/wp-content/uploads/2021/10/Logo-AICO.png" alt="GRUPO AICO" id="logo"
                class="logo-grupo-aico" />
        </a>
        <nav>
            <a href="#" class="nav-text">Nosotros &nbsp;&nbsp;</a>|
            <a href="#" class="nav-text">&nbsp;&nbsp;Nuestras Soluciones &nbsp;&nbsp;</a>|
            <a href="#" class="nav-text">&nbsp;&nbsp;Ascesoría y consultoría &nbsp;&nbsp;</a>|
            <a href="#" class="nav-text">&nbsp;&nbsp;Cursos y Capacitación &nbsp;&nbsp;</a>|
            <a href="#" class="nav-text">&nbsp;&nbsp;Contacto</a>
        </nav>
    </header>
    <hr>
    <main class="contenedor card-sty">

        <div class="back-azul card-izq">
            <h2 class="margin-bottom">¿No tienes una cuenta?</h2>
            <p class="margin-bottom">Registrate para poder <br> acceder
                a nuestros servicios</p>

            <button class="btn-submit" name="registrarme">
                <a href="../Views/registro.php">
                    Registrarme
                </a>
            </button>

        </div>
        <form action="" method="POST" class="formulario card-der">
            <h1 class="titulo-reg">¡Bienvenido a AICOSoft!</h1>
            <h4 class="subt-reg center chingadamadre">Inicia sesion ingresando tus datos 😃</h4>

            <?php if($error1): ?>
            <p class="error">
                <?php echo $error1; ?>
            </p>
            <?php endif; ?>

            <input class="input-round" type="email" required name="email" placeholder="Email"
                value="<?php echo $email; ?>" />

            <input class="input-round" type="password" required name="password" placeholder="Contraseña"
                value="<?php echo $_POST['password']; ?>" />

            <button class="btn-submit" name="acceder">
                Acceder
            </button>

            <div>
                <p class="center"><a href="#" class="aqui">¿Olvidaste tu contraseña?</a>
                </p>
            </div>
        </form>
    </main>
    <footer class="footer-bg">
        <div class="footer-space">
            <div>
                <h4>Contáctanos</h4>
                <br />
                <div class="espacio-footer top-header-space">
                    <img src="../Public/img/home-ico.png" alt="Dirección" class="icono-footer" />
                    <p>
                        Insurgentes Sur 586, Del Valle,<br />
                        Benito Juárez, 03100 Ciudad de<br />
                        México, CDMX.
                    </p>
                </div>
                <div>
                    <a href="https://wa.me/5215562533082" target="_blank" class="icono">
                        <img src="../Public/img/phone-ico.png" alt="Teléfono de contacto" class="icono-footer" />55 6253
                        3082</a>
                </div>
            </div>
            <div>
                <h4>Legales</h4>
                <br />
                <div>
                    <div class="espacio-footer">
                        <a href="https://gpoaico.com.mx/politica-de-privacidad/" target="_blank" class="icono"><img
                                src="../Public/img/doc-ico.png" alt="Aviso de privacidad" class="icono-footer" />Aviso
                            de Privacidad</a>
                    </div>
                    <div class="espacio-footer">
                        <a href="https://gpoaico.com.mx/terminosycondiciones/" target="_blank"><img
                                src="../Public/img/doc-ico.png" alt="Términos y condiciones"
                                class="icono-footer" />Términos y condiciones</a>
                    </div>
                    <div class="espacio-footer top-header-space">
                        <img src="../Public/img/copyright-ico.png" alt="Aviso de privacidad" class="icono-footer" />
                        <p>
                            ©2020 - Grupo AICO. Todos los<br />
                            derechos reservados.
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <h4>Redes Sociales</h4>
                <br />
                <div>
                    <div class="espacio-footer">
                        <a href="https://www.facebook.com/AICOgpo" target="_blank" class="icono">
                            <img src="../Public/img/fb-ico.png" alt="Facebook" class="icono" />&nbsp;/AICOgpo
                        </a>
                    </div>
                    <div class="espacio-footer">
                        <a href="https://www.linkedin.com/company/aico-accountants" target="_blank" class="icono">
                            <img src="../Public/img/li-ico.png" alt="LinkedIn" class="icono" />&nbsp;/aico-accountants
                        </a>
                    </div>
                    <div class="espacio-footer">
                        <a href="https://wa.me/5215562533082" target="_blank" class="icono">
                            <img src="../Public/img/wa-ico.png" alt="WhatsApp" class="icono" />&nbsp;WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>