<?php
namespace Yoast\YoastCom\Theme;
?>
<div class="header-controls-holder sticky hide-on-tablet" data-sticky data-sticky-desktop>
	<div class="header-controls">
		<?php if ( function_exists( 'edd_get_checkout_uri' ) ) { ?>
			<a href="<?php echo esc_attr( edd_get_checkout_uri() ); ?>" class="cart">
				<span class="visuallyhidden focusable">Cart</span>
				<span class="text-icon">&#xf07a;</span>
				<span class="num-items"></span>
			</a>
		<?php } ?>

		<?php get_template_part( 'html_includes/partials/search', array( 'type' => 'desktop' ) ); ?>
	</div>
</div>
