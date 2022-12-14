<?php
include "../config/config.php";
session_start();

$user_id  = $_SESSION["id"];
$username = $_SESSION["username"];
$email    = $_SESSION['email'];
$rol      = $_SESSION["id_rol"];
$verified = $_SESSION['active'];
$free     = $_SESSION['free'];

$currentDate = date('Y-m-d');

if (!isset($_SESSION['username']) && $verified != 2) {
    header("Location: ./login.php");
}

if ($rol == 3 && $free == 0) {
    header("Location: ./dashboard.php");
}

include "../controllers/read-project.php";
include "../controllers/create-project.php";
include "../controllers/read-task.php";
include "../controllers/create-task.php";

include "../views/includes/header.php";
?>
<main class="main">
    <div class="topbar">
        <?php include "./includes/menu-movil.php" ?>
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
        <h2 class="titulo-tareas"> <?php echo $row['project_name']; ?> </h2>
        <h4 class="subt-tareas"> <?php echo $row['description']; ?> </h4>

        <!-- Alerta de edición y eliminación de tareas -->
        <?php if (isset($_SESSION['message'])) { ?>
        <p class="<?= $_SESSION['message_type'] ?>" id="alert">
            <span class="close-alert" id="close-alert">&times;</span>
            <?= $_SESSION['message'] ?>
        </p>
        <?php unset($_SESSION['message']);
        } ?>

        <div class="vista-proyecto">
            <div class="margin-bot-tablet">
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
                            <td>
                                <?php echo $task['task_name']; ?>
                            </td>
                            <td>
                                <?php echo $task['date_todo']; ?>
                            </td>
                            <td>
                                <?php if ($task['done'] == 0) {
                                        echo 'En proceso';
                                    } else {
                                        echo 'Concluída';
                                    } ?>
                            </td>
                            <td>
                                <button type="button" data-target="#update<?php echo $task['id_task']; ?>"
                                    class="btn-editar" data-toggle="modal">Editar</button>
                                <button type="button" data-target="#delete<?php echo $task['id_task']; ?>"
                                    class="btn-eliminar" data-toggle="modal">Eliminar</button>
                            </td>
                        </tr>

                        <?php include "./includes/modal-editar-tarea.php"
                            ?>
                        <?php include "./includes/modal-eliminar-tarea.php" ?>
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
    <div class="modal-pr" id="modal-eliminar">
        <div class="modalpr-content">
            <span class="close-pr" id="close-pr">&times;</span>

            <div class="borrar-proyecto">
                <h3>¿Desea eliminar el proyecto
                    "<?php echo $row['project_name']; ?>"?
                </h3>
                <hr>
                <p>Al confirmar, el proyecto seleccionado se eliminará de manera permanente.</p>
                <div>
                    <button class="btn-cancelar" id="btn-cancelar">Cancelar</button>
                    <?php if (!mysqli_num_rows($tasks) > 0) { ?>
                    <a class="btn-eliminar"
                        href="../controllers/delete-project.php?id_project=<?php echo $row['id_project']; ?>">Sí,
                        Eliminar</a>
                    <?php } else {
                        echo "<p class='eliminated'>No se puede borrar un proyecto con tareas</p>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include("../views/includes/footer.php") ?>