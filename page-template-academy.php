<?php
/**
 * Template Name: Academy
 */

namespace Yoast\YoastCom\Theme;

$color_scheme = str_replace( 'theme-', '', theme_object()->color->get_color_scheme() );
$class        = 'color-' . $color_scheme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader' ); ?>

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
				'class'  => 'announcement--pointer-top',
			) ); ?>
		<?php endif; ?>

		<div class="island">
			<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => 'fill--secondary announcement--pointer announcement--pointer-top' ) ); ?>
		</div>

		<div class="rowholder">
			<section class="row island">
				<h2><?php _e( 'Check out our must read articles', 'yoastcom' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/recent-articles' ); ?>
			</section>

			<hr>

			<section class="row iceberg">
				<?php
				if ( $color_scheme == 'software' ) : ?>
					<h2 class="<?php echo $class; ?>--secondary"><?php _e( 'Read the latests posts on our Dev blog', 'yoastcom' ); ?></h2>
					<?php get_template_part( 'html_includes/partials/more-articles', array(
						'dev-blog' => true,
						'class'    => $class . '--secondary'
					) ); ?>
				<?php else: ?>
					<h2 class="<?php echo $class; ?>--secondary"><?php _e( 'Read the latests posts on our SEO blog', 'yoastcom' ); ?></h2>
					<?php get_template_part( 'html_includes/partials/more-articles', array( 'class' => $class . '--secondary' ) ); ?>
				<?php endif; ?>
			</section>
		</div>

		<?php get_template_part( 'html_includes/partials/announcement-addonmodules', array( 'class' => 'fill--tertiary' ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
