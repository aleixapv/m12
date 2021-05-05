$( document ).ready(function() {

    function Previsualitzacio($exemple,$iconaXarxa,$enllac){
        $exemple.children().removeClass();
        $exemple.children().addClass($iconaXarxa.val());
        $exemple.attr('href',$enllac.val());
    }

    $nomXarxa = $('#nomXarxa');
    $iconaXarxa = $('#iconaXarxa');
    $formXarxa = $('#formXarxa' +" *");
    $exemple = $('#exemple');
    $enllac = $('#enllac');

    Previsualitzacio($exemple,$iconaXarxa,$enllac)

    $nomXarxa.keypress(function(){
        $iconaXarxa.val('fab fa-'+$nomXarxa.val());
    });
    
    $formXarxa.on("change keydown",function(){
        Previsualitzacio($exemple,$iconaXarxa,$enllac);
    });
});