$('document').ready(function(){
    var map = L.map('map').
    setView([41.66, -4.72],
    15);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
maxZoom: 18
}).addTo(map);
L.control.scale().addTo(map);
L.marker([41.66, -4.71],{draggable: false}).addTo(map);


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "contacte/route",
        method: "GET",
    }).done(function(request) {
    console.log(request['long']);
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        alert( 'Error!!' );
    });
});
