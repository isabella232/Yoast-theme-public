<?php
namespace Yoast\YoastCom\Theme;

$must_read = isset( $template_args['must_read'] ) && $template_args['must_read'];
$args      = array( 'posts_per_page' => 3 );

if ( $must_read ) {
	$posts_query = query_must_read_articles( $args );
}
else {
	$posts_query = new \WP_Query( $args );
}

theme_object()->excerpt->length( 8 );
theme_object()->excerpt->more( ' &raquo;' );
?>
<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
	<a href="<?php the_permalink(); ?>" class="more <?php echo $template_args['class']; ?>">
		<div class="more__holder arrowed border-<?php echo $template_args['class']; ?> <?php echo $template_args['class']; ?>">
			<div class="more__title">
				<?php the_title(); ?>
			</div>
			<small class="more__link hide-on-tablet"><?php echo esc_html( strip_tags( wp_trim_words( get_the_excerpt(), 8, ' &hellip; &raquo;' ) ) ); ?></small>
		</div>
	</a>
<?php endwhile; wp_reset_postdata(); theme_object()->excerpt->clear(); ?>
