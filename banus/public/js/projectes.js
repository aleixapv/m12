$( document ).ready(function(){

    let $comprovar = $('#comprovar');
    let $error = $('#error');
    let $divExemple = $('#divExemple');

    let $titol = $('#titol');
    let $descripcio_breu = $('#descripcio_breu');
    let $descripcio_detallada = $('#descripcio_detallada');
    let $categories = $('#categories');
    let $imatges = $('#imatges');
    let $divImatges = $('#divImatges');

    let $tiolExemple = $('#text_titulo');
    let $localitzacioExemple = $('#localitzacioExemple');
    let $breuExemple = $('#breuExemple');
    let $detalladaExemple = $('.detalladaExemple');

    let $olIndicadors =$('#olIndicadors');
    let $slidesDiv =$('#slidesDiv');
    let $indicador =$('<li>').attr('data-targe',"data-target='#carousel-example-1z'");
    //<li data-target="#carousel-example-1z" data-slide-to="0"   class="active"></li>


    for(let i = 0; i < $imatges[0].files.length; i++){
        $divImatges.append($('<img>').attr('width',100).attr('height',100));
        var reader = new FileReader();
        reader.onload = function (e) {
            $divImatges.children().last().attr('src', e.target.result);
        }
        reader.readAsDataURL($imatges[0].files[i]);
    }
    $imatges.change(function(){
        for(let i = 0; i < $(this)[0].files.length; i++){
            $divImatges.append($('<img>').attr('width',100).attr('height',100));
            var reader = new FileReader();
            reader.onload = function (e) {
                $divImatges.children().last().attr('src', e.target.result);
            }
            reader.readAsDataURL($(this)[0].files[i]);
        }
        
    });

    $comprovar.click(function(){
        if(!$titol.val() == '' && !$descripcio_breu.val() == '' && !$descripcio_detallada.val() == '' && !$categories.val() == '' && !$imatges.val() == ''){
            $tiolExemple.html($titol.val());
            $breuExemple.html($descripcio_breu.val());
            $detalladaExemple.html($descripcio_detallada.val());
            if(!$( "#selecProvincia option:selected" ).text() == '' && !$( "#selecPoblacio option:selected" ).text() == '' && !$( "#selecCp option:selected" ).text() == ''){
                $localitzacioExemple.html($( "#selecProvincia option:selected" ).text()+$( "#selecPoblacio option:selected" ).text()+$( "#selecCp option:selected" ).text());
            }
            $error.attr('hidden',true);
 
            $divExemple.attr('hidden',false);
        }else{
            $error.attr('hidden',false);
            $('html, body').animate({ scrollTop: 0 }, 'fast');
        }
    });

    

    $('.eliminar').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "destroy/imatge",
            method: "DELETE",
            data: {
                "id": $(this).attr('idImatge'),
            }
        }).done(function(request) {
           console.log(request['resposta']);
           $(this).parent().remove();
        });
    });
});