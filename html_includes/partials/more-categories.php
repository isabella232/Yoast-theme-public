<?php
namespace Yoast\YoastCom\Theme;

$categories = query_categories( array( 'number' => 3, 'orderby' => 'rand' ) );
?>
<?php foreach ( $categories as $category ) : ?>
	<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="more arrowed-medium <?php echo esc_attr( $template_args['class'] ); ?>">
		<span class="more__plug text-icon show-on-desktop">&#xf1e6;</span>
		<div class="more__holder more__holder--naked more__holder--left">
			<div class="more__supertitle"><?php echo esc_html( $category->name ); ?></div>
			<div class="more__superlink hide-on-tablet"><!-- Byline --></div>
		</div>
	</a>
<?php endforeach; ?>
