$.fn.slideFadeToggle  = function(speed, easing, callback) {
    return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
};
$(document).ready(function(){
    $('#card_index').slideFadeToggle(1500);
    $('#frase_index').slideFadeToggle(2000);
    $('#content img').hover(function() {
        $(this).css("cursor", "pointer");
        $(this).toggle("scale",{
          percent: "90%"
        },500);
    });
});