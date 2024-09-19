<?php

session_start();//Permite trabajar con sesiones 
session_unset();//Libera la sesion actual
session_destroy();//Destruye las variables de sesion

header("location:login.php");

?>