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
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.csss">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/acercade/estilos-acercade.css">
	<link rel="stylesheet" type="text/css" href="css/estilos-landingpage.css">
	<link rel="stylesheet" type="text/javascript" href="ocultar">
	<link rel="shortcut icon" type="image/x-icon" href="imagenes/LandingPage/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/modales.css">
		<link rel="stylesheet" type="text/css" href="css/acercade/targetaspromo.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	
	
	<title> Galapangos Team | Oficial </title>
</head>
<body id="cuerpo" onload="ocultar()">
	<div class="animated fadeIn fuente">	
        
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
		<header class="header">
			<!--Logo y cintura del logo-->
			<div class="container">
				<img src="imagenes/LandingPage/isotipo_galmus.png" alt="Isotipo de Galmus" class="img-fluid" style="width: 22%; height: 22%; vertical-align: middle;">GalMus 
			</div>
		</header>

		<!--Barra de Navegación-->
		<nav id="barraNav" class="navbar sticky-top navbar-light" onload="ocultar()">
				<a id="elIndex" class="nav-link navp" href="indexx.php"> GalMus </a>
				<li class="nav-item dropdown listanav">
					<div class="nav-link dropdown-toggle" id="dropProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Productos </div>
					    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <li><a class="nav-link dropdown-item dropdounColores cn"  href="indexx.php#video" style="color:black;"> GalMus Software </a></li>
					    </ul>
				</li>
				<a id="noticias" class="nav-link" href="noticias.php"> Noticias </a>
				<a id="contactos" class="nav-link" href="#contact" onclick="mostrarC()"> Contacto </a>
				<a id="misiones" class="nav-link" href="#mision"> Misión </a>
				<a id="visiones" class="nav-link" href="#vision"> Visión </a>
				<form class="form-inline my-2 my-lg-0">
				    <input id="cajabuscar" class="form-control mr-sm-2" type="text" placeholder="Buscar">
				    <button id="btnbuscar" class="btn btn-outline-warning" type="submit">Buscar</button>
				</form>
				<button id ="btnregis" class="btn" type="button" data-toggle="modal" onclick="document.getElementById('id01').style.display='block'">
					<i class="fas fa-user fa-lg"></i>
					<strong>Sesión</strong>
				</button>
				<!--boton oculto para cuando el usuario se loguee jajajaj-->
				<li id="btnCuenta" class="nav-item dropdown listanav" style="display: none;">
					<div class="nav-link dropdown-toggle" id="dropCuentaUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i id="iconoBtnUser" class="fas fa-cog fa-spin"></i>Mi cuenta</div>
					    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <li><a class="nav-link dropdown-item dropdounColores" href="#"> Mis datos </a></li>
						    <div class="dropdown-divider"></div>
						    <li><a class="nav-link dropdown-item dropdounColores" href="#" style="font-size: 20px;">Cambiar clave</a></li>
					    </ul>
				</li>
    			<!--Barra para usuarios logueados.-->
        		<div id="barraPromo" class="container" style="display: none;">
        			<a id="bpartePromo_1" class="nav-link animated infinite pulse" href="#div-promociones" onclick="mostrar()" id="ind-promo"><i class="fas fa-certificate" onclick="mostrar()" href="#div-promociones" ></i> Mis promociones </a>
        			<a id="bpartePromo_2" class="nav-link animated infinite pulse" href="#descuentos" onclick="mdesc()" ><i class="fas fa-tags " data-fa-transform="rotate-260" 
        				href="#descuentos" onclick="mdesc()"></i> Descuentos</a>
        			<a id="regresarTodo" class="nav-link" href="usuarios/cerrar_sesion_users.php"><i class="fas fa-power-off"></i> Cerrar sesión </a>
        			<a id="bparteUserDatos_2" class="nav-link" href="#"><?php echo $_SESSION['nombres'].", ".$_SESSION['appat']."." ?></a>
        		</div>
		</nav>
		
		<main>
		   <br>
		   <div class="container">
    			<p class="animated infinite pulse anim-subrayado_piepa" style="font-size: 60px;">Hola, ¿cómo estás?</p>
    			<p style="font-size: 30px; text-align: justify;">Galmus, es una organización que trabaja día con día, mejorando y proponiendo nuevos retos y desafíos para contribuir al desarrollo del aprendizaje de los estudiantes de música, con el fin de que obtengan rápida y fácilmente los conocimientos necesarios reconocer, memorizar y diferenciar las notas musicales en partituras.</p>
		    </div><hr>
		    <!-- targeta de la empresa-->
			<div class="card">
   			 		 <div class="image">
  			  			  <img src="imagenes/acercaDeOrg/promociones/desarrollo.jpg" alt="desarrollo">
  			 		 </div>
  			 		 <div class="details">
  			    		<div class="center">
      			      		<h1> GalMus <br><span>Empresa lider en desarrollo</span></h1>
      			      		<p>El alcanze de cualquier objetivo,promogramas,paginas web,cursos.</p>
      			      		<ul>
       			       			<li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
      			      			<li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
       			      			<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
       			       			<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
        			     		<li><a href="#"><i class="fab fa-github-square"></i></a></li>
           					</ul>
    			  		</div>
    				 </div>
    				 <hr id="hr_form_regis">
  			</div><hr>
		    
			<!-- mision vision y objetivo-->
			<div id="gal-mus" onclick="ocultar()">
				<p  id="org" style="text-align: center; font-size: 70px;"> GalMus </p>
				<hr>
				<div class="container">
					<section class="row align-items-center justify-content-center">	
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>		
								<div class="container-fluid">
									<p class="anim-subrayado_piepa" id="mision">Misión</p>
									<li class="anim-subrayado_piepa" style="font-size: 20px; text-align: justify;">Formar parte comunidades, donde podamos distruibuir nuestro material de apoyo a las academias y escuelas de música, con el fin de que sus estudiantes y profesores puedan acortar el plazo y elevar la curva de aprendizaje, incrementando mucho su desarollo de habilidades para poder lograrlo.</li>			
								</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
							<div class="container-fluid">
								<p class="anim-subrayado_piepa" id="vision">Visión</p>
								<li class="anim-subrayado_piepa" style="font-size: 20px; text-align: justify;">Encontrar soluciones a problemas de aprendizaje y habilidades en los estudiantes de música, que nadie más sabe cómo resolver.</li >		
							</div>	
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
							<div class="container-fluid">
								<p class="anim-subrayado_piepa" id="objetivo">Objetivo </p>	
								<li class="anim-subrayado_piepa" style="font-size: 20px; text-align: justify;">Proponer nuevos retos y desafíos para contribuir al desarrollo del aprendizaje de los estudiantes de música, con el fin de que obtengan rápida y fácilmente los conocimientos necesarios reconocer, memorizar y diferenciar las notas musicales en partituras. </li>			
							</div>
						</div>
					</section>
				</div>
			</div><hr>

			<!--Ubicacion Mapa de UPVM-->
			<div class="ubicacion" id="galmus-ubicacion">
				<p id="mapitag" class="ubicacion anim-subrayado_piepa" style="font-size: 60px;">Ubicación</p>
				<iframe class="formulario" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3757.640262116587!2d-99.12803588552183!3d19.64267158676529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f43e59c00a9f%3A0xe3c992b6aa422e2c!2sUniversidad+Polit%C3%A9cnica+del+Valle+de+M%C3%A9xico!5e0!3m2!1ses-419!2smx!4v1521332578993" width="1000 auto" height="600 auto" frameborder="0" style="border:5" allowfullscreen></iframe>
			</div>
			
			<!--Información sobre los desarolladores-->
			<div class="container-fluid" onclick="ocultar()" >
				<br>
				<p id="temaprinci" class="anim-subrayado_piepa"> Nuestro equipo de desarrolladores</p>
				<div class="container">
					<section class="row align-items-center justify-content-center">	
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
							<!--Pedro-->
							<div class="container-fluid">
								<a class="peter"  href="#"  title="Galmus Isotipo">
									<img src="imagenes/acercaDeOrg/persona.png" class="img-fluid imgnota peter" alt="peter rivers">
								</a>
							</div>
								<hr>
								<p class="nombresdeve anim-subrayado_piepa "><a href="#Pedro">Pedro Erick RG.</a>  </p><br>
						</div>

						<!--Victor-->
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
							<div class="container-fluid">
								<a class="vic"  href="#"  title="Galmus Isotipo">
									<img src="imagenes/acercaDeOrg/persona.png" class="img-fluid imgnota vic" alt="VisualYukkie">
								</a>
							</div><hr>
							<p class="nombresdeve anim-subrayado_piepa"><a href="#Victor">Víctor Vicente Mtz.</a> </p><br>
						</div>

						<!--Pug Alejandro-->
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
							<div class="container-fluid">
								<a class="ale"  href="#"  title="Galmus Isotipo">
									<img src="imagenes/acercaDeOrg/persona.png" class="img-fluid imgnota ale" alt="Pug">
								</a>
							</div><hr>
							<p class="nombresdeve anim-subrayado_piepa" > <a href="#Alejandro" >Alejandro Medina A.</a></p><br>
						</div>
					</section>
				</div>
			</div>	

			<!-- contacto-->	
			<div  id="contact"  style="text-align: center;" >
				<h1  class="fomulario anim-subrayado_piepa">Formulario de contacto</h1>
				<div>
					<h1 for="name"  class="fomulario t">Nombre:</h1> 
					<input type="text" id="noms"  class="fomulario forma-i" placeholder="Nombre"  onkeypress="return soloLetras(event)">
					
					<h1 for="name" class="fomulario t">Apellido Materno:</h1> 
					<input type="text" id="apmterno"class=" forma-i" id="name" placeholder="Apellido Materno" onkeypress="return soloLetras(event)">

					<h1 h2for="name"  class="fomulario t">Apellido Paterno:</h1> 
					<input type="text" id="apterno"  class=" forma-i" placeholder="Apellido Paterno" onkeypress="return soloLetras(event)">		

					<h1 for="email" class="fomulario t">Email:</h1> 
					<input type="text" id="email"   class=" forma-i" placeholder="Ingrese su email">

					<h1 for="message" class="fomulario t">Mensaje:</h1> 
					<textarea id="message" class="fomulario" placeholder="¿Cuál es su comentario?"></textarea>
					<br><br>
					<input type="submit" class="btn btn-outline-warning forma-i" id="enviar" value="Enviar comentario">
				</div>
			</div>
		</main>
		
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

								    <label class="control-label col-xs-12 centrado" >
								    	<strong>Nombre(s):</strong>
								    	<span class="req">*</span>
								    </label>
								 	<input title="Se necesita su Nombre" type="text" required minlenght="1" class="ent-modal estilosinputs form-control" id="nombre" maxlength="30" placeholder=" Nombre" onkeyup = "sinMayusAcento(this)" name="nombres" style="width:100%"><br>

								    <label class="control-label col-xs-12 centrado">
								    	<strong>Apellido Paterno:</strong>
								    	<span class="req">*</span>
								    </label>
								    <input title="Se necesita su Apellido Parteno" type="text" required minlenght="5" maxlength="50" class="ent-modal estilosinputs form-control"  id="apPat" placeholder=" Paterno" onkeyup = "sinMayusAcento(this)" name="apellidopat" style="width:100%"><br>

								    <label class="control-label col-xs-12 centrado">
								    	<strong>Apellido Materno:</strong>
								    	<span class="req">*</span>
								    </label>
								    <input title="Se necesita su Apellido Materno" type="text" required minlenght="5" maxlength="50" class="ent-modal estilosinputs form-control"  id="apMat" placeholder=" Materno" onkeyup = "sinMayusAcento(this)" name="apellidomat" style="width:100%"><br>

								    <label class="control-label col-xs-12 centrado">
								    	<strong>Correo Electrónico:</strong>
								    	<span class="req">*</span>
								    </label>
								 	<input title="Se necesita su Correo Electrónico" required class="ent-modal estilosinputs form-control" type="email" minlenght="1" maxlength="30" id="correoElect" placeholder=" Correo Electrónico" name="correo" style="width:100%"><br>

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
									<select type="text" required class="ent-modal estilosinputs form-control" placeholder=" Ocupación " id="listaOpcion" name="ocupacion" style="width:100%; height:45px;">
									</select><br>

								   <label class="control-label col-xs-12 centrado">
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
    
		<!--modales del equipo-->
		<div id="Pedro" class="modalDialog">
			<div>
			    <a href="#close" title="Close" class="close">X</a>
				<h2 class="anim-subrayado_piepa">Ing.Pedro Erick Ríos García</h2>
				<ol>
					<ul id="lista"><strong>Ing. en Informática.</strong></ul>
					<ul> <strong>Conocimientos:</strong> </ul>
					<ul>HTML 5</ul>
					<ul>Java Script</ul>
					<ul>CSS 3</ul>
					<ul>Java SE</ul>
					<ul>Java EE</ul>
					<ul>Bases de datos: MySQL & ORACLE</ul>
					<ul>Certificacion en redes * Cisco CCNA 2 *</ul>
					<ul><strong>Curso de inglés en LaSalle College</strong></ul>
				</ol>
			</div>
		</div>
		<div id="Victor" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h2 class="anim-subrayado_piepa">Ing.Víctor Vicente Martínez Martínez</h2>
				<ol>
					<ul id="lista"><strong>Ing. en Informática.</strong></ul>
					<ul> <strong>Conocimientos:</strong> </ul>
					<ul>HTML 5</ul>
					<ul>Java Script</ul>
					<ul>CSS 3</ul>
					<ul>Java SE</ul>
					<ul>Java EE</ul>
					<ul>Bases de datos: MySQL & ORACLE</ul>
					<ul>Certificacion en redes * Cisco CCNA 2 *</ul>
					<ul><strong>Curso de inglés en LaSalle College</strong></ul>
				</ol>
			</div>
		</div>
		<div id="Alejandro" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h2 class="anim-subrayado_piepa">Ing.Alejandro Medina A.</h2>
				<ol>
					<ul><strong>Ing. en Informática</strong></ul>
					<ul> <strong>Conocimientos:</strong> </ul>
					<ul>HTML 5</ul>
					<ul>Java Script</ul>
					<ul>CSS 3</ul>
					<ul>Java SE</ul>
					<ul>Java EE</ul>
					<ul>Bases de datos: MySQL & ORACLE</ul>
					<ul>Certificacion en redes * Cisco CCNA 2 *</ul>
				</ol>
			</div>
		</div>
		
		<!--Promociones-->
        <aside class="container-fluid " id="div-promociones">
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
        	</aside>
		
		<!-- descuentos -->
	    <aside id="descuentos">
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
		</aside><br>

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
			            <li><a class="enlacespie" href="#"  data-toggle="modal" data-target="#privacidad">Declaración de Privacidad</a></li>
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
							&copy; Todos los derechos reservados. 2018 - Galapangos Team Inc. 
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
 	<!--aqui son del peter-->
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
		              		$("#barraPromo").css("display","block");
		              		$("#btnCuenta").css("display","block");
		              		$("#elIndex").attr("href","indexx.php?most=y");
		              		$("#noticias").attr("href","noticias.php?most=y");
              }
            }
            function devolverTodo(){//para al cerrar sesion, volver todo a la normmalidad.
            		   $("#regresarTodo").click(function(){
    						$("#btnregis").css("display","block");
                  			$("#barraPromo").css("display","none");
                  			$("#btnCuenta").css("display","none");
                  			$("#elIndex").attr("href","indexx.php");
                  			$("#noticias").attr("href","noticias.php");
            		   });
            }
    </script>
    <!--scripts del pug no documentados.-->
    <script type="text/javascript">
	    /*solo letras*/
	 	function soloLetras(e){
	       
	       key = e.keyCode || e.which;
	       tecla = String.fromCharCode(key).toLowerCase();
	       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	       especiales = "8-37-39-46";
	       tecla_especial = false;

       	    for(var i in especiales){
            	if(key == especiales[i]){
                	tecla_especial = true;
                	break;
            	}
        	}

        	if(letras.indexOf(tecla)==-1 && !tecla_especial){
            	return false;
        	}
    	}
	    /*ocultar  forma de registro*/
	    
	 	function mostrar(){
	    	document.getElementById("contact").style.display="block";
		}
    </script>
   	<script type="text/javascript">
		//ocultar promociones
		function ocultar(){
    	document.getElementById("div-promociones").style.display="none";
    	document.getElementById("descuentos").style.display="none";
    	document.getElementById("contact").style.display="none";
        }
		//mostrar promociones
 		function mostrar(){
    	document.getElementById("div-promociones").style.display="block";
    
		}
		function mostrarC(){
    	document.getElementById("contact").style.display="block";
    
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