<?php
namespace Yoast\YoastCom\Theme;

$search_url = apply_filters( 'yoastcom_search_url', home_url() );
?>
<?php if ( 'mobile' === $template_args['type'] ) : ?>
	<form action="<?php echo esc_attr( $search_url ); ?>" class="hide-on-desktop mobile-search" id="mobile-search" data-mobile-search>
		<input type="search" name="s" autofocus placeholder="Search">
		<button>Search &raquo;</button>
	</form>
<?php elseif ( 'desktop' === $template_args['type'] ) : ?>
	<form action="<?php echo esc_attr( $search_url ); ?>">
		<input type="search" name="s" class="size-m" placeholder="Search">
		<button class="button--naked">
			<span class="visuallyhidden focusable">Search</span>
			<span class="text-icon">&#xf002;</span>
		</button>
	</form>
<?php endif; ?>
