<?php
require_once "./app/config/dependencias/dependencias.php";
require_once "./app/controller/registro.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?= CSS . 'registro-style.css'; ?>">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Registro</h3>
                    </div>
                    <div class="card-body">
                        <form action="registro.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo letras" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-id-badge"></i>
                                    </span>
                                    <input type="text" class="form-control" id="apellido" name="apellido" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo letras" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i> <!-- Ícono de sobre -->
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button id="btn_registrar" id="registro" type="button" class="btn btn-primary">Registrarse</button>
                            </div>
                            <br>
                            <div class="text-center">
                                <a href="login.php" class="btn btn-secondary">Iniciar Sesión</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/registro.js"></script>
</body>

</html>