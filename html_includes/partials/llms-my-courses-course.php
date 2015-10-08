<?php

namespace Yoast\YoastCom\Theme;

/* @var \LLMS_Course $course */
$course = $template_args['course'];

$completed = ( 100 === (int) $course->get_percent_complete() );
?>

<li <?php post_class( array( 'my-courses-course' ), $course->id ); ?>>
	<div class="img">
		<?php echo lifterlms_get_featured_image( $course->id ); ?>
	</div>

	<div class="title">
	<h3>
		<a href="<?php echo esc_url( get_permalink( $course->id ) ); ?>">
			<?php echo esc_html( get_the_title( $course->id ) ); ?>
		</a>
	</h3>
	</div>
	<?php if ( $completed ) : ?>
		<?php $url_certificate = \Yoast\YoastCom\Academy\get_certificate_url(); ?>
		<div class="certificate">
			<a class="button default" href="<?php echo esc_url( $url_certificate ); ?>">
				<i class="fa fa-graduation-cap" aria-hidden="true"></i><?php _e( 'Show certificate', 'yoastcom' ); ?>
			</a>
		</div>
	<?php else : ?>
		<div class="my-courses-progress">
			<?php printf( __( 'Finished %d%%', 'yoastcom' ), $course->get_percent_complete() ); ?>
		</div>

		<div class="link">
			<?php $next_lesson = $course->get_next_uncompleted_lesson(); ?>
			<a class="button default" href="<?php echo esc_url( get_permalink( $next_lesson ) ); ?>">
				<i class="fa fa-arrow-circle-right" aria-hidden="true"></i><?php printf( __( 'Continue %s', 'yoastcom' ), get_the_title( $course->id ) ); ?>
			</a>
		</div>
	<?php endif; ?>
</li>
