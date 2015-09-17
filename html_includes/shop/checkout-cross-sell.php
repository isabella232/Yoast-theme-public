<?php
namespace Yoast\YoastCom\Theme;

/**
 * @var \WP_Query $downloads
 */
$downloads = $template_args['downloads'];
?>

<hr />

<div class="row island theme-academy">
	<h2><?php _e( 'You may also be interested in', 'yoastcom' ); ?></h2>

	<?php while ( $downloads->have_posts() ) : $downloads->the_post(); ?>
		<?php get_template_part( 'html_includes/partials/promoblock-buy-discrete' ); ?>

	<?php endwhile; wp_reset_postdata(); ?>
</div>
