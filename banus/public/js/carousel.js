$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    $novaDiapositivaForm = $('#novaDiapositivaForm');

    $("form[name='uploader']").on("submit", function(ev){
        ev.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: "edit/novadiapositiva",
            method: "POST",
            
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(request) {
            console.log(request);
           
        });
    })

    /*$crearNovaDiapositiva.click(function(){
        
        $.ajax({
            url: "edit/novadiapositiva",
            method: "POST",
            data: {
                'imatge': $imatgeNovaDiapositiva[0].files[0],
                'alt': $altNovaDiapositiva.val(),
                'titol': $titolNovaDiapositiva.val(),
                'descripcio': CKEDITOR.instances.descripcioNovaDiapositiva.getData(),
            }
        }).done(function(request) {
            console.log(request);
           
        });
    });*/


    
  

});