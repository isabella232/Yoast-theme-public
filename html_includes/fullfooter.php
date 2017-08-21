<?php
namespace Yoast\YoastCom\Theme;

$show_navigation = apply_filters( 'yoast_theme-show_navigation', true );

if ( $show_navigation ):
	?>
	<nav class="fullfooter row" id="fullfooter">
		<?php
		$navigation = new Yoast_Navigation();
		$navigation->output_menu_footer();
		?>
	</nav>
	<?php
endif;
