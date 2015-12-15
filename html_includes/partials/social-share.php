<?php
namespace Yoast\YoastCom\Theme;

if ( yst_skip_social() ) {
	return;
}

$article_url = \WPSEO_Frontend::get_instance()->canonical( false );

/**
 * Build a Twitter share URL
 *
 * @param string $article_url
 */
function yst_build_twitter_share_url( $article_url ) {
	$title = \WPSEO_Meta::get_value( 'twitter-title', get_the_ID() );
	if ( ! is_string( $title ) || $title === '' ) {
		$title = get_the_title();
	}
	$url = 'https://twitter.com/intent/tweet?url=' . urlencode( $article_url ) . '&via=yoast&related=jdevalk&text=' . urlencode( $title );

	echo esc_attr( $url );
}

/**
 * Build a Facebook share URL
 *
 * @param string $article_url
 */
function yst_build_fb_share_url( $article_url ) {
	$og_image = new \WPSEO_OpenGraph_Image();
	$images   = $og_image->get_images();

	$og = new \WPSEO_OpenGraph();

	$url = 'http://www.facebook.com/sharer/sharer.php?s=100';

	$url .= '&p[url]=' . rawurlencode( $article_url );
	$url .= '&p[title]=' . rawurlencode( $og->og_title( false ) );
	$url .= '&p[images][0]=' . rawurlencode( $images[0] );
	$url .= '&p[summary]=' . rawurlencode( $og->description( false ) );
	$url .= '&u=' . rawurlencode( $article_url );
	$url .= '&t=' . rawurlencode( $og->og_title( false ) );

	$url = str_replace( '%20', '+', $url );

	echo esc_attr( $url );
}


?>
<div id="social-share">
	<div class="socialbox pop">
		<a rel="nofollow" href="<?php yst_build_fb_share_url( $article_url ); ?>" data-name="facebook"><i
				class="fa fa-facebook-square text-icon--facebook"></i>Share</a>
	</div>

	<div class="socialbox pop">
		<a rel="nofollow" data-name="twitter"
		   href="<?php yst_build_twitter_share_url( $article_url ); ?>"><i
				class="fa fa-twitter-square text-icon--twitter"></i>Tweet</a>
	</div>

	<div class="socialbox print">
		<a rel="nofollow" href="" data-name="print"><i class="fa fa-print"></i>Print</a>
	</div>
</div>
