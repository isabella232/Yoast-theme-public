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

		self::$modals[] = self::build_args( $args );

		$add_modal_to_footer = array( __CLASS__, 'buy_button_modal' );
		if ( ! has_action( 'wp_footer', $add_modal_to_footer ) ) {
			add_action( 'wp_footer', array( __CLASS__, 'buy_button_modal' ) );
		}
	}

	public static function buy_button_modal() {
		add_action( 'wp_footer', array( __CLASS__, 'footer_modal_script' ), 90 );
		get_template_part( '/html_includes/partials/modal', self::$modals );
		wp_enqueue_script( 'jquery-modal' );
	}

	public static function footer_modal_script() {
		?>
		<script>
			jQuery( document ).ready( function ( $ ) {
				$( 'a[data-modal-product-id]' ).click( function ( e ) {
					e.preventDefault();

					var $this = $( this );
					var product_id = $this.data( 'modal-product-id' );

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

	public static function build_args( $args ) {
		if ( isset( $args['shop_id'] ) && get_current_blog_id() !== $args['shop_id'] ) {
			switch_to_blog( $args['shop_id'] );
		}
		$dynamic_pricing = apply_filters( 'dynamic_pricing_product_rules', \WC_Dynamic_Pricing_Compatibility::get_product_meta( wc_get_product( $args['id'] ), '_pricing_rules' ) );
		restore_current_blog();

		$standard_pricing_option = [
			'from'   => '1',
			'to'     => '1',
			'amount' => '0',
			'type'   => 'percentage_discount',

		];
		$args['dynamic_pricing'] = array_merge( [ $standard_pricing_option ], current( $dynamic_pricing )['rules'] );


		return $args;
	}


}
