jQuery.noConflict();

jQuery(document).ready(function( $ ) {

    $('#quick-reply').click( function( event ) {

        event.preventDefault();

        if ( $('.pressology-forum-quick-reply').hasClass('small') ) {
            $('.pressology-forum-quick-reply').animate({height: '100%'}, 500).removeClass('small');
        }
        else {
            $('.pressology-forum-quick-reply').animate({height: '0px'}, 500).addClass('small');
        }        
        
    })

    $('#quick-thread').click( function( event ) {

        event.preventDefault();

        if ( $('.pressology-forum-quick-thread').hasClass('small') ) {
            $('.pressology-forum-quick-thread').animate({height: '100%'}, 500).removeClass('small');
        }
        else {
            $('.pressology-forum-quick-thread').animate({height: '0px'}, 500).addClass('small');
        }        
        
    })

})