<?php
include "../config/config.php";
session_start();
error_reporting(0);
include "../controllers/register.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/css/main.css" />
    <title>Registro | AICOSoft</title>
</head>

<body>
    <div class="top-header">
        <div class="top-header-space">
            <div class="datos-header">
                <a><img src="../public/img/phone-ico.png" alt="Teléfono contacto" class="icono-top-header" /><a
                        href="https://wa.me/5215562533082" target="_blank" class="icono">+52 55 6253
                        3082&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></a>
                <a><img src="../public/img/envelope-ico.png" alt="Correo contacto"
                        class="icono-top-header" /><a>comunicacion@gpoaico.com.mx</a></a>
            </div>
            <div class="datos-redes">
                <a href="https://www.facebook.com/AICOgpo" target="_blank">
                    <img src="../public/img/fb-ico.png" alt="Facebook" class="icono" />
                </a>
                <a href="https://wa.me/5215562533082" target="_blank">
                    <img src="../public/img/wa-ico.png" alt="WhatsApp" class="icono" />
                </a>
                <a href="https://www.linkedin.com/company/aico-accountants" target="_blank">
                    <img src="../public/img/li-ico.png" alt="LinkedIn" class="icono" />
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
    <hr />
    <main class="contenedor-reg card-sty">

        <form action="" method="POST" class="formulario">

            <img src="https://gpoaico.com.mx/wp-content/uploads/2021/10/Logo-AICO.png" alt="GRUPO AICO" id="logo"
                class="logo-aico-reg" />
            <h1 class="titulo-reg">Bienvenido a AICOSoft!</h1>

            <h4 class="subt-reg">
                ¿No tienes cuenta? Registrate, es gratis.
            </h4>

            <?php if ($errors) {
                echo errorsBlock($errors);
            } ?>

            <?php if ($send_email_modal) : ?>
            <p class="created">
                <?php echo $send_email_modal; ?>
            </p>
            <?php endif; ?>


            <input class="input-round" type="text" required name="usuario" placeholder="Usuario"
                value="<?php echo $username; ?>" />

            <input class="input-round" type="email" required name="email" placeholder="Email"
                value="<?php echo $email; ?>" />

            <div class="centrar pass-column">
                <input class="input-round gap-r" type="password" required name="password" placeholder="Contraseña"
                    value="<?php echo $_POST['password']; ?>" />

                <input class="input-round gap-l" type="password" required name="confirmpass"
                    placeholder="Confirmar Contraseña" value="<?php echo $_POST['confirmpass']; ?>" />
            </div>

            <button class="btn-submit" name="registro">Registrarme
            </button>

            <div class="mb-40">
                <p class="center">¿Ya tienes una cuenta? Inicia sesión <a href="./login.php" class="aqui">aquí</a>
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
                    <img src="../public/img/home-ico.png" alt="Dirección" class="icono-footer" />
                    <p>
                        Insurgentes Sur 586, Del Valle,<br />
                        Benito Juárez, 03100 Ciudad de<br />
                        México, CDMX.
                    </p>
                </div>
                <div>
                    <a href="https://wa.me/5215562533082" target="_blank" class="icono">
                        <img src="../public/img/phone-ico.png" alt="Teléfono de contacto" class="icono-footer" />55 6253
                        3082</a>
                </div>
            </div>
            <div>
                <h4>Legales</h4>
                <br />
                <div>
                    <div class="espacio-footer">
                        <a href="https://gpoaico.com.mx/politica-de-privacidad/" target="_blank" class="icono"><img
                                src="../public/img/doc-ico.png" alt="Aviso de privacidad" class="icono-footer" />Aviso
                            de Privacidad</a>
                    </div>
                    <div class="espacio-footer">
                        <a href="https://gpoaico.com.mx/terminosycondiciones/" target="_blank"><img
                                src="../public/img/doc-ico.png" alt="Términos y condiciones"
                                class="icono-footer" />Términos y condiciones</a>
                    </div>
                    <div class="espacio-footer top-header-space">
                        <img src="../public/img/copyright-ico.png" alt="Aviso de privacidad" class="icono-footer" />
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
                            <img src="../public/img/fb-ico.png" alt="Facebook" class="icono" />&nbsp;/AICOgpo
                        </a>
                    </div>
                    <div class="espacio-footer">
                        <a href="https://www.linkedin.com/company/aico-accountants" target="_blank" class="icono">
                            <img src="../public/img/li-ico.png" alt="LinkedIn" class="icono" />&nbsp;/aico-accountants
                        </a>
                    </div>
                    <div class="espacio-footer">
                        <a href="https://wa.me/5215562533082" target="_blank" class="icono">
                            <img src="../public/img/wa-ico.png" alt="WhatsApp" class="icono" />&nbsp;WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>