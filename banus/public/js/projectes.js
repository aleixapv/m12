function afegirDivImatge(i,$imatges,$divImatges){
    var $img= $('<img>').addClass('imatge card-img-top ').attr('style','width: 12rem; height: 8rem;');
    let nom = $imatges[0].files[i].name;
    if(nom.length > 15){
        nom = nom.substr(0,13);
        nom = nom + '...';
    }
    $divImatges.append(
        $('<div>').addClass('card border noOriginal').attr('style','width: 12rem; height: 12rem;').append(
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
function enumerarImatges($numeros){
    $numeros.each(function(e){
        $(this).html(e+1);
    });
}
$( document ).ready(function(){
    CKEDITOR.replace( 'descripcio_detallada');


    nanospell.ckeditor('descripcio_detallada',{
        dictionary : "ca",  // 24 free international dictionaries  
        server : "php"      // can be php, asp, asp.net or java
    }); 

    /*CKEDITOR.replace( 'descripcio_breu');


    nanospell.ckeditor('descripcio_breu',{
        dictionary : "ca",  
        server : "php"      
    });*/



    //objectes
    let $comprovar = $('#comprovar');
    let $error = $('#error');
    let $divExemple = $('#divExemple');

    let $titol = $('#titol');
    //let $descripcio_breu = $('#descripcio_breu');//CKEDITOR.instances.descripcio_breu.getData();
    let $descripcio_detallada = $('#descripcio_detallada');//CKEDITOR.instances.descripcio_detallada.getData(); //$('#descripcio_detallada');
    let $categories = $('.categories');
    let $imatges = $('#imatges');
    let $divImatges = $('#divImatges');

    let $tiolExemple = $('.text_titulo');
    let $localitzacioExemple = $('#localitzacioExemple');
    //let $breuExemple = $('#breuExemple');
    let $detalladaExemple = $('.detalladaExemple');
    let $primeraImg = $('.primeraImg');

    let $olIndicadors =$('#olIndicadors');
    let $slidesDiv =$('#slidesDiv');

    let $instruccionsImatges = $('#instruccionsImatges');

    
    //listeners
    $comprovar.click(function(){
        //$descripcio_breu.val(CKEDITOR.instances.descripcio_breu.getData()); 
        $descripcio_detallada.val(CKEDITOR.instances.descripcio_detallada.getData()); //$('#descripcio_detallada');
        console.log(CKEDITOR.instances.descripcio_detallada.getData());
        if(!$titol.val() == '' &&  !$categories.val() == '' && !$descripcio_detallada == '' /*&& !$descripcio_breu == ''*/){
            $tiolExemple.html($titol.val());
            //$breuExemple.html(CKEDITOR.instances.descripcio_breu.getData());
            $detalladaExemple.html(CKEDITOR.instances.descripcio_detallada.getData());
            
            if(!$( "#selecProvincia option:selected" ).text() == '' && !$( "#selecPoblacio option:selected" ).text() == '' && !$( "#selecCp option:selected" ).text() == ''){
                $localitzacioExemple.html($( "#selecPoblacio option:selected" ).text()+', '+$( "#selecProvincia option:selected" ).text());
            }else{
                $localitzacioExemple.empty();
            }
            $slidesDiv.empty();
            $olIndicadors.empty();
            $('.imatge').each(function(e){
                console.log($(this));
                
                if(e == 0){
                    $primeraImg.attr('src',$(this).attr('src'));
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
        $('.noOriginal').remove();
        for(let i = 0; i < $imatges[0].files.length; i++){
            afegirDivImatge(i,$imatges,$divImatges);
        }
    });
    addEventListener('dragover',function(){
        enumerarImatges($('.numero'));
    });
    $("#form" + " *").keypress(function() {
        console.log('entro');
        //$breuExemple.html(CKEDITOR.instances.descripcio_breu.getData());
        $detalladaExemple.html(CKEDITOR.instances.descripcio_detallada.getData());
    });
    $('.eliminar').click(function(){
        $eliminar = $(this);
        if(confirm('Estas segur?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "destroy/imatge",
                method: "DELETE",
                data: {
                    "idImatge": $(this).attr('idImatge'),
                    "idProjecte": $(this).attr('idProjecte'),
                }
            }).done(function(request) {
                if(request == 0){
                    alert('No pots deixar sense imatges un projecte.');
                }else{
                    $eliminar.parent().parent().parent().remove();
                    enumerarImatges($('.numero'));
                }
               
            });
        }  
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
    

    enumerarImatges($('.numero'));
});