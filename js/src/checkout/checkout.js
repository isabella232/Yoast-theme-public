(function( $ ) {
	'use strict';

	var $body;

	function init() {
		$body = $(document.body);

		initCheckoutPage();
	}

	function initCheckoutPage() {
		$body.on( 'edd_quantity_updated', handleQuantityUpdate );
		$body.on( 'change', '.edd-item-quantity', update_item_quantities );
		$body.on( 'change', '.yst-edd-pricing-switcher', handleChangeDownloadVariation );

		$( '#edd_first' ).focus();
	}

	/**
	 * Updates the price after the product after a quantity update
	 *
	 * @param {jQuery.Event} e
	 * @param {Object} data
	 */
	function handleQuantityUpdate( e, data ) {
		EDD_Checkout.recalculate_taxes();
	}

	/**
	 * This is a copy of a function in `edd-checkout-global.js` and is a fix because we are using list item's as cart
	 * instead of a table. Can be removed once
	 * https://github.com/easydigitaldownloads/Easy-Digital-Downloads/issues/3741 is fixed.
	 *
	 * @param {jQuery.Event} e
	 * @returns {boolean}
	 */
	function update_item_quantities( e ) {

		var $this = $(this),
			quantity = $this.val(),
			key = $this.data('key'),
			download_id = $this.closest('.edd_cart_item').data('download-id'),
			options = $this.parent().find('input[name="edd-cart-download-' + key + '-options"]').val();

		var postData = {
			action: 'edd_update_quantity',
			quantity: quantity,
			download_id: download_id,
			options: options
		};

		//edd_discount_loader.show();

		$.ajax({
			type: "POST",
			data: postData,
			dataType: "json",
			url: edd_global_vars.ajaxurl,
			xhrFields: {
				withCredentials: true
			},
			success: function (response) {

				$('.edd_cart_subtotal_amount').each(function() {
					$(this).text(response.subtotal);
				});

				$('.edd_cart_tax_amount').each(function() {
					$(this).text(response.taxes);
				});

				$('.edd_cart_amount').each(function() {
					$(this).text(response.total);
					$body.trigger('edd_quantity_updated', [ response ]);
				});
			}
		}).fail(function (data) {
			if ( window.console && window.console.log ) {
				console.log( data );
			}
		});

		return false;
	}

	/**
	 * Handles a change to the download variation by the user
	 *
	 * @param {jQuery.Event} e
	 */
	function handleChangeDownloadVariation( e ) {
		var $this = $( e.currentTarget );

		var download_id = $this.data( 'download-id' );
		var price_id = $this.val();

		var postData = {
			action: 'yst_update_variation',
			download_id: download_id,
			price_id: price_id
		};

		$.ajax({
			type: "POST",
			data: postData,
			dataType: "json",
			url: edd_global_vars.ajaxurl,
			xhrFields: {
				withCredentials: true
			}
		}).success(function( response ) {
			if ( 'success' === response.status ) {
				EDD_Checkout.recalculate_taxes();
			}
		});
	}

	$( init );
}( jQuery ));
