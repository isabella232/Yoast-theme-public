<?php


namespace Yoast\YoastCom\Theme;


class Shortcodes {

	/**
	 * Adds the themes shortcodes
	 */
	public function add_shortcodes() {
		add_shortcode( 'bundle', array( $this, 'bundle' ) );
		add_shortcode( 'plugin-info', array( $this, 'plugin_info' ) );
		add_shortcode( 'plugin-cta', array( $this, 'plugin_cta' ) );
		add_shortcode( 'plugin-stats', array( $this, 'plugin_stats' ) );
		add_shortcode( 'yst_review_box', array( $this, 'review_box' ) );
		add_shortcode( 'sidebar-content', array( $this, 'sidebar_content' ) );
		add_shortcode( 'testimonial', array( $this, 'testimonial' ) );
		add_shortcode( 'announcement', array( $this, 'announcement' ) );

		// Deprecated shortcodes.
		add_shortcode( 'box', array( $this, 'deprecate_box' ) );
		add_shortcode( 'download_button', array( $this, 'deprecated_download_button' ) );
		add_shortcode( 'support', array( $this, 'deprecate_support' ) );
	}

	/**
	 * Handler for the box shortcode, outputs nothing except a deprecation notice.
	 */
	public function deprecate_box() {
		return '<!-- The "box" shortcode is deprecated -->';
	}

	/**
	 * Handler for the box shortcode, outputs nothing except a deprecation notice.
	 */
	public function deprecated_download_button() {
		return '<!-- The "download_button" shortcode is deprecated -->';
	}

	/**
	 * Handler for the support shortcode, outputs something that is completely buildable using the WordPress admin so it
	 * doesn't require a shortcode anymore. With this shortcode you used to be able to make a grid of boxes with content
	 * in them.
	 *
	 * @param array  $args    The shortcode arguments.
	 * @param string $content The content inside the shortcode.
	 *
	 * @return string HTML to output.
	 */
	public function deprecate_support( $args, $content ) {

		$class = '';
		if ( isset( $args['class'] ) ) {
			$class = $args['class'];
		}

		$name = 'Add a name attribute!';
		if ( isset( $args['name'] ) ) {
			$name = $args['name'];
		}

		return get_template_part( 'html_includes/shortcodes/deprecate-support', array(
			'return'  => true,
			'class'   => $class,
			'name'    => $name,
			'content' => $content,
		) );
	}

	/**
	 * Handler for the plugin-info shortcode. Outputs some information about the plugin
	 *
	 * @return string
	 */
	public function plugin_info() {
		return
			$this->get_break_out_content()
			. get_template_part( 'html_includes/shortcodes/plugin-info', array( 'return' => true ) )
			. '<hr>'
			. $this->get_content_restart();
	}

	/**
	 * Handler for the plugin-cta shortcode. Outputs the buttons to buy or download the plugin.
	 *
	 * @return string
	 */
	public function plugin_cta() {
		return get_template_part( 'html_includes/shortcodes/plugin-cta', array( 'return' => true ) );
	}

	/**
	 * Handler for the bundle shortcode
	 *
	 * @return string
	 */
	public function bundle( $args ) {
		$heading = __( 'Bundle plugins and save money', 'yoastcom' );
		if ( isset( $args['heading'] ) ) {
			$heading = $args['heading'];
		}

		$bundles = array();
		if ( isset( $args['bundles'] ) ) {
			$bundles = explode( ',', $args['bundles'] );
		}

		if ( ! count( $bundles ) > 0 ) {
			return '<p><strong>You need to define the bundles to show using the <code>bundles</code> attribute, comma separated by ID, like this: <code>[bundle bundles="1,2"]</code>.</strong></p>';
		}

		$out = $this->get_break_out_content();
		$out .= get_template_part( 'html_includes/shortcodes/bundle', array(
				'bundles' => $bundles,
				'heading' => $heading,
				'return'  => true,
			)
		);
		$out .= $this->get_content_restart();

		return $out;
	}

	/**
	 * Handler for the plugin-stats shortcode. Outputs some statistics about the plugin
	 *
	 * @return string
	 */
	public function plugin_stats() {
		return $this->get_break_out_content() . get_template_part( 'html_includes/shortcodes/plugin-stats', array( 'return' => true ) ) . $this->get_content_restart();
	}

	/**
	 * Handler for the yst_review_box shortcode. Outputs a price comparison box for the site reviews.
	 *
	 * @return string
	 */
	public function review_box() {
		return $this->get_break_out_content() . '<section class="row">' . do_shortcode( post_meta( 'review-box' ) ) . '</section>' . $this->get_content_restart();
	}

	/**
	 * Handler for the testimonial shortcode. Outputs a neat testimonial box with the possibility of an image.
	 *
	 * @param array  $atts    The shortcode attributes.
	 * @param string $content The shortcode content.
	 *
	 * @return string
	 */
	public function testimonial( $atts, $content ) {
		$args = array(
			'return' => true,
		);

		if ( isset( $atts['image_url'] ) ) {
			$args['image_url'] = $atts['image_url'];
		}

		if ( isset( $atts['image_id'] ) ) {
			$args['image_id'] = $atts['image_id'];
		}

		if ( ! empty( $content ) ) {
			$args['testimonial'] = $content;
		}

		return $this->get_break_out_content() . get_template_part( 'html_includes/shortcodes/testimonial', $args ) . $this->get_content_restart();
	}

	/**
	 * Allows putting the sidebar content higher up along the content than it would normally happen if there is other break out content
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	public function sidebar_content( $atts, $content = null ) {

		$out = $this->get_break_out_body();
		$out .= '<section class="extra">';
		if ( ! is_null( $content ) ) {
			$content = trim( $content );
		}

		if ( '' === $content ) {
			$content = wp_kses_post( post_meta( 'sidebar_content' ) );
		}

		$content = do_shortcode( shortcode_unautop( wpautop( $content ) ) );

		// Remove empty paragraphs.
		$content = str_replace( '<p></p>', '', $content );

		$out .= $content;
		$out .= '</section>';
		$out .= $this->get_restart_body();

		return $out;
	}

	/**
	 * Handler for the announcement shortcode.
	 *
	 * @param array $atts The shortcode attributes.
	 *
	 * @return string The content to output on the page.
	 */
	public function announcement( $atts ) {

		$args = wp_parse_args( $atts, array(
			'banner'    => 'academy',
			'text'      => '',
			'url'       => '',
			'no-sticky' => true,
			'return'    => true,
		) );

		$template = 'html_includes/partials/fullbanner';
		if ( ! empty( $args['text'] ) && ! empty( $args['url'] ) ) {
			$template = 'html_includes/partials/banner-announcement';
		}

		return $this->get_break_out_content() . get_template_part( $template, $args ) . $this->get_content_restart();
	}

	/**
	 * Break out of the article body
	 *
	 * @return string
	 */
	public function get_break_out_body() {
		$break_out_content = '';

		if ( is_singular( 'yoast_plugins' ) ) {
			$break_out_content = '</section>';
		} elseif ( is_page() || is_singular() ) {
			$break_out_content = '</div>';
		}

		return $break_out_content;
	}

	/**
	 * Restart the article body
	 *
	 * @return string
	 */
	public function get_restart_body() {
		$restart_content = '';

		if ( is_singular( 'yoast_plugins' ) ) {
			$restart_content = '<section class="content">';
		} elseif ( is_page() || is_singular() ) {
			$restart_content = '<div class="content">';
		}

		return $restart_content;
	}

	/**
	 * Returns HTML tags to break out of the content container to allow for full width shortcodes
	 *
	 * @return string
	 */
	private function get_break_out_content() {
		$break_out_content = '';

		if ( is_singular( 'yoast_plugins' ) ) {
			$break_out_content = '</section></div>';
		}

		if ( is_page() ) {
			$break_out_content = '</div></article>';
		}

		return $break_out_content;
	}

	/**
	 * Restart the content area to make sure content after the shortcode is still valid
	 */
	private function get_content_restart() {
		$restart_content = '';

		if ( is_singular( 'yoast_plugins' ) ) {
			$restart_content = '<div class="row island iceberg"><section class="content">';
		}

		if ( is_page() ) {
			$restart_content = '<article class="row"><div class="content">';
		}

		return $restart_content;
	}
}
