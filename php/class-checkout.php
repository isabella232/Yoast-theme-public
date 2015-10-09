<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Handles all the customization to the EDD checkout functionality
 */
class Checkout {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'template_redirect', array( $this, 'maybe_set_discount_cookie' ) );

		// VAT related functions
		add_action( 'wp_ajax_yst_check_vat', array( $this, 'ajax_check_vat' ) );
		add_action( 'wp_ajax_nopriv_yst_check_vat', array( $this, 'ajax_check_vat' ) );
		add_action( 'edd_checkout_error_checks', array( $this, 'validate_btw_nr' ), 10, 2 );
		add_filter( 'edd_payment_meta', array( $this, 'add_btw_nr_to_payment' ) );
		add_filter( 'edd_purchase_data_before_gateway', array( $this, 'maybe_remove_tax' ) );
		add_filter( 'edd_purchase_form_required_fields', array( $this, 'fix_state_required' ), 10 );
	}

	/**
	 * Set's discount cookie if the show_coupon GET variable is present.
	 */
	public function maybe_set_discount_cookie() {
		$show_coupon = filter_input( INPUT_GET, 'show_coupon' );

		if ( null !== $show_coupon ) {
			setcookie( 'yst_edd_discount', '1', null, '/' );
			wp_redirect( home_url(), 301 );
			exit;
		}
	}

	/**
	 * Check VAT number
	 *
	 * @param string $country
	 * @param string $vat_nr
	 *
	 * @return bool|null
	 */
	private function check_vat( $country, $vat_nr ) {

		$country = trim( $country );
		$vat_nr  = trim( $vat_nr );

		if ( 0 === strpos( $vat_nr, $country ) ) {
			$vat_nr = trim( substr( $vat_nr, strlen( $country ) ) );
		}

		// Do the remote request
		$client = new \SoapClient( 'http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl' );

		try {
			$returnVat = $client->checkVat( array(
				'countryCode' => $country,
				'vatNumber'   => $vat_nr
			) );
		} catch ( Exception $e ) {
			error_log( 'VIES API Error for ' . $country . ' - ' . $vat_nr . ': ' . $e->getMessage() );

			return 2;
		}

		// Return the response
		if ( isset( $returnVat ) ) {
			if ( true == $returnVat->valid ) {
				return 1;
			} else {
				return 0;
			}
		}

		// Return null if the service is down
		return 2;
	}

	/**
	 * Status codes:
	 *
	 * 0 : False, invalid VAT number
	 * 1 : True, valid VAT number
	 * 2 : Service is down
	 *
	 * @todo ADD NONCES GODDAMNIT
	 */
	public function ajax_check_vat() {
		if ( isset ( $_POST['country'] ) && isset ( $_POST['vat_nr'] ) ) {
			if ( 1 === $this->check_vat( $_POST['country'], $_POST['vat_nr'] ) ) {
				echo '1';
				exit;
			} elseif ( 0 === $this->check_vat( $_POST['country'], $_POST['vat_nr'] ) ) {
				echo '0';
				exit;
			} elseif ( 2 === $this->check_vat( $_POST['country'], $_POST['vat_nr'] ) ) {
				echo '2';
				exit;
			}
		}

		echo '0';
		exit;
	}

	/**
	 * Check for errors with out custom fields
	 *
	 * @param array $valid_data Unused
	 * @param array $data
	 */
	public function validate_btw_nr( $valid_data, $data ) {
		if ( isset( $data['yst_btw'] ) && '' != $data['yst_btw'] ) {
			$vat_response = $this->check_vat( $data['billing_country'], $data['yst_btw'] );

			if ( false === $vat_response ) {
				edd_set_error( 'yst_btw', __( 'VAT number incorrect.', 'yoast-theme' ) );
			} elseif ( null == $vat_response ) {
				edd_set_error( 'yst_btw_unavailable', __( 'VAT number check not available.', 'yoast-theme' ) );
			}
		}
	}

	/**
	 * store the custom field data in the payment meta
	 *
	 * @param array $payment_meta
	 *
	 * @return array
	 */
	public function add_btw_nr_to_payment( $payment_meta ) {
		$payment_meta['btw_nr'] = isset( $_POST['yst_btw'] ) ? sanitize_text_field( $_POST['yst_btw'] ) : '';

		return $payment_meta;
	}

	/**
	 * @param array $purchase_data
	 *
	 * @return array
	 */
	public function maybe_remove_tax( $purchase_data ) {

		if ( isset ( $purchase_data['post_data']['yst_btw'] ) && '' != $purchase_data['post_data']['yst_btw'] ) {

			// If we get to this point with a btw nr, we can assume it's correct (validate_btw_nr takes care of the validation).

			// Subtract all tax from total price
			$purchase_data['price'] = $purchase_data['price'] - $purchase_data['tax'];
			$purchase_data['tax']   = 0.00;

			// Update cart
			if ( isset( $purchase_data['cart_details'] ) && is_array( $purchase_data['cart_details'] ) && count( $purchase_data['cart_details'] ) > 0 ) {
				foreach ( $purchase_data['cart_details'] as $item_key => $item_value ) {

					// Subtract tax from cart item
					$item_value['price'] = $item_value['price'] - $item_value['tax'];
					$item_value['tax']   = 0.00;

					// Set the new item
					$purchase_data['cart_details'][ $item_key ] = $item_value;

				}
			}

		}

		return $purchase_data;
	}

	/**
	 * @param array $required_fields
	 *
	 * @return array
	 */
	public function fix_state_required( $required_fields ) {
		if ( isset( $_POST['billing_country'] ) && 'US' != $_POST['billing_country'] && 'CA' != $_POST['billing_country'] ) {
			unset( $required_fields['card_state'] );
		}

		return $required_fields;
	}

}
