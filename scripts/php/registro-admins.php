<?php  
require('abrir_conexion.php'); // Se agrega un objeto que manda a llamar ese script, y no seguira corriendo hasta que este ese script.

$nombres =!empty($_REQUEST['nombres'])?$_REQUEST['nombres']:'';//validar que si tenga algo esa variable.
$apellidopat =!empty($_REQUEST['apellidopat'])?$_REQUEST['apellidopat']:'';
$apellidomat =!empty($_REQUEST['apellidomat'])?$_REQUEST['apellidomat']:'';
$correo =!empty($_REQUEST['correo'])?$_REQUEST['correo']:'';
$contra =!empty($_REQUEST['contrasena'])?$_REQUEST['contrasena']:'';
$fecha =!empty($_REQUEST['fecha'])?$_REQUEST['fecha']:'';
$tel =!empty($_REQUEST['tel'])?$_REQUEST['tel']:'';
$sex =!empty($_REQUEST['sex'])?$_REQUEST['sex']:'';

validarExiste($nombres,$apellidopat,$apellidomat,$correo,$contra,$fecha,$tel,$sex,$ocupacion,$edad);

function validarExiste($nombres,$apellidopat,$apellidomat,$correo,$contra,$fecha,$tel,$sex,$ocupacion,$edad){
		include('abrir_conexion.php');
		$buscarCorreo = "SELECT * FROM $tbl1 WHERE correo='$correo'";
		$resultado = $conexion->query($buscarCorreo);
		 //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
         //esta funcion nos regresa el numero de filas en el resultado
         $contador = mysqli_num_rows($resultado);

         //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
         if($contador == 1) {
            echo 'Este administrador ya existe';
         } else {
         	echo 'El administrador se registro existosamente'; // se puede registrar el usuario.
         	insertarAdmins($nombres,$apellidopat,$apellidomat,$correo,$contra,$fecha,$tel,$sex,$ocupacion,$edad);
         }
}

function insertarAdmins($nombres,$apellidopat,$apellidomat,$correo,$contra,$fecha,$tel,$sex,$ocupacion,$edad){
	include('abrir_conexion.php');
	$insertar_admins = "INSERT INTO $tbl1 (id_user,nombres,appat,apmat,correo,contra,fecha_nac,tel,genero_sex,estado,validacion) VALUES (0,'$nombres','$apellidopat','$apellidomat','$correo','$contra','$fecha','$tel','$sex','offline',0)";
	$conexion->query($insertar_admins);
	include('cerrar_conexion.php');
}

?>