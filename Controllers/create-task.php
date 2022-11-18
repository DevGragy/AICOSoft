<?php

if (isset($_POST['crear-tarea'])) {
    $task_name = $_POST['task-name'];
    $date_todo = $_POST['date-todo'];
    $done = 0;

    $create_task = "INSERT INTO tasks (task_name, date_todo, done, id_project, id_user) VALUES ('$task_name', '$date_todo', '$done', '$id_project', '$user_id')";
    $task_created = mysqli_query($conexion, $create_task);

    if (!$task_created) {
        $_SESSION['message'] = 'No se pudo crear la tarea';
    }

    $_SESSION['message'] = 'Tarea Creada';
    header('Location: proyecto.php?url=' . $url);
}
