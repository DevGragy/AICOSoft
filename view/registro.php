<?php 
    include "../controller/config.php";
    error_reporting(0);
    session_start();

    if(isset($_SESSION["username"])){
        header("Location: ./dashboard.php");
    }

    if(isset($_POST["registro"])){
        $username = $_POST['usuario'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $confirmpass = md5($_POST['confirmpass']);
        
        if($password == $confirmpass) {
            $query = "SELECT * FROM users WHERE EMAIL = '$email'";
            $result = mysqli_query($conexion, $query);
    
            if(!$result->num_rows > 0){
                $newUser = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
                $userAdded = mysqli_query($conexion, $newUser);
                
                if($userAdded) {
                    header('Location: ./login.php');
                    $username="";
                    $email="";
                    $_POST["password"]="";
                    $_POST["confirmpass"]="";
                } else {
                    echo "<script>alert('Hay un error!')</script>";
                }
            }else {
                echo "<script>alert('¡Este correo ya fue utilizado! Por favor utiliza uno diferente.')</script>";
            }
        } else {
            echo "<script>alert('¡Las contraseñas no coinciden!')</script>";
        }
    }
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
            <div style="justify-content: space-between">
                <a><img src="../public/img/phone-ico.png" alt="Teléfono contacto" class="icono-top-header" /><a
                        href="https://wa.me/5215562533082" target="_blank" class="icono">+52 55 6253
                        3082&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></a>
                <a><img src="../public/img/envelope-ico.png" alt="Correo contacto"
                        class="icono-top-header" /><a>comunicacion@gpoaico.com.mx</a></a>
            </div>
            <div>
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
    <main class="contenedor">
        <div class="contenedor-img">
            <img src="../public/img/login_img.png" alt="login_img" class="imagen-login" />
        </div>
        <div class="contenedor-form">
            <form action="" method="POST" class="formulario">
                <h1 class="titulo-reg">Bienvenido a AICOSoft!</h1>

                <h4 class="subt-reg">
                    ¿No tienes cuenta? Registrate, es gratis.
                </h4>
                <label class="label">Usuario</label>
                <input class="input" type="text" required name="usuario" value="<?php echo $username; ?>" />

                <label class="label">Email</label>
                <input class="input" type="email" required name="email" value="<?php echo $email; ?>" />

                <label class="label">Contraseña</label>
                <input class="input" type="password" required name="password"
                    value="<?php echo $_POST['password']; ?>" />

                <label class="label">Confirmar Contraseña</label>
                <input class="input" type="password" required name="confirmpass"
                    value="<?php echo $_POST['confirmpass']; ?>" />

                <button class="btn-submit" name="registro">Registrate
                </button>

                <div>
                    <p class="center">¿Ya tienes una cuenta? Inicia sesión <a href="./login.php" class="aqui">aquí</a>
                    </p>
                </div>
            </form>

        </div>
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