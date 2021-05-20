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
function Geocode(adreca,cp,poblacio,provincia,$x,$y){
    // import$provinciaInput.val()

    // setup
    const provider = new GeoSearch.OpenStreetMapProvider();
    const input = (adreca + ", " + cp + ", " +  poblacio + ", " +  provincia);
    

    // search
    const results = provider.search({ query: input }).then(function (result) {
        if(result.length == 0){
            console.log('sense resultats');
            $x.val('');
            $y.val('');
            if(adreca != '' && cp != '' && poblacio != '' && provincia != ''){
                $('#ubicacioConfirmada').attr('hidden',true);
                $('#ubicacioError').attr('hidden',false);
            }
        }else{
            $('#ubicacioError').attr('hidden',true);
            $x.val(result[0]["x"]);
            $y.val(result[0]["y"]);
            $('#ubicacioConfirmada').attr('hidden',false);
        }
    });
}
$( document ).ready(function() {
    
    let $adreca = $("#adrecaInput");
    let $ubicacio = $('.ubicacio');
    let $selectProvincia = $('#selecProvincia');
    let $provinciaInput = $('#provinciaInput');

	let $selectPoblacio = $('#selecPoblacio');
    let $poblacioInput = $('#poblacioInput');

	let $selectCp = $('#selecCp');
    let $cpInput = $('#cpInput');


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
    Geocode($adreca.val(),$( "#selecCp option:selected" ).text(),$( "#selecPoblacio option:selected" ).text(),$( "#selecProvincia option:selected" ).text(),$('#x'),$('#y'));
    $ubicacio.change(function(){
        Geocode($adreca.val(),$( "#selecCp option:selected" ).text(),$( "#selecPoblacio option:selected" ).text(),$( "#selecProvincia option:selected" ).text(),$('#x'),$('#y'));
    });
    
});