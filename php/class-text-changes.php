<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Adds filters to change default WordPress texts
 */
class Text_Changes {

	/**
	 * Class constructor
	 */
	public function __construct() {
		add_filter( 'get_the_archive_title', array( $this, 'filter_archive_title' ) );

		add_action( 'wp_editor_expand', array( $this, 'reinstate_editor_for_posts_page' ) );

		add_filter( 'edd_payment_receipt_products_title', array( $this, 'edd_payment_receipt_products_title' ) );

		add_filter( 'oembed_result', array( $this, 'add_youtube_container' ), 10, 3 );

		add_filter( 'comment_form_defaults', array( $this, 'comment_form_labels' ) );
	}

	/**
	 * Make sure we can edit the posts page text
	 */
	public function reinstate_editor_for_posts_page() {
		global $post;
		if ( $post->ID == get_option( 'page_for_posts' ) && $post->post_content === '' ) {
			$post->post_content = ' ';
		}
	}

	/**
	 * Filters the archive title
	 *
	 * @param string $title The previous archive title.
	 *
	 * @return string
	 */
	public function filter_archive_title( $title ) {
		if ( is_home() ) {
			if ( is_front_page() ) {
				$title = __( 'Blog', 'yoastcom' );
			}
			else {
				$title = get_the_title( get_option( 'page_for_posts' ) );
			}
		}
		if ( is_category() || is_tag() || is_tax() ) {
			$title = single_term_title( '', false );
		}

		if ( is_post_type_archive( 'yoast_dev_article' ) ) {
			$title = __( 'Dev Blog', 'yoastcom' );
		}

		if ( is_search() ) {
			$title = sprintf( __( 'Search for "%s"', 'yoastcom' ), get_search_query() );
		}

		if ( is_author() ) {
			$title = get_the_author();
		}

		return $title;
	}

	/**
	 * Add a notice to the receipt that products include the VAT
	 *
	 * @param string $title The current title.
	 *
	 * @return string
	 */
	public function edd_payment_receipt_products_title( $title ) {
		$title .= ' <small>(incl. VAT)</small>';

		return $title;
	}

	/**
	 * Adds responsive video container to youtube auto embed
	 *
	 * @param string $html The current youtube embed HTML.
	 * @param string $url The URL that has been auto embedded.
	 * @param array $args The auto embed arguments.
	 *
	 * @return string
	 */
	public function add_youtube_container( $html, $url, $args ) {

		if ( false !== strpos( $url, 'youtube' ) ) {
			$html = '<div class="videowrapper">' . $html . '</div>';
		}

		return $html;
	}

	/**
	 * Change the comment form labels to match our style
	 *
	 * @param array $defaults
	 *
	 * @return array
	 */
	public function comment_form_labels( $defaults ) {
		$defaults['title_reply']    = __( 'Leave a reply' );
		$defaults['title_reply_to'] = __( 'Leave a reply to %s' );
		$defaults['label_submit']   = __( 'Post comment', 'yoastcom' );

		return $defaults;
	}
}
