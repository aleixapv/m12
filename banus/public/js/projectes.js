$( document ).ready(function() {
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