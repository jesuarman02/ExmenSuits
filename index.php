<?php
require_once "./app/config/dependencias/dependencias.php";
session_start();
require_once "./app/controller/inicio.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= CSS . 'producto-style.css'; ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Registro de Producto</h3>
                    </div>
                    <div class="card-body">
                        <form id="registroForm">
                            <div class="form-group">
                                <label for="nombre-producto">Nombre del Producto:</label>
                                <input type="text" class="form-control" id="nombre-producto" name="nombre-producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo letras" required>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio del Producto:</label>
                                <input type="text" class="form-control" id="precio" name="precio" pattern="\d+(\.\d{1,2})?" title="Solo números y hasta dos decimales" required>
                            </div>
                            <div class="text-center">
                                <button type="button" id="btn_registrar" class="btn btn-dark">Registrar Producto</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Productos Registrados</h3>
                    </div>
                    <div class="card-body">
                        <ul id="lista-productos" class="list-group">
                            <?php if (!empty($_SESSION['productos'])): ?>
                                <?php foreach ($_SESSION['productos'] as $index => $producto): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <?= htmlspecialchars($producto['nombre']) ?> - $<?= htmlspecialchars($producto['precio']) ?>
                                        </span>
                                        <div>
                                            <button class="btn btn-warning btn-sm mr-2" onclick="editarProducto(<?= $index ?>)">Editar</button>
                                            <button class="btn btn-danger btn-sm" onclick="eliminarProducto(<?= $index ?>)">Eliminar</button>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/producto.js"></script>
    <a href="cerrar_sesion.php" id="sesion" class="btn btn-dark btn-lg">Cerrar Sesion</a>
</body>

</html>