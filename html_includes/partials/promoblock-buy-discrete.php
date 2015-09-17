<?php
namespace Yoast\YoastCom\Theme;

theme_object()->excerpt->length( 30 );
?>
<div class="promoblock theme-academy checkout-cross-sell">
	<p>
		<span class="h3"><?php the_title(); ?> &raquo;</span>

		<?php the_excerpt(); ?>
	</p>

	<?php $download = new \EDD_Download( get_the_ID() ); ?>
	<form id="buy-<?php the_ID(); ?>" class="edd_download_purchase_form edd_purchase_<?php the_ID(); ?>" method="post">
		<?php if ( $download->has_variable_prices() ) : ?>
			<?php get_template_part( 'html_includes/shop/pricing-options', array(
				'name'      => 'edd_options[price_id][]',
				'id_prefix' => 'csau_download_',
			) ); ?>
		<?php elseif ( edd_item_quantities_enabled() ) : ?>
			<label>
				<?php _e( 'Amount', 'yoastcom' ); ?>
				<input type="number" min="1" step="1"
				       name="edd_options[quantity]"
				       class="edd-input edd-item-quantity size-s"
				       value="1" />
			</label>
		<?php endif; ?>
		<input type="hidden" name="edd_action" class="edd_action_input" value="add_to_cart">
		<input type="hidden" name="download_id" value="<?php the_ID(); ?>">

		<button type="submit" class="bottom-right color-academy button--naked">
			<?php _e( 'Add this item to cart &raquo;', 'yoastcom' ); ?>
		</button>
	</form>
</div>
<?php theme_object()->excerpt->clear();
