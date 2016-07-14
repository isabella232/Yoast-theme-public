<?php
/**
 * Created by PhpStorm.
 * User: diedeexterkate
 * Date: 08/07/16
 * Time: 12:05
 */

namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Menu\Menu_Item;
use Yoast\YoastCom\Menu\Menu_Structure;

class Yoast_Navigation {

	protected $menu_structure;
	protected $main_menu_items;
	protected $controls;
	protected $current_url;

	public function __construct( $menu_structure = null ) {
		$this->menu_structure  = ( is_null( $menu_structure ) ? new Menu_Structure() : $menu_structure );
		$this->main_menu_items = $this->menu_structure->getMenuItems();
		$this->current_url     = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$this->setActiveMenuItem();
	}

	public function output_menu_bar() {
		get_template_part( 'html_includes/partials/navigation-menu', array(
			'menu_data' => $this->get_menu_data(),
			'cart_url'  => $this->get_cart_url(),
		) );
	}


	private function get_menu_data() {
		$data = array();
		foreach ( $this->main_menu_items as $main_menu_item ) {
			$data [] = $this->get_main_menu_data( $main_menu_item );
		}

		return $data;
	}

	private function get_main_menu_data( $main_menu_item ) {
		if ( ! is_a( $main_menu_item, 'Yoast\YoastCom\Menu\Main_Menu_Item' ) ) {
			return;
		}
		$data                   = array();
		$activeClass            = ( empty( $main_menu_item->isActive() ) ? '' : 'current-menu-parent' );
		$data['classes']        = 'menu-item menu-item__' . $main_menu_item->getType() . ' ' . $activeClass;
		$data['label']          = $main_menu_item->getLabel();
		$data['url']            = $main_menu_item->getUrl();
		$data['icon']           = $main_menu_item->getIcon();
		$data['anchor_classes'] = ( empty ( $main_menu_item->getIcon() ) ? '' : 'icon' );
		$data['children']       = $this->get_children_menu_data( $main_menu_item );

		return $data;
	}

	private function get_children_menu_data( $main_menu_item ) {
		if ( ! is_a( $main_menu_item, 'Yoast\YoastCom\Menu\Main_Menu_Item' ) ) {
			return;
		}
		$data = array();
		foreach ( $main_menu_item->getChildren() as $child ) {
			$child_data                   = array();
			$activeClass                  = ( $this->current_url === $child->getUrl() ) ? 'current-menu-item' : '';
			$child_data['classes']        = 'sub-menu-item ' . $activeClass;
			$child_data['label']          = $child->getLabel();
			$child_data['url']            = $child->getUrl();
			$child_data['icon']           = $child->getIcon();
			$child_data['anchor_classes'] = ( empty ( $child->getIcon() ) ? '' : 'icon' );
			$data[]                       = $child_data;
		}

		return $data;
	}

	public function get_main_menu_items() {
		return $this->main_menu_items;
	}

	private function setActiveByUrl() {
		foreach ( $this->main_menu_items as $main_menu_item ) {
			if ( $main_menu_item->getUrl() === $this->current_url ) {
				$main_menu_item->setActive();

				return true;
			}
			foreach ( $main_menu_item->getChildren() as $child ) {
				if ( $child->getUrl() === $this->current_url ) {
					$main_menu_item->setActive();

					return true;
				}
			}
		}

		return false;
	}

	private function setActiveByPageType() {
		foreach ( $this->main_menu_items as $main_menu_item ) {
			if ( $main_menu_item->getType() === $this->get_current_page_type() ) {
				$main_menu_item->setActive();

				return true;
			}
		}

		return false;
	}

	private function setActiveByPage() {
		foreach ( $this->main_menu_items as $main_menu_item ) {
			$activeOn = $main_menu_item->getActiveOn();
			if ( ! is_array( $activeOn ) ) {
				continue;
			}
			$site_url = parse_url( get_site_url() );
			foreach ( $activeOn as $base_url => $post_types ) {
				if ( parse_url( $base_url )['host'] === $site_url['host'] ) {
					if ( ! is_array( $post_types ) || empty( $post_types ) ) {
						$main_menu_item->setActive();

						return true;
					}
					if ( in_array( get_post_type(), $post_types ) ) {
						$main_menu_item->setActive();

						return true;
					}
				}
			}
		}

		return false;
	}

	private function setActiveByDefault() {
		$this->main_menu_items[0]->setActive(); // make the first main menu item active (Home)
	}

	private function setActiveMenuItem() {
		if ( ! $this->setActiveByUrl() ) {
			if ( ! $this->setActiveByPageType() ) {
				if ( ! $this->setActiveByPage() ) {
					$this->setActiveByDefault();
				}
			}
		}
	}

	private function get_current_page_type() {
		$type = theme_object()->get_page_type();
		if ( empty ( $type ) ) {
			$color_scheme = theme_object()->get_color_scheme();
			if ( ! empty ( $color_scheme ) ) {
				$type = $this->convert_color_scheme_to_type( $color_scheme );
			}
		}

		return $type;
	}

	private function convert_color_scheme_to_type( $color_scheme ) {
		$map = array( // todo [diedexx] Check if these are correct.
			Color_Scheme::HOME     => Menu_Structure::HOME_TYPE,
			Color_Scheme::ACADEMY  => Menu_Structure::COURCES_TYPE,
			Color_Scheme::SOFTWARE => Menu_Structure::PLUGINS_TYPE,
			Color_Scheme::REVIEW   => Menu_Structure::HIRE_US_TYPE,
			Color_Scheme::ABOUT    => Menu_Structure::FAQ_TYPE,
		);

		return $map[ $color_scheme ];
	}

	private function get_cart_url() {
		if ( defined( 'YOAST_ENVIRONMENT' ) && YOAST_ENVIRONMENT === 'development' ) {
			return 'http://yoast.dev/checkout';
		}
		else {
			return 'https://yoast.com/checkout';
		}
	}

}
