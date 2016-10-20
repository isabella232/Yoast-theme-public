(
	function( $ ) {
		'use strict';

		function init() {
			$( document ).ready( bindCurrencySwitch );
			$( document ).ready( detectCurrency );
		}

		function detectCurrency() {
			var current_currency = readCookie( 'yoast_cart_currency' );
//			if ( null == current_currency ) {
				$.getJSON(
					YoastAjax.admin + '?callback=?',
					{ action: 'detect_currency' },
					setCurrentCurrency
				);
//			}
		}

		function setCurrentCurrency( response ) {
			if ( 'success' === response.status ) {
				switchCurrency( response.data.currency );
			}
		}

		function bindCurrencySwitch() {
			$( '.yst_currency_switch' ).click( function() {
				switchCurrency( $( this ).data( 'currency' ) );
				return false;
			} );

			$( '.yst_currency_switch_dropdown' ).change( function() {
				switchCurrency( $( this ).val() );
				return false;
			} );
		}

		function switchCurrency( to_currency ) {
			var current_currency = readCookie( 'yoast_cart_currency' );

			if ( current_currency == to_currency ) {
				return false;
			}

			createCookie( 'yoast_cart_currency', to_currency, 356, '.yoast.com' );
			createCookie( 'yoast_cart_currency', to_currency, 356, '.yoast.dev' );

			$( '.switch-currency__' + to_currency ).removeClass( 'hidden' );
			$( '.switch-currency__' + current_currency ).addClass( 'hidden' );

			$( '.yst_currency_switch_dropdown').val( to_currency );

			// Switch price fields to reflect currency change:
			$( '.yoast-currency' ).addClass( 'hidden' );
			$( '.yoast-currency__' + to_currency ).removeClass( 'hidden' );

			$( window ).trigger( 'currency_switched', {'from': current_currency, 'to': to_currency} );
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