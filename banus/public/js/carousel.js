$( document ).ready(function() {
    CKEDITOR.replace( 'descripcioNovaDiapositiva');

    nanospell.ckeditor('descripcioNovaDiapositiva',{
        dictionary : "ca",  // 24 free international dictionaries  
        server : "php"      // can be php, asp, asp.net or java
    }); 

    $descripcioNovaDiapositiva = $('#descripcioNovaDiapositiva');
    $imatgeNovaDiapositiva = $('#imatgeNovaDiapositiva');
    $altNovaDiapositiva = $('#altNovaDiapositiva');
    $titolNovaDiapositiva = $('#titolNovaDiapositiva');
    $crearNovaDiapositiva = $('#crearNovaDiapositiva');

    $crearNovaDiapositiva.click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "novadiapositiva",
            method: "POST",
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
    });


    console.log(CKEDITOR.instances.descripcioNovaDiapositiva.getData());
  

});