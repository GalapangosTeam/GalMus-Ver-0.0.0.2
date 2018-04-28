$(window).on("load", function (e) {
    colaEfectos();
});
function colaEfectos(){
	var $agregarbienve = $("#bienve");
	var $holi = $("#holi");
	var $infoUno = $("#infoUno");
	var $inten = $("#intentar");
	$("#galmuss").addClass("animated fadeInLeft").delay(5000);
	setTimeout(function() {
        $("#galmuss").removeClass("animated fadeInLeft");
        $("#galmuss").addClass("animated bounce");
    }, 950);
    setTimeout(function() {
        $("#galmuss").removeClass("animated bounce");
        $("#galmuss").addClass("animated flipOutX");
    }, 1800);
    setTimeout(function() {
        $("#galmuss").removeClass("animated flipOutX");
        $("#galmuss").addClass("animated flipInX");
    }, 3000);
    setTimeout(function() {
      	$agregarbienve.append("<h1 class='text-center animated bounceInDown' style='font-size: 55px;'>¡ Bienvenido !</h1>");
    }, 3000);
    setTimeout(function() {
      	$holi.css("display","block");
      	$holi.addClass("animated fadeIn");
    }, 4500);
    setTimeout(function() {
	    $infoUno.css("display","block");
	    $infoUno.addClass("animated fadeIn");
    }, 5000);
    setTimeout(function() {
	    $inten.css("display","block");
	    $inten.addClass("animated fadeIn");
    }, 5600);
}

$("#botonentrar").click(function levantarCortinas(event){
	$(".parte_1").addClass("animated fadeOutUp");
	$(".btnAbrirLanding").addClass("animated fadeOut");
	$(".parte_2").addClass("animated fadeOutDown");
	$('<meta http-equiv="refresh" content="0.5;url=indexx.php"/>').appendTo($('head'));;
});

$("#cuerpo").click(function entrarIndex(event){
	$('<meta http-equiv="refresh" content="0;url=indexx.php"/>').appendTo($('head'));;
});
