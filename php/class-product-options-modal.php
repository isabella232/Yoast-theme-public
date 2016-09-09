<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

class Product_Options_Modal {

	protected static $modals = array();

	public static function add_product_modal( $args ) {

		foreach ( self::$modals as $modal ) {
			if ( $modal['id'] === $args['id'] ) {
				return;
			}
		}

		self::$modals[] = $args;

		$add_modal_to_footer = array( __CLASS__, 'buy_button_modal' );
		if ( ! has_action( 'wp_footer', $add_modal_to_footer ) ) {
			add_action( 'wp_footer', array( __CLASS__, 'buy_button_modal' ) );
		}
	}

	public static function buy_button_modal() {
		add_action( 'wp_footer', array( __CLASS__, 'footer_modal_script'), 90 );
		get_template_part( '/html_includes/partials/modal', self::$modals );
		wp_enqueue_script( 'jquery-modal' );
	}

	public static function footer_modal_script() {
		?>
<script>
	jQuery( document ).ready( function ( $ ) {
		$( 'a[data-modal-product-id]' ).click( function ( e ) {
			e.preventDefault();

			var $this = $(this);
			var product_id = $this.data('modal-product-id');

			$( '#prices-modal-' + product_id ).modal( {
				closeText: '<i class="fa fa-times-circle"></i>'
			} );
		} );
		$( '.modal label' ).click( function ( e ) {
			e.preventDefault();
			$( 'input#' + $( this ).attr( 'for' ) ).prop( 'checked', true );
		} );
	} );
</script>
		<?php
	}


}
