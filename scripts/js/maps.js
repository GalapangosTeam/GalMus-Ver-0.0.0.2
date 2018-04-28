function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
}

/*VENTANA MODAL*/
document.getElementsByClassName("enlaceOpcion")[0].click();

function opcModal(evt, opcion) {
  var i, x, enlaceOpcion;
  x = document.getElementsByClassName("opcion");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  enlaceOpcion = document.getElementsByClassName("enlaceOpcion");
  for (i = 0; i < x.length; i++) {
    enlaceOpcion[i].classList.remove("w3-light-grey");
  }
  document.getElementById(opcion).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
/* CALENDARIO PARA REGISTRO*/

$('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
});