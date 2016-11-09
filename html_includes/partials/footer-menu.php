<?php

namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Menu\Menu_Item;

if ( class_exists( 'Yoast\YoastCom\Menu\Menu_Structure' ) ) {

	/** @noinspection PhpUndefinedVariableInspection */
	$main_menu_items = $template_args['menu_data'];

	$left   = array( $main_menu_items[0], $main_menu_items[1] );
	$center = array( $main_menu_items[2], $main_menu_items[3], $main_menu_items[4] );
	$right  = array( $main_menu_items[5], $main_menu_items[6] );

	echo '<div class="grid">';

	echo '<div class="one-third medium-one-half small-full">';
	yst_output_footer_menu( $left );
	echo '</div>';

	echo '<div class="one-third hide-on-tablet">';
	yst_output_footer_menu( $center );
	echo '</div>';

	echo '<div class="one-third medium-one-half small-full">';
	yst_output_footer_menu( $right );
	echo '</div>';

	echo '</div>'; // grid
}
else {
	?>
	<div class="grid">
		<div class="one-third medium-one-half small-full">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>

		<div class="one-third hide-on-tablet">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>

		<div class="one-third medium-one-half small-full">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>
	</div>

	<div class="boxes boxes--footer"></div>
	<?php
}

function yst_output_footer_menu( $menu_items ) {
	foreach ( $menu_items as $item ) {
		echo '<div class="widget promoblock arrowed-medium widget_nav_menu theme-' . $item['type'] . '">';
		get_template_part( 'html_includes/partials/navigation-menu-list', array(
			'menu_items' => array( $item ),
			'menu_type'  => 'main'
		) );
		echo '</div>';
	}
}
