<?php
    session_start();
    
    /*if (isset($_SESSION['usuario'])){
        header("location:index.php");
        exit();
    }*/

    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['loginPassword']) && !empty($_POST['loginPassword'])) {
        
        if (isset($_SESSION['registro'])) {
            if ($_SESSION['registro']['email'] == $_POST['email']) {
                if ($_SESSION['registro']['password'] == $_POST['loginPassword']) {
                    $_SESSION['usuario'] = $_SESSION['registro'];
                    //header("location:index.php");
                    echo json_encode([1, "Datos de acceso correctos"]);
                } else {
                    echo json_encode([0, "¡Password erróneo!"]);
                }
            } else {
                echo json_encode([0, "¡Email erróneo!"]);
            }
        } else {
            echo json_encode([0, "No hay un registro de usuario disponible en la sesión."]);
        }

    } 
?>
