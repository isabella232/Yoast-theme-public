<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Handles the color scheme in the theme
 *
 * @package Yoast\YoastCom
 */
class Extra_Head {

	/**
	 * Constructor, adds WordPress hooks
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'extra_head' ), 99 );
		add_action( 'cmb2_init', array( $this, 'extra_head_insertion' ) );
		add_filter( 'cmb2_show_on', array( $this, 'cmb_show_meta_to_chosen_roles' ), 10, 2 );
	}

	/**
	 * Output the extra header code
	 */
	public function extra_head() {
		$extra_head = $this->get_extra_head();
		if ( false !== $extra_head ) {
			echo $extra_head;
		}
	}

	/**
	 * Returns the color scheme for the current page
	 *
	 * @param int $post_id
	 *
	 * @return string
	 */
	public function get_extra_head( $post_id = null ) {
		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		return get_post_meta( $post_id, 'yoastcom_extra_head', true );
	}

	/**
	 * Adds the custom meta boxes for the page color selection
	 */
	public function extra_head_insertion() {
		$meta_box = new_cmb2_box( array(
			'id'           => 'yoastcom_extra_head_input',
			'title'        => __( 'Add header scripts or tags', 'yoastcom' ),
			'object_types' => array( 'page', 'post', 'yoast_dev_article' ),
			'priority'     => 'low',
			'show_on'      => array( 'key' => 'role', 'value' => 'administrator' ),
		) );

		$meta_box->add_field( array(
			'name' => __( 'Extra scripts or tags', 'yoastcom' ),
			'id'   => 'yoastcom_extra_head',
			'desc' => __( 'Note that these are not escaped in any way, so be cautious!' ),
			'type' => 'textarea_code',
		) );
	}

	/**
	 * Display metabox for only certain user roles.
	 * @author @Mte90
	 * @link   https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
	 *
	 * @param  bool $display Whether metabox should be displayed or not.
	 * @param  array $meta_box Metabox config array
	 *
	 * @return bool            (Modified) Whether metabox should be displayed or not.
	 */
	public function cmb_show_meta_to_chosen_roles( $display, $meta_box ) {
		if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
			return $display;
		}

		if ( 'role' !== $meta_box['show_on']['key'] ) {
			return $display;
		}

		$user = wp_get_current_user();

		// No user found, return
		if ( empty( $user ) ) {
			return false;
		}

		$roles = (array) $meta_box['show_on']['value'];

		foreach ( $user->roles as $role ) {
			// Does user have role.. check if array
			if ( is_array( $roles ) && in_array( $role, $roles ) ) {
				return true;
			}
		}

		return false;
	}

}
