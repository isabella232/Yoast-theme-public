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
			<?php
			if ( 1 < count( $products ) ) {
				foreach ( $products as $product ) {
					$src   = wp_get_attachment_image_src( get_post_thumbnail_id( $product->ID ) );
					$title = get_the_title( $product->ID );

					printf( '<img width="174" height="232" src="%s" alt="%s" class="promoblock promoblock--imageholder promoblock--imageholdersmall"/>', $src[0], $title );
				}
			}
			?>
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
