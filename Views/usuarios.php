<?php 
    include "../controller/config.php";
    session_start();
    $username = $_SESSION["username"];
    $email = $_SESSION['email'];
    $rol = $_SESSION["id_rol"];

    if(isset($_SESSION["username"]) && $rol == 1) {

    $query = "SELECT username, email, id_rol FROM users";
    $resultado = mysqli_query($conexion, $query);
    require_once "../view/includes/header.php"
?>
<main class="container text-center">
    <h1 class="my-4">
        Tabla de Usuarios Registrados
    </h1>
    <p class="my-4">Solo un usuario administrador puedo observar este panel.</p>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Usuarios</th>
                <th>Email</th>
                <th>Id_Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $resultado->fetch_assoc()) {?>
            <tr>
                <td> <?php echo $row['username'];?> </td>
                <td> <?php echo $row['email'];?> </td>
                <td> <?php echo $row['id_rol'];?> </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</main>
<?php require_once "../view/includes/footer.php" ?>

<?php 
    } else {
        header("Location: ./login.php");
    }
?>