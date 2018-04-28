<?php  
	//si hubo un error en el logeueo, de mal contraseña o correo
	//se guardara esta variable y abrire el div de mal contraseña,
	//despues de hacer unas comparaciones con Jquery para mostrarla.
		if(isset($_GET['most'])){
		
		}else{
		    '';
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
	<link rel="stylesheet" type="text/css" href="../css/loginadmin.css">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title> Galapangos Team | Login Admins </title>
</head>
<body id="cuerpo">
	<div class="animated zoomInDown">	
	
	    <!--Por si el usuario y/o contraseña estan mal, se lanza esta ventana-->
		<div id="alertaMala" class="container-fluid" style="display: none;">
  			<div class="container">
  				EL usuario y/o contraseña son incorrectos. <br>
  				Intentelo nuevamente.
  			</div>
		</div>

		<!-- Encabezado, logo del la organización-->
		<header class="header">
			<!--Logo y cintura del logo-->
			<div class="container">
				GalMus | Logueo de administradores.
			</div>
		</header>

		<!--Barra de Navegación-->
		<nav class="navbar navbar-light">
			<div class="container align-items-center justify-content-center">
				<a class="nav-link" href="../indexx.php"><i class="fas fa-reply-all"></i> Volver a página de Inicio. </a>
			</div>
		</nav><br><br>
		
		<!--Contenidos de la pagina..-->
		<main>
			<!--a href="../scripts/php/prueba.php" class="text-center"> Ver escriptacion </a-->
			<div class="container">
				<div class="sombra">
			      	<header class="container w3-black" style="border-radius: 10px;"> 
			       		<h2 style="padding: 7px;"><i class="fas fa-circle-notch fa-spin" style="vertical-align: middle;"></i> Iniciar Sesión.</h2>
			    	</header>

					<!-- SECCION PARA INICIAR SESION --> 
					<div id="iniciarSesion" class="container align-items-center justify-content-center">
					<h3 class="text-center" style="padding: 7px;"> Administrador(a).</h3><hr>
					 	<form id="fusuagral" method="POST" action="../scripts/php/login-admin.php" class="container align-items-center justify-content-center">
						    <label class="labeltam">Correo electronico</label> 
						    <input class="ent-modal estilosinputs" type="email" required autocomplete="off" name="correo" placeholder=" Aqui va su correo"/>
						    <br><br>
						    <label class="labeltam">Contraseña</label>
						    <input class="ent-modal estilosinputs" type="password" required autocomplete="off" name="contrasena" placeholder=" Aqui va su contraseña"/><br>
					    	<div class="container"><hr>
						 		<a class="text-center anim-subrayado olvidaste animated infinite pulse" href="#">¿Olvidaste tu contraseña?</a>
							</div>
							<div class="container" style="padding: 15px;">
					    		<input id="enviar" class="btn btn-warning btn-block" type="submit" value="Entrar al Sistema"/>
							</div>
					    </form>
					</div>
		    	</div>
			</div><br><br>
		</main>


		<!--Pie de página-->
		<footer class="piedepag3 anim-subrayado_piepa_3">
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
	<script type="text/javascript">
	        var mst = "<?php echo $_GET['most']; ?>";
	        colaEfectos(mst);
            function colaEfectos(mst){
              //si la variable tiene el string, se mostrara la alerta de contraseña incorrecta
              if (mst == 'mostrar'){
                  
                setTimeout(function() {
                      $("#alertaMala").css("display","block");
                      $("#alertaMala").addClass("animated bounceInDown");
                  }, 950);
                  
                setTimeout(function() {
                      $("#alertaMala").removeClass("animated bounceInDown");
                      $("#alertaMala").addClass("animated bounceOutUp");
                  }, 3900);
                  
                setTimeout(function() {
                      $("#alertaMala").removeClass("animated bounceOutUp");
                      $("#alertaMala").css("display","none");
                  }, 4400);
              }
            }
    </script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</body>
</html>