<?php
namespace Yoast\YoastCom\Theme;
?>
<div class="media media--nofloat product">
	<?php if ( post_meta( 'promo_video_embed' ) ) : ?>
		<div class="vid">
			<?php echo wp_oembed_get( post_meta( 'promo_video_embed' ) ); ?>
		</div>
	<?php endif; ?>
	<div class="bd">
		<h2 class="tight">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?> &raquo;</a>
		</h2>
		<?php the_excerpt(); ?>

		<?php if ( post_meta( 'download_id' ) ) : ?>
			<?php
			echo edd_get_purchase_link( array(
				'download_id' => post_meta( 'download_id' ),
				'text'        => __( 'Order this Course now', 'yoastcom' ) . ' &raquo;',
			) );
			?>
		<?php endif; ?>
	</div>
</div>
