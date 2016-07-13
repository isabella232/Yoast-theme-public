<?php
namespace Yoast\YoastCom\Theme;
?>
<div class="header-controls header-controls--mobile  hide-on-desktop">
	<?php if ( function_exists( 'edd_get_checkout_uri' ) ) { ?>
	<a href="<?php echo esc_attr( edd_get_checkout_uri() ); ?>" class="cart">
		<span class="visuallyhidden focusable">Cart</span>
		<span class="text-icon">&#xf07a;</span>
		<span class="num-items"></span>
	</a>
	<?php } ?>

	<a href="#mobile-search" data-toggle="data-show-mobile-search" data-hide-on-active="data-show-mobile-nav"><span class="visuallyhidden focusable"><?php _e( 'Search', 'yoastcom' ); ?></span><span class="text-icon">&#xf002;</span></a>

	<button data-toggle="data-show-mobile-nav" data-hide-on-active="data-show-mobile-search" class="button--naked"><span class="visuallyhidden focusable"><?php _e( 'Navigation', 'yoastcom' ); ?></span><span class="text-icon">&#xf0c9;</span></button>
</div>
