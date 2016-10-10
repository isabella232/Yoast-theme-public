<?php

namespace Yoast\YoastCom\Theme;

$forced_currency = apply_filters( 'yoast_detect_visitor_currency', null );

// If we have switched currencies (and must provide a way to switch back)
// Or the currenct currency is not the default one
if ( is_null( $forced_currency ) && ( $template_args['default'] !== $template_args['current'] || $template_args['is_switched'] ) ) {

	$to_euros_class   = '';
	$to_dollars_class = '';

	if ( $template_args['default'] !== $template_args['current'] ) {
		$to_euros_class = ' hidden';
	} else {
		$to_dollars_class = ' hidden';
	}

	$toggle = 'I want to pay in <button class="button--slim yst_currency_switch%s" data-currency="USD">dollars</button><button class="button--slim yst_currency_switch%s" data-currency="EUR">euro\'s</button>';

	/** @todo Translatable strings! */
	echo '<p class="switch-currency switch-currency__USD' . $to_dollars_class . '">';
	echo 'We\'ve detected that you probably want to pay in euro\'s.<br>' . sprintf( $toggle, '', ' flat dimmed' );
	echo '</p>';

	echo '<p class="switch-currency switch-currency__EUR' . $to_euros_class . '">';
	echo 'You have switched to dollars instead of euro\'s.<br>' . sprintf( $toggle, ' flat dimmed', '' );
	echo '</p>';
}
