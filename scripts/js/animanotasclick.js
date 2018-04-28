$("#cuerpo").on("click",function(event) {
        var $notasboom = $("<div><img src='imagenes/LandingPage/partituras.svg' class='nota_1' alt='partituras'></div>");
        $notasboom.addClass("notasboom")
        $notasboom.addClass("animated fadeOutUp")
        .css("position", "absolute")
        .css("top", event.pageY + "px")
        .css("left", event.pageX + "px")
        $notasboom.appendTo("body");
    });

$("#cuerpo").on("click",function(event) {
        var $notasboom = $("<div><img src='imagenes/LandingPage/partituras.svg' class='nota_2' alt='partituras'></div>");
        $notasboom.addClass("notasboom")
        $notasboom.addClass("animated fadeOutDown")
        .css("position", "absolute")
        .css("top", event.pageY + "px")
        .css("left", event.pageX + "px")
        $notasboom.appendTo("body");
    });

$("#cuerpo").on("click",function(event) {
        var $notasboom = $("<div><img src='imagenes/LandingPage/partituras.svg' class='nota_3' alt='partituras'></div>");
        $notasboom.addClass("notasboom")
        $notasboom.addClass("animated fadeOutLeft")
        .css("position", "absolute")
        .css("top", event.pageY + "px")
        .css("left", event.pageX + "px")
        $notasboom.appendTo("body");
    });
