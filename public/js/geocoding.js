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
            if(adreca != '' && cp != '' && poblacio != '' && provincia != ''){
                $('#ubicacioError').attr('hidden',true);
                $x.val(result[0]["x"]);
                $y.val(result[0]["y"]);
                $('#ubicacioConfirmada').attr('hidden',false);
            }
            
        }
    });
}
$( document ).ready(function() {
    
    let $adreca = $("#adrecaInput");
    let $ubicacio = $('.ubicacio');
    
    Geocode($adreca.val(),$( "#selecCp option:selected" ).text(),$( "#selecPoblacio option:selected" ).text(),$( "#selecProvincia option:selected" ).text(),$('#x'),$('#y'));
    $ubicacio.change().click().hover(function(){
        Geocode($adreca.val(),$( "#selecCp option:selected" ).text(),$( "#selecPoblacio option:selected" ).text(),$( "#selecProvincia option:selected" ).text(),$('#x'),$('#y'));
    });
    
});