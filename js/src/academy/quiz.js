(function( $ ) {
	'use strict';

	function init() {

		// Open the quiz summary by default
		$( '.view-summary' ).click();

		// If the autostart hash is present, autostart the quiz
		if ( '#start_quiz' === document.location.hash ) {
			document.location.hash = '';
			$( '#llms_start_quiz' ).click();
		}
	}

	$( init );
}( jQuery ));
