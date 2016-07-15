<?php

namespace Yoast\YoastCom\Theme;

/** @noinspection PhpUndefinedVariableInspection */
$menu_item = $template_args['menu_item'];
$type      = $template_args['type'];

$anchor_class = ( ! empty( $menu_item['anchor_classes'] ) ? ' class="' . implode( ' ', $menu_item['anchor_classes'] ) . '"' : '' );

echo '<a href="' . $menu_item['url'] . '"' . $anchor_class . '>';

if ( $type === 'main' ) {
	echo $menu_item['label'];
}

if ( ! empty( $menu_item['icon'] ) ) {
	echo '<span class="fa fa-' . $menu_item['icon'] . '" aria-hidden="true"></span>';
}

if ( $type === 'sub' ) {
	echo $menu_item['label'];
}

echo '</a>';
