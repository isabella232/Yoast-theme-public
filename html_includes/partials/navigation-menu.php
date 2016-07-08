<?php
namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Menu\Menu_Structure;

if ( class_exists( 'Yoast\YoastCom\Menu\Menu_Structure') ) {
	display_menu_structure();
}
else {
	display_old_menu();
}

function display_menu_structure() {
	$menuStructure = new Menu_Structure();
	$menuItems     = $menuStructure->getMenuItems();

	echo "<nav>";
	echo "<ul>";
	foreach ( $menuItems as $index => $menuItem ) {
		$parentIndex = $menuItem->getParentIndex();
		if ( ! isset ( $parentIndex ) ) {
			echo '<li class="menu-item main-menu-item menu-item-' . $menuItem->getType() . '">';
			displayMenuItem( $menuItem );
			$children = $menuStructure->getChildrenOf( $index );
			if ( ! empty( $children ) ) {
				echo "<ul>";
				foreach ( $children as $child ) {
					echo '<li class="menu-item child-menu-item">';
					displayMenuItem( $child );
					echo "</li>";
				}
				echo "</ul>";
				echo "</li>";
			}
		}
	}
	echo "</ul>";
	echo "</nav>";
}

function displayMenuItem( $menuItem ) {
	echo '<a href="' . $menuItem->getUrl() . '" title="' . $menuItem->getScreenreaderText() . '">';
	echo $menuItem->getLabel() . displayIconSpan( $menuItem );
	echo '</a>';
}


function displayIconSpan( $menuItem ) {
	$iconSpan  = '';
	$iconClass = $menuItem->getIcon();
	if ( isset( $iconClass ) ) {
		$iconSpan = '<span class="fa fa-' . $iconClass . '" aria-hidden="true"></span>';
	}
	echo $iconSpan;
}


function display_old_menu() {
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
?>
