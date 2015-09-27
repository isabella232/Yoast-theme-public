<?php

namespace Yoast\YoastCom\Theme;
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
					<?php
					//get associated quiz
					$associated_quiz = get_post_meta( get_the_ID(), '_llms_assigned_quiz', true );
					if ( $associated_quiz ) {
						?>
						<form method="POST" action="" name="take_quiz" enctype="multipart/form-data">

							<input type="hidden" name="associated_lesson"
							       value="<?php echo esc_attr( get_the_ID() ); ?>"/>
							<input type="hidden" name="quiz_id" value="<?php echo esc_attr( $associated_quiz ); ?>"/>
							<input type="submit" class="button" name="take_quiz"
							       value="<?php _e( 'Take Quiz', 'lifterlms' ); ?>"/>
							<input type="hidden" name="action" value="take_quiz"/>

							<?php wp_nonce_field( 'take_quiz' ); ?>
						</form>
					<?php } ?>
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
