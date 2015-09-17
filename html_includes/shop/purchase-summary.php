<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

$hide_vat = true;
if ( 0 != edd_get_cart_tax() ) {
	$hide_vat = false;
}
echo '<div class="purchase_summary alignright">
		<table>
			<tr><th colspan="2">Purchase summary</th></tr>
			<tr class="edd_cart_tax_row"' . ( ( $hide_vat ) ? 'style="display:none;"' : '' ) . '>
				<th class="edd_cart_tax">
					VAT (<span id="yst_secondary_tax_rate">'. edd_get_tax_rate() .'</span>%)
				</th>
				<th class="edd_cart_item_price">
					<span class="edd_cart_tax_amount" id="yst_secondary_tax">' . esc_html( edd_cart_tax() ) . '</span>
				</th>
			</tr>
			<tr>
				<th>Total:</th>
				<th class="edd_cart_amount">' . edd_cart_total( false ) . '</th>
			</tr>
		</table>
		</div>
		<div class="clear"></div>
		<br>';
