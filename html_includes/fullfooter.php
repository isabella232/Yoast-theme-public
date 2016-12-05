<?php
namespace Yoast\YoastCom\Theme;
?>
<nav class="fullfooter row" id="fullfooter" aria-label="<?php _e( "Footer menu (similar to main menu)", "yoastcom" ); ?>">
	<?php
	$navigation = new Yoast_Navigation();
	$navigation->output_menu_footer();
	?>

</nav>
