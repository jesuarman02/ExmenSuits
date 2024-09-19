<?php
    session_start();
    
    if (isset($_SESSION['usuario'])){
        header("location:index.php");
        exit();
    }
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['loginPassword']) && !empty($_POST['loginPassword'])){
        if ($_SESSION['registro']['email']  == $_POST['email']) {
            if($_SESSION['registro']['password'] == $_POST['loginPassword']){
                $_SESSION['usuario'] = $_SESSION['registro'];
                header("location:index.php");
            }
            echo 'email encontrado';
        } else {
            echo 'email no localizado';
        }
    }
?>
