<?php
if (!isset($_SESSION['usuario'])){
    header("location:login.php");
    exit();
}
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre-producto']) && isset($_POST['precio'])) {
    $nombreProducto = trim($_POST['nombre-producto']);
    $precioProducto = trim($_POST['precio']);
    if (!empty($nombreProducto) && !empty($precioProducto)) {
        $_SESSION['productos'][] = [
            'nombre' => $nombreProducto,
            'precio' => $precioProducto
        ];
    }
}
?>