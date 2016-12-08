jQuery.noConflict();

jQuery(document).ready(function() {

    $('#quick-reply').click( function( event ) {

        event.preventDefault();

        $('.pressology-forum-quick-reply').animate({
            height: "40"
        }, 5000, function() {
            //Complete.
        })
        
    })

})