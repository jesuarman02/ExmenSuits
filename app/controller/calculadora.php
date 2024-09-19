<?php
$resultado = '';
$mensajeError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = isset($_POST["numero1"]) ? $_POST["numero1"] : '';
    $numero2 = isset($_POST["numero2"]) ? $_POST["numero2"] : '';
    $operacion = isset($_POST["operacion"]) ? $_POST["operacion"] : '';

    if ($operacion == 'division' && $numero2 == 0) {
        $mensajeError = "Error: No se puede dividir por cero.";
    } else if (!empty($numero1) && !empty($numero2) && !empty($operacion)) {
        switch ($operacion) {
            case "suma":
                $resultado = $numero1 + $numero2;
                break;
            case "resta":
                $resultado = $numero1 - $numero2;
                break;
            case "multiplicacion":
                $resultado = $numero1 * $numero2;
                break;
            case "division":
                $resultado = $numero1 / $numero2;
                break;
            default:
                $mensajeError = "Sintax Error!.";
                break;
        }
    } else {
        if ($operacion != 'division' || $numero2 != 0) {
            $mensajeError = "No puedes dejar ningún campo vacío. ";

            if (empty($numero1)) {
                $mensajeError .= "Falta el campo Número 1. ";
            }
            if (empty($numero2)) {
                $mensajeError .= "Falta el campo Número 2. ";
            }
            if (empty($operacion)) {
                $mensajeError .= "Falta seleccionar la operación. ";
            }
        }
    }
}
?>