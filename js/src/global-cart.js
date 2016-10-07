(function( $ ) {
	'use strict';

	var $body;

	function init() {
		$body = $(document.body);

		retrieveGlobalCartItemNumber();
		handleShowCoupon();
		bindCurrencySwitch();
	}

	function bindCurrencySwitch() {
		$('.yst_currency_switch').click(function(e) {
			var current_currency = readCookie( 'yoast_cart_currency' );
			var to_currency = $( this ).data( 'currency' );
			if ( current_currency == to_currency ) {
				return false;
			}

			createCookie( 'yoast_cart_currency', to_currency, 356, '.yoast.com' );
			createCookie( 'yoast_currency_switched', true, 356, '.yoast.com' );

			$('.switch-currency').toggleClass('hidden');

			recalculate_taxes();
			return false;
		});
	}

	function retrieveGlobalCartItemNumber() {
		$.getJSON(
			YoastAjax.ajaxurl + '?callback=?',
			{ action: 'cart_item_number' },
			handleGlobalCartItemNumber
		);
	}

	function handleGlobalCartItemNumber( response ) {
		if ( 'success' === response.status ) {
			$( '.cart .num-items' ).html( response.data.cartItems );
		}
	}

	/**
	 * If a user places ?show_coupon in the URL, set a cookie to show the coupon field.
	 */
	function handleShowCoupon() {
		var query_vars = document.location.search;

		if ( '?show_coupon' === query_vars ) {
			document.cookie = 'yst_edd_discount=1; path=/';

			document.location.href = document.location.href
				.replace( document.location.search, '' )
				.replace( document.location.hash, '' );
		}
	}

	function createCookie(name,value,days,domain) {
		var extra = "; path=/";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			extra += "; expires="+date.toGMTString();
		}

		if (domain) {
			extra += "; domain="+domain;
		}
		document.cookie = name+"="+value+extra+"";
	}

	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}

	function eraseCookie(name) {
		createCookie(name,"",-1);
	}

	$( init );
}( jQuery ));
