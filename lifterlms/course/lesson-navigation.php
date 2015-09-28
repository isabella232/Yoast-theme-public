<?php

namespace Yoast\YoastCom\Theme;

if ( ! defined( 'ABSPATH' ) ) exit;

/* @var \LLMS_Lesson $lesson */
$lesson = \Yoast\YoastCom\Academy\get_lesson();
?>

<nav class="llms-course-navigation">

	<?php
	if ( $lesson->get_previous_lesson() ) {
		$previous_lesson_id = $lesson->get_previous_lesson();
		$previous_lesson_link = get_permalink ( $previous_lesson_id );
		?>

		<div class="llms-lesson-preview prev-lesson previous">
			<a class="llms-lesson-link" href="<?php echo $previous_lesson_link; ?>" alt="<?php echo __('Previous Lesson', 'lifterlms'); ?>">
				<?php _e( 'Previous Lesson', 'yoast-academy' ); ?>
			</a>
		</div>

	<?php }

	if ( !$lesson->get_previous_lesson() || !$lesson->get_next_lesson() ) {
		$parent_style = $lesson->get_next_lesson() ? 'llms-lesson-preview prev-lesson previous' : 'llms-lesson-preview next-lesson next';
		$parent_course_id = $lesson->get_parent_course();
		$parent_course_link = get_permalink ( $parent_course_id );

		?>
		<div class="llms-lesson-preview <?php echo $parent_style; ?>">
			<a class="llms-lesson-link" href="<?php echo $parent_course_link; ?>" alt="<?php echo __('Back to Course', 'lifterlms'); ?>">
				<?php _e( 'Back to Course', 'yoast-academy' ); ?>
			</a>
		</div>
	<?php }

	if ( $lesson->get_next_lesson() ) {
		$next_lesson_id = $lesson->get_next_lesson();
		$next_lesson_link = get_permalink ( $next_lesson_id );
		?>

		<div class="llms-lesson-preview next-lesson next">
			<a class="llms-lesson-link" href="<?php echo $next_lesson_link; ?>" alt="<?php echo __('Next Lesson', 'lifterlms'); ?>">
				<?php _e( 'Next Lesson', 'yoast-academy' ); ?>
			</a>
		</div>

	<?php } ?>

</nav>
<div class="clear"></div>
