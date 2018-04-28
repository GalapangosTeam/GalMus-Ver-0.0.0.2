<?php
session_start();
include("../scripts/php/abrir_conexion.php");
mysqli_close($conexion);
unset($_SESSION['nombres']); 
unset($_SESSION['appat']); 
unset($_SESSION['apmat']);
session_destroy();
header('Location: login-admins.php');
?>