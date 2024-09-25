<?php

$email = $_POST['email'];
$password = $_POST['password'];

echo json_encode("Hola tu email es: ".$email. " y tu contraseña es: ".$password);

?>