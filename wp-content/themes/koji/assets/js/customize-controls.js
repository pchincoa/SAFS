/**
 * Custom JavaScript functions for the customizer controls.
 */

( function( $ ) {

	// Multiple checkboxes: Add the values of the checked checkboxes to the hidden input
	$( document ).on( 'change', '.customize-control-checkbox-multiple input[type="checkbox"]', function() {

		// Get the values of all of the checkboxes into a comma seperated variable
		checkbox_values = $( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
			function() {
				return this.value;
			}
		).get().join( ',' );

		// If there are no values, make that explicit in the variable so we know whether the default output is needed
		if ( ! checkbox_values ) {
			checkbox_values = 'empty';
		}

		// Update the hidden input with the variable
		$( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );

	} );
	
	
	// Share Post in a new window
	
	$('.dc-social a').click(function(event){
		event.preventDefault();

                //popup 
                var width  = 575,
                    height = 520,
                    left   = ($(window).width()  - width)  / 2,
                    top    = ($(window).height() - height) / 2,
                    opts   = 'status=1' +
                        ',width='  + width  +
                        ',height=' + height +
                        ',top='    + top    +
                        ',left='   + left;

                window.open($(this).attr("href"), 'share', opts);
        
	});

	
	

	

} )( jQuery );
