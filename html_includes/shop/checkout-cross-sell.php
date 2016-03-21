<?php
namespace Yoast\YoastCom\Theme;

/**
 * @var \WP_Query $downloads
 */
$downloads = $template_args['downloads'];

if ( $downloads->have_posts() ):
?>

<div class="checkout--cross-sell">
	<div class="row promoblock">
		<h2><?php _e( 'You may also like:', 'yoastcom' ); ?></h2>
		
		<div class="cross-sell--promotions">
		<?php while ( $downloads->have_posts() ) : $downloads->the_post(); ?>
			<?php get_template_part( 'html_includes/partials/promoblock-buy-discrete' ); ?>

		<?php endwhile;
		wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php

endif;