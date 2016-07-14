<?php
namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Menu\Menu_Structure;

if ( class_exists( 'Yoast\YoastCom\Menu\Menu_Structure' ) ) {
	$main_menu_items = $template_args['menu_data'];
	$cart_url        = $template_args['cart_url'];

	echo '<div id="yoast-main-menu" class="sticky" data-sticky-desktop data-sticky>';
	echo '<nav role="navigation">';
	echo '<ul class="yoast-main-menu">';

	foreach ( $main_menu_items as $main_menu_item ) {
		echo '<li class="' . $main_menu_item['classes'] . '">';
		echo '<a href="' . $main_menu_item['url'] . '" class="' . $main_menu_item['anchor_classes'] . '">';
		echo $main_menu_item['label'];
		if ( isset( $main_menu_item['icon'] ) ) {
			echo '<span class="fa fa-' . $main_menu_item['icon'] . '" aria-hidden="true"></span>';
		}
		echo '</a>';

		echo '<div class="yoast-sub-menu">';
		echo '<ul class="yoast-sub-menu">';
		foreach ( $main_menu_item['children'] as $child ) {
			echo '<li class="' . $child['classes'] . '">';
			echo '<a href="' . $child['url'] . '" class="' . $child['anchor_classes'] . '">';
			if ( isset( $child['icon'] ) ) {
				echo '<span class="fa fa-' . $child['icon'] . '" aria-hidden="true"></span>';
			}
			echo $child['label'];
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';
		echo '</div>';
		echo '</li>';
	}

	echo '<li class="controls">';
//	echo '<a href="my.yoast.com">';
//	echo '<span class="fa fa-user"></span>login';
//	echo '</a>';
	echo '<a class="cart" href="' . $cart_url . '">';
	echo '<img src="' . get_template_directory_uri() . '/images/cart.svg">';
	echo '<span class="visuallyhidden focusable">Cart</span >';
	echo '<div class="num-items-container">';
	echo '<span class="num-items"></span >';
	echo '</div>';
	echo '</a >';

//		echo '<a href="#">';
//		echo '<span class="fa fa-search fa-flip-horizontal"></span>';
//		echo '</a>';
	echo '</li>';

	echo '</ul>'; // main menu
	echo '</nav>'; // nav holder

	echo '</div>'; // main menu id

}
else {
	?>
	<nav role="navigation" class="sitenav sticky" data-sticky data-sticky-desktop aria-hidden="true">
		<?php wp_nav_menu( array(
			'theme_location'  => 'primary',
			'container_class' => 'mainnav',
			'walker'          => new Menu_Walker(),
		) );
		?>
	</nav>

	<nav role="navigation" class="sitenav sitenav--offcanvas">
		<?php wp_nav_menu( array(
			'theme_location'  => 'primary',
			'container_class' => 'mainnav',
			'walker'          => new Menu_Walker(),
		) );
		?>
	</nav>
	<?php
}
