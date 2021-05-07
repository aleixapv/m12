$( document ).ready(function() {
    $(".ver_mas").click(function(){
        if($(this).children().eq(1).is(":hidden")){
            $(this).children().eq(1).attr("hidden", false);
            $(this).children().first().text("Click para ver menos");
        }else   {
            $(this).children().eq(1).attr("hidden", true);
            $(this).children().first().text("Click para ver mas");
        }

    });
});