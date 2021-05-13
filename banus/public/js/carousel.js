$( document ).ready(function() {
    let $novaDiapositiva = $('#novaDiapositiva');
    let $formCrearDiapositiva = $('#formCrearDiapositiva');
    let $novaDiapositivaCancellar = $('#novaDiapositivaCancellar');

    $novaDiapositiva.click(function(){
        $(this).attr('hidden', true);
        $formCrearDiapositiva.attr('hidden', false);
        $novaDiapositivaCancellar.attr('hidden', false);
    });

    $novaDiapositivaCancellar.click(function(){
        $(this).attr('hidden', true);
        $formCrearDiapositiva.attr('hidden', true);
        $novaDiapositiva.attr('hidden', false);
    });

});