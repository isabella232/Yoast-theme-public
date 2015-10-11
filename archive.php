<?php
/**
 * Template Name: Single category
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy-sub' => true ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">
		<div class="row">
			<h1><?php echo esc_html( get_the_archive_title() ); ?></h1>
			<?php if ( is_search() ) { ?>
				<form action="<?php echo home_url(); ?>">
					<input type="search" name="s" value="<?php echo get_search_query(); ?>"/>

					<p>
						You can filter your search by post type:
						<select name="post_type">
							<?php
							$post_types = get_post_types( array( 'public' => true ), 'objects' );
							unset( $post_types['attachment'], $post_types['plugin_review'] );

							$post_types = array_merge(
								array(
									'any' => (object) array(
										'labels' => (object) array(
											'name' => 'Any',
										)
									)
								),
								$post_types
							);

							$req_post_type = filter_input( INPUT_GET, 'post_type' );
							if ( ! $req_post_type ) {
								$req_post_type = 'any';
							}

							foreach ( $post_types as $post_type => $obj ) {
								$sel = '';
								if ( $req_post_type === $post_type ) {
									$sel = 'selected ';
								}
								echo '<option ' . $sel . 'value="' . $post_type . '">' . str_replace( 'Yoast ', '', $obj->labels->name ) . '</option>';
							}
							?>
						</select>
					</p>
					<input type="submit" class="button default" value="Search"/>
				</form>
			<?php } ?>
		</div>

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<div class="row">
				<div class="media media--nofloat">
					<div class="bd content color-academy--secondary">
						<?php
						$home_post = get_post( get_option( 'page_for_posts' ) );
						if ( $home_post->post_content !== '' ) {
							$content = $home_post->post_content;
						} else {
							$content = $home_post->post_excerpt;
						}

						echo wpautop( do_shortcode( $content ) );
						?>
					</div>
				</div>
			</div>

			<?php
			$banner_content = get_post_meta( $home_post->ID, 'banner-content', true );
			$banner_url     = get_post_meta( $home_post->ID, 'banner-url', true );
			if ( $banner_content !== '' ) {
				$args = array(
					'text'  => $banner_content,
				    'url'   => $banner_url,
				    'class' => 'announcement-pointer announcement--pointer-top',
					'icon'  => 'gears',
				);
				get_template_part( 'html_includes/partials/announcement', $args );
			} else {
				echo '<hr class="hr--no-pointer">';
			}
			?>
		<?php elseif ( '' !== term_description() ) : ?>
			<div class="row">
				<div class="media media--nofloat">
					<!--					<a href="#" class="imgExt">-->
					<!--						<img src="http://placehold.it/250x160" class="promoblock promoblock--imageholder">-->
					<!--					</a>-->
					<div class="bd content color-academy--secondary">
						<?php the_archive_description(); ?>
					</div>
				</div>
			</div>

			<hr class="hr--no-pointer">
		<?php endif; ?>
		<!---->
		<!--		--><?php //get_template_part( 'html_includes/partials/announcement', array( 'text' => "Want to learn more long tail keywords and keyword research? Check out our eBook Optimize your WordPress site / Optimize your website &raquo;", ) );
		?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php theme_object()->excerpt->more( ' <a href="' . get_permalink() . '">&raquo;</a>' ); ?>
			<div class="row">
				<?php get_template_part( 'html_includes/partials/article-intro' ); ?>
			</div>

			<hr class="hr--no-pointer">
		<?php endwhile; ?>
		<?php theme_object()->excerpt->clear(); ?>

		<?php //get_template_part( 'html_includes/partials/announcement-addonmodules', array( 'class' => "fill--secondary", ) );
		?>

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
				<h2 class="tight"><?php _e( 'Browse other Yoast Categories', 'yoastcom' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/list-categories' ); ?>

			</div>
		<?php endif; ?>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe' ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
