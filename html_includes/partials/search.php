<?php
namespace Yoast\YoastCom\Theme;

$search_url = apply_filters( 'yoastcom_search_url', home_url() );
?>
<?php if ( 'mobile' === $template_args['type'] ) : ?>
	<form action="<?php echo esc_attr( $search_url ); ?>" class="hide-on-desktop mobile-search" id="mobile-search" data-mobile-search>
		<input type="search" name="s" autofocus placeholder="Search">
		<button><?php _e( 'Search &raquo;', 'yoastcom' ); ?></button>
	</form>
<?php elseif ( 'desktop' === $template_args['type'] ) : ?>
	<form action="<?php echo esc_attr( $search_url ); ?>">
		<input type="search" name="s" class="size-m" placeholder="<?php _e( 'Search', 'yoastcom' ); ?>">
		<button class="button--naked">
			<span class="visuallyhidden focusable"><?php _e( 'Search', 'yoastcom' ); ?></span>
			<span class="text-icon">&#xf002;</span>
		</button>
	</form>
<?php endif; ?>
