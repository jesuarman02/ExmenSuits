<?php
require_once "./app/config/dependencias/dependencias.php";
session_start();
require_once "./app/controller/inicio.php"

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= CSS . 'producto-style.css'; ?>">
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
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <label for="nombre-producto">Nombre del Producto:</label>
                                <input type="text" class="form-control" id="nombre-producto" name="nombre-producto" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo letras" required>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio del Producto:</label>
                                <input type="text" class="form-control" id="precio" name="precio" pattern="\d+(\.\d{1,2})?" title="Solo números y hasta dos decimales" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Registrar Producto</button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (!empty($_SESSION['productos'])): ?>
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="text-center">Productos Registrados</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($_SESSION['productos'] as $producto): ?>
                                    <li class="list-group-item">
                                        <?= htmlspecialchars($producto['nombre']) ?> - $<?= htmlspecialchars($producto['precio']) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <a href="cerrar_sesion.php" id="sesion" class="btn btn-dark btn-lg">Cerrar Sesion</a>
</body>

</html>