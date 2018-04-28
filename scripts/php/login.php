<?php  
session_start();
require('abrir_conexion.php');

//variables de los campos a recibir.
$correo =!empty($_REQUEST['correo'])?$_REQUEST['correo']:'';
$contra =!empty($_REQUEST['contrasena'])?$_REQUEST['contrasena']:'';

validarExisteUsuario($correo,$contra);

function validarExisteUsuario($correo,$contra){
	include('abrir_conexion.php');
	//para tabla usuarios generales

	$buscarCorreo = "SELECT * FROM $tbl2 WHERE correo='$correo' AND contra='$contra'";
	$resultado = mysqli_query($conexion,$buscarCorreo);

		//Usaremos la funcion mysqli_num_rows en la consulta $resultado,
        //esta funcion nos regresa el numero de filas en el resultado
        $tablausuarios = mysqli_num_rows($resultado);

        //primero validamos que el correo y contraseña existan en tabla de administradores.
        if($tablausuarios == 1) {//si existe
            //entonces que inicie sesion
            iniciarSesionUsuario($resultado,$contra);
        }else{
        	mysqli_free_result($resultado);//liberamos memoria y recursos de la bd.
            mysqli_close($conexion);
            header("Location: ../../indexx.php?most=dupla");
            // no existe en ninguno de los 2, se redirecciona a mostrar div con mensaje de error, en la pag de login,
            //envio la variable de mostrar y la cacho en la pag de login.
        }
}

function iniciarSesionUsuario($resultado,$contra){
    include('abrir_conexion.php');
    $valores = mysqli_fetch_assoc($resultado);//consulta para sacar datos de la bd y pasarlos a array
    //comparamos con el password entrado en el formulario con la contraseña de la bd de ese user, y verificar que sean iguales.
    if($contra == $valores['contra']) { 
        $_SESSION['estado'] = true;
        $_SESSION['nombres'] = $valores['nombres'];
        $_SESSION['appat'] = $valores['appat'];
        $_SESSION['apmat'] = $valores['apmat'];
        $_SESSION['start'] = time();            
        $_SESSION['expire'] = $_SESSION['start'] + (10 * 60); // tiempo para expirar por inactividad, 5 = minutos * 60 = segundos.
        //abra el indexx + los divs con sus caracteristicas de usuario.
        header("Location: ../../indexx.php?most=y");
        return;
    } else {
        mysqli_close($conexion);
        header("Location: ../../indexx.php?most=dupla");
 }
}

// Funciones para encriptar y desencriptar las contraseñas.
function encriptar($cadena){
    $key='';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
}
function desencriptar($cadena){
     $key='';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}
?>