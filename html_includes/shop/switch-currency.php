<?php

namespace Yoast\YoastCom\Theme;

$forced_currency = apply_filters( 'yoast_detect_visitor_currency', null );

/*
 * If we have switched currencies (and must provide a way to switch back)
 * or the current currency is not the default one
 */
if ( is_null( $forced_currency ) ) {

	$to_euros_class = $to_dollars_class = '';

		if ( $template_args['current'] === 'USD' ) {
		$to_euros_class = ' hidden';
	}

	if ( $template_args['current'] === 'EUR' ) {
		$to_dollars_class = ' hidden';
	}

	// I want to pay in USD [switch to EUR]
	// I want to pay in EUR [switch to USD]
	$toggle = sprintf( __( 'I want to pay in %s', 'yoastcom' ), ' %1$s <button class="yst_currency_switch dimmed button--slim" data-currency="%2$s">switch to %2$s</button>' );

	echo '<p>';
	echo '<span class="switch-currency switch-currency__USD' . $to_dollars_class . '">' . sprintf( $toggle, 'USD ($)', 'EUR' ) . '</span>';
	echo '<span class="switch-currency switch-currency__EUR' . $to_euros_class . '">' . sprintf( $toggle, 'EUR (&euro;)', 'USD' ) . '</span>';
	echo '</p>';

	echo '<div class="clear"></div>';
}
