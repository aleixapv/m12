function Manual(){
    let $selectProvincia = $('#selecProvincia');
    let $provinciaInput = $('#provinciaInput');

	let $selectPoblacio = $('#selecPoblacio');
    let $poblacioInput = $('#poblacioInput');

	let $selectCp = $('#selecCp');
    let $cpInput = $('#cpInput');

    $selectProvincia.attr("hidden",true);
    $selectPoblacio.attr("hidden",true);
    $selectCp.attr("hidden",true);

    $provinciaInput.attr("hidden",false);
    $poblacioInput.attr("hidden",false);
    $cpInput.attr("hidden",false);
    alert('Les poblacions no han cargat automàticament, mode manual.');
}
async function Provicia(tipus,select,input){
    try{
        let data = await fetch('https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/'+tipus+'.json')
        let dates = await data.json()
        for(i=0; i < dates.length; i++){
            //console.log(json[i]);
            let $option = $('<option>').html(dates[i]['provincia']).val(dates[i]['codi']).addClass("optionApi");
            select.append($option);
        }
        input.val(select.children().first().text());
    }
    catch{
        Manual();
    }
}
async function Poblacio(tipus,idProvincia,select,input){
    try{
        let data = await fetch('https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/'+tipus+'.json')
        let dates = await data.json()
        for(i=0; i < dates.length; i++){
            if(dates[i]['cod_prov'] == idProvincia){
                let $option = $('<option>').val(dates[i]['codi']).html(dates[i]['poblacio']);
                select.append($option);
            }
        }
        input.val(select.children().first().text());
    }
    catch{
        Manual();
    }
}
async function Postal(tipus,idPoblacio,select,input){
    try{
        let data = await fetch('https://exemple2021-c42ba-default-rtdb.europe-west1.firebasedatabase.app/'+tipus+'.json')
        let dates = await data.json()
        for(i=0; i < dates.length; i++){
            if(dates[i]['codi_poble'] == idPoblacio){
                let $option = $('<option>').val(dates[i]['codi_poble']).html(dates[i]['codi_postal']);
                select.append($option);
            }
        }
        input.val(select.children().first().text());
    }
    catch{
        Manual();
    }
}
$( document ).ready(function(){

    let $selectProvincia = $('#selecProvincia');
    let $provinciaInput = $('#provinciaInput');

	let $selectPoblacio = $('#selecPoblacio');
    let $poblacioInput = $('#poblacioInput');

	let $selectCp = $('#selecCp');
    let $cpInput = $('#cpInput');

    let $comprovar = $('#comprovar');
    let $error = $('#error');
    let $divExemple = $('#divExemple');

    let $titol = $('#titol');
    let $descripcio_breu = $('#descripcio_breu');
    let $descripcio_detallada = $('#descripcio_detallada');
    let $categories = $('#categories');
    let $imatges = $('#imatges');

    Provicia("Provincies",$selectProvincia,$provinciaInput);
    $selectProvincia.on('change',function() {
        $provinciaInput.val($( "#selecProvincia option:selected" ).text());
        $selectPoblacio.empty();
		Poblacio("Poblacions",$selectProvincia.val(),$selectPoblacio,$poblacioInput);
	});
    $selectPoblacio.change(function(){
        $poblacioInput.val($( "#selecPoblacio option:selected" ).text());
        $selectCp.empty();
		Postal("Codis_Postals",$selectPoblacio.val(),$selectCp,$cpInput);
	}); 
    $selectCp.change(function(){
        $cpInput.val($( "#selecCp option:selected" ).text());
    });

    $comprovar.click(function(){
        if(!$titol.val() == '' && !$descripcio_breu.val() == '' && !$descripcio_detallada.val() == '' && !$categories.val() == '' && !$imatges.val() == ''){
            console.log('entro');
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