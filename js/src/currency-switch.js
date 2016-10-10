(
	function( $ ) {
		'use strict';

		function init() {
			$( document ).ready( bindCurrencySwitch );
		}

		function bindCurrencySwitch() {
			$( '.yst_currency_switch' ).change( function() {
				var current_currency = readCookie( 'yoast_cart_currency' );
				var to_currency = $( this ).val();
				console.log($(this));
				console.log(to_currency);

				if ( current_currency == to_currency ) {
					return false;
				}

				createCookie( 'yoast_cart_currency', to_currency, 356, '.yoast.com' );
				createCookie( 'yoast_currency_switched', true, 356, '.yoast.com' );

				createCookie( 'yoast_cart_currency', to_currency, 356, '.yoast.dev' );
				createCookie( 'yoast_currency_switched', true, 356, '.yoast.dev' );

				$( '.switch-currency__' + to_currency ).addClass( 'hidden' );
				$( '.switch-currency__' + current_currency ).removeClass( 'hidden' );

				$( '.yoast-currency' ).addClass( 'hidden' );
				$( '.yoast-currency__' + to_currency ).removeClass( 'hidden' );

				$( window ).trigger( 'currency_switched', {'from': current_currency, 'to': to_currency} );

				return false;
			} );
		}

		function createCookie( name, value, days, domain ) {
			var extra = "; path=/";
			if ( days ) {
				var date = new Date();
				date.setTime( date.getTime() + (
					days * 24 * 60 * 60 * 1000
					) );
				extra += "; expires=" + date.toGMTString();
			}

			if ( domain ) {
				extra += "; domain=" + domain;
			}
			document.cookie = name + "=" + value + extra + "";
		}

		function readCookie( name ) {
			var nameEQ = name + "=";
			var ca = document.cookie.split( ';' );
			for ( var i = 0; i < ca.length; i ++ ) {
				var c = ca[i];
				while ( c.charAt( 0 ) == ' ' ) {
					c = c.substring( 1, c.length );
				}
				if ( c.indexOf( nameEQ ) == 0 ) {
					return c.substring( nameEQ.length, c.length );
				}
			}
			return null;
		}

		$( init );
	}
)( jQuery );