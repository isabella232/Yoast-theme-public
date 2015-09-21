<?php
namespace Yoast\YoastCom\Theme;

if ( ! isset( $template_args['class'] ) ) {
	$template_args['class'] = '';
}

?>
<div class="announcement fill <?php echo esc_attr( $template_args['class'] ); ?>">
	<div class="row">
		<p>
			<a href="<?php echo esc_url( $template_args['url'] ); ?>">
				<?php if ( isset( $template_args['icon'] ) ) { ?>
				<i class="fa fa-<?php echo esc_attr( $template_args['icon'] ); ?>"></i>
				<?php } ?>
				<?php echo esc_html( $template_args['text'] ); ?>
			</a>
		</p>
	</div>
</div>
