<?php
/**
 * Template Name: Full Width
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'about-sub' => true ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<article class="row">
				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>

				<?php get_template_part( 'html_includes/partials/social-share' ); ?>
			</article>
		<?php endwhile; ?>

		<section class="row iceberg">
			<h2>Recent posts</h2>
			<?php get_template_part( 'html_includes/partials/more-articles' ); ?>
		</section>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe' ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
