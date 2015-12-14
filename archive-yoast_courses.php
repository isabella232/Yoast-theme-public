<?php
namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy' => true ) ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">
		<div class="row">
			<h1><?php _e( 'Courses by Yoast', 'yoastcom' ); ?></h1>
		</div>

		<?php while ( have_posts() ) : the_post(); ?>
			<article class="row">
				<?php get_template_part( 'html_includes/partials/course' ); ?>

				<?php if ( post_meta( 'testimonial' ) ) : ?>
					<blockquote><?php echo kses_blockquote( post_meta( 'testimonial' ) ); ?></blockquote>
				<?php endif; ?>
			</article>

			<?php if ( ! is_last_post() ) : ?>
				<hr>
			<?php endif; ?>
		<?php endwhile; ?>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => 'announcement--pointer' ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
