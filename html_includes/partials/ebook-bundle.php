<?php
namespace Yoast\YoastCom\Theme;

$product_ids = edd_get_bundled_products( get_the_ID() );
$products = array_map( function( $product_id ) {
	return get_post( $product_id );
}, $product_ids );

?>
<div class="media media--nofloat product">
	<a href="<?php the_permalink(); ?>" class="img img--large">
		<div class="promoblockimage__holder">
			<?php if ( 1 < count( $product_ids ) ) : ?>
				<?php echo get_the_post_thumbnail( $product_ids[0],  array( 175, 230 ), array( 'class' => 'promoblock promoblock--imageholder promoblock--imageholdersmall' ) ); ?>
				<?php echo get_the_post_thumbnail( $product_ids[1], array( 175, 230 ), array( 'class' => 'promoblock promoblock--imageholder promoblock--imageholdersmall' ) ); ?>
			<?php endif; ?>
		</div>
	</a>
	<div class="bd">
		<?php
		$url = post_meta( 'url' );
		if ( ! $url ) {
			$url = get_permalink();
		}
		?>
		<h2 class="h3 tight color-academy--tertiary"><a href="<?php echo $url; ?>"><?php the_title(); ?></a></h2>
		<h3 class="h2 tight color-academy--tertiary"><a href="<?php echo $url; ?>"><?php echo implode( ' &amp ', array_map( 'esc_html', wp_list_pluck( $products, 'post_title' ) ) ); ?></a></h3>
		<?php the_content(); ?>

		<?php if ( post_meta( 'savings' ) ) : ?>
			<div class="more__save more__save--alone color-cta">
				<?php printf( __( 'Save %s', 'yoastcom' ), '<span>' . str_replace( ' ', '', edd_currency_filter( post_meta( 'savings' ) ) ) ) . '</span>'; ?>
			</div>
		<?php endif; ?>

		<?php echo edd_get_purchase_link( array(
			'class' => 'button default',
			'text'  => __( 'Buy this bundle now', 'yoastcom' ) . ' &raquo;',
		) ); ?>

	</div>
</div>
