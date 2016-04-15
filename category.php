<?php
/**
 * Template Name: Single category
 */

namespace Yoast\YoastCom\Theme;

$cat_image_id = get_term_meta( get_queried_object_id(), 'yoastcom_term_image_id', true );

?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy-sub' => true ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">
		<div class="row">

		<?php if ( ! is_paged() ) : ?>

		<h1><?php echo esc_html( get_the_archive_title() ); ?></h1>

		<?php if ( '' !== get_the_archive_description() ) : ?>
			<div class="row">
				<div class="media media--nofloat">
					<?php if ( $cat_image_id ) : ?>
					<div class="imgExt">
						<img src="<?php echo wp_get_attachment_image_url( $cat_image_id, 'thumbnail-recent-articles' ); ?>" width="250" height="131" class="promoblock promoblock--imageholder theme-academy--secondary">
					</div>
					<?php endif; ?>
					<div class="content promoblock theme-academy--secondary">
						<?php the_archive_description(); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php else: ?>
			<h1><?php printf( __( '%s archives', 'yoastcom' ), esc_html( get_the_archive_title() ) ); ?></h1>
		<?php endif; ?>

		</div>

		<hr>

		<?php if ( ! is_paged() ) : ?>
			<?php get_template_part( 'html_includes/partials/must-read-articles', array( 'class1' => 'theme-academy--secondary' ) ); ?>
		<?php endif; ?>

		<?php //get_template_part( 'html_includes/partials/announcement', array( 'text' => "Want to learn more long tail keywords and keyword research? Check out our eBook Optimize your WordPress site / Optimize your website &raquo;", ) ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php theme_object()->excerpt->more( ' <a href="' . get_permalink() . '">&raquo;</a>' ); ?>
			<div class="row">
				<?php get_template_part( 'html_includes/partials/article-intro' ); ?>
			</div>

			<hr class="hr--no-pointer">
		<?php endwhile; ?>
		<?php theme_object()->excerpt->clear(); ?>

		<?php //get_template_part( 'html_includes/partials/announcement-addonmodules', array( 'class' => "fill--secondary", ) ); ?>

		<div class="row">
			<?php get_template_part( 'html_includes/partials/pagination' ); ?>
		</div>
		<!--		<hr>-->
		<!--		<div class="row">-->
		<!--			<h2 class="color-academy--tertiary">Check out the Yoast Series</h2>-->
		<!--			--><?php //get_template_part( 'html_includes/partials/list-series' );
		?>
		<!--		</div>-->
		<!---->
		<!--		<hr class="hr--no-pointer">-->
		<!---->
		<!--		<div class="row">-->
		<!--			--><?php //get_template_part( 'html_includes/partials/list-series' );
		?>
		<!--		</div>-->

		<?php if ( is_category() ) : ?>
			<hr>

			<div class="row iceberg">
				<h2 class="tight"><?php _e( 'Browse other categories', 'yoastcom' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/more-categories' ); ?>

			</div>
		<?php endif; ?>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe' ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
