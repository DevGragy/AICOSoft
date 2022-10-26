<!-- The Modal -->
<div class="modal" id="editChildren<?php echo $task['id_task']; ?>" style="display: block;">
    <div class="modal-content">
        <span class="close" id="close" data-dismiss="modal">&times;</span>
        <form action="editar-proyecto.php?url=<?php echo $_GET['url']; ?>" method="POST" class="contenedor-dash">
            <input type="hidden" name="id" value="<?php echo $task['id_task']; ?>">
            <input class="input-round" type="text" name="project_name" id="projectName" placeholder="Editar Nombre"
                required value="<?php echo $task['task_name']; ?>">

            <button class="btn-submit" name="update" onclick="validatedProjects()">Editar Tarea</button>
        </form>
    </div>
</div>