<?php
include "../config/config.php";
session_start();

$user_id  = $_SESSION["id"];
$username = $_SESSION["username"];
$email    = $_SESSION['email'];
$rol      = $_SESSION["id_rol"];
$verified = $_SESSION['active'];

if (!isset($_SESSION["username"]) && $verified != 2) {
    header("Location: ./login.php");
}

include "../controllers/read-file.php";
include "../controllers/create-file.php";
require_once "../views/includes/header.php";
?>
<main class="main">
    <div class="topbar">
        <!--User img-->
        <div class="mail">
            <div class="user">
                <img src="../public/img/undraw_profile_1.svg">
            </div>
            <label>
                <?php echo $email ?>
            </label>
        </div>
    </div>
    <div class="tabcontainer center">
        <!-- Alerta de edición y eliminación de archivos -->
        <?php if (isset($_SESSION['message'])) { ?>
            <p class="<?= $_SESSION['message_type'] ?>" id="alert">
                <span class="close-alert" id="close-alert">&times;</span>
                <?= $_SESSION['message'] ?>
            </p>
        <?php unset($_SESSION['message']);
        } ?>
        <h2>Archivos</h2>
        <div class="vista-proyecto">
            <div>
                <form action="" method="POST" enctype="multipart/form-data" class="contenedor-dash card-sty">
                    <h2>Subir Archivo</h2>
                    <p>Tamaño MAXIMO por archivo de 40MB.</p>
                    <input type="text" name="file-name" placeholder="Nombre del Archivo" class="input-round" required>
                    <input type="file" name="file-only" class="input-round" required>
                    <button name="create-file" class="btn-submit">Subir Archivo</button>
                </form>
            </div>
            <div class="contenedor-tareas card-sty">
                <h2>
                    Mis Archivos
                </h2>

                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Archivo</th>
                            <th>Fecha de Subida</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($file = $files->fetch_assoc()) {
                            $fileId   = $file['id_file'];
                            $fileName = $file['name'];
                            $fileData = $file['file'];
                            $fileDate = $file['upload_date'];
                            $fileType = $file['type'];
                            $fileCategory = $file['category'];
                            $value = "";

                            if ($fileCategory == 'pdf') {
                                $value = "<img class='w-50' src='../public/img/pdf.png'>";
                            }
                            if ($fileCategory == 'xls' || $fileCategory == 'xlsm' || $fileCategory == 'xlsx') {
                                $value = "<img class='w-50' src='../public/img/excel.png'>";
                            }
                            if ($fileCategory == 'doc' || $fileCategory == 'docx') {
                                $value = "<img class='w-50' src='../public/img/word.png'>";
                            }
                            if ($fileCategory == 'jpg' || $fileCategory == 'jpeg' || $fileCategory == 'png') {
                                $value = "<img class='w-50' src='../public/img/img-ico.png'>";
                            }
                            if ($fileCategory == 'txt') {
                                $value = "<img class='w-50' src='../public/img/doc.png'>";
                            }
                            if ($value == '') {
                                $value = "<img class='w-50' src='../public/img/doc.png'>";
                            }
                        ?>
                            <tr>
                                <td>
                                    <?php echo $fileName; ?>
                                </td>
                                <td>
                                    <a class="pointer" href="../controllers/preview-file.php?id=<?php echo $fileId ?>">
                                        <?php echo $value; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $fileDate; ?>
                                </td>
                                <td>
                                    <?php echo $fileCategory; ?>
                                </td>
                                <td>
                                    <button type="button" data-target="#update<?php echo $file['id_file']; ?>" class="btn-editar" data-toggle="modal">Ver/Editar</button>
                                    <button type="button" data-target="#delete<?php echo $file['id_file']; ?>" class="btn-eliminar" data-toggle="modal">Eliminar</button>
                                </td>
                            </tr>

                            <?php include "./includes/modal-editar-archivo.php"
                            ?>
                            <?php include "./includes/modal-eliminar-archivo.php" ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once "../views/includes/footer.php" ?>