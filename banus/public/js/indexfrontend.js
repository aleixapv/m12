$.fn.slideFadeToggle  = function(speed, easing, callback) {
    return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
};
$(document).ready(function(){
    $('#card_index').slideFadeToggle(1500);
});