<?php

namespace Yoast\YoastCom\Theme;

$yoast_url = apply_filters( 'yoast:domain', 'yoast.com' );
$show_navigation = apply_filters( 'yoast_theme-show_navigation', true );

?>
<header role="banner" class="siteheader">

	<div class="row masthead">
		<a href="<?php echo $yoast_url; ?>" class="pagetitle"><span class="visuallyhidden">Yoast</span></a>

		<?php
		if ( $show_navigation ) {
			echo '<div class="navigation-header">';
			get_template_part( 'html_includes/header-controls-mobile' );
			get_template_part( 'html_includes/partials/navigation-header' );
			get_template_part( 'html_includes/partials/search' );
			echo '</div>';
		}
		?>
	</div>

	<?php
	if ( $show_navigation ) {
		theme_object()->navigation->output_menu_bar();
	}
	?>
</header>
