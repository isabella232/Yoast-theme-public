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
		if ( is_admin() ) {
			$this->admin_filter( $query );
		}

		if ( ! $query->is_main_query() ) {
			return;
		}

		if ( $query->is_post_type_archive( 'yoast_ebooks' ) ) {
			$this->ebooks_filter( $query );
		}
	}

	/**
	 * Handles filters for the eBooks archive page
	 *
	 * @param \WP_Query $query
	 */
	private function ebooks_filter( $query ) {
		$meta_query = array(
			array(
				'key'     => 'is_bundle',
				'compare' => 'NOT EXISTS',
			),
		);
		$query->set( 'meta_query', $meta_query );
		$query->set( 'orderby', 'menu_order' );
		$query->set( 'order', 'ASC' );
		$query->set( 'post_parent', 0 );
	}

	/**
	 * Allows filtering the edit.php screen by mustread articles
	 *
	 * @param \WP_Query $query
	 */
	private function admin_filter( $query ) {
		if ( filter_input( INPUT_GET, 'mustread', FILTER_VALIDATE_INT ) === 1 ) {
			$query->set( 'meta_key', 'must_read' );
			$query->set( 'meta_value', 'on' );
		}
	}

}