 <!-- Modal -->
 <div id="update<?php echo $task['id_task'] ?>" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Editar Tarea</h4>
             </div>
             <form action="../controllers/update-task.php" method="POST">
                 <input type="hidden" name="id_task" value="<?php echo $task['id_task']; ?>">
                 <div>
                    <input class="input-round" type="text" name="task_name" id="task_name" placeholder="Editar Nombre"
                        required value="<?php echo $task['task_name']; ?>">
                 </div>
                 <div>
                    <input class="input-round" type="date" name="date_todo" id="date_todo"
                            min="<?php echo $currentDate; ?>" value="<?php echo $task['date_todo']; ?>">
                 </div>
                 <div>
                     <input class="input-round" type="checkbox" name="done" id="done"
                         checked="<?php echo $task['done']; ?>">
                     <label>Tarea concluida.</label>
                 </div>
                 <div>
                     <button class="btn-submit" name="update">Editar Tarea</button>
                 </div>
             </form>
         </div>
     </div>
 </div>