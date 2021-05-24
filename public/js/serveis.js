function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function IsValidImageUrl(url) {
    $("<img>", {
        src: url,
        error: function() { alert(url + ': ' + false); },
        load: function() { alert(url + ': ' + true); }
    });
}
function readURL(input,exemple){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            exemple.attr('src', e.target.result);
        }
        console.log(input.files);
        reader.readAsDataURL(input.files[0]);
        
    }
}
$( document ).ready(function() {
    CKEDITOR.replace( 'descripcio');


    nanospell.ckeditor('descripcio',{
        dictionary : "ca",  // 24 free international dictionaries  
        server : "php"      // can be php, asp, asp.net or java
    }); 

    $error = $('#error');
    $nom = $('#nom');
    $descripcio = $('#descripcio');
    $imatge = $('#imatge');
    $comprovar = $('#comprovar');
    $divExemple = $('#divExemple');
    $nomExemple =$('#nomExemple');
    $descripcioExemple =$('#descripcioExemple');
    $imatgeExemple = $('#imatgeExemple');

    $comprovar.click(function(){
        $descripcio.val(CKEDITOR.instances.descripcio.getData());
        if(!$nom.val() == '' && !$descripcio.val() == '' && !$imatge == ''){
            $error.attr('hidden',true);
            $nomExemple.html(capitalizeFirstLetter($nom.val()));
            $descripcioExemple.html(capitalizeFirstLetter($descripcio.val()));
            readURL($imatge[0],$imatgeExemple);
            $divExemple.attr('hidden',false);
        }else{
            $error.attr('hidden',false);
        }
    });
    
});
