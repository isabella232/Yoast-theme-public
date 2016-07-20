<?php
namespace Yoast\YoastCom\Theme;

$post_id   = get_the_ID();
$post_type = get_post_type_object( get_post_type() );
$icon      = 'newspaper-o';
if ( 'yoast_dev_article' === $post_type->name ) {
	$icon = 'cogs';
}
?>
<h2 class="tight"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="meta">
	<p>
		<?php if ( is_tag() ) { ?>
		<i class="fa color-courses--secondary fa-<?php echo $icon; ?>" title="<?php echo $post_type->labels->singular_name; ?>" aria-hidden="true"></i>
		<?php } ?>
		<?php the_time( 'j F Y' ); ?> <?php _e( 'by', 'yoastcom' ); ?> <a
			href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'nicename' ) ) ); ?>"><?php the_author(); ?> &raquo;</a>
		<?php if ( get_comments_number() > 0 ) : ?>
			- <a
				href="<?php the_permalink(); ?>#comments"><?php get_template_part( 'html_includes/partials/comments-number' ); ?></a>
		<?php endif; ?>
	</p>
</div>
<div class="media media--nofloat">
	<a href="<?php the_permalink(); ?>" class="imgExt">
		<?php the_post_thumbnail( 'thumbnail-recent-articles' ); ?>
	</a>
	<article class="bd">
		<div class="content">
			<?php
			the_excerpt();

			if ( 'yoast_dev_article' === $post_type ) {
				$dev_cats = get_the_term_list( $post_id, 'yoast_dev_category', '', ', ' );
				if ( $dev_cats && count( $dev_cats ) > 0 ) {
					echo _n( __( 'Category:', 'yoastcom' ), __( 'Categories:', 'yoastcom' ), count( $dev_cats ) ) . ' ';
					echo $dev_cats;
					echo '<br/>';
				}
			}
			else {
				echo _n( __( 'Category:', 'yoastcom' ), __( 'Categories:', 'yoastcom' ), count( get_the_category( $post_id ) ) ) . ' ';
				the_category( ', ' );
				echo '<br/>';
			}

			$tag_count = count( get_the_tags( $post_id ) );
			if ( $tag_count > 0 ) {
				echo _n( __( 'Tag:', 'yoastcom' ), __( 'Tags:', 'yoastcom' ), $tag_count ) . ' ';
				the_tags( '', ', ' );
			}
			?>
		</div>
	</article>
</div>
