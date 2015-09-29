<?php

namespace Yoast\YoastCom\Theme;

remove_filter( 'the_content', 'llms_get_post_content' );

?>

<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy-sub' => true ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<article class="row">
				<h1><?php the_title(); ?></h1>

				<div class="content">
					<?php the_content(); ?>

					<?php llms_get_template( 'course/complete-lesson-link.php' ); ?>
				</div>

				<div class="extra">
					<?php llms_get_template( 'course/lesson-navigation.php' ); ?>
					<?php llms_get_template( 'course/complete-lesson-link.php' ); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</main>
</div>

<?php get_footer(); ?>
