<?php
/**
 * Template Name: WP Seo plugin
 */

namespace Yoast\YoastCom\Theme;

$plugin_id    = post_meta( 'download_id' );
$plugin_title = get_the_title( $plugin_id );

get_header();

get_template_part( 'html_includes/siteheader', array( 'software-sub' => true ) );

?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<div class="row">
			<?php
			$icon = get_product_icon( $plugin_id );
			if ( $icon ) {
				printf( '<img class="alignright" width="175" height="175" alt="%1$s" src="%2$s">', $plugin_title . ' icon', $icon );
			}
			?>

			<h1><?php the_title(); ?></h1>
		</div>

		<?php if ( ! empty( post_meta( 'usps' ) ) ) : ?>
			<div class="row">
				<?php
				get_template_part( 'html_includes/partials/list-usp', array(
					'usps'  => wp_list_pluck( (array) post_meta( 'usps' ), 'usp' ),
					'class' => 'color-software',
				) );
				?>

				<?php echo theme_object()->shortcodes->buy_buttons(); ?>

				<div class="clear"></div>

				<?php if ( post_meta( 'plugin' ) ) : ?>
					<a class="link--download"
					   href="<?php printf( 'https://downloads.wordpress.org/plugin/%s.zip', post_meta( 'plugin' ) ); ?>">Download
						the free version &raquo;</a>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		<?php endif; ?>

		<?php if ( post_meta( 'announcement_link' ) ) { ?>
			<?php get_template_part( 'html_includes/partials/announcement', array(
				'class' => 'announcement--small announcement--pointer fill--secondary',
				'text'  => post_meta( 'announcement_text' ),
				'url'   => post_meta( 'announcement_link' ),
			) ); ?>

			<?php get_template_part( 'html_includes/partials/fullbanner', array(
				'banner' => post_meta( 'announcement_image' ),
			) ); ?>
		<?php } else if ( ! post_meta( 'announcement_link' ) && ! empty( post_meta( 'usps' ) ) ) { ?>
			<br/>
			<hr/>
		<?php } ?>

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

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>

<script>
	jQuery(document).ready(function ($) {
		$('a.button.openmodal').click(function (e) {
			e.preventDefault();
			$('#prices-modal').modal({
				closeText: '<i class="fa fa-times-circle"></i>'
			});
		});
		$('.modal label').click(function (e) {
			e.preventDefault();
			$('input#' + $(this).attr('for')).prop('checked', true);
		});
	});
</script>
