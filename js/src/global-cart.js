(function( $ ) {
	'use strict';

	var $body;

	function init() {
		$body = $(document.body);

		retrieveGlobalCartItemNumber();
	}

	function retrieveGlobalCartItemNumber() {
		$.getJSON(
			YoastAjax.ajaxurl,
			{ action: 'cart_item_number' },
			handleGlobalCartItemNumber
		);
	}

	function handleGlobalCartItemNumber( response ) {
		if ( 'success' === response.status ) {
			$( '.cart .num-items' ).html( response.data.cartItems );
		}
	}

	$( init );
}( jQuery ));
