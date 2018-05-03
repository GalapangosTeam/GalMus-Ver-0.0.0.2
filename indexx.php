<?php 
//cachamos las variables de sesion, los nombres y apellidos del usuario logueado
//con el fin de mostrarlos en el panel, durante su sesión.
    session_start();
	if (isset($_SESSION['estado']) && $_SESSION['estado'] == true){
		   	$nombres = $_SESSION['nombres'];
			$appat = $_SESSION['appat'];
			$apmat = $_SESSION['apmat'];
			$estado = $_SESSION['estado'];
    		//exporacion de tiempo	
    		$now = time();
    		if($now > $_SESSION['expire']){
    			session_destroy();
    			//header("Location: http://php.net/manual/es/function.ob-start.php")
    			echo "Su sesion a terminado,
    			<br><a href='indexx.php'>Necesita logueargse nuevamente</a>";
    			exit;
    		}
	}else{
	    //si las variables estan vacias, es por que no hay nada enviado, lo qeu significa que nadie esta logueado. 
	        '';
	        $_SESSION['nombres']=null;
			$_SESSION['appat']=null;
			$_SESSION['apmat']=null;
			$_SESSION['estado']=null;
	}
//si hubo un error en el logeueo, de mal contraseña o correo
//se guardara esta variable y abrire el div de mal contraseña,
//despues de hacer unas comparaciones con Jquery para mostrarla.
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
	<link rel="shortcut icon" type="image/x-icon" href="imagenes/LandingPage/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/estilos-landingpage.css">
		<link rel="stylesheet" type="text/css" href="css/modales.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<title> Galapangos Team | Oficial </title>
</head>
<body id="cuerpo"  onload="ocultar()">
	<div class="animated zoomInDown fuente">	

		<!--Por si el usuario se registra con un correo duplicado  se lanza esta ventana-->
		<div id="alertaMala" class="container-fluid" style="display: none;">
  			<div class="container"><img src="imagenes/LandingPage/icoerror.svg" alt="usuario ya existente." style="width: 100px; height: 100px;">
  				Este usuario ya esta registrado anteriormente.<br>
  				Intentelo nuevamente.
  			</div>
		</div>

		<!--Por si el usuario y/o contraseña estan mal, se lanza esta ventana-->
		<div id="alertaMala_2" class="container-fluid" style="display: none;">
  			<div class="container"><img src="imagenes/LandingPage/icoerror.svg" alt="usuario ya existente." style="width: 100px; height: 100px;">
  				 Correo y/o contraseña incorrectos.<br>
  				Intentelo nuevamente.
  			</div>
		</div>

		<!--Por si el usuario y/o contraseña estan mal, se lanza esta ventana-->
		<div id="alertaBuena" class="container-fluid" style="display: none;">
  			<div class="container"><img src="imagenes/LandingPage/icobueno.svg" alt="usuario ya existente." style="width: 100px; height: 100px;">
  				Su registro ha sido éxitoso y correcto.<br>
  				Ahora puedes sesión.
  			</div>
		</div>

		<!-- Encabezado, logo del la organización-->
		<header id="header">
		    <div id="headerBorde" class="container align-items-center justify-content-center">
    			<!--Logo y cintura del logo-->
    		    <div class="row align-items-center justify-content-center">
        			<div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
        			    <img id="headerIsotipoGalMus" src="imagenes/LandingPage/isotipo_galmus.png" alt="Isotipo de Galmus"  class="align-items-center justify-content-center img-fluid">
                		<div id="headerNombre">GalMus</div>
                		<!--div class="container"><hr id="headerLinea"></div>
                		<!--div id="cita" style="margin: 0; text-align: center;"><q><cite>Aprendiendo día con día.</cite></q></div-->
        			</div>
	            </div>
	        </div>
		</header>

		<!--Barra de Navegación-->
		<nav id="barraNav" class="navbar navbar-expand-lg justify-content-center sticky-top navbar-light" onload="ocultar()">
    		<button class="navbar-toggler text-white nav-link" type="button" data-toggle="collapse" data-target="#desplegue" aria-controls="desplegue" aria-expanded="false" aria-label="Toggle navigation" style="font-size: 23px;"><i class="fas fa-bars"></i> Ver menu
    		</button>
    		<!-- div que oculta y mustra los datos del usuario responsive-->
    		<div id="auxOculto" class="align-items-center justify-content-center" style="display: none;">
    			<a id="bparteUserDatos_2" class="navbar-brand nav-link" href="#"><i class="fas fa-user-circle fa-lg"></i> <?php echo $_SESSION['nombres'].", ".$_SESSION['appat']."." ?></a>
    			<a id="regresarTodo" class="navbar-brand nav-link" href="usuarios/cerrar_sesion_users.php"><i class="fas fa-power-off fa-lg"></i> Cerrar sesión </a>
			</div>
			<div id="barraPromo" class="container" style="display: none;">
        		<a id="bpartePromo_01" class="nav-link" href="#div-promociones" onclick="mostrar()" id="ind-promo"><i class="fas fa-certificate" onclick="mostrar()" href="#div-promociones"></i> Mis promociones </a>
        		<a id="bpartePromo_02" class="nav-link" href="#descuentos" onclick="mdesc()" ><i class="fas fa-tags " data-fa-transform="rotate-260" href="#descuentos" onclick="mdesc()"></i> Descuentos </a>
        	</div>
			<div id="desplegue" class="collapse navbar-collapse align-items-center justify-content-center">
				<li class="nav-item dropdown listanav align-items-center justify-content-center">
					<div class="nav-link dropdown-toggle" id="dropProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Productos </div>
					    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <li><a class="nav-link dropdown-item dropdounColores" href="#video"> GalMus Software </a></li>
					    </ul>
				</li>
				<a id="noticias" class="nav-link" href="noticias.php"> Noticias </a>
				<a id="acercaDE" class="nav-link" href="acercade2.php"> Acerca de </a>
				<a id="contactos" class="nav-link" href="acercade2.php#contact"> Contacto </a>
				<a id="misiones" class="nav-link" href="acercade2.php#mision"> Misión </a>
				<a id="visiones" class="nav-link" href="acercade2.php#vision"> Visión </a>
				<!--form class="form-inline my-2 my-lg-0">
				    <input id ="cajabuscar" class="form-control mr-sm-2" type="text" placeholder="Buscar">
				    <button id="btnbuscar" class="btn btn-outline-warning" type="submit"> Buscar </button>
				</form-->
		        <ul id="botton" class="navbar-nav">
    				<button id ="btnregis" class="btn btnSesion" type="button" data-toggle="modal" onclick="document.getElementById('id01').style.display='block', bloquearFormulario()">
    					<i class="fas fa-user-circle fa-lg" id="iconoBtnUser"></i>
    					<span id="textoBtnUser"><strong>Entrar | Registrarse</strong></span>
    				</button>
				</ul>
				<!--boton oculto y datos para cuando el usuario se loguee jajajaj-->
				<a id="datosCuenta" class="chida  nav-link" style="color:white; display: none;"><i class="fas fa-user-circle fa-lg"></i><?php echo $_SESSION['nombres'].", ".$_SESSION['appat']."." ?></a>
				<li id="btnCuenta" class="nav-item dropdown listanav" style="display: none;">
					<div class="nav-link dropdown-toggle" id="dropCuentaUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i id="iconoBtnUser" class="fas fa-cog fa-spin"></i> Mi cuenta 
				    </div>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					    <li><a class="nav-link dropdown-item dropdounColores" href="#" style="font-size: 21px;"> Mis datos </a></li>
					    <div class="dropdown-divider"></div>
					    <li><a class="nav-link dropdown-item dropdounColores" href="#" style="font-size: 21px;"> Cambiar clave</a></li>
					    <div class="dropdown-divider"></div>
					    <li><a class="nav-link dropdown-item dropdounColores" href="usuarios/cerrar_sesion_users.php" style="font-size: 21px;"> Cerrar sesión</a></li>
					 </ul>
				</li>
        	</div>
		</nav>

		<!--Barra para usuarios logueados en pantalla completa, sin menu desplegable.-->
		<span id="elBotons" style="display: none;">
            <button id="sideBoton" class="w3-button w3-circle w3-xlarge w3-right" onclick="abrirMenuSide()" style="background-color: rgb(255, 178, 85); display: block;" title="Mini panel de mi cuenta"><i class="fas fa-bars fa-lg"></i></button>
            <a id="sideBoton_2" class="w3-button w3-circle w3-xlarge w3-right" style="background-color: rgb(255, 178, 85); display: block;" href="usuarios/cerrar_sesion_users.php" title="Cerrar Sesión"><i class="fas fa-power-off fa-lg"></i></a>
        </span>
        <div id="barraCompleta" class="container align-items-center justify-content-center nav-link" style="display: none;">
    		<div id="rightMenu" class="w3-sidebar w3-animate-right" style="display:none;right:0;">
                <a id="cerrarSideBar" class="chida nav-link"><i class="fas fa-angle-double-right fa-lg"></i><strong style="font-size: 23px;"> Cerrar </strong><i class="fas fa-angle-double-right fa-lg"></i></a>
                <a id="bparteUserDatosCompleta_2" class="chida listanav nav-link"><i class="fas fa-user-circle fa-lg"></i> <?php echo $_SESSION['nombres'].", ".$_SESSION['appat']."." ?></a>
                <a id="regresarTodoCompleta" class="chida listanav nav-link" href="usuarios/cerrar_sesion_users.php"><i class="fas fa-power-off"></i> Cerrar sesión </a>
                <a id="bpartePromoCompleta_1" class="chida listanav nav-link" href="#div-promociones" onclick="mostrar()" id="ind-promo"><i class="fas fa-certificate" onclick="mostrar()" href="#div-promociones"></i> Mis promociones </a>
        	    <a id="bpartePromoCompleta_2" class="chida listanav nav-link" href="#descuentos" onclick="mdesc()" ><i class="fas fa-tags " data-fa-transform="rotate-260" href="#descuentos" onclick="mdesc()"></i> Descuentos </a>
            </div>
        </div>
        
		<!--Ventana modal-->
	  	<div class="container"> 
	    	<div id="id01" class="w3-modal">
		     	<div class="w3-modal-content modal-lg w3-animate-zoom">
		      		<header class="w3-container w3-black"> 
		       			<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-black w3-hover-orange w3-large w3-display-topright">&times;
		       			</span>
		       			<h2>Bienvenido</h2>
		    		</header>

			    	<div class="w3-bar w3-border-bottom">
				    	<button class="enlaceOpcion w3-bar-item w3-button" onclick="opcModal(event,'registrarse')" style="font-size: 25px;">Registrarse
				    	</button>
				    	<button class="enlaceOpcion w3-bar-item w3-button" onclick="opcModal(event,'iniciarSesion')" style="font-size: 25px;">Iniciar Sesión
				    	</button>
			    	</div>
			 	    
			 	    <!-- SECCION PARA REGISTRARSE --> 
					<div id="registrarse" class="container opcion"><br>
					 	<h1 class="text-center">Formulario de registro.</h1><hr id="hr_form_regis">
					    <div id="formNormales" class="container-fluid animated zoomInUp">
						 	<form id="fusua" method="POST" action="scripts/php/registro.php" class="container-fluid">
						 		<div class="row align-items-center justify-content-center">

								    <label class="control-label col-xs-12">
								    	<strong>Nombre(s):</strong>
								    	<span class="req">*</span>
								    </label>
								 	<input title="Se necesita su Nombre" type="text" required minlenght="1" class="ent-modal estilosinputs form-control" id="nombre" maxlength="30" placeholder=" Nombre" onkeyup = "sinMayusAcento(this)" name="nombres"><br>

								    <label class="control-label col-xs-12">
								    	<strong>Apellido Paterno:</strong>
								    	<span class="req">*</span>
								    </label>
								    <input title="Se necesita su Apellido Parteno" type="text" required minlenght="5" maxlength="50" class="ent-modal estilosinputs form-control"  id="apPat" placeholder=" Paterno" onkeyup = "sinMayusAcento(this)" name="apellidopat"><br>

								    <label class="control-label col-xs-12">
								    	<strong>Apellido Materno:</strong>
								    	<span class="req">*</span>
								    </label>
								    <input title="Se necesita su Apellido Materno" type="text" required minlenght="5" maxlength="50" class="ent-modal estilosinputs form-control"  id="apMat" placeholder=" Materno" onkeyup = "sinMayusAcento(this)" name="apellidomat"><br>

								    <label class="control-label col-xs-12">
								    	<strong>Correo Electrónico:</strong>
								    	<span class="req">*</span>
								    </label>
								 	<input title="Se necesita su Correo Electrónico" required class="ent-modal estilosinputs form-control" type="email" minlenght="1" maxlength="30" id="correoElect" placeholder=" Correo Electrónico" name="correo"><br>

								 	<label class="control-label col-xs-12">
								 		<strong>Contraseña:</strong>
								 		<span class="req">*</span>
								 	</label>
								 	<input title="Se necesita su Contrasena" required type="password" minlenght="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,}" class="ent-modal estilosinputs" id="priCla" placeholder=" Contraseña" name="contrasena">
								 	<div class="nivelSeguridad estilosinputs">
									    <strong><span id="nivelseguridad" class="centrado">bajo</span></strong>
									    <div class="nivelesColores">
									      <div class="spanNivelesColores"></div>
									    </div>							  
									  <div class="NivelesColores centrado"></div>					  
									</div>

								    <label class="control-label col-xs-12 centrado">
								    	<strong>Confirmar Contraseña:</strong>
								    	<span class="req">*</span>
								    </label>
		            				<input type="password" required minlenght="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,}" class="ent-modal estilosinputs" placeholder=" Confirmar Contraseña" name="contrasena" id="segCla"><br>

								    <label class="control-label col-xs-12 centrado">
								    	<strong>F. Nacimiento:<br/></strong>
								    	<span class="req">*</span>
								    </label>
								    <input style="border-radius: 4px; width: 100%;" id="datepicker" name="fecha"><br>	

								    <label class="control-label col-xs-12 centrado">
								    	<strong>Teléfono:</strong>
								    </label>
								    <input type="number" required minlenght="8" maxlength="10" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}" class="ent-modal estilosinputs"  id="tel"placeholder=" Teléfono (OPCIONAL)" name="tel"><br>
									
								    <label class="control-label col-xs-12">
								    	<strong>Genero:</strong>
								    	<span class="req">*</span>
								    </label><br>
								 	<div class="radio-opciones"  id="genero">
									    <label class="radio-texto centrado">
									    	<input class="radio-entrada" type="radio" name="sex" onclick="genOcupacion(1)">Masculino  
										</label>
									    
									    <label class="radio-texto centrado">
									    	<input class="radio-Entrada" type="radio" name="sex" onclick="genOcupacion(2)">Femenino  
										</label><br>
								    </div>

								    <label class="control-label col-xs-12 centrado">
								    	<strong>Ocupación: </strong>
								    	<span class="req">*</span>
								    </label>
									<select type="text" required class="ent-modal estilosinputs form-control" placeholder=" Ocupación " style="height: 45px;" id="listaOpcion" name="ocupacion">
									</select><br>

								   <label class="control-label col-xs-12">
								    	<strong>Edad:</strong>
								    </label>
								    <input type="number" required minlenght="2" maxlength="3" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}" class="ent-modal estilosinputs" id="edad" placeholder=" Edad" name="edad" ><br><br>

								    <label class="checkbox-inline radio-opciones">
								        <input id="acepto" type="checkbox" value="agree">  Acepto 
								        	<a href="#">Términos y condiciones</a>
								    </label><br>
							    </div>
							    <footer class="w3-container">
    								<div class="w3-container w3-light-grey w3-padding">
    									<input id="registroUsuarios" type="submit" class="btn btn-primary" value="Registrarse">
    									<input type="reset" class="btn btn-default" value="Limpiar">
    						        	<button class="w3-button w3-right w3-white w3-border" onclick="document.getElementById('id01').style.display='none'">Cerrar
    						        	</button>
    						    	</div>
							    </footer>
						    </form>
					    </div>
					</div>

					<!-- SECCION PARA INICIAR SESION --> 
				    <div id="iniciarSesion" class="w3-container opcion">
				       	<h1 class="text-center">Entrar</h1>
				       	<form id="iniciarSesion" class="container-fluid animated zoomInUp" method="POST" action="scripts/php/login.php">
					       	<label>Correo Electronico<span class="req estilosinputs">*</span></label> 
					        <input class="ent-modal estilosinputs" type="email" required autocomplete="off" name="correo"/><br>
					        <label>Contraseña<span class="req">*</span></label>
					        <input class="ent-modal estilosinputs" type="password" required autocomplete="off" name="contrasena"/><br>
					        <p class="olvidada" style="font-size: 20px"><a href="#">¿Olvidaste tu contraseña?</a></p>
				        	<footer class="w3-container">
								<div class="w3-container w3-light-grey w3-padding">
									<input id="entrarLog" type="submit" class="btn btn-primary" value="Entrar">
									<input type="reset" class="btn btn-default" value="Limpiar">
						        	<button class="w3-button w3-right w3-white w3-border" onclick="document.getElementById('id01').style.display='none'">Cerrar
						        	</button>
						    	</div>
							</footer>
				        </form>
				    </div>
	    		</div>
	    	</div>
	    </div>

        <!-- bototn para ir arriba-->
        <span class="ir-arriba align-items-center justify-content-center"><i class="fas fa-angle-double-up fa-lg"></i></span>
		
		<!--Contenidos de la pagina en secciones,aside, etc..-->
		<br>
		<main>
			<div class="container">
				<section class="row align-items-center justify-content-center">	
					<article class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
					        <img src="imagenes/LandingPage/cenart.jpg" class="img-fluid notaspar" alt="Cenart" style="width: 100%; height: 80%;"><hr>
							<h2 class="text-center">Conoce un poco más de nosotros.</h2>
							<br>
								<p class="notaspar">Somos una organización que esta desarrollando un juego interactivo con todas las herramientas necesarias para ti, adaptando la mejor usabilidad y accesibilidad para que puedas aprender de una manera bastante dinámica, agradable y comprensible, además de que puedas obtener la mejor experiencia de aprender en un corto plazo, reemplazando las metodologías antiguas que solías utilizar.</p>
					</article>
					<article class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
						<p class="text center" style="font-size: 30px;"><br><strong>"Yleskas Music".</strong></p><hr>
						<img src="imagenes/LandingPage/yeskas.jpg" class="img-fluid notaspar" alt="partituras en pentagrama" style="width: 100%; height: 100%;"><hr>
						<p class="notaspar"><br>Es una academia de música, donde hemos contribuido muchísimo con el gran avance y desarrollo de nuestro software, probando la versión Beta con los estudiantes de esta academia, con el fin de detectar más errores, hacer posibles mejoras y más derivados que se relacionan con el tema.</p>
					</article>
				</section>
			</div>
		    
			<!--Carrusel de imagenes-->
			<hr><br><h1 class="text-center">Interfaz del Video juego en versión Beta (aun en desarrollo).</h1><br><hr>
			<br>
			<div class="container" style="width: 70%; height: 20%;">
				<div class="col-md-12">
					<div id="Diapos" class="carousel slide" data-ride="carousel">
						<!-- indicadores -->
						<ol class="carousel-indicators">
							<li data-target="#Diapos" data-slide-to="0" class="active"></li>
							<li data-target="#Diapos" data-slide-to="1"></li>
							<li data-target="#Diapos" data-slide-to="2"></li>
						</ol>

						<!-- Contenedor de los items o sliders -->
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="imagenes\LandingPage\1.png" class="d-block img-fluid" alt="imagen 1">
								<div class="carousel-caption d-none d-md-block">
									<h3>GalMus Software 0.0.1 (Alpha)</h3>
									<p> Ventana de bienvenida con una interfaz amigable para todas las edades.</p>
								</div>
							</div>
							
							<div class="carousel-item">
								<img src="imagenes\LandingPage\2.png" class="d-block img-fluid" alt="imagen 2">
								<div class="carousel-caption d-none d-md-block">
									<h3>GalMus Software 0.0.1 (Alpha)</h3>
									<p> Ventana de instrucciones en la cual explica aspectos básicos del software.</p>
								</div>
							</div>

							<div class="carousel-item">
								<img src="imagenes\LandingPage\3.png" class="d-block img-fluid" alt="imagen 3">
								<div class="carousel-caption d-none d-md-block">
									<h3>GalMus Software 0.0.1 (Alpha)</h3>
								</div>
							</div>
						</div>
						
						<!-- controles de cambios izq y der-->
						<a class="carousel-control-prev" href="#Diapos" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="carousel-control-next" href="#Diapos" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
					</div>
				</div>
			</div>
			
			<br>
			<article class="container-fluid">
				<hr><br>
				<p id="temaprinci" class="animated infinite pulse">La música es un idioma y aquí aprenderás a leerlo.</p>
			</article>
        
			<div class="container">
				<br><hr>
				<section class="row align-items-center justify-content-center">	
					<article class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
							<h2 class="text-center"> Las Partituras de las Notas Musicales </h2>
							<br>
								<p class="notaspar">Las figuras musicales son la representación de las notas en un pentagrama, que también les dan su designada duración. Los sostenidos y bemoles suben o bajan medio tono cada nota. Los compases son las divisiones del pentagrama. Cantar una canción de nuestro cantante favorito, silbar, llevar el ritmo con los pies o tocar de oído... Son unas de las cosas que ayudan a mejorar nuestro oído.Lo más importante es estar bien preparado.</p>
								<img src="imagenes/LandingPage/penta.png" class="img-fluid notaspar" alt="partituras en pentagrama" style="width: 100%; height: 100%;">
					</article>
					<aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
						<div class="container-fluid"><img src="imagenes/LandingPage/partituras.svg" class="img-fluid imgnota" alt="partituras"></div><hr>
						<p class="notaspar"><br>La <strong>música</strong> es la medida métrica en subdivisión, aparte el arte de combinar y ordenar sonidos y silencios en el tiempo, de manera ordenada y estética.</p>
					</aside>
				</section>
			</div>

			<br>
			<!--Información sobre el Software-->
			<div class="container-fluid">
				<hr><br>
				<p style="font-size: 34px;">¿Cómo apoyaremos a las demás academias de música, estudiantes y público en general?</p>
				<div class="container">
					<section class="row align-items-center justify-content-center">	
						<article class="col-xs-12 col-sm-8 col-md-9 col-lg-9"><br>
								<h2 class="text-center"> Problemática a resolver. </h2><br><hr>
								<p class="notaspar">Los profesores de música están hartos de usar las metodologías austeras de aprendizaje que existen desde hace años para enseñar a sus alumnos las partituras de las notas musicales, usando libros y demás material antiguo.</p><br> 
								<p class="notaspar">Derivado de lo anterior se plantea sistematizar esas metodologías de aprendizaje obsoletas, haciéndolas llegar al alcance de cualquier estudiante, adaptarlas para que sea más fácil aprender, memorizar y recordar cada nota, usando las nuevas tecnologías de esta era, con el fin de ayudar al estudiante a desarrollar sus habilidades de aprendizaje a corto plazo con la mejor comodidad posible.</p>
								<div class="container-fluid">
									<a class="isotipogal"  href="#"  title="Galmus Logo">
										<img src="imagenes/LandingPage/isotipo_galmus.png" class="img-fluid imgnota isotipogal" alt="partituras">
									</a>
								</div>
						</article>
					</section>
				</div>

				<!-- Video del Juego-->
				<br><hr>
				<h1 id="video" class="text-center">Video del juego de Galmus</h1>
			    <p style="font-size: 30px;"><strong>GalMus V0.0.1 (Alpha)</strong></p>
			    <span class="border border-warning">
				<div class="embed-responsive embed-responsive-21by9">
                     <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/262774326"></iframe>
                </div></span><br>
                <p style="font-size: 30px; text-align: center; "><a href="https://vimeo.com/262774326" target="_blank">Miralo en Vimeo</a></p>
			</div>	

			<!--Información sobre los desarolladores-->
			<div class="container-fluid">
				<hr><br>
				<p id="temaprinci"> Nuestro equipo de desarrolladores</p>
				<div class="container">
					<section class="row align-items-center justify-content-center">	
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
							<!--Pedro-->
							<div class="container-fluid">
								<a class="peter"  href="#"  title="Galmus Isotipo">
									<img src="imagenes/LandingPage/persona.png" class="img-fluid imgnota peter" alt="peter rivers">
								</a>
							</div><hr>
							<p class="nombresdeve"> Pedro Erick RG. </p><br>
						</div>

						<!--Victor-->
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
							<div class="container-fluid">
								<a class="vic"  href="#"  title="Galmus Isotipo">
									<img src="imagenes/LandingPage/persona.png" class="img-fluid imgnota vic" alt="VisualYukkie">
								</a>
							</div><hr>
							<p class="nombresdeve"> Víctor Vicente Mtz. </p><br>
						</div>

						<!--Pug Alejandro-->
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
							<div class="container-fluid">
								<a class="ale"  href="#"  title="Galmus Isotipo">
									<img src="imagenes/LandingPage/persona.png" class="img-fluid imgnota ale" alt="Pug">
								</a>
							</div><hr>
							<p class="nombresdeve"> Alejandro Medina A. </p><br>
						</div>
					</section>
				</div>
			</div>
			
			<!--Promociones-->
        	<div class="container-fluid " id="div-promociones" >
				<!--efecto promociones-->
				<div class="foo">
 					<span class="letter" data-letter="P" onclick="ocultar()">P</span>
 					<span class="letter" data-letter="R" onclick="ocultar()">R</span>
 				 	<span class="letter" data-letter="O" onclick="ocultar()">O</span>
 					<span class="letter" data-letter="M" onclick="ocultar()">M</span>
 					<span class="letter" data-letter="O" onclick="ocultar()">O</span>
 					<span class="letter" data-letter="C" onclick="ocultar()">C</span>
 					<span class="letter" data-letter="I" onclick="ocultar()">I</span>
 					<span class="letter" data-letter="O" onclick="ocultar()">O</span>
 					<span class="letter" data-letter="N" onclick="ocultar()">N</span>
					<span class="letter" data-letter="E" onclick="ocultar()">E</span>
 					<span class="letter" data-letter="S" onclick="ocultar()">S</span><hr>
				</div>

				<!--efecto promociones-->
				<div class="container">
					<section class="row align-items-center justify-content-center">	
						<div class="color-xs-12 col-sm-6 col-md-3 promociones">
							<!--notapp-->
							<div class="container-fluid">
							
							</div>
							<p class="nombresdeve anim-subrayado_piepa sombraPromo ">Galmus "Notas Musicales"</p>
							<img src="imagenes/acercaDeOrg/nt.svg" alt="Galmus" height="185px;" width="245px; " class="icoFacebook">
							<li>La mejor app para el aprendisaje musical</li>
							<li>Divierte mientras aprendes</li>
							<li>No te quedes en los metodos de enseñanza antiguos</li>
							<li>NotApp te regala los cursos de promocion</li>
							<li>Costo:$3000 </li>
							<li>Desarrolladores: P.E.R.G Y V.V.M.M</li><br><hr>
							<button  class="btn btn-outline-warning promo " type="submit">Comprar</button>
						</div>

						<!--java-->
						<div class="color-xs-12 col-sm-6 col-md-3 promociones ">
							<div class="container-fluid">
							</div>
							<p class="nombresdeve anim-subrayado_piepa sombraPromo ">Curso Java </p>
							<img src="imagenes/acercaDeOrg/java.svg" alt="NotApp" height="230px;" width="245px;" class="icoFacebook">
							<li>Conoce un nuevo mundo tecnologico</li>
							<li>Crea lo que sea con solo tu imaginacion</li>
							<li>Innova nuevas tecnologias</li>
							<li>Desarrolla un sistema de informacion</li>
							<li>Costo: $500</li>
							<li>Curso impartido por: P.E.R.G</li><hr>
							<button  class="btn btn-outline-warning promo" type="submit">Comprar</button>
						</div>

						<!--mysql y java-->
						<div class="color-xs-12 col-sm-6 col-md-3 promociones">
							<div class="container-fluid">
							</div>
							<p class="nombresdeve anim-subrayado_piepa sombraPromo ">Curso MySQl y Java </p>
							<img src="imagenes/acercaDeOrg/prog.jpg" alt="NotApp" height="185px;" width="245px;" class="icoFacebook">
							<li>Conoce un nuevo mundo tecnologico</li>
							<li>Crea lo que sea con solo tu imaginacion</li>
							<li>Innova nuevas tecnologias</li>
							<li>Desarrolla un sistema de informacion</li>
							<li>Curso impartido por: P.E.R.G</li>
							<li>Costo:$750</li><hr>
							<button  class="btn btn-outline-warning promo" type="submit">Comprar</button>
						</div>

						<!--html-->
						<div class="color-xs-12 col-sm-6 col-md-3 promociones">
							<div class="container-fluid">
								
							</div>
							<p class="nombresdeve anim-subrayado_piepa sombraPromo ">Curso HTML5, CSS3 y JS</p>
							<img src="imagenes/acercaDeOrg/programacion.jpg" alt="NotApp" height="185px;" width="245px;" class="icoFacebook">
							<li>Conoce un nuevo mundo tecnologico</li>
							<li>Crea lo que sea con solo tu imaginacion</li>
							<li>Innova nuevas tecnologias</li>
							<li>Desarrolla un sistema de informacion</li>
							<li>Curso impartido por: P.E.R.G</li>
							<li>Costo:$750</li><hr>
							<button  class="btn btn-outline-warning promo" type="submit">Comprar</button>
						</div>

						<!--oracle-->
						<div class="color-xs-12 col-sm-6 col-md-3 promociones">
							<div class="container-fluid">
								
							</div>
							<p class="nombresdeve anim-subrayado_piepa sombraPromo ">Curso Oracle y Java </p>
							<img src="imagenes/acercaDeOrg/prog.jpg" alt="NotApp" height="185px;" width="245px;" class="icoFacebook">
							<li>Conoce un nuevo mundo tecnologico</li>
							<li>Crea lo que sea con solo tu imaginacion</li>
							<li>Innova nuevas tecnologias</li>
							<li>Desarrolla un sistema de informacion</li>
							<li>Curso impartido por: P.E.R.G</li>
							<li>Costo:$750</li><hr>
							<button  class="btn btn-outline-warning promo" type="submit">Comprar</button>
						</div>
					</section>
				</div>
        	</div>	

			<!-- descuentos -->
			<div id="descuentos">
				<div id="targeta color-xs-12 col-sm-6 col-md-3">
					<h1 class="sombraPromo anim-subrayado_piepa "  onclick="mdesc();"> <strong id="desc-tit" onclick="mdesc();">GalMus.Org</strong> Cupon por 50% de descuento en una sola compra</h1>
				</div>
				<div class="desc ">
					<div id="texto" class="desc-text" style="font-size: 20px;">
					Descuento del 50% en todos los articulos de tu primer compra
					<img  class="desc-img" src="imagenes/acercaDeOrg/promociones/barcode.png" alt="codigo de barras">
					</div>
				</div><hr>
				<button class="desc-btn btn btn-outline-warning"  onclick="ocultar()" >  IMPRIMIR DESCUENTO </button>
			</div><br>	
			
			<!--politicas de privacidad-->
			<div class="modal" id="privacidad" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-center">Políticas de Privacidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p style="text-align: justify; font-size: 14px;">La presente Política de Privacidad establece los términos en que GalMus usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo, esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
							</p>
				    <p style="text-align: justify; font-size: 14px;">Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.</p>
				    <p style="text-align: justify; font-size: 14px;"><strong>GalMus</strong>, se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.
				        	 </p>
				    <h4>Control de su información personal</h4>
					<p style="text-align: justify; font-size: 14px;">En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico.  En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Acepto</button>
                  </div>
                </div>
              </div>
            </div>
		</main>
		<br>

		<!--Pie de página con sus subpies-->
		<footer>
			<!--Parte I del pie de página: Contacto, redes sociales-->
			<div class="container-fluid piedepag anim-subrayado">
				<div class="container">
					<h2 style="padding-top: 10px;">¡Siguenos!</h2>
					<hr id="rayapieredes">
				    <seccion class="row align-items-center justify-content-center" style="padding-top: 10px; text-align: center;">
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="container-fluid">
				                <a class="icoFacebook"  href="#"  title="Facebook">
				                	<img src="imagenes/LandingPage/icofb.svg" class="img-fluid icoFacebook"  alt="Facebook">
				                </a>
			                </div>
			           	</div>
			           	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			           		<div class="container-fluid">
				            	<a class="icoLinkedin" href="#" title="LinkedIn">
				            		<img src="imagenes/LandingPage/icolinked.svg" class="img-fluid icoLinkedin" alt="LinkedIn">
				            	</a>
			            	</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="container-fluid">
								<a class="icoYoutube" href="#" title="Youtube">
				                	<img src="imagenes/LandingPage/icoyb.svg" class="img-fluid icoYoutube" alt="Youtube">
				                </a>
			                </div>
						</div>
			            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			            	<div class="container-fluid">
				            	<a class="icoGoogle" href="#"  title="Google +">
				                	<img src="imagenes/LandingPage/icogoogle.svg" class="img-fluid icoGoogle" alt="Google +">
				                </a>
			            	</div>
			            </div>   
					</seccion>
			  	</div>
		  	</div>
		  	<!--Parte II del pie de página:  Informacion sobre toda la website-->
			<div id="piedepag2">
			  <div class="container">
			    <div class="row">
			      <div class="color-xs-12 col-sm-6 col-md-3">
			        <!--Column1-->
			        <div class="subpiedepag2">
			         <h4 class="text-center anim-subrayado_piepa" style="padding-top: 20px;">Ubicación</h4>
			          <address>
						<ul class="list-unstyled">
							<li class="anim-subrayado_piepa" style="text-align: justify;">Boulevard de las flores #1205, Villa de las Flores,<br>
								Coacalco de Berriozabal,<br>
								Estado de México, 55790.<br>
							</li>
							<li class="anim-subrayado_piepa" style="text-align: justify: ;">
								Teléfono: (55) 3147 8965							
							</li><br>
							<div class="row align-items-center justify-content-center">
								<a class="btn btn-warning" href="acercade2.html#map" target="_blank" role="button"><strong>Ver ubicación</strong></a>
							</div>
						</ul>
					 </address>
			        </div>
			      </div>

			      <div class="color-xs-12 col-sm-6 col-md-3">
			        <!--Column2-->
			        <div class="piedepag2">
			          <h4 class="text-center anim-subrayado_piepa" style="padding-top: 20px">Nuestros servicios</h4>
			          <ul class="list-unstyled">
			            <li><a class="enlacespie" href="#">GalMus Software</a></li>
			            <li><a class="enlacespie" href="#">Ayuda y soporte</a></li>
			            <li><a class="enlacespie" href="#">Nuevas actualizaciones</a></li>
			          </ul>
			        </div>
			      </div>
			      <div class="color-xs-12 col-sm-6 col-md-3">
			        <!--Column3-->
			        <div class="piedepag2">
			          <h4 class="text-center anim-subrayado_piepa" style="padding-top: 20px"> Más información</h4>
			          <ul class="list-unstyled">
			          	
			            <li><a class="enlacespie" href="#">Tutorial del Website</a></li>
			            <li><a class="enlacespie" href="#">Accesibilidad</a></li>
			            <li><a class="enlacespie" href="#" data-toggle="modal" data-target="#privacidad">Declaración de Privacidad</a></li>
			          </ul>
			        </div>
			      </div>
			      <div class="color-xs-12 col-sm-6 col-md-3">
			        <!--Column4-->
			        <div class="piedepag2">
			          <h4 class="text-center anim-subrayado_piepa" style="padding-top: 20px"> Desarrolladores </h4>
			          <ul class="list-unstyled text-center">
                        <li class="text-center"><a href="#" class="foto" ><img src="imagenes/LandingPage/PeterRivers.jpg" alt="Pedro Erick Ríos García" class="img-fluid fotoPerfil"><br>Pedro Erick Ríos García</a></li><br>
			            <li class="text-center"><a href="#" class="foto" ><img src="imagenes/sistemaGalmus/victorverga.png" alt="Víctor Martínez Martínez" class="img-fluid fotoPerfil" style="font-size: 20px;"><br>Víctor Martínez Martínez</a></li><br>
			            <li class="text-center"><a href="#" class="foto" ><img src="imagenes/sistemaGalmus/ale.webp" alt="Alejandro Medina Alcántara" class="img-fluid fotoPerfil" style="font-size: 20px;"><br>Alejandro Medina Alcántara</a></li><br>
			          </ul>
			        </div>
			      </div>
			    </div>
			  </div><br>
			</div>
			<!--Parte III del pie de página:  Derechos y Copyright-->
			<div class="piedepag3 anim-subrayado_piepa_3">
				<div class="container-fluid animated infinite pulse">
							&copy; Todos los derechos reservados. 2018 - Galapangos Team.
				</div>
			</div>
		</footer>
	</div>
	<!--Scripts-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/js/gijgo.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!--script type="text/javascript" src="scripts/js/animanotasclick.js"></script-->
	<script type="text/javascript" src="scripts/js/maps.js"></script>
	<script type="text/javascript" src="scripts/js/otrasfunciones.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!--Este script tiene metodos para mostrar ventana de errores en formularios de registro y login.-->
	<script type="text/javascript">
	        var mst = "<?php echo $_GET['most']; ?>";
	        
	        colaEfectos(mst);
	        devolverTodo();
	        
            function colaEfectos(mst){
              //si la variable tiene el string, se mostrara la alerta de contraseña incorrecta o correcta
              if (mst == 'bien'){
                  //se muestra la ventana de contraseña de registro éxitoso una vez que la variable get sea igual a bien
                setTimeout(function() {
                      $("#alertaBuena").css("display","block");
                      $("#alertaBuena").addClass("animated bounceInDown");
                  }, 950);
                setTimeout(function() {
                      $("#alertaBuena").removeClass("animated bounceInDown");
                      $("#alertaBuena").addClass("animated bounceOutUp");
                  }, 3900);
                setTimeout(function() {
                      $("#alertaBuena").removeClass("animated bounceOutUp");
                      $("#alertaBuena").css("display","none");
                  }, 4400);
              }else if(mst == 'malo'){//de lo contrario mostrar la ventana de que ya existe un registro con ese correo.
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
              }else if(mst == 'dupla'){//entonces en el logueo estuvo mal.
              	setTimeout(function() {
                      $("#alertaMala_2").css("display","block");
                      $("#alertaMala_2").addClass("animated bounceInDown");
                  }, 950); 
                setTimeout(function() {
                      $("#alertaMala_2").removeClass("animated bounceInDown");
                      $("#alertaMala_2").addClass("animated bounceOutUp");
                  }, 3900);
                setTimeout(function() {
                      $("#alertaMala_2").removeClass("animated bounceOutUp");
                      $("#alertaMala_2").css("display","none");
                  }, 4400);
              }else{//mostrar div de logueado
              		$("#btnregis").css("display","none");
              		$("#botton").css("display","none");
              		$("#barraPromo").css("display","block");
              		$("#barraCompleta").css("display","block");
              		$("#sideBoton").css("display","block");
              		$("#elBotons").css("display","block");
              		$("#auxOculto").css("display","block");
              		$("#btnCuenta").css("display","block");
              		$("#datosCuenta").css("display","block");
              		$("#acercaDE").attr("href","acercade2.php?most=y");
              		$("#contactos").attr("href","acercade2.php?most=y#contact");
              		$("#misiones").attr("href","acercade2.php?most=y#mision");
              		$("#visiones").attr("href","acercade2.php?most=y#vision");
              		$("#noticias").attr("href","noticias.php?most=y");
              }
            }
            function devolverTodo(){//para al cerrar sesion, volver todo a la normmalidad.
            		   $("#regresarTodo").click(function(){
    						$("#btnregis").css("display","block");
    						$("#botton").css("display","block");
                  			$("#barraPromo").css("display","none");
                      		$("#barraCompleta").css("display","none");
                      		$("#sideBoton").css("display","none");
                      		$("#elBotons").css("display","none");
                      		$("#auxOculto").css("display","none");
                  			$("#btnCuenta").css("display","none");
                  			$("#datosCuenta").css("display","none");
                  			$("#acercaDE").attr("href","acercade2.php");
                  			$("#contactos").attr("href","acercade2.php#contact");
              				$("#misiones").attr("href","acercade2.php#mision");
              				$("#visiones").attr("href","acercade2.php#vision");
              				$("#noticias").attr("href","noticias.php");
            		   });
            }
    </script>
    <!--para el efecto del tache del menu desplegable de la navbar-->
    <script type="text/javascript">
            cerrarMenu();
            function abrirMenuSide() {
                $("#rightMenu").css("display","block");
            }
            function cerrarMenu(){
                $("#cerrarSideBar").click(function() {
                    $("#rightMenu").css("display","none");
                });
            }
        $(document).ready(function(){
            $('.ir-arriba').click(function(){
            		$('body, html').animate({
            			scrollTop: '0px'
            		}, 300);
            	});
            $(window).scroll(function(){
            		if( $(this).scrollTop() > 0 ){
            			$('.ir-arriba').slideDown(300);
            		} else {
            			$('.ir-arriba').slideUp(300);
            		}
            	});
        });
    </script>
    <!--scripts del pug no documentados.-->
   	<script type="text/javascript">
		//ocultar promociones
		function ocultar(){
    	document.getElementById("div-promociones").style.display="none";
    	document.getElementById("descuentos").style.display="none";
        }
		//mostrar promociones
 		function mostrar(){
    	document.getElementById("div-promociones").style.display="block";
    
		}
		function mdesc(){
		document.getElementById("descuentos").style.display="block";	
		}
	</script>
	<script type="text/javascript">
		//cambiar texto en boleto de descuento
		var Textos = new Array();
	  	// Enter the names of the images below
	 	 Textos[0]="50% de descuento total en una compra, no importa la cantidad";
	 	 Textos[1]="La mejor oportunidad de adquirir tu curso de programacion";
	 	 Textos[2]="Descuento por tiempo limitado. aprovecha esta unica oportunidad";
	 	 Textos[3]="La oportunidad que puede cambiar tu vida, una compra inteligente";
	 
		var nuevoTexto = -1; // para empezar en el primer texto -1, con 0 comienza por mostrar el segundovar totalTextos = Textos.length;
	 
		function repetir() {
			
	 		 nuevoTexto++;
	 		 if (nuevoTexto == totalTextos) {
	 		   nuevoTexto = 0;
	  										}
	 		 document.getElementById('texto').innerHTML=Textos[nuevoTexto];
			// cambiar 4 por el valor en segundos
	 		 setTimeout("repetir()", 4*1000);
	 		mdesc();
						}
	</script>
	<script type="text/javascript">
		//imprimir cierta parte de la pagina
		function imprimir(){
	 	 var objeto=document.getElementById('descuentos');  //obtenemos el objeto a imprimir
	 	 var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
	 	 ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
		ventana.document.close();  //cerramos el documento
	  	ventana.print();  //imprimimos la ventana
	  	ventana.close();  //cerramos la ventana
	 			}
	 			window.load =" ocultar()";
	</script>
</body>
</html>