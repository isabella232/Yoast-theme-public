<?php
namespace Yoast\YoastCom\Theme;

?>
<h2><?php echo esc_html( $template_args['name'] ); ?></h2>

<?php echo wpautop( do_shortcode( $template_args['content'] ) ); ?>
