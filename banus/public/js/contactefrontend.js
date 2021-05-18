$('document').ready(function(){
    var map = L.map('map').
    setView([41.3490296, 1.7092969],
    15);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: 'Localització de la Fusteria Banus',
maxZoom: 18
}).addTo(map);
L.control.scale().addTo(map);
L.marker([41.3490296, 1.7092969],{draggable: false}).addTo(map);




});
