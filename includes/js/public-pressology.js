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

    $('#quick-post-form > #quick-post-submit').click( function( event ) {

        event.preventDefault();

        $.ajax({
			type: "POST",
			url: ajax_obj.ajaxurl,
			data: {
				action: "pressology_quick_post",
                author: $('#quick-post-author').val() ,
                title: $('#quick-post-title').val() ,
                content: tinyMCE.get('pressologyeditor').getContent(),
                forum: $('#quick-post-forum').val()
			}
		}).done( function( data ) {
			//$('#wpchat-input').val('');
			//$('#quick-post-form').html( data );
            location.reload();
		}).fail( function() {
			//alert('AJAX Request Failed');
            //$('#quick-post-form').html( '<h1>FAILED</h1' );
		});

    })

})