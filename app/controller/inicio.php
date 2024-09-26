<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';

    if ($accion === 'agregar') {
        if (!empty($_POST['nombre_producto']) && !empty($_POST['precio_producto'])) {
            $nombreProducto = trim($_POST['nombre_producto']);
            $precioProducto = trim($_POST['precio_producto']);

            if (!preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/', $nombreProducto)) {
                echo json_encode(['status' => 0, 'message' => 'El nombre del producto solo debe contener letras y espacios.']);
                exit;
            }

            if (!preg_match('/^\d+(\.\d{1,2})?$/', $precioProducto)) {
                echo json_encode(['status' => 0, 'message' => 'El precio debe contener solo números, con hasta dos decimales. Ejemplo: 100.99']);
                exit;
            }

            $_SESSION['productos'][] = [
                'nombre' => $nombreProducto,
                'precio' => $precioProducto
            ];
            $index = count($_SESSION['productos']) - 1;
            echo json_encode(['status' => 1, 'index' => $index]);
        } else {
            echo json_encode(['status' => 0, 'message' => 'Datos incompletos']);
        }
    } elseif ($accion === 'eliminar') {
        if (isset($_POST['index'])) {
            $index = $_POST['index'];
            if (isset($_SESSION['productos'][$index])) {
                unset($_SESSION['productos'][$index]);
                $_SESSION['productos'] = array_values($_SESSION['productos']);
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'message' => 'Índice inválido']);
            }
        }
    } elseif ($accion === 'editar') {
        if (isset($_POST['index'], $_POST['nombre_producto'], $_POST['precio_producto'])) {
            $index = $_POST['index'];
            $nombreProducto = trim($_POST['nombre_producto']);
            $precioProducto = trim($_POST['precio_producto']);

            if (!preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/', $nombreProducto)) {
                echo json_encode(['status' => 0, 'message' => 'El nombre del producto solo debe contener letras y espacios.']);
                exit;
            }

            if (!preg_match('/^\d+(\.\d{1,2})?$/', $precioProducto)) {
                echo json_encode(['status' => 0, 'message' => 'El precio debe contener solo números, con hasta dos decimales. Ejemplo: 100.99']);
                exit;
            }

            if (isset($_SESSION['productos'][$index])) {
                $_SESSION['productos'][$index] = [
                    'nombre' => $nombreProducto,
                    'precio' => $precioProducto
                ];
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'message' => 'Índice inválido']);
            }
        }
    } else {
        echo json_encode(['status' => 0, 'message' => 'Acción no válida']);
    }
}
