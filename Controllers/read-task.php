<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $getProject = "SELECT * FROM projects WHERE url = '$url' AND id_user = '$user_id'";
    $projects = mysqli_query($conexion, $getProject);

    if (mysqli_num_rows($projects) == 1) {
        $row = mysqli_fetch_array($projects);
        $project_name = $row['project_name'];
        $description = $row['description'];
        $id_project = $row['id_project'];

        $getTasks = "SELECT * FROM tasks WHERE id_project = '$id_project'";
        $tasks = mysqli_query($conexion, $getTasks);
    }
}
