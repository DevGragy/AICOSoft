<?php

$id = $file['id_file'];
$nombre = $file['name'];
$categoria = $file['category'];
$tipo = $file['type'];
$archivo = $file['file'];

?>
<!-- Modal -->
<div id="update<?php echo $file['id_file'] ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $nombre; ?></h4>
            </div>
            <form action="../controllers/update-file.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_file" value="<?php echo $file['id_file']; ?>">
                <input type="text" name="file-name" value="<?php echo $file['name']; ?>" class="input-round">
                <input type="file" name="file-only" class="input-round">
                <div>
                    <button class="btn-submit" name="update">Editar Archivo</button>
                </div>
            </form>
            <div>
                <?php
                $valor = "";
                if ($categoria == 'pdf') {
                    $valor = "<iframe class='frame-file' src='data:" . $tipo . ";base64," . base64_encode($archivo) . "' frameborder='0' ></iframe>";
                }
                if ($categoria == 'png' || $categoria == 'jpg' || $categoria == 'jpeg') {
                    $valor = "<img src='data:" . $tipo . ";base64," . base64_encode($archivo) . "'>";
                }
                echo $valor;
                ?>
            </div>
        </div>
    </div>
</div>