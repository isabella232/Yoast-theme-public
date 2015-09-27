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
					<?php
					$user = new LLMS_Person;
					$user_postmetas = $user->get_user_postmeta_data( get_current_user_id(), get_the_ID() );

					//get associated quiz
					$associated_quiz = get_post_meta( get_the_ID(), '_llms_assigned_quiz', true );

					if ( !isset( $user_postmetas['_is_complete'] ) && !$associated_quiz ) {
						global $lesson;
						?>
						<form method="POST" action="" name="mark_complete" enctype="multipart/form-data">
							<?php do_action( 'lifterlms_before_mark_complete_lesson' ); ?>

							<input type="hidden" name="mark-complete" value="<?php echo esc_attr( get_the_ID() ); ?>" />

							<input type="submit" class="button" name="mark_complete" value="<?php echo $lesson->single_mark_complete_text(); ?>" />
							<input type="hidden" name="action" value="mark_complete" />

							<?php wp_nonce_field( 'mark_complete' ); ?>
							<?php do_action( 'lifterlms_after_mark_complete_lesson'  ); ?>
						</form>

					<?php }

					if ( $associated_quiz ) {
						?>
						<form method="POST" action="" name="take_quiz" enctype="multipart/form-data">
							<input type="hidden" name="associated_lesson" value="<?php echo esc_attr( get_the_ID() ); ?>"/>
							<input type="hidden" name="quiz_id" value="<?php echo esc_attr( $associated_quiz ); ?>"/>
							<input type="submit" class="button default" name="take_quiz" value="<?php _e( 'Take Quiz &raquo;', 'yoastcom' ); ?>"/>
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
