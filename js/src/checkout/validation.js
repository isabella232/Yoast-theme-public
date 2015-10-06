;(function( $ ) {
	var validBtwNr = false;

	function recalculate_taxes(btw_verlegd) {
		if (undefined == btw_verlegd) {
			btw_verlegd = false;
		}

		var $edd_cc_address = $('#edd_cc_address');

		var postData = {
			action         : 'yst_edd_recalculate_taxes',
			nonce          : yoast_com_checkout_vars.checkout_nonce,
			billing_country: $edd_cc_address.find('#billing_country').val(),
			btw_verlegd    : btw_verlegd
		};

		$.ajax({
			type    : "POST",
			data    : postData,
			dataType: "json",
			url     : yoast_com_checkout_vars.ajaxurl,
			success : function (tax_response) {
				$('#edd_checkout_cart_div').replaceWith(tax_response.html);
				$('.edd_cart_amount').html(tax_response.total);

				$('#yst_secondary_tax').html( $('#yst_main_tax').html() );
				$('#yst_secondary_tax_rate').html( $('#yst_main_tax_rate').html() );

				var tax_data = new Object();
				tax_data.postdata = postData;
				tax_data.response = tax_response;
				$('body').trigger('edd_taxes_recalculated', [ tax_data ]);
			}
		}).fail(function (data) {
			if (window.console && window.console.log) {
				console.log(data);
			}
		});
	}

	/**
	 * Checks the BTW NR with the VIES API
	 */
	function checkBtwNr( country, btw_nr ) {
		jQuery.post(yoast_com_checkout_vars.ajaxurl, { action: 'yst_check_vat', country: country, vat_nr: btw_nr }, function (response) {
			$( '#vaterror' ).remove();
			if ('1' == response) {
				$('#yst_btw').removeClass('error').addClass('valid');
				recalculate_taxes(true);

				validBtwNr = true;
			} else if('2' == response){
				// Show error, the service is down
				$('#yst_btw').removeClass('valid').addClass('error');
				recalculate_taxes();
				jQuery("#yst-edd-btw-wrap").append('<span id="vaterror" class="error">We cannot check if your VAT number is correct because the VAT checking system for the EU is currently down. We\'re sorry for the inconvenience. Please send us an email on <a href="mailto:support@yoast.com">support@yoast.com</a> or try again later.</span>');

				validBtwNr = false;
			} else {
				$('#yst_btw').removeClass('valid').addClass('error');
				recalculate_taxes();
				jQuery("#yst-edd-btw-wrap").append('<span id="vaterror" class="error">We cannot verify this VAT number, this means you will have to pay VAT. Please make sure you\'ve entered the number correctly.</span>');

				validBtwNr = false;
			}
		});
	}

	jQuery( document ).ready( function ( $ ) {
		var $body = $( 'body' );

		$( '#card_number' ).payment( 'formatCardNumber' );
		$( '#card-cvc' ).payment( 'formatCardCVC' );

		$( ".chosen-select" ).chosen();
		$body.on( 'edd_cart_billing_address_updated', function() {
			// Remove the old chosen select box.
			$( '#edd-card-state-wrap .chosen-container' ).remove();

			// Chosenfy the new select box.
			$( 'select[name="card_state"]' ).chosen();
		});

		$( '#card_number' ).payment( 'formatCardNumber' );

		var card_type = undefined;
		$( '#card_number' ).on( "input", function () {
			if ( $.payment.validateCardNumber( $( this ).val() ) ) {
				$( this ).removeClass( 'error' ).addClass( 'valid' );
			}
			else {
				$( this ).removeClass( 'valid' ).addClass( 'error' );
			}

			if ( $( "#card_cvc" ).val() != '' ) {
				if ( $.payment.validateCardCVC( $( "#card_cvc" ).val(), $.payment.cardType( $( this ).val() ) ) ) {
					$( "#card_cvc" ).removeClass( 'error' ).addClass( 'valid' );
				}
				else {
					$( "#card_cvc" ).removeClass( 'valid' ).addClass( 'error' );
				}
			}
		} );

		$( '#card_cvc' ).on( "input", function () {
			if ( $.payment.validateCardCVC( $( this ).val(), $.payment.cardType( $( '#card_number' ).val() ) ) ) {
				$( this ).removeClass( 'error' ).addClass( 'valid' );
			}
			else {
				$( this ).removeClass( 'valid' ).addClass( 'error' );
			}
		} );

		$( '#card_exp_year' ).on( "input", function () {
			var month = $( '#card_exp_month' ).val();
			var year = $( this ).val();
			if ( month != '' ) {
				if ( $.payment.validateCardExpiry( month, year ) ) {
					$( 'edd-input-cvc' ).removeClass( 'error' ).addClass( 'valid' );
				} else {
					$( 'edd-input-cvc' ).removeClass( 'valid' ).addClass( 'error' );
				}
			}
		} );

		// validate signup form on keyup and submit
		$( "#edd_purchase_form" ).validate( {
			unhighlight: function ( el, error, valid, _orig ) {
				if ( el.type === "radio" ) {
					this.findByName( el.name ).removeClass( error ).addClass( valid );
				} else if ( !$( el ).hasClass( 'ignore' ) ) {
					$( el ).removeClass( error ).addClass( valid );
				} else {
					$( el ).removeClass( error ).removeClass( valid );
				}
			},
			errorClass: 'error error-message',
			rules: {
				edd_email: {
					required: true,
					email: true
				},
				edd_first: "required",
				card_name: "required",
				card_address: {
					required: true,
					minlength: 2
				},
				card_city: {
					required: true,
					minlength: 2
				},
				card_zip: {
					required: true,
					minlength: 2
				},
				billing_country: "required",
				card_state: "required",

				edd_agree_to_terms: "required",
			},
			messages: {
				edd_first: "Please enter your first name",
				edd_email: "Please enter a valid email address",
				edd_agree_to_terms: "<strong>Error</strong> - Please accept our terms: ",
				card_name: "Please enter the name on your credit card",
				card_address: "Please enter the billing address of your credit card",
				card_zip: "Please enter the zip / postal code of the billing address of your credit card",
				card_state: "Please enter your state",
				card_city: "Please enter the city of the billing address of your credit card",
				billing_country: "Please enter the country of the billing address of your credit card"
			}
		} );

		$("body").on("change", "#yst_btw, #billing_country", function () {

			recalculate_taxes();

			var country = $('#billing_country').val();

			// No special BTW rule for The Netherlands
			if ('NL' == country) {
				$('#yst-edd-btw-wrap').html('<strong>Please note:</strong> VAT will be added to the invoice. Since Yoast is based in the Netherlands we cannot reverse charge the VAT.').show();
				$('.edd_cart_tax_row').css('display','table-row');
				return;
			}

			// Check if the country is in our special tax list
			if (undefined == yoast_com_checkout_vars.tax_rates[ country ]) {
				$('#yst-edd-btw-wrap').hide();
				$('.edd_cart_tax_row').css('display','none');
				return;
			} else {
				$('.edd_cart_tax_row').css('display','table-row');
			}

			$('#yst-edd-btw-wrap').show();

			var btw_nr = $('#yst_btw').val();

			// VAT nr given, check it
			if ('' != btw_nr) {
				checkBtwNr( country, btw_nr );
			} else {
				recalculate_taxes();
			}

		});
	} );
}( jQuery ));
