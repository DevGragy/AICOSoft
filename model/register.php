<?php 
    include "../controller/config.php";
    session_start();

    $username = $_POST['usuario'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirmpass = md5($_POST['confirmpass']);
    
    if($password == $confirmpass) {
        $query = "SELECT * FROM users WHERE EMAIL = '$email'";
        $result = mysqli_query($conexion, $query);

        if(!$result->num_rows > 0){
            $newUser = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            $userAdded = mysqli_query($conexion, $newUser);
            
            if($userAdded) {
                echo "<script>alert('Usuario registrado!')</script>";
                header('Location: ../view/login.php');
                $username="";
                $email="";
                $_POST["password"]="";
                $_POST["confirmpass"]="";
            } else {
                echo "<script>alert('Hay un error!')</script>";
                header('Location: ../view/registro.php');
            }
        }else {
            echo "<script>alert('El correo ya existe!')</script>";
            header('Location: ../view/registro.php');
        }
    } else {
        echo "<script>alert('Las contraseñas no coinciden!')</script>";
        header('Location: ../view/registro.php');
    }
?>