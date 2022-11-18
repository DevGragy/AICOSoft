 <!-- Modal -->
 <div id="delete<?php echo $file['id_file'] ?>" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Eliminar Archivo</h4>
             </div>
             <form action="../controllers/delete-file.php" method="POST">
                 <input type="hidden" name="id_file" value="<?php echo $file['id_file']; ?>">
                 <h3 class="pad-top">¿Desea eliminar el archivo
                     "<?php echo $file['name']; ?>"?
                 </h3>
                 <button class="btn-eliminar" name="delete">Eliminar Archivo</button>
             </form>
         </div>
     </div>
 </div>