$( document ).ready(function() {

    $error = $('#error');
    
    $nomXarxa = $('#nomXarxa');
    $iconaXarxa = $('#iconaXarxa');
    $enllac = $('#enllac');

    $comprovar = $('#comprovar');

    $divExemple = $('#divExemple');
    $exemple = $('#exemple');
    
    
    
    $nomXarxa.keypress(function(){
        $iconaXarxa.val('fab fa-'+$nomXarxa.val().toLowerCase());
    });
    

    $comprovar.click(function(){
        if(!$nomXarxa.val() == '' && !$iconaXarxa.val() == '' && !$enllac.val() == ''){
            $error.attr('hidden',true);
            $exemple.children().removeClass();
            $exemple.children().addClass($iconaXarxa.val());
            $exemple.attr('href',$enllac.val());
            $divExemple.attr('hidden',false);

        }else{
            $error.attr('hidden',false);
        }
        
    });
});