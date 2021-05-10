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

    for(let i = 0; i < $imatges[0].files.length; i++){
        $divImatges.append($('<div>').addClass('container border row').append(
            $('<div>').addClass('col-4').append($('<img>').attr('width',100).attr('height',100).addClass('imatge'))
        ).append(
            $('<div>').addClass('col-4').append($imatges[0].files[i].name)
        ).append(
            $('<div>').addClass('col-4').append($('<i>').addClass("far fa-hand-rock"))
        ));
        var reader = new FileReader();
        reader.onload = function (e) {
            $div= $divImatges.children().first();
            $divDeLaImatge = $div.children().first();
            $divDeLaImatge.children().first().attr('src', e.target.result);
        }
        reader.readAsDataURL($imatges[0].files[i]);
    }

    
    $imatges.change(function(){
        $divImatges.empty();
        for(let i = 0; i < $imatges[0].files.length; i++){
            $divImatges.append($('<div>').addClass('container border row').append(
                $('<div>').addClass('col-4').append($('<img>').attr('width',100).attr('height',100).addClass('imatge'))
            ).append(
                $('<div>').addClass('col-4').append($imatges[0].files[i].name)
            ).append(
                $('<div>').addClass('col-4').append($('<i>').addClass("far fa-hand-rock"))
            ));
            readURL(input,exemple)
            var reader = new FileReader();
            
             

            reader.onload = function (e) {
                $div= $divImatges.children().first();
                $divDeLaImatge = $div.children().first();
                $divDeLaImatge.children().first().attr('src', e.target.result);
            }

            reader.readAsDataURL($imatges[0].files[i]);

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