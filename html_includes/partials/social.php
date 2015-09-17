<?php
namespace Yoast\YoastCom\Theme;

$class = '';
if ( isset( $template_args['class'] ) ) {
	$class = $template_args['class'];
}
?>
<div class="social promoblock <?php echo esc_attr( $class ); ?>">
	<a class="fa fa-facebook-square" target="_blank" rel="external" href="https://www.facebook.com/yoast">
		<span>Facebook</span>
		<?php output_social_counter( 'facebook_likes' ); ?>
	</a>
	<a class="fa fa-instagram" target="_blank" rel="publisher external" href="https://instagram.com/yoast">
		<span>Instagram</span>
		<span class="counter">1k</span>
	</a>
	<a class="fa fa-linkedin-square" target="_blank" rel="external" href="https://www.linkedin.com/company/yoast-com">
		<span>LinkedIn</span>
		<span class="counter">1k</span>
	</a>
	<a class="fa fa-pinterest-square" target="_blank" rel="external" href="https://www.pinterest.com/yoast/">
		<span>Pinterest</span>
		<span class="counter">1k</span>
	</a>
	<a class="fa fa-twitter-square" target="_blank" rel="external" href="https://twitter.com/yoast">
		<span>Twitter</span>
		<?php output_social_counter( 'twitter_subs' ); ?>
	</a>
	<a class="fa fa-youtube-square" target="_blank" rel="external" href="https://www.youtube.com/yoast">
		<span>YouTube</span>
		<span class="counter">2k</span>
	</a>
	<a class="fa fa-rss-square" target="_blank" rel="alternate" href="https://yoast.com/feed/">
		<span>RSS Feed</span>
		<?php output_social_counter( 'rss' ); ?>
	</a>
</div>
