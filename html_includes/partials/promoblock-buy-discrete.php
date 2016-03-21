<?php
namespace Yoast\YoastCom\Theme;

theme_object()->excerpt->length( 30 );
?>
<div class="checkout-cross-sell">

	<div class="cross-sell--icon"><?php get_template_part( 'html_includes/partials/more-save' ); ?></div>

	<div class="cross-sell--details">
		<div class="cross-sell--title"><?php the_title(); ?><?php //the_excerpt(); ?>
		</div>

	<?php $download = new \EDD_Download( get_the_ID() ); ?>
	<form id="buy-<?php the_ID(); ?>" class="edd_download_purchase_form edd_purchase_<?php the_ID(); ?>" method="post">

		<?php if ( $download->has_variable_prices() ) : ?>
			<?php get_template_part( 'html_includes/shop/pricing-options', array(
				'name'      => 'edd_options[price_id][]',
				'id_prefix' => 'csau_download_',
				'label' => '',
			) ); ?>
		<?php elseif ( edd_item_quantities_enabled() ) : ?>
			<label>
				<?php _e( 'Amount', 'yoastcom' ); ?>
				<input type="number" min="1" step="1"
				       name="edd_options[quantity]"
				       class="edd-input edd-item-quantity size-s"
				       value="1" />
			</label>
		<?php else : ?>
			<div><?php echo str_replace( ' ', '', edd_currency_filter( $download->get_price() ) ); ?></div>
		<?php endif; ?>
		<input type="hidden" name="edd_action" class="edd_action_input" value="add_to_cart">
		<input type="hidden" name="download_id" value="<?php the_ID(); ?>">

		<button type="submit" class="color-academy-secondary button--naked">
			&laquo; <?php _e( 'Add to cart', 'yoastcom' ); ?>
		</button>
	</form>
	</div>
</div>
<?php theme_object()->excerpt->clear();
