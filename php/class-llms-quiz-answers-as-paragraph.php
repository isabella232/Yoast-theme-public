<?php

namespace Yoast\YoastCom\Theme;

class LLMS_Quiz_Answers_As_Paragraph {

	/**
	 * Alle opties achter elkaar als "paragraaf"
	 *
	 * Klikbaar, de actieve moet geselecteerd worden
	 * moet als 'antwoord' bijgehouden worden.
	 *
	 * Via filter op de content van een lesson die meta value heeft.
	 */

	public function __construct() {
		if ( is_admin() ) {
			return;
		}

		add_filter( 'the_content', array( $this, 'filter_the_content' ) );

		add_action( 'lifterlms_single_question_before_summary', array( $this, 'question_before_summary' ) );
	}

	public function question_before_summary( $args ) {
	}

	public function filter_the_content( $content ) {
		if ( 'llms_question' !== get_post_type() ) {
			printf( '<div>%s</div>', get_post_type() );
			return $content;
		}

		// Only for specific post (meta field)
		$post_id = get_the_ID();

		// If the meta says its an inline question format add some extra stuff.
		// This is fetched by AJAX.

		$content = '<div class="llms-inline-questions">' . $content . '</div>';
		$content .= file_get_contents( dirname( dirname( __FILE__ ) ) . 'js/llms_inline_questions.js' );

		return $content;
	}
}
