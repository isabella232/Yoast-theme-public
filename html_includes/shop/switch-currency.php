<?php

namespace Yoast\YoastCom\Theme;

// If we have switched currencies (and must provide a way to switch back)
// Or the currenct currency is not the default one
if ( $template_args['default'] !== $template_args['current'] || $template_args['is_switched'] ) {

	$to_euros_class = '';
	$to_dollars_class = '';

	if ( $template_args['default'] !== $template_args['current'] ) {
		$to_euros_class = ' hidden';
	} else {
		$to_dollars_class = ' hidden';
	}

	echo '<p class="switch-currency' . $to_dollars_class . '">';
	echo 'We\'ve detected that you probably want to pay in euro\'s.<br>If we made a mistake you can <button class="button--slim yst_currency_switch" data-currency="USD">change to dollars</button>';
	echo '</p>';

	echo '<p class="switch-currency' . $to_euros_class . '">';
	echo 'You have switched to dollars instead of euro\'s.<br>If you want to switch back you can <button class="button--slim yst_currency_switch" data-currency="EUR">change to euro\'s</button>';
	echo '</p>';
}
