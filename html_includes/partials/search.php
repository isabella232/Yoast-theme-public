<?php
namespace Yoast\YoastCom\Theme;
?>
<?php if ( 'mobile' === $template_args['type'] ) : ?>
	<form action="<?php echo esc_attr( home_url() ); ?>" class="hide-on-desktop mobile-search" id="mobile-search" data-mobile-search>
		<input type="search" name="s" autofocus placeholder="Search">
		<button>Search &raquo;</button>
	</form>
<?php elseif ( 'desktop' === $template_args['type'] ) : ?>
	<form action="<?php echo esc_attr( home_url() ); ?>">
		<input type="search" name="s" class="size-m" placeholder="Search">
		<button class="button--naked">
			<span class="visuallyhidden focusable">Search</span>
			<span class="text-icon">&#xf002;</span>
		</button>
	</form>
<?php endif; ?>
