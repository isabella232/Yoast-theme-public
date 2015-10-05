<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Echoes the title for a checkout item
 *
 * @param int $post_id Post ID to echo the checkout title for.
 */
function the_checkout_item_title( $post_id = null ) {
	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	$item_title = esc_html( get_the_title( $post_id ) );
	if ( stripos( $item_title, 'for ' ) ) {
		$item_title = str_replace( ' for ', '</strong> for ', $item_title );
	}
	else {
		$item_title .= '</strong>';
	}
	echo '<strong>' . $item_title . '</strong>';

}

/**
 * Outputs one or more images for a certain gateway
 *
 * @param array $gateway The gateway to output the image for.
 */
function the_gateway_image( $gateway ) {
	$image = '';

	switch ( $gateway['admin_label'] ) {

		case 'PayPal Standard':
			$image = <<<'HTML'
				<img class="edd_payment__method" alt="PayPal" src="%1$s/Paypal_90x24_x2.png" width="90" height="24"/>
HTML;
			break;

		case 'Stripe':
			$image = <<<'HTML'
				<img class="edd_payment__method" alt="MasterCard" src="%1$s/MasterCard_66x40_x2.png" width="66" height="40"/>
				<img class="edd_payment__method" alt="Visa" src="%1$s/Visa_59x20_x2.png" width="59" height="20"/>
				<img class="edd_payment__method" alt="American Express" src="%1$s/AMEX_50x44_x2.png" width="50" height="44"/>
HTML;
			break;
	}

	$image = sprintf( $image, get_template_directory_uri() . '/images/shop' );

	echo $image;
}


/**
 * Returns the EDD step we are on at this moment
 *
 * @return int
 */
function get_checkout_step() {
	global $edd_options;

	$step = 2;
	if ( filter_input( INPUT_GET, 'payment-mode' ) ) {
		$step = 3;
	}
	else if ( is_page( $edd_options['success_page'] ) ) {
		$step = 4;
	}

	return $step;
}

/**
 * Returns the discounts for a certain download, returns an empty array if no discounts apply to this product.
 *
 * @param int $download_id The ID for the EDD download.
 *
 * @return array A list of discounts for the download.
 */
function download_get_discounts( $download_id ) {
	$discounts = edd_get_cart_discounts();

	if ( empty( $discounts ) ) {
		$discounts = array();
	}

	$discounts = array_map( function( $discount_code ) {
		$discount_id = edd_get_discount_id_by_code( $discount_code );

		return array(
			'code' => $discount_code,
			'id'   => $discount_id,
			'name' => get_post_meta( $discount_id, '_edd_discount_name', true ),
		);
	}, $discounts );

	return array_filter( $discounts, function( $discount ) use ( $download_id ) {
		$requirements = edd_get_discount_product_reqs( $discount['id'] );
		$excluded     = edd_get_discount_excluded_products( $discount['id'] );

		return ( in_array( $download_id, $requirements ) && ! in_array( $download_id, $excluded ) );
	});
}

/**
 * Returns whether or not a download has a discount
 *
 * @param array $item A cart item array.
 *
 * @return bool
 */
function download_has_discount( $item ) {
	$discount_amount = edd_get_cart_item_discount_amount( $item );

	return 0 !== $discount_amount;
}

/**
 * Returns the discounts that are global to the cart
 *
 * @return array A list of discounts that are global to the cart.
 */
function get_global_discounts() {
	$discounts = edd_get_cart_discounts();

	if ( empty( $discounts ) ) {
		$discounts = array();
	}

	$discounts = array_map( function( $discount_code ) {
		$discount_id = edd_get_discount_id_by_code( $discount_code );

		return array(
			'code' => $discount_code,
			'id'   => $discount_id,
			'name' => get_post_meta( $discount_id, '_edd_discount_name', true ),
		);
	}, $discounts );

	return array_filter( $discounts, function( $discount ) {
		return ! edd_is_discount_not_global( $discount['id'] );
	} );
}

/**
 * Returns whether or not the given download is a renewal
 *
 * @return bool
 */
function cart_has_renewal_discount() {
	if ( ! edd_sl_renewals_allowed() ) {
		return false;
	}

	if ( ! EDD()->session->get( 'edd_is_renewal' ) ) {
		return false;
	}

	$renewal_discount = cart_get_renewal_discount();

	return ! empty( $renewal_discount );
}

/**
 * Returns the renewal object
 *
 * @return float ID of the renewal discount
 */
function cart_get_renewal_discount() {
	$renewal_discount = (float) edd_get_option( 'edd_sl_renewal_discount', false );

	if ( $renewal_discount < 1 ) {
		$renewal_discount *= 100;
	}

	return $renewal_discount;
}

/**
 * Returns whether or not the cart actually has taxes (ea. more then zero)
 *
 * @return bool
 */
function cart_has_tax() {
	return ( 0.0 !== (float) edd_get_cart_tax() );
}

/**
 * Returns whether or not the current cart is a renewal
 *
 * @return bool
 */
function cart_is_renewal() {
	return ! ! EDD()->session->get( 'edd_is_renewal' );
}

/**
 * Checks whether an error is set for $field.
 *
 * @param string $field The field to check.
 *
 * @return bool
 */
function has_edd_error( $field ) {
	$errors = edd_get_errors();
	if ( isset( $errors[ $field ] ) ) {
		return trim( $errors[ $field ] );
	}

	return false;
}

/**
 * Returns an array filled with customer data
 *
 * @return array {
 *      @type string $first_name The customer's first name.
 *      @type string $last_name The customer's last name.
 *      @type string $email The customer's email address.
 * }
 */
function get_customer() {

	$customer = EDD()->session->get( 'customer' );
	$customer = wp_parse_args( $customer, array( 'first_name' => '', 'last_name' => '', 'email' => '' ) );

	if ( is_user_logged_in() ) {
		$user_data = get_userdata( get_current_user_id() );
		foreach ( $customer as $key => $field ) {

			if ( 'email' === $key && empty( $field ) ) {
				$customer[ $key ] = $user_data->user_email;
			}
			elseif ( empty( $field ) ) {
				$customer[ $key ] = $user_data->$key;
			}
		}
	}

	$customer = array_map( 'sanitize_text_field', $customer );

	return $customer;
}

/**
 * Returns an array filled with the customer address details
 *
 * @return array {
 *      @type array $address {
 *          @type string $line1 Address line 1.
 *          @type string $line2 Address line 2.
 *          @type string $city The customer's city.
 *          @type string $zip The customer's zipcode.
 *          @type string $state The customer's state.
 *          @type string $country The customer's country.
 *     }
 * }
 */
function get_customer_address() {
	$logged_in = is_user_logged_in();
	$customer  = EDD()->session->get( 'customer' );
	$customer  = wp_parse_args( $customer, array(
		'address' => array(
			'line1'   => '',
			'line2'   => '',
			'city'    => '',
			'zip'     => '',
			'state'   => '',
			'country' => '',
		),
	) );

	$customer['address'] = array_map( 'sanitize_text_field', $customer['address'] );

	if ( $logged_in ) {

		$user_address = get_user_meta( get_current_user_id(), '_edd_user_address', true );

		foreach ( $customer['address'] as $key => $field ) {

			if ( empty( $field ) && ! empty( $user_address[ $key ] ) ) {
				$customer['address'][ $key ] = $user_address[ $key ];
			}
			else {
				$customer['address'][ $key ] = '';
			}
		}
	}

	return $customer;
}
