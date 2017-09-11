<?php

namespace Yoast\YoastCom\Theme;

$show_navigation = apply_filters( 'yoast_theme-show_navigation', true );

if ( $show_navigation ):
	?>
	<footer role="contentinfo" class="sitefooter fill fill--secondary bordered bordered--top">
		<div class="row">
			<?php echo get_theme_option( 'footer', 'child-settings' ); ?>
		</div>
	</footer>
	<?php
endif;

wp_footer();

?>
</body>
</html>
