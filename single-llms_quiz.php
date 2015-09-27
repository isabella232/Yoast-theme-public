<?php
namespace Yoast\YoastCom\Theme;

function yst_return_empty_string() {
	return '';
}
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
					<?php
					global $quiz;
					$user_id = get_current_user_id();
					$quiz_data = get_user_meta($user_id, 'llms_quiz_data', true );
					$quiz_session = LLMS()->session->get( 'llms_quiz' );
					$grade = $quiz->get_user_grade( $user_id );

					if ( ! $quiz_data && empty( $grade ) ) {
						the_content();
					}
					else {
						add_filter( 'the_content', 'yst_return_empty_string', 9 );
						the_content();
					}
					?>
				</div>

				<div class="extra">
					<?php llms_get_template( 'quiz/return-to-lesson.php' ); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</main>
</div>

<?php get_footer(); ?>
