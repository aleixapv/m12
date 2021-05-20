$('document').ready(function(){
    let x = $('#map').attr('x');
    let y = $('#map').attr('y');
    var map = L.map('map').
    setView([y, x],
    15);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Localització de la Fusteria Banus',
    maxZoom: 18
    }).addTo(map);
    L.control.scale().addTo(map);
    L.marker([y, x],{draggable: false}).addTo(map);




});
