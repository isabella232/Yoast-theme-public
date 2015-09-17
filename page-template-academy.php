<?php
/**
 * Template Name: Academy
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy' => true ) ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<section class="row iceberg">
			<h1><?php the_title(); ?></h1>

			<?php get_template_part( 'html_includes/partials/promoblocks-academy', array( 'academy' => true ) ); ?>
		</section>

		<?php if ( post_meta( 'announcement_link' ) ) : ?>
			<?php get_template_part( 'html_includes/partials/banner-announcement', array(
				'url'    => post_meta( 'announcement_link' ),
				'text'   => post_meta( 'announcement_text' ),
				'banner' => post_meta( 'announcement_image' ),
			) ); ?>
		<?php endif; ?>

		<div class="island">
		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => 'fill--secondary' ) ); ?>
		</div>

		<div class="rowholder">
			<section class="row island">
				<h2><?php _e( 'Check out our Must Read Articles', 'yoastcom' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/recent-articles', array( 'must_read' => true ) ); ?>
			</section>

			<hr>

			<section class="row iceberg">
				<h2 class="color-academy--secondary"><?php _e( 'Read our Latest Posts', 'yoastcom' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/more-articles' ); ?>
			</section>
		</div>

		<?php get_template_part( 'html_includes/partials/announcement-addonmodules', array( 'class' => 'fill--tertiary' ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
