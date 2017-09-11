<?php
namespace Yoast\YoastCom\Theme;

$search_url = apply_filters( 'yoastcom_search_url', home_url() );
?>
<div class="searchbar">
    <div class="search-trigger">
        <label class="fa fa-search" aria-label="" for="searchfield"></label>
    </div>
	<form action="<?php echo esc_attr( $search_url ); ?>">
		<input type="search" id="searchfield" name="s"
		       placeholder="<?php _e( apply_filters( 'yoast_theme-search_placeholder', 'Search&hellip;' ), 'yoastcom' ); ?>">
		<button class="button--naked search-button hide-on-desktop"><span class="visuallyhidden focusable"><?php _e( 'Search', 'yoastcom' ); ?></span><span class="fa fa-search" aria-label=""></span></button>
	</form>
</div>
