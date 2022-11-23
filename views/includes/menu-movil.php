<div class="mov-nav">

            <div class="mov-container">

                <label for="menu" class="mov-label">
                    <ion-icon name="menu-outline" class="mov-menu-icon"></ion-icon>
                </label>
                <input type="checkbox" id="menu" class="mov-input">

                <ul class="mov-menu">
                    <li class="mov-item">
                        <a href="dashboard.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">AICOSoft</span>
                        </a>
                    </li>
                    <li class="mov-item">
                        <a href="perfil.php">
                            <span class="icon">
                                <ion-icon name="person-circle-outline"></ion-icon>
                            </span>
                            <span class="title">Perfil</span>
                        </a>
                    </li>
                    <?php if ($_SESSION['id_rol'] == 1) : ?>
                    <li class="mov-item">
                        <a href="usuarios.php">
                            <span class="icon">
                                <ion-icon name="people-circle-outline"></ion-icon>
                            </span>
                            <span class="title">Usuarios</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <hr class="linea3">
                    <li class="mov-item">
                        <a href="mis-proyectos.php">
                            <span class="icon">
                                <ion-icon name="briefcase-outline"></ion-icon>
                            </span>
                            <span class="title">Mis Proyectos</span>
                        </a>
                    </li>
                    <li class="mov-item">
                        <a href="crear-proyecto.php">
                            <span class="icon">
                                <ion-icon name="hammer-outline"></ion-icon>
                            </span>
                            <span class="title">Crear Proyecto</span>
                        </a>
                    </li>
                    <li class="mov-item">
                        <a href="archivos.php">
                            <span class="icon">
                                <ion-icon name="file-tray-full-outline"></ion-icon>
                            </span>
                            <span class="title">Archivos</span>
                        </a>
                    </li>
                    <hr class="linea4">
                    <li class="mov-item">
                        <a href="../controllers/logout.php">
                            <span class="icon">
                                <ion-icon name="power-outline"></ion-icon>
                            </span>
                            <span class="title">Cerrar Sesión</span>
                        </a>
                    </li>
                </ul>

            </div>

        </div> 