<?php
namespace Yoast\YoastCom\Theme;

if ( ! isset( $template_args['class1'] ) ) {
	$template_args['class1'] = '';
}

if ( ! isset( $template_args['class2'] ) ) {
	$template_args['class2'] = '';
}

$bundles = query_bundles( array( 'posts_per_page' => 3, 'orderby' => 'rand' ) );

?>
<?php while ( $bundles->have_posts() ) : $bundles->the_post() ?>
	<?php
	$url = post_meta( 'url' );
	if ( ! $url ) {
		$url = get_permalink();
	}

	$percentage = post_meta( 'savings' );
	$percentage = rtrim( $percentage, '%' );
	if ( !$percentage || $percentage === '' ) {
		$percentage = '30';
	}
	?>
	<a href="<?php echo $url; ?>" class="more <?php echo esc_attr( $template_args['class1'] ); ?>">
		<div class="more__save <?php echo esc_attr( $template_args['class2'] ); ?>">Save over <span><?php echo $percentage; ?>%</span></div>
		<div class="more__holder">
			<div class="more__title"><?php the_title(); ?></div>
			<small class="more__link hide-on-tablet">More about this bundle &raquo;</small>
		</div>
	</a>
<?php endwhile; wp_reset_postdata(); ?>
