 <!-- Modal -->
 <div id="delete<?php echo $task['id_task'] ?>" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Eliminar Tarea</h4>
             </div>
             <form action="../Controllers/delete-task.php" method="POST">
                 <input type="hidden" name="id_task" value="<?php echo $task['id_task']; ?>">
                 <h3 class="pad-top">¿Desea eliminar la tarea 
                     "<?php echo $task['task_name']; ?>"?
                 </h3>
                 <button class="btn-eliminar" name="delete">Eliminar Tarea</button>
             </form>
         </div>
     </div>
 </div>