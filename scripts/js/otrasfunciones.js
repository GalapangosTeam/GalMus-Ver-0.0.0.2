
//Funcion que muestra ocupaciones de acuerdo al genero seleccionado.
function genOcupacion(opc) { 
	var x = document.getElementById("listaOpcion");
	var opcion1 = document.createElement("option");
	var opcion2 = document.createElement("option");
	var opcion3 = document.createElement("option");
	var opciones=["Maestro", "Estudiante de Musica", "Otro", "Maestra", "Estudiante de Musica", "Otra"]
	//Metodo para limpiar la lista de opciones
	while (x.length > 0) {
    	x.remove(x.length-1);
	}
	  if(opc==1) { //Al seleccionar Masculino en el input de tipo Radio inserta las opciones a la lista.
	    	   	opcion1.text = opciones[0];
    			x.add(opcion1);
    			opcion2.text = opciones[1];
    			x.add(opcion2);
    			opcion3.text = opciones[2];
    			x.add(opcion3);
	  }else if(opc==2){ //Al seleccionar Femenino en el input de tipo Radio inserta las opciones a la lista.
	    		opcion1.text = opciones[3];
    			x.add(opcion1);
    			opcion2.text = opciones[4];
    			x.add(opcion2);
    			opcion3.text = opciones[5];
    			x.add(opcion3);	   
	  }else{
	  	console.log("ERROR AL SELECCIONAR UN GENERO")
	  }
}

//Funcion que mide la complejidad de la contraseña
$(function() {
  var pruebas = $(".pruebas"),
    nivelesColores = $("#nivelesColores"),
    boton = $("button"),
    inputs = $("input"),
    inputClaveActual = $("#priCla"),
    inputRepetirClaveActual = $("#repetirClaveActual"),
    fieldset = $("fieldset"),
    nivel;
 //Metodo con el cual mide la seguridad de la contraseña ingresada de acuerdo a 4 condiciones.
  function devuelveNivel(esteInput, evento) {
    var nivelBajo = 8,
      nivelMedio = 12,
      nivelAlto = 15,
      numCaracteres = esteInput.val().length,
      estaId = esteInput.attr("id"),
      espanNivelesColores = $(".spanNivelesColores");
    evento.stopPropagation();
    if (estaId === "priCla") {
      if (numCaracteres > 0 && numCaracteres < nivelBajo) {
        nivel = "bajo";
                espanNivelesColores.removeClass().addClass("spanNivelesColores bajo");        
      } 
      else if (numCaracteres >= nivelBajo && numCaracteres < nivelMedio) {
        nivel = "medio";
                espanNivelesColores.removeClass().addClass("spanNivelesColores medio"); 
      } 
      else if (numCaracteres >= nivelMedio && numCaracteres < nivelAlto) {
        nivel = "alto";
                espanNivelesColores.removeClass().addClass("spanNivelesColores alto"); 
      } 
      else if (numCaracteres >= nivelAlto) {
        nivel = "muy alto";
                espanNivelesColores.removeClass().addClass("spanNivelesColores muyAlto");
      }
      if (numCaracteres === 0) {
        espanNivelesColores.removeClass().addClass("spanNivelesColores");
      }
    }
  }

  //Metodo con el cual al momento de ingresar un caracter en el campo de contraseña se detecta el caracter y manda a llamar el metodo 'devuelveNivel'
  $(document).on('keyup', 'input', function(e) {
    var nivelSeg = $("#nivelseguridad");
    devuelveNivel($(this), e);
    nivelSeg.html(nivel);
  });
});
 
 //Metodo con el cual al momento de dar clic en el campo te muestra un calendario
$('.fecNac').datepicker({
    format: "yyyy-mm-dd",
    language: "es"
});

$("#segCla").keyup(function(){
    var contra1 = $('#priCla').val();
    var contra2 = $('#segCla').val();
    if (contra1 == contra2) {
        console.log("VALIDO");
        $("#segCla").css("border-color","green");
        $("#tel").removeAttr('disabled'); 
    } else {
    	 $("#segCla").css("border-color","red");
    }
});
//Funcion en la cual se quitan acentos o caracteres, ademas de convertir a mayusculas las letras
function sinMayusAcento(x){
    var cadena=x.value;
    cadena = cadena.replace(/[aááàäâå]/, 'a');//Letra a
    cadena = cadena.replace(/[eééèëê]/, 'e');//Letra e
    cadena = cadena.replace(/[iííìïî]/, 'i');//Letra i
    cadena = cadena.replace(/[oóóòöô]/, 'o');//Letra o
    cadena = cadena.replace(/[uúúùüû]/, 'u');//Letra u
    cadena = cadena.replace(/[yýýÿ]/, 'y');//Letra y
    cadena = cadena.replace(/[cç]/, 'c');//Letra c
    cadena = cadena.replace(/(_)$/, '');
    cadena = cadena.replace(/(-)$/, '');
    cadena = cadena.replace(/^(_)/, '');
    x.value=cadena.toUpperCase()
}
//Metodo que al momento de abrir la ventana modal se bloquean todas las opciones a excepción del primer campo. 
function bloquearFormulario(){
	$("#apPat").attr('disabled','disabled')//Se bloquea el campo de Apellido Paterno.
	$("#apMat").attr('disabled','disabled')//Se bloquea el campo de Apellido Materno.
	$("#correoElect").attr('disabled','disabled')//Se bloque el campo de Correo Electronico.
	$("#priCla").attr('disabled','disabled')//Se bloquea el campo de la Primer contraseña.
	$("#segCla").attr('disabled','disabled')//Se bloquea el campo de la Segunda contraseña.
	$("#tel").attr('disabled','disabled')//Se bloquea el campo de Telefono.
	$("#genero").attr('disabled','disabled')//Se bloquea las 2 opciones de Genero.
	$("#listaOpcion").attr('disabled','disabled')//Se bloquea el campo de Ocupación.
	$("#edad").attr('disabled','disabled')//Se bloquea el campo de Edad.
	$("#acepto").attr('disabled','disabled')//Se bloquea el campo de Edad.
	$("#registroUsuarios").attr('disabled','disabled')//Se bloquea el boton de Enviar.
}
/* Metodos para habilitar el campo siguiente*/
$("#nombre").focusout(function(){
	var campo = document.getElementById("nombre").value;
	if (campo.length>=3) {
		$("#apPat").removeAttr('disabled');
		$("#nombre").css("border-color","green");
	}else{
		$("#nombre").css("border-color","red");
		$("#apPat").attr('disabled','disabled');
	}
});
$("#apPat").focusout(function(){
	var campo = document.getElementById("apPat").value;
	if (campo.length>=3) {
		$("#apMat").removeAttr('disabled');
		$("#apPat").css("border-color","green");
	}else{
		$("#apPat").css("border-color","red");
		$("#apMat").attr('disabled','disabled')
	}
});
$("#apMat").focusout(function(){
	var campo = document.getElementById("apMat").value;
	if (campo.length>=3) {
		$("#correoElect").removeAttr('disabled');
		$("#apMat").css("border-color","green");
	}else{
		$("#apMat").css("border-color","red");
		$("#correoElect").attr('disabled','disabled');
	}
});
$("#correoElect").focusout(function(){
   	var campo = document.getElementById("correoElect").value;
	if (campo.length>=5) {
		$("#priCla").removeAttr('disabled');
		$("#correoElect").css("border-color","green");
	}else{
		$("#correoElect").css("border-color","red");
		$("#priCla").attr('disabled','disabled');
	}
});
$("#priCla").focusout(function(){
    var campo = document.getElementById("priCla").value;
	if (campo.length>=8) {
		$("#segCla").removeAttr('disabled');
		$("#priCla").css("border-color","green");
	}else{
		$("#priCla").css("border-color","red");
		$("#segCla").attr('disabled','disabled')
	}
});
$("#segCla").focusout(function(){
    var campo = document.getElementById("segCla").value;
	if (campo.length>=8) {
		$("#fecNac").removeAttr('disabled');
		$("#tel").removeAttr('disabled');
		$("#edad").removeAttr('disabled');
		$("#segCla").css("border-color","green");
	}else{
		$("#segCla").css("border-color","red");
		$("#fecNac").attr('disabled','disabled')
	}
});
$("#tel").focusout(function(){
		$("#genero").removeAttr('disabled');
   		$("#edad").removeAttr('disabled');
});
$("#genero").focusout(function(){
   $("#listaOpcion").removeAttr('disabled');
});
/*$("#listaOpcion").focusout(function(){
   $("#edad").removeAttr('disabled');
});*/
$("#edad").focusout(function(){
    var campo = document.getElementById("segCla").value;
	if (campo.length>=1) {
		$("#acepto").removeAttr('disabled');
		$("#edad").css("border-color","green");
	}else{
		$("#edad").css("border-color","red");
	}
});
$("#acepto").focusout(function(){
   $("#registroUsuarios").removeAttr('disabled');
});

