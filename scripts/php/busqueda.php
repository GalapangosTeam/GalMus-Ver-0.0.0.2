<?php
function opciones() {
	global $conexion;
      //Variable que contendrá el resultado de la búsqueda
	  $texto = '';

	  conectar();
      mysqli_set_charset($conexion, 'utf8');  // para indicar a la bbdd que vamos a mostrar la info en utf8
	  
	  //Contulta para recoger la información de todas las provincias
	  $sql = "SELECT * FROM provincia ORDER BY provincia";
	  
	  $resultado = mysqli_query($conexion, $sql); //Ejecución de la consulta
      //Si hay resultados...
	  if (mysqli_num_rows($resultado) > 0){ 

		 while($fila = mysqli_fetch_assoc($resultado)){ 
		      // se recoge la información según la vamos a pasar a la variable de javascript
              $texto .= '"' . $fila['Provincia'] . '",';
			 }
	  
	  }else{
			   $texto = "NO HAY RESULTADOS EN LA BBDD";	
	  }
	  // Después de trabajar con la bbdd, cerramos la conexión (por seguridad, no hay que dejar conexiones abiertas)
	  mysqli_close($conexion);
      
	  return $texto;
}
?>