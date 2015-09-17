<?php
/**
 * Template Name: WP Seo plugin
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'software-sub' => true ) ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<div class="row">
			<h1><?php the_title(); ?></h1>
		</div>

		<hr class="hr--no-pointer">

		<div class="row">
			<?php if ( ! empty( post_meta( 'usps' ) ) ) : ?>
				<?php get_template_part( 'html_includes/partials/list-usp', array(
					'usps'  => wp_list_pluck( (array) post_meta( 'usps' ), 'usp' ),
					'class' => 'color-software',
				) ); ?>
			<?php endif; ?>
		</div>

		<?php if ( post_meta( 'announcement_link' ) ) : ?>
			<?php get_template_part( 'html_includes/partials/announcement', array(
				'class' => 'announcement--small announcement--pointer fill--secondary',
				'text'  => post_meta( 'announcement_text' ),
				'url'   => post_meta( 'announcement_link' ),
			) ); ?>

			<?php get_template_part( 'html_includes/partials/fullbanner', array(
				'banner' => post_meta( 'announcement_image' ),
			) ); ?>
		<?php endif; ?>

		<div class="row island iceberg">

			<section class="content">
				<?php the_content(); ?>
			</section>

			<?php if ( ! post_has_shortcode( 'sidebar-content' ) ) : ?>
				<section class="extra">
					<?php echo wpautop( do_shortcode( wp_kses_post( post_meta( 'sidebar_content' ) ) ) ); ?>
				</section>
			<?php endif; ?>

		</div>

		<hr class="hr--no-pointer">

		<?php if ( ! post_has_shortcode( 'testimonial' ) ) : ?>
		<div class="row island">
			<?php get_template_part( 'html_includes/partials/testimonial' ); ?>
		</div>
		<?php endif; ?>

		<?php if ( ! post_has_shortcode( 'plugin-info' ) && ! post_has_shortcode( 'plugin-stats' ) ) : ?>
			<?php get_template_part( 'html_includes/shortcodes/plugin-info' ); ?>
		<?php endif; ?>

		<hr class="hr--no-pointer">

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
