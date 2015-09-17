<?php
namespace Yoast\YoastCom\Theme;

if ( yst_skip_social() ) {
	return;
}

?>
<div id="social-share">
	<?php if ( isset( $GLOBALS['yoast_pinterest_image'] ) ) : ?>
		<div class="socialbox" style="margin-top: 38px">
			<a rel="nofollow" href="<?php echo esc_url( url_share_pinterest() ); ?>" data-pin-do="buttonPin" data-pin-config="above"
			   data-pin-color="red"
			   data-pin-height="28"><img class="noborder" src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_28.png" alt="Pin it"/></a>
		</div>
	<?php endif; ?>

	<div class="socialbox">
		<div class="fb-share-button" data-href="<?php echo esc_url( get_permalink() ); ?>" data-type="box_count"></div>
	</div>

	<div class="socialbox">
		<a rel="nofollow" href="http://twitter.com/share" data-url="<?php echo esc_url( get_permalink() ); ?>"
		   data-text="<?php echo esc_attr( get_the_title() ); ?>"
		   data-via="<?php echo esc_attr( get_twitter_share_via() ); ?>"
		   data-related="<?php echo esc_attr( get_twitter_share_related() ); ?>"
		   data-count="vertical"
		   data-lang="en"
		   class="twitter-share-button"><?php _e( 'Tweet', 'yoastcom' ); ?></a>
	</div>

	<div class="socialbox">
		<a class="print" rel="nofollow" href="<?php echo esc_url( url_share_print() ); ?>" onclick="window.print();return false;"><i class="fa fa-print"></i><span class="screen-reader-text"><?php _e( 'Print', 'yoastcom' ); ?></span></a>
	</div>
</div>
