/**
 * Widgets - Media Upload
 */
jQuery( document ).ready( function() {
    // Upload / Change Image
    function tmq_image_upload( button_class ) {
        jQuery( 'body' ).on( 'click', button_class, function(e) {
            var button_id           = '#' + jQuery( this ).attr( 'id' ),
                self                = jQuery( button_id),
                button              = jQuery( button_id ),
                id                  = button.attr( 'id' ).replace( '-button', '' );

            frame = wp.media({
		      title: 'Select or Upload Media Of Your Chosen Persuasion',
		      button: {
		        text: 'Use this media'
		      },
		      multiple: false  // Set to true to allow multiple files to be selected
		    });

            frame.on( 'select', function() {
            	var attachment = frame.state().get('selection').first().toJSON();
            	jQuery( '#' + id + '-preview'  ).attr( 'src', attachment.url ).css( 'display', 'block' );
                jQuery( '#' + id + '-remove'  ).css( 'display', 'inline-block' );
                jQuery( '#' + id + '-noimg' ).css( 'display', 'none' );
                jQuery( '#' + id ).val( attachment.url ).trigger( 'change' );
            });

            frame.open();

            return false;
        });
    }
    tmq_image_upload( '.tmq-media-upload' );

    // Remove Image
    function tmq_image_remove( button_class ) {

        jQuery( 'body' ).on( 'click', button_class, function(e) {

            var button              = jQuery( this ),
                id                  = button.attr( 'id' ).replace( '-remove', '' );

            jQuery( '#' + id + '-preview' ).css( 'display', 'none' );
            jQuery( '#' + id + '-noimg' ).css( 'display', 'block' );
            button.css( 'display', 'none' );
            jQuery( '#' + id ).val( '' ).trigger( 'change' );

        });
    }
    tmq_image_remove( '.tmq-media-remove' );

});