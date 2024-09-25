<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("location:index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre']) && !empty($_POST['nombre']) && 
        isset($_POST['apellido']) && !empty($_POST['apellido']) && 
        isset($_POST['email']) && !empty($_POST['email']) && 
        isset($_POST['password']) && !empty($_POST['password'])) {

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $_SESSION['registro'] = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "email" => $email,
            "password" => $password
        ];
        echo json_encode([1, "Registro exitoso. Redirigiendo al inicio de sesión."]);
    } else {
        echo json_encode([0, "Error en el registro. Verifica los campos."]);
    }
} 
?>
