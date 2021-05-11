function afegirDivImatge(i,$imatges,$divImatges){
    var $img= $('<img>').addClass('imatge card-img-top ').attr('style','width: 12rem; height: 8rem;');
    let nom = $imatges[0].files[i].name;
    if(nom.length > 15){
        nom = nom.substr(0,13);
        nom = nom + '...';
    }
    $divImatges.append(
        $('<div>').addClass('card border').attr('style','width: 12rem; height: 12rem;').append(
            $img
        ).append(
            $('<input>').attr('type','number').attr('hidden',true).attr('name','imatgesOrdre[]').val(i)
        ).append(
            $('<div>').addClass('card-body').append(
                $('<p>').addClass('card-text').html(nom).prepend(
                    $('<b>').addClass('ml-1 mr-1 numero').html(i+1)
                )
            )
        )
    );
    var reader = new FileReader();
    reader.onload = function (e) {
       
        $img.attr('src', e.target.result);
    }
    reader.readAsDataURL($imatges[0].files[i]);
}
$( document ).ready(function(){
    //objectes
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

    let $instruccionsImatges = $('#instruccionsImatges');
    
    //listeners
    $comprovar.click(function(){
        if(!$titol.val() == '' && !$descripcio_breu.val() == '' && !$descripcio_detallada.val() == '' && !$categories.val() == '' && !$imatges.val() == ''){
            $tiolExemple.html($titol.val());
            $breuExemple.html($descripcio_breu.val());
            $detalladaExemple.html($descripcio_detallada.val());
            if(!$( "#selecProvincia option:selected" ).text() == '' && !$( "#selecPoblacio option:selected" ).text() == '' && !$( "#selecCp option:selected" ).text() == ''){
                $localitzacioExemple.html($( "#selecProvincia option:selected" ).text()+$( "#selecPoblacio option:selected" ).text()+$( "#selecCp option:selected" ).text());
            }
            $slidesDiv.empty();
            $olIndicadors.empty();
            $('.imatge').each(function(e){
                console.log($(this));
                
                if(e == 0){
                    $slidesDiv.append(
                        $('<div>').addClass('carousel-item active').append(
                            $('<img>').attr('src',$(this).attr('src')).addClass('d-block img-fluid').attr('width',900).attr('height',450)
                        )
                    );
                    $olIndicadors.append(
                       
                        $('<li>').attr('data-target','#carousel-example-1z').attr('data-slide-to',e).addClass('active')
                
                    );
                }else{
                    $slidesDiv.append(
                        $('<div>').addClass('carousel-item').append(
                            $('<img>').attr('src',$(this).attr('src')).addClass('d-block img-fluid').attr('width',900).attr('height',450)
                        )
                    );
                    $olIndicadors.append(
                        
                        $('<li>').attr('data-target','#carousel-example-1z').attr('data-slide-to',e)
                        
                    );
                }
                
            });
            $error.attr('hidden',true);
 
            $divExemple.attr('hidden',false);
        }else{
            $error.attr('hidden',false);
            $('html, body').animate({ scrollTop: 0 }, 'fast');
        }
    });
    $imatges.change(function(){
        $instruccionsImatges.attr('hidden',false);
        $divImatges.empty();
        for(let i = 0; i < $imatges[0].files.length; i++){
            afegirDivImatge(i,$imatges,$divImatges);
        }
    });
    addEventListener('dragover',function(){
        $numeros = $('.numero');
        $numeros.each(function(e){
            $(this).html(e+1);
        });
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
    
    //al carregar
    for(let i = 0; i < $imatges[0].files.length; i++){
        let $inputInvisible = $('<input>').attr('hidden',true).attr('type','file');
        $inputInvisible[0].files[0] = $imatges[0].files[i];
        afegirDivImatge(i,$imatges,$divImatges);
    }
    if($divImatges.children().length > 0){
        $instruccionsImatges.attr('hidden',false);
    }  
});