<?php

namespace Yoast\YoastCom\Theme;

if ( post_meta( 'savings' ) ) :
	$savings = post_meta( 'savings' );
	if ( false === strpos( $savings, '%' ) ) {
		$savings = str_replace( ' ', '', edd_currency_filter( $savings ) );
	}
?>
	<div class="more__save more__save--alone color-cta">
		<?php printf( __( 'Save %s', 'yoastcom' ), '<span>' . $savings) . '</span>'; ?>
	</div>
<?php endif; ?>