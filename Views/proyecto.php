<?php
include "../Config/config.php";
session_start();

//Variables de sesion
$user_id = $_SESSION["id"];
$username = $_SESSION["username"];
$email = $_SESSION['email'];
$rol = $_SESSION["id_rol"];

$currentDate = date('Y-m-d');

if (isset($_SESSION['username'])) {
    include "../Controllers/read-project.php";
    include "../Controllers/create-project.php";
    include "../Controllers/read-task.php";
    include "../Controllers/create-task.php";

    include "../Views/includes/header.php";
?>

<main class="main">
    <div class="topbar">
        <!--User img-->
        <div class="mail">
            <div class="user">
                <img src="../Public/img/undraw_profile_1.svg">
            </div>
            <label>
                <?php echo $email ?>
            </label>
        </div>
    </div>

    <div class="tabcontainer center">
        <h2 class="titulo-tareas"> <?php echo $row['project_name']; ?> </h2>
        <h4 class="subt-tareas"> <?php echo $row['description']; ?> </h4>

        <!-- Alerta de proyecto creado -->
        <?php if (isset($_SESSION['message'])) { ?>
        <p class="created">
            <?= $_SESSION['message'] ?>
        </p>
        <?php unset($_SESSION['message']);
            } ?>

        <div class="vista-proyecto">
            <div>
                <form action="" method="POST" class="contenedor-dash card-sty">
                    <h4 class="titulo-reg">
                        Añadir Tarea
                    </h4>
                    <input class="input-round" type="text" name="task-name" id="taskName"
                        placeholder="Nombre de la Tarea" required maxlength="255">
                    <input class="input-round" type="date" name="date-todo" id="dateTodo"
                        min="<?php echo $currentDate; ?>">
                    <button class="btn-submit" name="crear-tarea" onclick="validatedProjects()">Añadir Tarea</button>
                </form>
            </div>

            <div class="contenedor-tareas card-sty">
                <h2>
                    Mis Tareas
                </h2>

                <table>
                    <thead>
                        <tr>
                            <th>Tarea</th>
                            <th>Fecha Limite</th>
                            <th>
                                Estado
                            </th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($task = $tasks->fetch_assoc()) { ?>
                        <tr>
                            <th>
                                <?php echo $task['task_name']; ?>
                            </th>
                            <th>
                                <?php echo $task['date_todo']; ?>
                            </th>
                            <th>
                                <?php if ($task['done'] == 0) {
                                            echo 'Sin hacer';
                                        } else {
                                            echo 'Hecha';
                                        } ?>
                            </th>
                            <th>
                                <button type="button" class="btn-editar" data-toggle="modal"
                                    data-target="#editChildren<?php echo $task['id_task'] ?>">Editar</button>
                                <button class="btn-eliminar" data-toggle="modal"
                                    data-target="#deleteChildren<?php echo $task['id_task'] ?>">Eliminar</button>
                            </th>
                        </tr>

                        <?php include "./Includes/editar-tarea.php" ?>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="project-actions">

        <button class="btn-eliminar eliminar_proyecto" id="eliminar-pr">Eliminar proyecto</button>
    </div>
    <!-- The Modal -->
    <div class="modal" id="modal-eliminar">
        <div class="modal-content">
            <span class="close" id="close">&times;</span>
            <div class="borrar-proyecto">
                <h3>¿Desea eliminar el proyecto "
                    <?php echo $row['project_name']; ?> " ?
                </h3>
                <hr>
                <p>Al confirmar, el proyecto seleccionado se eliminará de manera permanente.</p>
                <div>
                    <button class="btn-cancelar" id="btn-cancelar">Cancelar</button>
                    <a class="btn-eliminar"
                        href="../Controllers/delete-project.php?id_project=<?php echo $row['id_project']; ?>">Sí,
                        Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include("../Views/includes/footer.php") ?>

<?php
} else {
    header("Location: ./login.php");
}
?>