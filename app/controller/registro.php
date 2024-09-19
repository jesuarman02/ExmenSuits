<?php
session_start();
if (isset($_SESSION['usuario'])){
    header("location:index.php");
}
if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
    
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

    header("location: login.php");
    exit; 
}


?>
