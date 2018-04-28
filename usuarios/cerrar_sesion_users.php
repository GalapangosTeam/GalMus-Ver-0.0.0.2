<?php
session_start();
include("../scripts/php/abrir_conexion.php");
mysqli_close($conexion);
unset($_SESSION['nombres']); 
unset($_SESSION['appat']); 
unset($_SESSION['apmat']);
unset($_SESSION['start']);
unset($_SESSION['expire']);
unset($_SESSION['estado']);
session_destroy();
header('Location: ../indexx.php');
?>