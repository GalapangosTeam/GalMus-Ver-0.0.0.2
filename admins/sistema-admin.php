<?php
error_reporting(E_ALL ^ E_NOTICE);
//cachamos las variables de sesion, los nombres y apellidos del usuario logueado
//con el fin de mostrarlos en el panel, durante su sesión.
session_start();
$nombres=$_SESSION['nombres'];
$appat=$_SESSION['appat'];
$apmat=$_SESSION['apmat'];
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	//inicio de sesion éxitoso.
	//echo $nombres;
	//echo $appat;
	//echo $apmat;
} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='login-admins.php'>Iniciar sesión</a>";
exit;
}
$now = time();
if($now > $_SESSION['expire']){
session_destroy();
echo "Su sesion a terminado,
<br><a href='login-admins.html'>Necesita Hacer Login</a>";
exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="keywords" content="GalasMusic,GalMus,galmus,GALMUS,Galmus">
	<meta name="description" content="Sitio web sobre productos en software para aprender las partituras de las notas musicales bajo metodologias antiguas procesadas a un entorno facil de aprendizaje.">
	<meta name="author" content="Pedro Erick Ríos García,Yizeckker2304,Victor Vicente Martinez^2, VisualYukkie, Alejandro Medina Alcantara, Pug Nigga Black">
	<meta name="generator" content="Sublime">
	<meta name="classification" content="Music,Musica,Notas Musicales,Educacion,Didactico,Arte">
	<meta name="language" content="ES">
	<meta name="robots" content="indexx"/>
	<meta http-equiv="cache-control" content="no-cache"/>
	<meta name="copyright" content="Galapangos Team Developers">
	<meta name="distribution" content="global"/>
	<link rel="shortcut icon" type="image/x-icon" href="../imagenes/LandingPage/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../css/sistemaadmin.css">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title> Panel de Control </title>
</head>
<body id="cuerpo">
	<div class="animated zoomInDown">	

		<!-- Encabezado, logo del la organización-->
		<header class="header">
			<!--Logo y cintura del logo-->
			<div class="container" style="padding-top: 9px; padding-bottom: 9px;"><i class="fas fa-wrench fa-sm"></i> GalMus | Panel de Control
			</div>
		</header>

		<!--Barra de Navegación-->
		<nav class="navbar navbar-light">
			<div class="container-fluid">
				<a class="nav-link" href="cerrar_sesion_admins.php" style="text-align:center;"> Bienvenido Maestro.</a>
				<a class="nav-link" href="cerrar_sesion_admins.php" style="text-align: left;"><i class="fas fa-power-off"></i>Cerrar sesión</a>
			</div>
		</nav>
		
		<!--Contenidos de la pagina..-->
		<main>
			<!--Panel de control izq para el administrador-->
			<aside id="left">
				<seccion class="container datosnombre">
					<img id="fotoPerfil" src="" alt="Foto de Perfil" class="img-fluid">
					<div class="container" style="margin-top: 15px;">
			      		<strong><i class="fas fa-user"></i>
			      		<?php  
			      			echo $nombres." ".$appat."."; 
			      		?>
			      		</strong>
			      	</div>
		    	</seccion><hr class="hr_admin">

		    	<!-- Area de los contenedores de opciones del panel de control-->
		    	<div class="container-fluid">
		    		<!--Comienzo de los contenedores.-->
		    		<ul class="nav navbar-nav">
						
					<!-- Administradores -->
					<li id="gestionadmins">
                			<a data-toggle="collapse" href="#gestionadmins_2" class="dropsdwn">
                				<i class="fas fa-server"></i> Gestión de Administradores
                			</a>
                			<!-- Nivel 1 de Gestion de admins -->
                			<div id="gestionadmins_2" class="panel-collapse collapse  nivelesdown">
			                    <div class="container-fluid">
			                        <ul class="navbar-nav">
			                            <li><a class="enlaces enlace_2" href="#"><i class="fas fa-plus"></i>  Agregar</a></li>
			                            <li><a class="enlaces enlace_2" href="#"><i class="fas fa-info"></i>  Consultar</a></li>
			                            <li><a class="enlaces enlace_2" href="#"><i class="fas fa-pencil-alt"></i>  Modificar</a></li>
			                            <li><a class="enlaces enlace_2" href="#"><i class="fas fa-trash-alt"></i>  Eliminar</a></li>
			                        </ul>
			                    </div>
                			</div>
            			</li>
						<hr class="hr_admin_2">

					<!-- Usuarios -->
            		<li  id="gestionusers">
                		<a data-toggle="collapse" href="#gestionusers_2" class="dropsdwn">
                			<i class="fas fa-database"></i> Gestión de Usuarios
                		</a>
                		<!-- Nivel 1 de Gestion de usuarios -->
                		<div id="gestionusers_2" class="panel-collapse collapse  nivelesdown">
			                <div class="container-fluid">
			                    <ul class="navbar-nav">
			                        <li><a class="enlaces enlace_2" href="#"><i class="fas fa-plus"></i>  Agregar</a></li>
			                        <li><a class="enlaces enlace_2" href="#"><i class="fas fa-info"></i>  Consultar</a></li>
			                        <li><a class="enlaces enlace_2" href="#"><i class="fas fa-pencil-alt"></i>  Modificar</a></li>
			                        <li><a class="enlaces enlace_2" href="#"><i class="fas fa-trash-alt"></i>  Eliminar</a></li>
			                    </ul>
			                </div>
                		</div>
            		</li>
            		<hr class="hr_admin_2">

            			<!--Ajustes de la cuenta-->
            			<li id="gestioncuenta">
                			<a data-toggle="collapse" href="#gestioncuenta_2" class="dropsdwn">
                				<i class="fas fa-cog fa-spin"></i> Gestión de mi Cuenta
                			</a>
                			<!-- Nivel 1 de Gestion de la cuenta del admin -->
                			<div id="gestioncuenta_2" class="panel-collapse collapse nivelesdown">
			                    <div class="container-fluid">
			                        <ul class="navbar-nav">
			                            <li><a class="enlaces enlace_2" href="#"><i class="fas fa-key"></i> Cambiar contraseña</a></li>
			                            <li><a class="enlaces enlace_2" href="#"><i class="fas fa-id-badge"></i> Cambiar foto de perfil</a></li>
			                            <li><a class="enlaces enlace_2" href="#"><i class="fas fa-address-card"></i> Modificar datos personales</a></li>
			                        </ul>
			                    </div>
                			</div>
            			</li>
            			<hr class="hr_admin_2">
            			<li><a class="dropsdwn" href="cerrar_sesion_admins.php"><i class="fas fa-power-off"></i>Cerrar sesión</a></li>
					</ul>
		    	</div>
			</aside>
			<!-- Espacio para ventanas dinamicas.-->
			<div id="panelDeCentro">
				<div id="sinSeleccion" class="container">
					<h1><i class="fas fa-exclamation"></i> Aun no ha seleccionado ninguna opcion <i class="fas fa-exclamation" data-fa-transform="rotate-180"></i></h1>
					<hr class="hr_admin animated infinite fadeOut">
				</div>
			</div>
		</main>

		<!--Pie de página-->
		<footer class="piedepag anim-subrayado_piepa_3" style="clear:both;">
				<div class="container-fluid">
							&copy; Todos los derechos reservados. 2018 - Galapangos Team Inc. | Versión 0.0.01 &alpha;
				</div>
		</footer>
	</div>

	<!--Scripts-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/js/gijgo.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../scripts/js/otrasfunciones.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<script type="text/javascript">
		// Primero cachamos la variable del nombre de inicio de sesion y la pasamos a una de js
		var nombre = "<?php echo $nombres ?>";
		escogerImagenPerfil(nombre);
	 	
	 	function escogerImagenPerfil(admiNombre) {
	 		
	 		if (admiNombre == 'Pedro Erick') {
	 			
	 			$("#fotoPerfil").attr("src","../imagenes/sistemaGalmus/drake.jpg");

	 		}else if (admiNombre == 'Víctor V'){

	 			$("#fotoPerfil").attr("src","../imagenes/sistemaGalmus/victorverga.png");

	 		}else{

	 			$("#fotoPerfil").attr("src","../imagenes/sistemaGalmus/ale.webp");

	 		} 	
	 	 }
	</script>
</body>
</html>