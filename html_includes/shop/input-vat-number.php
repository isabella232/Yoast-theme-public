<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;
?>
<p id="yst-edd-btw-wrap">
	<label for="yst_btw" class="edd-label">
		<?php _e( 'VAT number', 'yoast-theme' ); ?>
	</label>
	<span class="edd-description"><?php _e( 'Please enter a valid VAT number to prevent paying VAT.', 'yoast-theme' ); ?></span>
	<input type="text" id="yst_btw" name="yst_btw" class="edd-input ignore" placeholder="<?php _e( 'VAT no', 'yoast-theme' ); ?>" value="" />
</p>
<?php
