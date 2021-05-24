function enumerarImatges($numeros){
    $numeros.each(function(e){
        $(this).html(e+1);
    });
}
CKEDITOR.bootstrapModalFix = function (modal, $) {
    modal.on('shown', function () {
      var that = $(this).data('modal');
      $(document)
        .off('focusin.modal')
        .on('focusin.modal', function (e) {
          // Add this line
          if( e.target.className && e.target.className.indexOf('cke_') == 0 ) return;
  
          // Original
          if (that.$element[0] !== e.target && !that.$element.has(e.target).length) {
            that.$element.focus()
          }
        });
    });
};
$( document ).ready(function() {
    

    

    
    
    let $divImatges = $('#divImatges');
    let $instruccionsImatges = $('#instruccionsImatges');
    let $textarea = $('.textarea');

    //listeners
    addEventListener('dragover',function(){
        enumerarImatges($('.numero'));
        let llistaOrdre = [];
        $('.ordre').each(function(e){
            llistaOrdre.push($(this).val());
        });
        console.log(llistaOrdre);
        $.ajax({
            url: "edit/reOrdenarDiapositivas",
            method: "POST",
            data: {'llistaOrdre':llistaOrdre},
        }).done(function(request) {
 
           
        });
    });
    $('.eliminar').click(function(){
        $eliminar = $(this);
        if(confirm('Estas segur?')){
            $.ajax({
                url: "edit/destroy",
                method: "DELETE",
                data: {
                    "idImatge": $(this).attr('idImatge'),
                }
            }).done(function(request) {
                
                    $eliminar.parent().parent().parent().remove();
                    enumerarImatges($('.numero'));
                
            });
        }  
    });

    //al carregar
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.modal').each(function(e){
        CKEDITOR.bootstrapModalFix( $(this), $ );
    });
    CKEDITOR.replace( 'descripcioNovaDiapositiva');
    nanospell.ckeditor('descripcioNovaDiapositiva',{
        dictionary : "ca",  // 24 free international dictionaries  
        server : "php"      // can be php, asp, asp.net or java
    }); 
    if($divImatges.children().length > 0){
        $instruccionsImatges.attr('hidden',false);
    } 
    enumerarImatges($('.numero'));
    $textarea.each(function(e){
        $(this).attr('id','descripcioEditarDiapositiva'+e);
        CKEDITOR.replace( 'descripcioEditarDiapositiva'+e);
        nanospell.ckeditor('descripcioEditarDiapositiva'+e,{
            dictionary : "ca",  // 24 free international dictionaries  
            server : "php"      // can be php, asp, asp.net or java
        });
    });


   /* $descripcioNovaDiapositiva = $('#descripcioNovaDiapositiva');
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
    })*/

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