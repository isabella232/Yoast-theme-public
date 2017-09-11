<?php
namespace Yoast\YoastCom\Theme;
?>
<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
<nav class="breadcrumb" aria-label="<?php _e( "You are here:", "yoastcom" ); ?>">
	<?php yoast_breadcrumb(); ?>
</nav>
<?php endif; ?>
