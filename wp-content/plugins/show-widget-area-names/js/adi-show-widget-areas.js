
function swanToggle() {

    var toggleLink = jQuery('li.show-widget-area-toggle a');
    var curToggleVal = toggleLink.html();

    if(curToggleVal == '+ swan') {
        jQuery(toggleLink).html('- swan');
    } else {
        jQuery(toggleLink).html('+ swan');
    }

    jQuery('.adi-widget-area-name').slideToggle();
}

(function($) {
        $('div.adi-widget-area-name').hide();

        $("li.show-widget-area-toggle a").on("click", function(){
            swanToggle();
        });
})(jQuery);