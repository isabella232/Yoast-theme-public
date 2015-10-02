<?php

namespace Yoast\YoastCom\Theme;

$url_certificate = \Yoast\YoastCom\Academy\get_certificate_url();

/* @var \LLMS_Course $course */
$course = \Yoast\YoastCom\Academy\get_course();

?>

<?php if ( 100 === (int) $course->get_percent_complete() ) : ?>
	<a class="button" href="<?php echo esc_attr( $url_certificate ); ?>">
		<i class="fa fa-graduation-cap" aria-hidden="true"></i>
		<?php _e( 'Show certificate', 'yoastcom' ); ?>
	</a>
<?php endif; ?>
