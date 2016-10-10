<?php

namespace Yoast\YoastCom\Theme;

$forced_currency = apply_filters( 'yoast_detect_visitor_currency', null );

/*
 * If we have switched currencies (and must provide a way to switch back)
 * or the current currency is not the default one
 */
if ( is_null( $forced_currency ) && ( $template_args['default'] !== $template_args['current'] || $template_args['is_switched'] ) ) {

	$to_euros_class = $to_dollars_class = '';
	$eur_selected   = $usd_selected = '';

	if ( $template_args['default'] !== $template_args['current'] ) {
		$to_euros_class = ' hidden';
		$eur_selected   = ' selected="selected"';
	} else {
		$to_dollars_class = ' hidden';
		$usd_selected     = ' selected="selected"';
	}

	$toggle = '<select class="yst_currency_switch"><option value="USD"%s>$ ' . __( 'dollars', 'yoastcom' ) . '</option><option value="EUR"%s>&euro; ' . __( 'euros', 'yoastcom' ) . '</option></select>';

	/** @todo Translatable strings! */
	echo '<p>';
	echo '<span class="switch-currency switch-currency__USD' . $to_dollars_class . '">' . __( 'We\'ve detected that you probably want to pay in euro\'s.', 'yoastcom' ) . '</span>';
	echo '<span class="switch-currency switch-currency__EUR' . $to_euros_class . '">' . __( 'You have switched to dollars instead of euro\'s.', 'yoastcom' ) . '</span>';

	echo '<br>' . __( 'I want to pay in', 'yoastcom' ) . ' ' . sprintf( $toggle, $usd_selected, $eur_selected );
	echo '</p>';
}
