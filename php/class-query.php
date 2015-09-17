<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Handles the Query modifications
 */
class Query {

	/**
	 * Class constructor
	 */
	public function __construct() {
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );
	}

	/**
	 * Handles filtering queries
	 *
	 * @param \WP_Query $query
	 */
	public function pre_get_posts( $query ) {
		if ( ! $query->is_main_query() ) {
			return;
		}

		if ( $query->is_post_type_archive( 'yoast_ebooks' ) ) {
			$meta_query = array(
				array(
					'key'     => 'is_bundle',
					'compare' => 'NOT EXISTS',
				),
			);
			$query->set( 'meta_query', $meta_query );
			$query->set( 'orderby', 'menu_order' );
			$query->set( 'order', 'ASC' );
		}
	}

}